<?php

$categoria  = $_POST['categoria'];

require '../model/conexion.php';
$conexion = new Conexion();
$conexion->conectar();

$sql = "SELECT nombre
FROM categorias
WHERE LOWER(nombre) = LOWER('$categoria');";
$resultado1 = $conexion->query($sql);

if (empty($categoria)) {
  echo 'error_1'; // Campos obligatorios
} else {

  if ($resultado1->num_rows > 0) {
    echo 'error_2';
  }else{
    $sql2 = "INSERT INTO categorias (nombre)
    VALUES ('$categoria')";
    $resultado2 = $conexion->query($sql2);
  
    if (empty($resultado2)) {
      echo 'error_3';
    } else {
      echo 'success';
    }
  }
}
