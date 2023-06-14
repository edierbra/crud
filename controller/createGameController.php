<?php

$titulo   = $_POST['titulo'];
$precio  = $_POST['precio'];
$tamano  = $_POST['tamano'];
$categoria = $_POST['categoria'];
$plataforma = $_POST['plataforma'];

if (empty($titulo) || empty($precio) || empty($tamano) || empty($categoria) || empty($plataforma)) {
  echo 'error_1'; // Campos obligatorios
} else {
  require '../model/conexion.php';
  $conexion = new Conexion();
  $conexion->conectar();

  $sql = "INSERT INTO videojuegos (titulo, precio, tamano, id_categoria_fk, id_plataforma_fk)
  VALUES ('$titulo', $precio, $tamano, $categoria, $plataforma)";
  $resultado = $conexion->query($sql);

  if (empty($resultado)) {
    echo 'error_2';
  }else{
    echo 'success';
  }
}
