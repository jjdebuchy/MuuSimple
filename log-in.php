<?php
	require_once("soporte.php");
	require_once("clases/validadorLogin.php");

	if ($auth->estaLogueado()) {
		header("Location:inicio.php");exit;
	}
	$errores = [];
	$mailDefault = ' ';
  $claveDefault = ' ';

	if ($_POST) {

		$validador = new ValidadorLogin();

		$errores = $validador->validar($_POST, $repo);

		if (empty($errores))
		{
			$usuario = $repo->getRepositorioUsuarios()->traerUsuarioPorMail($_POST["mail"]);
			$auth->loguear($usuario);
			if ($validador->estaEnFormulario("recordame"))
			{
				$auth->guardarCookie($usuario);
			}
			header("Location:inicio.php");exit;
		}
		if (!isset($errores["mail"])){
        $mailDefault = $_POST["mail"];
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
    <title>Log In</title>
    <link rel="stylesheet" href="css\style.css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
    <script type="text/javascript" src="validacionLogin.js"></script>
  </head>
  <body>

    <!--Barra de navegacion -->
    <?php require_once 'header.php'; ?>

    <!-- Formulario-->

    <div class="formulario" method="post">
        <h2>Inicia sesión</h2>
				<form>
					<div class="a">
						<label for="mail">E-mail:</label>
	          <input type="e-mail" name="name" id="mail">
					</div>
					<div class="a">
						<label for="clave">Clave:</label>
	          <input type="password"  id="clave"  name="clave" checked="checked">
					</div>
					<button type="submit" id="btn" name="Ingresar">Ingresar</button>
        </form>
        <a href="#">Olvidaste tu contraseña?</a>
        <div class="register">
          <p>No tenes cuenta?</p>
          <a href="registro.php">Registrate</a>
        </div>
    </div>

    <!--Footer-->

    <footer>
    <?php require_once 'footer.php'; ?>
  </body>
</html>
