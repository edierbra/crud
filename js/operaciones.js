$('#login').click(function () {

  // Traemos los datos de los inputs
  var user = $('#user').val();
  var clave = $('#clave').val();

  // Envio de datos mediante Ajax
  $.ajax({
    method: 'POST',
    // Recuerda que la ruta se hace como si estuvieramos en el index y no en operaciones por esa razon no utilizamos ../ para ir a controller
    url: 'controller/loginController.php',
    // Recuerda el primer parametro es la variable de php y el segundo es el dato que enviamos
    data: { user_php: user, clave_php: clave },
    // Esta funcion se ejecuta antes de enviar la información al archivo indicado en el parametro url
    beforeSend: function () {
      // Mostramos el div con el id load mientras se espera una respuesta del servidor (el archivo solicitado en el parametro url)
      $('#load').show();
    },
    // el parametro res es la respuesta que da php mediante impresion de pantalla (echo)
    success: function (res) {
      // Lo primero es ocultar el load, ya que recibimos la respuesta del servidor
      $('#load').hide();

      // Ahora validamos la respuesta de php, si es error_1 algun campo esta vacio de lo contrario todo salio bien y redireccionaremos a donde diga php
      if (res == 'error_1') {
        /*
        Para usar sweetalert es muy sencillo, has de cuenta que haces un alert
        solo que esta ves enviaras 3 parametros separados por comas, el primero
        es el titulo de la alerta, el segundo es la descripcion y el tercero es el tipo de alerta
        en el momento conozco tres tipos, entonces puedes variar entre success: Muestra animación de un check,
        warning: muestra icono de advertencia amarillo y error: muestra una animacion con una X muy chula :v
        */
        swal('Error', 'Por favor ingrese todos los campos', 'error');
      } else if (res == 'error_2') {
        // Recuerda que si no necesitas validar si es un email puedes eliminar el if de la linea 34
        swal('Error', 'Por favor ingrese un email valido', 'warning');
      } else if (res == 'error_3') {
        swal('Error', 'El usuario y contraseña que ingresaste es incorrecto', 'error');
      } else {
        // Redireccionamos a la página que diga corresponda el usuario
        window.location.href = res
      }

    }
  });

});


$('#registro').click(function () {

  var form = $('#formulario_registro').serialize();

  $.ajax({
    method: 'POST',
    url: 'controller/registroController.php',
    data: form,
    beforeSend: function () {
      $('#load').show();
    },
    success: function (res) {
      $('#load').hide();

      if (res == 'error_1') {
        swal('Error', 'Campos obligatorios, por favor llena el email y las claves', 'warning');
      } else if (res == 'error_2') {
        swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');
      } else if (res == 'error_3') {
        swal('Error', 'El correo que ingresaste ya se encuentra registrado', 'error');
      } else if (res == 'error_4') {
        swal('Error', 'Por favor ingresa un correo valido', 'warning');
      } else {
        window.location.href = res;
      }


    }
  });

});

$('#crearjuego').click(function () {

  var form = $('#formulario_crearjuego').serialize();
  // Traemos los datos de los inputs
  var titulo = $('#titulo').val();
  var precio = $('#precio').val();
  var tamano = $('#tamano').val();
  var categoria = $('#categoria').val();
  var plataforma = $('#plataforma').val();

  $.ajax({
    method: 'POST',
    url: '../../controller/createGameController.php',
    //data: form,
    data: { titulo: titulo, precio: precio, tamano: tamano, categoria: categoria, plataforma: plataforma },
    beforeSend: function () {
      $('#load').show();
    },
    success: function (res) {
      $('#load').hide();

      if (res == 'error_1') {
        swal('Error', 'Campos obligatorios, por favor llena todos los campos', 'warning');
      } else if (res == 'error_2') {
        swal('Error', 'Ya existe registrado un Videojuego con el mismo nombre, ingrese otro nombre', 'error');
      } else if (res == 'error_3') {
        swal('Error en el Servidor', 'No se agrego el Videojuego, intentelo otra vez ', 'error');
      } else if (res == 'success') {
        swal({
          title: 'Éxito',
          text: 'VideoJuego agregado correctamente',
          type: 'success'
        }, function () {
          window.location.href = 'gestionarjuegos.php';
        });
      } else {
        window.location.href = res;
      }
    }
  });
});

$('#crearcategoria').click(function () {

  var form = $('#formulario_crearcategoria').serialize();
  // Traemos los datos de los inputs
  var categoria = $('#categoria').val();

  $.ajax({
    method: 'POST',
    url: '../../controller/createCategoriaController.php',
    //data: form,
    data: { categoria: categoria },
    beforeSend: function () {
      $('#load').show();
    },
    success: function (res) {
      $('#load').hide();

      if (res == 'error_1') {
        swal('Error', 'Campo obligatorio, por favor ingresa una categoria', 'warning');
      } else if (res == 'error_2') {
        swal('Error', 'Ya existe registrado una Categoria con el mismo nombre, ingrese otro nombre', 'error');
      } else if (res == 'error_3') {
        swal('Error en el Servidor', 'No se agrego la Categoria, intentelo otra vez ', 'error');
      } else if (res == 'success') {
        swal({
          title: 'Éxito',
          text: 'Categoria agregada correctamente',
          type: 'success'
        }, function () {
          window.location.href = 'gestionarCategorias.php';
        });
      } else {
        window.location.href = res;
      }
    }
  });
});

