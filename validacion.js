window.onload(){
  var inputNombre = document.getElementById('nombre');
  var inputApellido = document.getElementById('apellido');
  var inputMail = document.getElementById('mail');
  var inputTelefono = document.getElementById('teledono');
  var inputClave = document.getElementById('clave');
  var inputRClave = document.getElementById('rClave');
  var inputSubmit = document.getElementById('enviar');

  submit.onClick = function(e){
    e.preventDefault();
    var errores = [];
    function validar(){
      //validacion del nombre
      if(trim(inputNombre.value).length == 0 || typeOf(inputNombre) !== string ){
        alert("Por favor completa el nombre");
        errores.push("Nombre incompleto");
      }
      if(trim(inputApellido.value).length == 0 || typeOf(inputApellido) !== string ){
        alert("Por favor completa el Apellido");
        errores.push("Apellido sin completar");
      }
      if(errores.length == 0){
        registrar();
        mostrarUsuarios();
      }
    }

    function registrar(){
      var sumarNuevoUsuario = new XMLHttpRequest();

      sumarNuevoUsuario.onreadystatechange = function(){
        if(sumarNuevoUsuario.readyState == 4 && sumarNuevoUsuario.status == 200){
          console.log(sumarNuevoUsuario.responseText);
        }
      }

      sumarNuevoUsuario.open('GET', 'https://sprint.digitalhouse.com/nuevoUsuario', true);

      sumarNuevoUsuario.send();
    }

    function mostrarUsuarios(){
      var mostrarCantidadUsuarios = new XMLHttpRequest();
      mostrarCantidadUsuarios.onreadystatechange = function(){
        if(mostrarCantidadUsuarios.readyState == 4 && mostrarCantidadUsuarios.status == 200){
          var responseJSON = mostrarCantidadUsuarios.responseText;
          var responseParse = JSON.parse(responseJSON);
          var responseCantidad = responseParse.cantidad;
        }
      }
      mostrarCantidadUsuarios.open('GET', 'https://sprint.digitalhouse.com/getUsuarios', true);
      mostrarCantidadUsuarios.send();
    }
  }
}
