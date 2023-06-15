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
$sql = "SELECT * FROM categorias
        WHERE nombre LIKE '%$searchTerm%'";
// Ejecutar consulta utilizando la función query de la clase de conexión
$resultado = $conexion->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
?>
    <div class="table-responsive">
        <h1 class="text-center"> CATEGORIAS DISPONIBLES </h1>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th class="text-center">ID Categoria</th>
                    <th class="text-center">Categoria</th>
                    <th class="text-center">Opciones</th>
                </tr>
            </thead>
            <?php
            // Recorrer filas de resultados
            while ($row = $resultado->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['id_categoria_pk']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td>
                        <a href="updateCategoria.php?id_categoria_pk=<?php echo $row['id_categoria_pk'] ?>" class="btn btn-secondary">
                            <img src="../../img/editar.png" alt="Editar" width="50px">
                        </a>
                        <a href="noImplementado.php?id_categoria_pk=<?php echo $row['id_categoria_pk'] ?>" class="btn btn-secondary">
                            <img src="../../img/eliminar.jpeg" alt="Eliminar" width="50px">
                        </a>
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <h4>No se encontraron videojuegos en el sistema!!!</h4>
            <img src="../../img/sorry.png" alt="Lo siento" width="350px">
            <p>
                No encuentras videojuegos? <a href="./createCategoria.php"> Agrega un videojuego!</a> ó <a href="./gestionarCategorias.php"> Realiza una nueva Busqueda!</a>
            </p>
        <?php
        }

        // Cerrar conexión
        $conexion->cerrar();
        ?>
        </table>
    </div>