$('#updatecategoria').click(function () {

  var form = $('#formulario_updatecategoria').serialize();
  // Traemos los datos de los inputs
  var categoria = $('#categoria').val();
  var id = $('#id').val();

  $.ajax({
    method: 'POST',
    url: '../../controller/updateCategoriaController.php',
    //data: form,
    data: { categoria: categoria, id: id },
    beforeSend: function () {
      $('#load').show();
    },
    success: function (res) {
      $('#load').hide();

      if (res == 'error_1') {
        swal('Error', 'Campo obligatorio, por favor ingresa una categoria', 'warning');
      } else if (res == 'error_2') {
        swal('Error', 'No has realizado cambios, modifique el nombre de la Categoria', 'warning');
      } else if (res == 'error_3') {
        swal('Error', 'Ya existe registrado una Categoria con el mismo nombre, ingrese otro nombre', 'error');
      } else if (res == 'error_4') {
        swal('Error en el Servidor', 'No se agrego la Categoria, intentelo otra vez ', 'error');
      } else if (res == 'success') {
        swal({
          title: 'Éxito',
          text: 'Categoria edidata correctamente',
          type: 'success'
        }, function () {
          window.location.href = 'gestionarCategorias.php';
        });
      } else {
        window.location.href = res;
      }
    }
  });
});

$('#crearplataforma').click(function () {

  var form = $('#formulario_crearplataforma').serialize();
  // Traemos los datos de los inputs
  var plataforma = $('#plataforma').val();

  $.ajax({
    method: 'POST',
    url: '../../controller/createPlataformaController.php',
    //data: form,
    data: { plataforma: plataforma },
    beforeSend: function () {
      $('#load').show();
    },
    success: function (res) {
      $('#load').hide();

      if (res == 'error_1') {
        swal('Error', 'Campo obligatorio, por favor ingresa una plataforma', 'warning');
      } else if (res == 'error_2') {
        swal('Error', 'Ya existe registrado una Plataforma con el mismo nombre, ingrese otro nombre', 'error');
      } else if (res == 'error_3') {
        swal('Error en el Servidor', 'No se agrego la Plataforma, intentelo otra vez ', 'error');
      } else if (res == 'success') {
        swal({
          title: 'Éxito',
          text: 'Plataforma agregada correctamente',
          type: 'success'
        }, function () {
          window.location.href = 'gestionarPlataformas.php';
        });
      } else {
        window.location.href = res;
      }
    }
  });
});


$('#updateplataforma').click(function () {

  var form = $('#formulario_updateplataforma').serialize();
  // Traemos los datos de los inputs
  var plataforma = $('#plataforma').val();
  var id = $('#id').val();

  $.ajax({
    method: 'POST',
    url: '../../controller/updatePlataformaController.php',
    //data: form,
    data: { plataforma: plataforma, id: id },
    beforeSend: function () {
      $('#load').show();
    },
    success: function (res) {
      $('#load').hide();

      if (res == 'error_1') {
        swal('Error', 'Campo obligatorio, por favor ingresa una plataforma', 'warning');
      } else if (res == 'error_2') {
        swal('Error', 'No has realizado cambios, modifique el nombre de la Plataforma', 'warning');
      } else if (res == 'error_3') {
        swal('Error', 'Ya existe registrado una Plataforma con el mismo nombre, ingrese otro nombre', 'error');
      } else if (res == 'error_4') {
        swal('Error en el Servidor', 'No se agrego la Plataforma, intentelo otra vez ', 'error');
      } else if (res == 'success') {
        swal({
          title: 'Éxito',
          text: 'Plataforma edidata correctamente',
          type: 'success'
        }, function () {
          window.location.href = 'gestionarPlataformas.php';
        });
      } else {
        window.location.href = res;
      }
    }
  });
});


$('#editarjuego').click(function () {
  
  var idVideojuego = $(this).data('id');
  var form = $('#formulario_editarjuego').serialize();
  // Traemos los datos de los inputs
  var titulo = $('#titulo').val();
  var precio = $('#precio').val();
  var tamano = $('#tamano').val();
  var categoria = $('#categoria').val();
  var plataforma = $('#plataforma').val();

  $.ajax({
    method: 'POST',
    url: '../../controller/editGameController.php?id='+ idVideojuego,
    //data: form,
    data: { idVideojuego: idVideojuego, titulo: titulo, precio: precio, tamano: tamano, categoria: categoria, plataforma: plataforma },
    beforeSend: function () {
      $('#load').show();
    },
    success: function (res) {
      $('#load').hide();

      if (res == 'error_1') {
        swal('Error', 'Campos obligatorios, por favor llena todos los campos', 'warning');      
      } else if (res == 'error_3') {
        swal('Error en el Servidor', 'No se editó el Videojuego, intentelo otra vez ', 'error');
      } else if (res == 'success') {
        swal({
          title: 'Éxito',
          text: 'VideoJuego editado correctamente',
          type: 'success'
        }, function () {
          window.location.href = 'gestionarjuegos.php';
        });
      } else {
        window.location.href = res;
      }
    }
  });

  console.log('Datos enviados por AJAX:', {idVideojuego: idVideojuego, titulo: titulo, precio: precio, tamano: tamano, categoria: categoria, plataforma: plataforma });

});

