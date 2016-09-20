<?php
  require_once("funciones-registracion.php");
  if (estaLogueado()) {
      header("Location:inicio.php");exit;
  }
  $errores = [];

  $nombreDefault = ' ';
  $apellidoDefault = ' ';
  $mailDefault = ' ';
  $telefonoDefault = ' ';
  $claveDefault = ' ';
  $rClaveDefault = ' ';

  if ($_POST) {
    $errores = validarRegistracion();
    if (empty($errores)) {
      registrarUsuario();
      header("Location:exito.php");exit;
    }
    if (!isset($errores["nombre"])){
        $nombreDefault = $_POST["nombre"];
    }
    if (!isset($errores["apellido"])) {
        $apellidoDefault = $_POST["apellido"];
    }
    if (!isset($errores["mail"])){
        $mailDefault = $_POST["mail"];
    }
    if (!isset($errores["telefono"])){
        $telefonoDefault = $_POST["telefono"];
    }
    if (!isset($errores["clave"])){
        $claveDefault = $_POST["clave"];
    }
    if (!isset($errores["r-clave"])){
        $rClaveDefault = $_POST["r-clave"];
    }
  }

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrate</title>
    <link rel="stylesheet" href="css/style.css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
  </head>
  <body>
    <!--Barra de navegacion -->
    <header class="headerIndex">

      <nav>
        <div class="barra-navegacion">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="registro.html">Registrate</a></li>
            <li><a href="login.html">Ingresar</a></li>
            <li><a href="#">Vender</a></li>
            <li><a href="FAQ.html"><i class="fa fa-question-circle" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </nav>

    </header>

    <!--Formulario -->
    <div class="formulario">
      <form method="post" >
        <h2>Registrate</h2>
        <?php if (!empty($errores)) { ?>
        <div class="errores" style="color:red">
            <ul>
            <?php foreach($errores as $error) { ?>

                <li><?= $error ?></li>
            <?php } ?>
            </ul>
        </div>
        <?php } ?>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value='<?= $nombreDefault ?>'><br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" value='<?= $apellidoDefault ?>'><br>
        <label for="mail">E-mail:</label>
        <input type="e-mail" name="mail" id="mail" value='<?= $mailDefault ?>'><br>
        <label for="telefono">Telefono:</label>
        <input type="tel" name="telefono" id="telefono" value='<?= $telefonoDefault ?>'><br>
        <label for="clave">Crear clave:</label>
        <input type="password" name="clave" value='<?= $claveDefault ?>'><br>
        <input type="checkbox" name="recordar" value="recordar" checked="checked"> <p class="recordarme">
          Recordarme
        </p>
        <br>
        <input type="submit" value="Registrarme" class="btn">
      </form>
      <div class="login">
        <p>Ya tenes cuenta?</p>
        <a href="login.html">Iniciá sesión</a>
      </div>
    </div>

    <!--Footer-->
    <footer>

      <!--Redes Sociales-->

      <div class="redes-sociales">
        <ul>
          <li><a href="https://www.facebook.com/"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
          <li> <a href="https://twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li> <a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a> </li>
          <li><i class="fa fa-envelope" aria-hidden="true"></i></li>
        </ul>
      </div>

      <!--Menu-->

      <ul class="menu">
        <li><a href="#">Terminos de uso</a></li>
        <li><a href="#">Privacidad</a></li>
        <li><a href="#">Contacto</a></li>
        <li><a href="FAQ.html">Preguntas Frecuentes</a></li>
      </ul>
    </footer>

  </body>
</html>
