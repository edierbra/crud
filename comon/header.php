<!DOCTYPE html>
<html>

<head>
  <title>Video Game</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body class="text-center">
  <nav class="navbar navbar-default bg-dark">
    <div class="container-fluid">
      <!-- Encabezado de la barra de navegación -->
      <div class="navbar-header">
        <a class="navbar-brand" href="./index.php" >Video Game</a>
      </div>

      <!-- Opciones de navegación -->
      <ul class="nav navbar-nav pg">
      <li><a href="./index.php">Mis Juegos</a></li>
        <li><a href="./gestionarjuegos.php">Gestionar Juegos</a></li>
      </ul>

      <!-- Cerrar sesión -->
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="../../controller/cerrarSesion.php">
            <button type="button" class="btn btn-primary">Cerrar sesión</button>
          </a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <ul class="nav">
            <li><h7>Nombre: <?php echo ucfirst($_SESSION['nombre']); ?></h7></li>
            <li><h5>Usuario: <?php echo ucfirst($_SESSION['email']); ?></h5></li>
            <li><h5>Edad: <?php echo ucfirst($_SESSION['edad']); ?>, ID: <?php echo ucfirst($_SESSION['id']); ?></h5></li>
          </ul>
      </ul>
    </div>
  </nav>
</body>

</html>