$('#addGame').click(function () {
  var idVideojuego = $(this).data('idv');
  var idUsuario = $(this).data('idu');

  $.ajax({
      method: 'POST',
      url: '../../controller/addGameController.php?idV=' + idVideojuego + '&idU=' + idUsuario,
      beforeSend: function () {
        $('#load').show();
      },
      success: function (res) {
        $('#load').hide();

        if (res == 'error_1') {
          swal('Error', 'Solo se puede agregar una vez el videojuego', 'warning');
        } else if (res == 'error_2') {
          swal('Error en el Servidor', 'No se agregó el Videojuego, intentelo otra vez ', 'error');
        } else if (res == 'success') {
          swal({
            title: 'Éxito',
            text: 'VideoJuego agregado correctamente',
            type: 'success'
          }, function () {
            window.location.href = 'gestionarjuegos.php';
          });
        } else {
          window.location.href = res;
        }
      }
    });

    console.log('ID del Videojuego enviado por AJAX:', idVideojuego);
    console.log('ID del Usuario enviado por AJAX:', idUsuario);
});


$('#deleteGame').click(function () {
  var idVideojuego = $(this).data('idv');
  var idUsuario = $(this).data('idu');
  
  $.ajax({
      method: 'POST',
      url: '../../controller/deleteGameController.php?idV=' + idVideojuego + '&idU=' + idUsuario,
      beforeSend: function () {
        $('#load').show();
      },
      success: function (res) {
        $('#load').hide();

        if (res == 'error_1') {
          swal('Error', 'No existe el videojuego', 'warning');
        } else if (res == 'error_2') {
          swal('Error en el Servidor', 'No se eliminó el Videojuego, intentelo otra vez ', 'error');
        } else if (res == 'success') {
          swal({
            title: 'Éxito',
            text: 'VideoJuego eliminado correctamente',
            type: 'success'
          }, function () {
            window.location.href = 'index.php';
          });
        } else {
          window.location.href = res;
        }
      }
    });

    console.log('ID del Videojuego enviado por AJAX:', idVideojuego);
    console.log('ID del Usuario enviado por AJAX:', idUsuario);
});

$('#deleteCategoria').click(function () {
  var idCategoria = $(this).data('id');
  
  
  $.ajax({
      method: 'POST',
      url: '../../controller/deleteCategoriaController.php?id=' + idCategoria,
      beforeSend: function () {
        $('#load').show();
      },
      success: function (res) {
        $('#load').hide();

        if (res == 'error_1') {
          swal('Error', 'No existe la categoría', 'warning');
        } else if (res == 'error_2') {
          swal('Error en el Servidor', 'No se eliminó la categoria, intentelo otra vez ', 'error');
        } else if (res == 'success') {
          swal({
            title: 'Éxito',
            text: 'Categoria eliminada correctamente',
            type: 'success'
          }, function () {
            window.location.href = 'index.php';
          });
        } else {
          window.location.href = res;
        }
      }
    });

    console.log('ID de la categoria enviado por AJAX:', idCategoria);
    
});

$('#deletePlataforma').click(function () {
  var idPlataforma = $(this).data('id');
  
  
  $.ajax({
      method: 'POST',
      url: '../../controller/deletePlataformaController.php?id=' + idPlataforma,
      beforeSend: function () {
        $('#load').show();
      },
      success: function (res) {
        $('#load').hide();

        if (res == 'error_1') {
          swal('Error', 'No existe la plataforma', 'warning');
        } else if (res == 'error_2') {
          swal('Error en el Servidor', 'No se eliminó la plataforma, intentelo otra vez ', 'error');
        } else if (res == 'success') {
          swal({
            title: 'Éxito',
            text: 'Plataforma eliminada correctamente',
            type: 'success'
          }, function () {
            window.location.href = 'index.php';
          });
        } else {
          window.location.href = res;
        }
      }
    });

    console.log('ID de la plataforma enviado por AJAX:', idPlataforma);
    
});

$('#cancelAddGame').click(function () {
  window.location.href = 'gestionarjuegos.php';  
});

$('#cancelDeleteGame').click(function () {
  window.location.href = 'index.php';  
});

$('#cancelDeleteCategoria').click(function () {
  window.location.href = 'gestionarCategorias.php';  
});

$('#cancelDeletePlataforma').click(function () {
  window.location.href = 'gestionarPlataformas.php';  
});
