<?php
session_start();

if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1) {
    header('location: ../../index.php');
    exit;
}
?>

<?php include('../../comon/header.php') ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .fixed-width-icon {
            width: 20px;
            /* Ajusta el ancho según tus necesidades */
        }

        .mt-2 {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-md-offset-4">
                <div class="mt-3"></div>

                <form id="formulario_registro">
                    <fieldset>
                        <legend class="text-center text-bold" style="font-size: 30px;">Agregar VideoJuego</legend>

                        <label class="sr-only" for="titulo">Título</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-gamepad fixed-width-icon"></i></div>
                            <input type="text" class="form-control" name="titulo" placeholder="Ingresa el título">
                        </div>

                        <div style="margin-top: 15px;"></div>

                        <label class="sr-only" for="precio">Precio</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-money-bill fixed-width-icon"></i></div>
                            <input type="number" step="0.01" class="form-control" name="precio" placeholder="Ingresa el precio en pesos Colombianos">
                        </div>

                        <div style="margin-top: 15px;"></div>

                        <label class="sr-only" for="tamano">Tamaño</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-expand fixed-width-icon"></i></div>
                            <input type="number" step="1" class="form-control" name="tamano" placeholder="Ingresa el tamaño en MB">
                        </div>

                        <div style="margin-top: 15px;"></div>

                        <label class="sr-only" for="categoria">Categoría</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-tag fixed-width-icon"></i></div>
                            <select class="form-control" name="categoria">
                                <option disabled selected value="">Categoría</option>
                                <option value="categoria1">Categoría 1</option>
                                <option value="categoria2">Categoría 2</option>
                                <option value="categoria3">Categoría 3</option>
                            </select>
                        </div>

                        <div style="margin-top: 15px;"></div>

                        <label class="sr-only" for="plataforma">Plataforma</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fas fa-desktop fixed-width-icon"></i></div>
                            <select class="form-control" name="plataforma">
                                <option disabled selected value="">Plataforma</option>
                                <option value="plataforma1">Plataforma 1</option>
                                <option value="plataforma2">Plataforma 2</option>
                                <option value="plataforma3">Plataforma 3</option>
                            </select>
                        </div>

                        <div style="margin-top: 15px;"></div>

                        <div class="row" id="load" hidden="hidden">
                            <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                                <img src="img/load.gif" width="100%" alt="">
                            </div>
                            <div class="col-xs-12 center text-accent">
                                <span>Validando información...</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-8 col-xs-offset-2">
                                <div class="mt-2"></div>
                                <button type="button" class="btn btn-primary btn-block" name="button" id="registro">Regístrate</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/operaciones.js"></script>
</body>

</html>