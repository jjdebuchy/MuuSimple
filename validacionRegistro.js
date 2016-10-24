window.onload = function(){
  var inputNombre = document.querySelector('#nombre');
  var inputApellido = document.querySelector('#apellido');
  var inputMail = document.querySelector('#email');
  var inputTelefono = document.querySelector('#telefono');
  var inputClave = document.querySelector('#password');
  var inputSubmit = document.querySelector('.btn');
  var expmail=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
  var errores=[];
  if (navigator.geolocation) {
 navigator.geolocation.getCurrentPosition(function(position) {
   var pos = {
     lat: position.coords.latitude,
     lng: position.coords.longitude
   };

  inputSubmit.addEventListener("click", function(event){
      if(!validar()){
        event.preventDefault();
      }
      else {
        return true;
      }
    }, true);

  inputNombre.addEventListener("blur", function(){
    if(inputNombre.value.trim().length == 0 || !isNaN(inputNombre.value.trim()) ){
      inputNombre.style.border="1px solid #ff0000";
      errores.push("Nombre incompleto");
    }
    else{
      inputNombre.style.border="1px solid #45bb17";
    }
  });

  function validarNombre(){
      if(inputNombre.value.trim().length == 0 || !isNaN(inputNombre.value.trim()) ){
        inputNombre.style.border="1px solid #ff0000";
        errores.push("Nombre incompleto");
      }
      else{
        inputNombre.style.border="1px solid #45bb17";
      }
    }

  inputApellido.addEventListener("blur", function(){
    if(inputApellido.value.trim().length == 0 || !isNaN(inputNombre.value.trim()) ){
      inputApellido.style.border="1px solid #ff0000";
      errores.push("Apellido sin completar");
    }
    else{
      inputApellido.style.border="1px solid #45bb17";
    }
  }, true);
  function validarApellido(){
      if(inputApellido.value.trim().length == 0 || !isNaN(inputNombre.value.trim()) ){
        inputApellido.style.border="1px solid #ff0000";
        errores.push("Apellido sin completar");
      }
      else{
        inputApellido.style.border="1px solid #45bb17";
      }
    }

  inputMail.addEventListener("blur", function(){
    if(inputMail.value.trim().length == 0 || typeof(inputMail.value.trim()) !== "string" ){
      inputMail.style.border="1px solid #ff0000";
      errores.push("Mail sin completar");
    }

    else if (!inputMail.value.match(expmail)) {
      inputMail.style.border="1px solid #ff0000";
      errores.push("Mail no valido");
    }
    else{
      inputMail.style.border="1px solid #45bb17";
    }
  }, true);

  function validarMail(){
      if(inputMail.value.trim().length == 0 || typeof(inputMail.value.trim()) !== "string" ){
        inputMail.style.border="1px solid #ff0000";
        errores.push("Mail sin completar");
      }

      else if (!inputMail.value.match(expmail)) {
        inputMail.style.border="1px solid #ff0000";
        errores.push("Mail no valido");
      }
      else{
        inputMail.style.border="1px solid #45bb17";
      }
    }

  inputTelefono.addEventListener("blur", function(){
    if(inputTelefono.value.trim().length == 0 || isNaN(inputTelefono.value.trim()) ){
      inputTelefono.style.border="1px solid #ff0000";
      errores.push("Telefono sin completar");
    }
    else{
      inputTelefono.style.border="1px solid #45bb17";
    }
  }, true);

  function validarTelefono(){
      if(inputTelefono.value.trim().length == 0 || isNaN(inputTelefono.value.trim()) ){
        inputTelefono.style.border="1px solid #ff0000";
        errores.push("Telefono sin completar");
      }
      else{
        inputTelefono.style.border="1px solid #45bb17";
      }
    }

  inputClave.addEventListener("blur", function(){
    if(inputClave.value.trim().length < 7 ){
      inputClave.style.border="1px solid #ff0000";
      errores.push("Clave sin completar");
    }
    else{
      inputClave.style.border="1px solid #45bb17";
    }
  }, true);

  function validarClave(){
      if(inputClave.value.trim().length < 7 ){
        inputClave.style.border="1px solid #ff0000";
        errores.push("Clave sin completar");

      }
      else{
        inputClave.style.border="1px solid #45bb17";
      }
    }

  function validar(){
    validarNombre();
    validarApellido();
    validarMail();
    validarTelefono();
    validarClave();
    if(errores.length == 0){
      return false;
    }
    else{
      return true;
    }
  }
}
