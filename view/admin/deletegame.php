<?php
session_start();

if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1) {
    header('location: ../../index.php');
    exit;
}

require '../../model/conexion.php';

$conexion = new Conexion();
$conexion->conectar();
$idVideojuego = $_GET['id_videojuego_pk'];
$idUsuario = $_SESSION['id'];

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
    </style>
</head>

<body>
  <div class="container">
    <h1>Confirmación</h1>
    <p>¿Estás seguro de que deseas realizar esta acción?</p>
    <div class="row" id="load" hidden="hidden">
        <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
            <img src="../../img/load.gif" width="100%" alt="">
        </div>
        <div class="col-xs-12 center text-accent">
            <span>Validando información...</span>
        </div>
    </div>
    <button id="deleteGame" class="btn btn-primary" data-idv="<?php echo $idVideojuego; ?>" data-idu="<?php echo $idUsuario; ?>">Confirmar</button>
    <button id="cancelDeleteGame" class="btn btn-secondary">Cancelar</button>
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