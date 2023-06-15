<?php

require '../model/conexion.php';
$conexion = new Conexion();
$conexion->conectar();

$idVideojuego = $_GET['idV'];
$idUsuario = $_GET['idU'];

$sql = "SELECT * FROM usuario_videojuego WHERE id_usuario_fk = $idUsuario AND id_videojuego_fk = $idVideojuego";
$resultado1 = $conexion->query($sql);

if ($resultado1->num_rows > 0) {
  echo 'error_1';
} else {
  $sql2 = "INSERT INTO usuario_videojuego (id_usuario_fk, id_videojuego_fk)
  VALUES ($idUsuario, $idVideojuego)";
  $resultado2 = $conexion->query($sql2);

  if (empty($resultado2)) {
    echo 'error_2';
  } else {
    echo 'success';
  }
}
