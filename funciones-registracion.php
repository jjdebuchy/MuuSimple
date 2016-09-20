<?php
  function validarRegistracion(){

    $errores = [];
    /*Validacion del nombre*/
    if (empty(trim($_POST["nombre"])) ||
      is_numeric($_POST["nombre"])) {
          $errores["nombre"] = "Por favor completa el nombre";
    }

    /*Validacion del apellido*/
    if (empty(trim($_POST["apellido"])) ||
      is_numeric($_POST["apellido"])){
          $errores["apellido"] = "Por favor completa el apellido";
    }

    /*Validacion del mail*/
    if (empty(trim($_POST["mail"]))) {
        $errores["mail"] = "Completa el mail";
    }
    elseif (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        $errores["mail"] = "Ingresa un mail valido";
    }

    /*Validacion del telefono*/
    if (empty(trim($_POST["telefono"])) ||
      !is_numeric($_POST["telefono"])){
          $errores["telefono"] = "Por favor completa el telefono";
    }
    elseif (strlen($_POST["telefono"]) < 6) {
      $errores["telefono"] = "Por favor ingresa un numero de telefono valido";
    }

    /*Validacion de la contraseña*/
    if (empty(trim($_POST["clave"]))) {
        $errores["clave"] = "Completa la clave";
    }
    elseif (!empty(trim($_POST["clave"])) && !empty(trim($_POST["r-clave"])) && ($_POST["clave"]) !== ($_POST["r-clave"])){
        $errores["clave"] = "Las claves no coinciden";
    }
    return $errores;
  }
  function registrarUsuario(){
      $arrayUsuario = [
          "nombre" => $_POST["nombre"],
          "apellido" => $_POST["apellido"],
          "mail" => $_POST["mail"],
          "telefono" => $_POST["telefono"],
          "clave" => password_hash($_POST["clave"], PASSWORD_DEFAULT)
      ];

      $jsonUsuario = json_encode($arrayUsuario);

      file_put_contents("usuarios.json", $jsonUsuario . "\n", FILE_APPEND);
  }


  function existeElMail($mail) {
      $usuario = traerUsuarioPorEmail($mail);

      if ($usuario) {
          return true;
      }

      return false;
  }

  function traerUsuarioPorEmail($mail) {
      //1: Me traigo todos los usuarios y ya opero con arrays
      $usuarios = traerTodosLosUsuarios();

      //2: Los recorro y si alguno es el que busco, devuelvo
      foreach($usuarios as $usuario)
      {
          if ($usuario["mail"] == $mail)
          {
              return $usuario;
          }
      }

      return false;
  }

  function traerTodosLosUsuarios() {

      $usuarios = [];

      //1: Me traigo todo el archivo
      $archivoUsuarios = file_get_contents("usuarios.json");

      //2: Lo divido por lineas
      $usuariosJSON = explode("\n", $archivoUsuarios);

      //3: Borro la linea vacía del final
      $cantidadUsuarios = count($usuariosJSON);
      $elUltimo = $cantidadUsuarios - 1;

      unset($usuariosJSON[$elUltimo]);

      //4: Recorro mis lineas y las paso a arrays
      foreach ($usuariosJSON as $usuarioJSON) {
          $usuarios[] = json_decode($usuarioJSON, true);
      }

      return $usuarios;
  }

  function validarLogin() {
      $errores = [];

      if (empty(trim($_POST["mail"])))
      {
          $errores["mail"] = "Por favor ingrese el mail";
      }
      if (empty(trim($_POST["clave"])))
      {
          $errores["clave"] = "Por favor ingrese la contraseña";
      }
      if (!existeElMail($_POST["mail"]))
      {
          $errores["mail"] = "El usuario no existe";
      }
      else {
          $usuario = traerUsuarioPorEmail($_POST["mail"]);

          if (!password_verify($_POST["clave"], $usuario["clave"])) {
              $errores["clave"] ="La contraseña es incorrecta";
          }
      }

      return $errores;
  }

  function loguear($usuario) {
      $_SESSION["usuarioLogueado"] = $usuario["mail"];
  }

  function traerUsuarioLogueado() {
      if (!estaLogueado()) {
          return null;
      }
      $mailLogueado = $_SESSION["usuarioLogueado"];
      return traerUsuarioPorEmail($mailLogueado);
  }

  function estaLogueado() {
      return isset($_SESSION["usuarioLogueado"]);
  }

  function guardarCookie($usuario) {
      setcookie("usuarioLogueado", $usuario["email"], time() + 3600 * 24);
  }

  function autologuear() {
      session_start();
      if (!estaLogueado()) {
          if (isset($_COOKIE["usuarioLogueado"])) {
              $usuario = traerUsuarioPorEmail($_COOKIE["usuarioLogueado"]);

              loguear($usuario);
          }
      }
  }

 ?>
