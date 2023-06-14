<?php

$titulo   = $_POST['titulo'];
$precio  = $_POST['precio'];
$tamano  = $_POST['tamano'];
$categoria = $_POST['categoria'];
$plataforma = $_POST['plataforma'];

require '../model/conexion.php';
$conexion = new Conexion();
$conexion->conectar();

$sql = "SELECT titulo FROM videojuegos WHERE titulo LIKE '%$titulo%'";
$resultado1 = $conexion->query($sql);

if (empty($titulo) || empty($precio) || empty($tamano) || empty($categoria) || empty($plataforma)) {
  echo 'error_1'; // Campos obligatorios
} else {

  if ($resultado1->num_rows > 0) {
    echo 'error_2';
  }else{
    $sql2 = "INSERT INTO videojuegos (titulo, precio, tamano, id_categoria_fk, id_plataforma_fk)
    VALUES ('$titulo', $precio, $tamano, $categoria, $plataforma)";
    $resultado2 = $conexion->query($sql2);
  
    if (empty($resultado2)) {
      echo 'error_3';
    } else {
      echo 'success';
    }
  }
}
