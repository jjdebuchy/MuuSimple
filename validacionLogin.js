window.onload = function(){

  var inputMail = document.querySelector('#email');
  var inputClave = document.querySelector('#clave');
  var inputSubmit = document.querySelector('#btn');
  var expmail=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
  var errores=[];


  inputSubmit.addEventListener("click", function(event){
      if(validar()){
        event.preventDefault();
      }
      else {
        return true;
      }
    }, true);

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
    validarMail();
    validarClave();
    if(errores.length == 0){
      return false;
    }
    else{
      return true;
    }
  }
}
