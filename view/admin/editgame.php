<?php
session_start();

if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1) {
    header('location: ../../index.php');
    exit;
}

require '../../model/conexion.php';

$idVideojuego = $_GET["id_videojuego_pk"];
$conexion = new Conexion();
$conexion->conectar();

$sql = "SELECT id_categoria_pk, nombre AS nombrecategoria FROM categorias;";
$categorias = $conexion->query($sql);

$sql2 = "SELECT id_plataforma_pk, nombre AS nombreplataforma FROM plataformas;";
$plataformas = $conexion->query($sql2);

$sql3 = "SELECT * FROM videojuegos WHERE id_videojuego_pk = '$idVideojuego'";
$resultado = $conexion->query($sql3);

if ($resultado->num_rows > 0) {
    $videojuego = $resultado->fetch_assoc();

    $titulo = $videojuego['titulo'];
    $precio = $videojuego['precio'];
    $tamano = $videojuego['tamano'];
    $categoria = $videojuego['id_categoria_fk'];
    $plataforma = $videojuego['id_plataforma_fk'];
}
?>

<?php include('../../comon/header.php') ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/sweetalert.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .fixed-width-icon {
            width: 20px;
        }

        .mt-2 {
            display: none;
        }

        .custom-btn {
            width: 150px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-md-offset-4">
                <div class="mt-3"></div>
                <form id="formulario_editarjuego">
                    <fieldset>
                        <legend class="text-center text-bold" style="font-size: 30px;">Agregar VideoJuego</legend>

                        <label class="sr-only" for="titulo">Título</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-gamepad fixed-width-icon"></i></div>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresa el título" value="<?php echo $titulo; ?>" oninput="validarCampo(this)">
                        </div>

                        <script>
                            function validarCampo(input) {
                                var regex = /^[A-Za-z0-9\s\-_:'".]*$/;
                                var valido = regex.test(input.value);

                                if (!valido) {
                                    input.value = input.value.replace(/[^A-Za-z0-9\s\-_:'".]/g, '');
                                    swal('Error', "Solo se permiten letras, números, guiones medios, guiones bajos, comillas y dos puntos", 'warning');
                                }
                            }
                        </script>


                        <div style="margin-top: 15px;"></div>

                        <label class="sr-only" for="precio">Precio</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-money-bill fixed-width-icon"></i></div>
                            <input type="number" step="1" class="form-control" id="precio" name="precio" placeholder="Ingresa el precio en pesos Colombianos" value="<?php echo $precio; ?>">
                        </div>

                        <div style="margin-top: 15px;"></div>

                        <label class="sr-only" for="tamano">Tamaño</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-expand fixed-width-icon"></i></div>
                            <input type="number" step="1" class="form-control" id="tamano" name="tamano" placeholder="Ingresa el tamaño en MB" value="<?php echo $tamano; ?>">
                        </div>

                        <div style="margin-top: 15px;"></div>

                        <label class="sr-only" for="categoria">Categoría</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-tag fixed-width-icon"></i></div>
                            <select id="categoria" class="form-control" name="categoria">
                                <option disabled selected value="">Seleccione una Categoría</option>
                                <?php
                                if ($categorias->num_rows > 0) {
                                    while ($row = $categorias->fetch_assoc()) {
                                        $selected = ($row['id_categoria_pk'] == $categoria) ? 'selected' : '';
                                ?>
                                        <option value="<?php echo $row['id_categoria_pk']; ?>" <?php echo $selected; ?>><?php echo $row['nombrecategoria']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div style="margin-top: 15px;"></div>

                        <label class="sr-only" for="plataforma">Plataforma</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fas fa-desktop fixed-width-icon"></i></div>
                            <select id="plataforma" class="form-control" name="plataforma">
                                <option disabled value="" selected>Seleccione una Plataforma</option>
                                <?php
                                if ($plataformas->num_rows > 0) {
                                    while ($row = $plataformas->fetch_assoc()) {
                                        $selected = ($row['id_plataforma_pk'] == $plataforma) ? 'selected' : '';
                                ?>
                                        <option value="<?php echo $row['id_plataforma_pk']; ?>" <?php echo $selected; ?>><?php echo $row['nombreplataforma']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div style="margin-top: 15px;"></div>

                        <div class="row" id="load" hidden="hidden">
                            <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                                <img src="../../img/load.gif" width="100%" alt="">
                            </div>
                            <div class="col-xs-12 center text-accent">
                                <span>Validando información...</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary btn-block custom-btn" name="button" id="editarjuego" data-id="<?php echo $idVideojuego; ?>">Editar VideoJuego</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="./gestionarjuegos.php" class="btn btn-primary custom-btn">Volver</a>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="../../js/jquery.js"></script>
    <!-- Bootstrap js -->
    <script src="../../js/bootstrap.min.js"></script>
    <!-- SweetAlert js -->
    <script src="../../js/sweetalert.min.js"></script>
    <!-- Js personalizado -->
    <script src="../../js/operaciones.js"></script>

</body>

</html>