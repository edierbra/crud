<?php
session_start();

if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1) {
    header('location: ../../index.php');
    exit;
}

$id_categoria  = $_GET['id_categoria_pk'];

require '../../model/conexion.php';

$conexion = new Conexion();
$conexion->conectar();

$sql = "SELECT titulo FROM videojuegos WHERE id_categoria_fk='$id_categoria';";
$videojuegos = $conexion->query($sql);

if ($videojuegos->num_rows > 0) {
    echo '<script> 
    swal("Error", "No se puede eliminar esta Categoria, está vinculada a un Videojuego", "error").then(function() {
        window.history.back();
    });
    </script>';
} else {
    $sql2 = "DELETE FROM categorias WHERE id_categoria_pk=$id_categoria;";
    $resultado2 = $conexion->query($sql2);
    if ($resultado2) {
        echo '<script> 
        swal({
            title: "Éxito",
            text: "Categoria eliminada correctamente",
            type: "success"
        }).then(function() {
            window.history.back();
        });
        </script>';
    } else {
        echo '<script> 
        swal("Error en el Servidor", "No se eliminó la Categoria, inténtelo otra vez.", "error").then(function() {
            window.history.back();
        });
        </script>';
    }
}
?>
