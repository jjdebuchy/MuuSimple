<?php
	require("funciones.php");
	if (estaLogueado()) {
		header("Location:inicio-muusimple.php");exit;
	}
	$errores = [];
	if ($_POST) {
		$errores = validarLogin();
		if (empty($errores)){
			$usuario = traerUsuarioPorEmail($_POST["mail"]);
			loguear($usuario);
			if (isset($_POST("recordame"))){
				guardarCookie($usuario);
			}
			header("Location:inicio-muusimple.php");exit;
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In</title>
    <link rel="stylesheet" href="css\style.css" media="screen" charset="utf-8">
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

    <!-- Formulario-->

    <div class="formulario">
        <h2>Inicia sesión</h2>
        <form>
          <label for="mail">E-mail:</label>
          <input type="e-mail" name="name" id="mail" placeholder="juanperez@gmail.com">
          <br>
          <label for="clave">Clave:</label>
          <input type="password" name="clave" value="clave" placeholder="contraseña" checked="checked">
          <br>
          <input type="submit" value="Ingresar" class="btn">
        </form>
        <a href="#">Olvidaste tu contraseña?</a>
        <div class="register">
          <p>No tenes cuenta?</p>
          <a href="registro.html">Registrate</a>
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
