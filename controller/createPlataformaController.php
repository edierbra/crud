<?php

$plataforma  = $_POST['plataforma'];

require '../model/conexion.php';
$conexion = new Conexion();
$conexion->conectar();

$sql = "SELECT nombre
FROM plataformas
WHERE LOWER(nombre) = LOWER('$plataforma');";
$resultado1 = $conexion->query($sql);

if (empty($plataforma)) {
  echo 'error_1'; // Campos obligatorios
} else {

  if ($resultado1->num_rows > 0) {
    echo 'error_2';
  }else{
    $sql2 = "INSERT INTO plataformas (nombre)
    VALUES ('$plataforma')";
    $resultado2 = $conexion->query($sql2);
  
    if (empty($resultado2)) {
      echo 'error_3';
    } else {
      echo 'success';
    }
  }
}
