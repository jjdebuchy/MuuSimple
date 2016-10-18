window.onload = function(){

  var inputMail = document.querySelector('#mail');
  var inputClave = document.querySelector('#clave');
  var inputSubmit = document.querySelector('#btn');
  var expmail=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
  var errores=[];

  console.log(inputSubmit);


  inputSubmit.addEventListener("click", function(event){
      event.preventDefault();


      function validar(){

        //validacion del nombre


        if(inputMail.value.trim().length == 0 || typeof(inputMail.value.trim()) !== "string" ){
          alert("Por favor completa el Mail");
          errores.push("Mail sin completar");
        }



        else if (!inputMail.value.match(expmail)) {
          alert("Mail NO valido");
          errores.push("Mail no valido");
        }





        if(inputClave.value.trim().length < 7 ){
          alert("Por favor completa la clave");
          errores.push("Clave sin completar");
        }

        console.log(errores);
        console.log(errores.length);


         if(errores.length == 0){



        alert("INICIASTE SESION ");

        }
    }


      validar();


  });


}
