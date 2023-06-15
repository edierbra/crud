<?php
session_start();

if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1) {
    header('location: ../../index.php');
    exit;
}

$id_categoria  = $_GET['id_categoria_pk'];

require '../../model/conexion.php';

$conexion = new Conexion();
$conexion->conectar();

$sql = "SELECT nombre  FROM categorias WHERE id_categoria_pk='$id_categoria';";
$categoria = $conexion->query($sql);
while ($row = $categoria->fetch_assoc()) {
    $nombre = $row['nombre'];
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
                <form id="formulario_updatecategoria">
                    <fieldset>
                        <legend class="text-center text-bold" style="font-size: 30px;">Editar Categoría: <?php echo $nombre ?></legend>

                        <label class="sr-only" for="categoria">Categoría</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-tag fixed-width-icon"></i></div>
                            <input type="text" value="<?php echo $nombre ?>" class="form-control" id="categoria" name="categoria" placeholder="Ingresa el nombre de la categoría" oninput="validarCampo(this)">
                        </div>

                        <script>
                            function validarCampo(input) {
                                var regex = /^[A-Za-z0-9\sáéíóúÁÉÍÓÚ]*$/;
                                var valido = regex.test(input.value);

                                if (!valido) {
                                    input.value = input.value.replace(/[^A-Za-z0-9\sáéíóúÁÉÍÓÚ]/g, '');
                                    swal('Error', "Solo se permiten letras y números", 'warning');
                                }
                            }
                        </script>

                        <div style="margin-top: 15px;"></div>

                        <label class="sr-only" for="id">Número</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-hashtag fixed-width-icon"></i></div>
                            <input type="number" value="<?php echo $id_categoria ?>" class="form-control" id="id" name="id" readonly>
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
                            <div class="col-xs-8 col-xs-offset-2">
                                <div class="mt-2"></div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary btn-block custom-btn" name="button" id="updatecategoria">Editar Categoría</button>
                                </div>

                                <div class="col-md-6">
                                    <a href="./gestionarCategorias.php" class="btn btn-primary custom-btn">Volver</a>
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