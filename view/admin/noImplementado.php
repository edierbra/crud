<?php
// Se prendio esta mrd :v
session_start();
// Validamos que exista una sesión y además que el cargo que exista sea igual a 1 (Administrador)
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1) {
  header('location: ../../index.php');
  exit;
}
?>

<?php include('../../comon/header.php') ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Página de ejemplo</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    .custom-btn {
      width: 150px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>No se ha implementado aún esta función</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <img src="../../img/sorry.png" alt="Sorry" width="350px">
      </div>
      <div class="col-md-12">
        <a href="./index.php" class="btn btn-primary custom-btn">Inicio</a>
      </div>
    </div>
  </div>
</body>
</html>



