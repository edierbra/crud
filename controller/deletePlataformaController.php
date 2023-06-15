<?php

require '../model/conexion.php';
$conexion = new Conexion();
$conexion->conectar();

$idPlataforma = $_GET['id'];

$sql = "SELECT * FROM plataformas WHERE id_plataforma_pk = $idPlataforma";
$resultado1 = $conexion->query($sql);

if ($resultado1->num_rows > 0) {
  $sql2 = "DELETE FROM plataformas WHERE id_plataforma_pk = $idPlataforma";
  $resultado2 = $conexion->query($sql2);

  if (empty($resultado2)) {
    echo 'error_2';
  } else {
    echo 'success';
  }
  
} else {
  echo 'error_1';
}
