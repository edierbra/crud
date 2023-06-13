<?php
session_start();
// Incluir archivo de conexión a la base de datos
require '../../model/conexion.php';
// Crear instancia de la clase de conexión
$conexion = new Conexion();
// Conectarse a la base de datos
$conexion->conectar();
// ID del usuario
$idUsuario = $_SESSION['id'];
// Consulta SQL
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT v.id_videojuego_pk, v.titulo, v.precio, v.tamano, c.nombre AS categoria, p.nombre AS plataforma 
        FROM videojuegos v 
        JOIN categorias c ON v.id_categoria_fk = c.id_categoria_pk 
        JOIN plataformas p ON v.id_plataforma_fk = p.id_plataforma_pk 
        JOIN usuario_videojuego uv ON v.id_videojuego_pk = uv.id_videojuego_fk 
        WHERE uv.id_usuario_fk = $idUsuario AND v.titulo LIKE '%$searchTerm%'";
// Ejecutar consulta utilizando la función query de la clase de conexión
$resultado = $conexion->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
?>
    <div class="table-responsive">
        <h1 class="text-center"> MIS JUEGOS </h1>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th class="text-center">ID videojuego</th>
                    <th class="text-center">Título</th>
                    <th class="text-center">Precio ($)</th>
                    <th class="text-center">Tamaño (MB)</th>
                    <th class="text-center">Categoría</th>
                    <th class="text-center">Plataforma</th>
                </tr>
            </thead>
            <?php
            // Recorrer filas de resultados
            while ($row = $resultado->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['id_videojuego_pk']; ?></td>
                    <td><?php echo $row['titulo']; ?></td>
                    <td><?php echo $row['precio']; ?></td>
                    <td><?php echo $row['tamano']; ?></td>
                    <td><?php echo $row['categoria']; ?></td>
                    <td><?php echo $row['plataforma']; ?></td>
                </tr>
            <?php
            }
        } else {
            ?>
            <h4>No se encontraron videojuegos asociados a tu Usuario!!!</h4>
            <img src="../../img/sorry.png" alt="Lo siento" width="350px">
            <p>
                No encuentras videojuegos? <a href="./gestionarjuegos.php"> Agrega un videojuego!</a>
            </p>
        <?php
        }

        // Cerrar conexión
        $conexion->cerrar();
        ?>