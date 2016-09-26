window.onload = function(){
  var inputNombre = document.getElementById('nombre');
  var inputApellido = document.getElementById('apellido');
  var inputMail = document.getElementById('mail');
  var inputTelefono = document.getElementById('teledono');
  var inputClave = document.getElementById('clave');
  var inputRClave = document.getElementById('rClave');
  var inputSubmit = document.getElementById('enviar');

  inputSubmit.onClick = function(e){
    e.preventDefault();

    function validar(){

      //validacion del nombre

      if(trim(inputNombre.value).length == 0 || typeOf(inputNombre) !== string ){

        alert("Por favor completa el nombre";

        errores.push("Nombre incompleto");

      }

      if(trim(inputApellido.value).length == 0 || typeOf(inputApellido) !== string ){

        alert("Por favor completa el Apellido");

        errores.push("Apellido sin completar");

      }

      if(trim(inputMail.value).length == 0 || typeOf(inputMail) !== string ){

        alert("Por favor completa el Mail");

        errores.push("Mail sin completar");

      }

      var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

      if (!re.test(trim(inputMail.value))) {
        errores.push("Mail no valido");
      }

      if(trim(inputTelefono.value).length == 0 || typeOf(inputTelefono) !== string ){

        alert("Por favor completa el Telefono");
        errores.push("Telefono sin completar");

      }

      var telefono = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
        if(!inputTelefono.value.match(telefono))
           {
             errores.push("Telefono no valido");
           }

      if(trim(inputClave.value).length < 7 ){

        alert("Por favor completa la clave");

        errores.push("Clave sin completar");

      }

      if(trim(inputClave.value)!== trim(inputRClave.value)){

        alert("Claves NO coincidentes");

        errores.push("Claves no coincidentes");

      }

      if(errores.length == 0){

        registrar();
        alert("Gracias por registrarte, sos el usuario " + mostrarUsuarios());

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
