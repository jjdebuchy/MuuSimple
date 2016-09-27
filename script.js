window.onload = function(){
  var inputNombre = document.querySelector('#name');
  var inputApellido = document.querySelector('#apellido');
  var inputMail = document.querySelector('#mail');
  var inputRMail = document.querySelector('#rmail');
  var inputTelefono = document.querySelector('#telefono');
  var inputClave = document.querySelector('#clave');
  var inputRClave = document.querySelector('#rclave');
  var inputSubmit = document.querySelector('.btn');
  var errores=[];


  document.getElementById("btn").addEventListener("click", function(event){
      event.preventDefault()

      console.log(inputNombre.value.trim())

      console.log(typeof(inputNombre.value.trim()))

      function validar(){

        //validacion del nombre

        if(inputNombre.value.trim().length == 0 || !isNaN(inputNombre.value.trim()) ){
          alert("Por favor completa el nombre");
          errores.push("Nombre incompleto");
        }

        if(inputApellido.value.trim().length == 0 || !isNaN(inputNombre.value.trim()) ){
          alert("Por favor completa el Apellido");
          errores.push("Apellido sin completar");
        }

        if(inputMail.value.trim().length == 0 || typeof(inputMail.value.trim()) !== "string" ){
          alert("Por favor completa el Mail");
          errores.push("Mail sin completar");

        }

        var expmail=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;

        if (!inputMail.value.match(expmail)) {
          alert("Mail NO valido");
          errores.push("Mail no valido");
        }

        if (inputMail.value.trim() !== inputRMail.value.trim()) {

          alert("Los emails no son coincidentes");
          errores.push("Mail no coincidentes");

        }



        if(inputTelefono.value.trim().length == 0 || isNaN(inputTelefono.value.trim()) ){
          alert("Por favor completa el Telefono");
          errores.push("Telefono sin completar");

        }



        if(inputClave.value.trim().length < 7 ){
          alert("Por favor completa la clave");
          errores.push("Clave sin completar");
        }

        if(inputClave.value.trim() !== inputRClave.value.trim()){
          alert("Claves NO coincidentes");
          errores.push("Claves no coincidentes");
        }

        console.log(errores);
        console.log(errores.length);

        if (errores.length == 0) {
            alert("GRACIAS POR REGISTRARTE");
        }

        // if(errores.length == 0){
        //   registrar();
        //   alert("Gracias por registrarte, sos el usuario " + mostrarUsuarios());
        // }
    }
      /*function registrar(){
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
      }*/
      validar();


  });


}
