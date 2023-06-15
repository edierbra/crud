<?php

$idVideojuego = $_GET['id'];
$titulo = $_POST['titulo'];
$precio = $_POST['precio'];
$tamano = $_POST['tamano'];
$categoria = $_POST['categoria'];
$plataforma = $_POST['plataforma'];

require '../model/conexion.php';
$conexion = new Conexion();
$conexion->conectar();

if (empty($titulo) || empty($precio) || empty($tamano) || empty($categoria) || empty($plataforma)) {
  echo 'error_1'; // Campos obligatorios
} else {
  $sql = "SELECT * FROM videojuegos WHERE id_videojuego_pk ='$idVideojuego'";
  $resultado1 = $conexion->query($sql);

  if ($resultado1->num_rows > 0) {    
    $sql2 = "UPDATE videojuegos SET titulo = '$titulo', precio = '$precio', tamano = '$tamano', id_categoria_fk = '$categoria', id_plataforma_fk = '$plataforma' WHERE id_videojuego_pk ='$idVideojuego'";
    $resultado2 = $conexion->query($sql2);

    if (empty($resultado2)) {
      echo 'error_3';
    } else {
      echo 'success';
    }
  }
}
?>
