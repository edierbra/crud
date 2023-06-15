<?php

$plataforma  = $_POST['plataforma'];
$id  = intval($_POST['id']);

require '../model/conexion.php';
$conexion = new Conexion();
$conexion->conectar();

$sql = "SELECT nombre
FROM plataformas
WHERE LOWER(nombre) = LOWER('$plataforma');";
$resultado1 = $conexion->query($sql); // Para comprobar si hay plataformas con el mismo nombre

$sql2 = "SELECT nombre
FROM plataformas
WHERE id_plataforma_pk = '$id';";
$resultado2 = $conexion->query($sql2);
while ($row = $resultado2->fetch_assoc()) {
  $plataformadb = $row['nombre']; // para verificar si no se han realizado cambios
}

if (empty($plataforma)) {
  echo 'error_1'; // Campos obligatorios
} else {
  if ($plataformadb == $plataforma) {
    echo 'error_2'; // no se han realizado cambios
  } else {
    if ($resultado1->num_rows > 0) {
      echo 'error_3'; // existe una plataforma con el mismo nombre
    } else {
      $sql2 = "UPDATE plataformas SET nombre='$plataforma' WHERE id_plataforma_pk=$id";
      $resultado2 = $conexion->query($sql2);

      if ($resultado2) {
        echo 'success'; // actualización exitosa
      } else {
        echo 'error_4'; // error en la actualización
      }
    }
  }
}

