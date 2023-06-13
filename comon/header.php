<!DOCTYPE html>
<html>

<head>
  <title>Barra de navegación</title>

</head>

<body class="text-center">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Encabezado de la barra de navegación -->
      <div class="navbar-header">
        <a class="navbar-brand" href="./index.php">Video Games</a>
      </div>

      <!-- Opciones de navegación -->
      <ul class="nav navbar-nav pg">
        <li><a href="./index.php">Página principal</a></li>
        <li><a href="./agregarjuegos.php">Agregar Juegos</a></li>
      </ul>

      <!-- Cerrar sesión -->
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="../../controller/cerrarSesion.php">
            <button type="button" class="btn btn-default">Cerrar sesión</button>
          </a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <ul class="nav">
            <li><h7>Nombre: <?php echo ucfirst($_SESSION['nombre']); ?></h7></li>
            <li><h5>Usuario: <?php echo ucfirst($_SESSION['email']); ?></h5></li>
            <li><h5>Edad: <?php echo ucfirst($_SESSION['edad']); ?></h5></li>
          </ul>
      </ul>
    </div>
  </nav>
</body>

</html>