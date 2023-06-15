<?php

require '../model/conexion.php';
$conexion = new Conexion();
$conexion->conectar();

$idCategoria = $_GET['id'];

$sql = "SELECT * FROM categorias WHERE id_categoria_pk = $idCategoria";
$resultado1 = $conexion->query($sql);

if ($resultado1->num_rows > 0) {
  $sql2 = "DELETE FROM categorias WHERE id_categoria_pk = $idCategoria";
  $resultado2 = $conexion->query($sql2);

  if (empty($resultado2)) {
    echo 'error_2';
  } else {
    echo 'success';
  }
  
} else {
  echo 'error_1';
}
