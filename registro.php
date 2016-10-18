<?php
require_once("soporte.php");
require_once("clases/validadorUsuario.php");

  $repoUsuarios = $repo->getRepositorioUsuarios();

  if ($auth->estaLogueado()) {
      header("Location:inicio.php");exit;
  }
  $errores = [];

  $nombreDefault = ' ';
  $apellidoDefault = ' ';
  $mailDefault = ' ';
  $telefonoDefault = ' ';
  $claveDefault = ' ';

  if (!empty($_POST))
  {
      $validador = new ValidadorUsuario();
      //Se envió información
      $errores = $validador->validar($_POST, $repo);

    if (empty($errores))
        {
            //No hay Errores

            //Primero: Lo registro
            $usuario = new Usuario(
                null,
                $_POST["nombre"],
                $_POST["apellido"],
                $_POST["mail"],
                $_POST["telefono"],
                $_POST["password"]

            );
            $usuario->setPassword($_POST["password"]);
            $usuario->guardar($repoUsuarios);

            //Segundo: Lo envio al exito
            header("Location:inicio.php");exit;


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
    <script type="text/javascript" src="validacionRegistro.js"></script>

  </head>
  <body>
    <!--Barra de navegacion -->
    <?php require_once "header.php" ?>

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
        <div class="a">
          <label for="nombre">Nombre:</label>
          <input type="text" name="nombre" id="nombre" value='<?= $nombreDefault ?>'>
        </div>
        <div class="a">
          <label for="apellido">Apellido:</label>
          <input type="text" name="apellido" id="apellido" value='<?= $apellidoDefault ?>'>
        </div>
        <div class="b">
          <label for="mail">E-mail:</label>
          <input type="e-mail" name="mail" id="mail" value='<?= $mailDefault ?>'>
        </div>
        <div class="a">
          <label for="telefono">Telefono:</label>
          <input type="tel" name="telefono" id="telefono" value='<?= $telefonoDefault ?>'>
        </div>
        <div class="a">
          <label for="clave">Crear clave:</label>
          <input type="password" name="clave" value='<?= $claveDefault ?>' id="clave">
        </div> <br>
        <div class="recordarme">
          <input type="checkbox" name="recordar" value="recordar" checked="checked" id="recordarme">
          <label for="recordarme">Recordarme</label>
        </div><br>
        <button class="btn" type="submit" name="registrar">Comenzar</button>
      </form>
      <div class="login">
        <p>Ya tenes cuenta?</p>
        <a href="log-in.php">Iniciá sesión</a>
      </div>
    </div>

    <!--Footer-->
    <?php require_once "footer.php" ?>

  </body>
</html>
