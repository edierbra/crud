<?php
// Se prendio esta mrd :v
session_start();
// Validamos que exista una sesión y además que el cargo que exista sea igual a 1 (Administrador)
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1) {
  header('location: ../../index.php');
  exit;
}
?>

<?php include('../../comon/header.php') ?>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <style>
  .highlight {
    background-color: yellow;
  }

  .form-inline .form-control.input-lg {
    width: 380px;
    height: 60px;
  }
</style>
</head>

<body>
  <div class="container">
    <div class="flex flex-lg-row">
      <form id="searchForm" class="form-inline" style="display: inline-flex;">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" id="search" name="search" class="form-control input-lg" placeholder="Ingrese el nombre del videojuego a buscar">
          </div>
        </div>
      </form>

      <a href="creategame.php" class="btn btn-primary" style="display: inline-flex; align-items: center;">
        Añadir Videojuego
        <img src="../../img/agregar.png" alt="Agreg" width="50px" style="margin-left: 10px;">
      </a>

    </div>

    <body class="text-center">
      <div id="searchResults"></div>
    </body>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Capturar el evento de cambio en el campo de búsqueda
      $('#search').on('input', function() {
        // Obtener el valor del campo de búsqueda
        var searchTerm = $(this).val();

        // Enviar una solicitud AJAX al archivo PHP para obtener los resultados
        $.ajax({
          url: 'search.php',
          method: 'GET',
          data: {
            search: searchTerm
          },
          success: function(response) {
            // Mostrar los resultados en el contenedor de resultados
            $('#searchResults').html(response);
          }
        });
      });

      // Ejecutar la búsqueda al cargar la página
      $('#search').trigger('input');
    });
  </script>
</body>
