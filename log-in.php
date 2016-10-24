<?php
	require_once("soporte.php");
	require_once("clases/validadorLogin.php");

	if ($auth->estaLogueado()) {
		header("Location:index.php");exit;
	}
	$errores = [];
	if ($_POST) {

		$validador = new ValidadorLogin();

		$errores = $validador->validar($_POST, $repo);

		if (empty($errores))
		{
			$usuario = $repo->getRepositorioUsuarios()->traerUsuarioPorEmail($_POST["email"]);
			$auth->loguear($usuario);
			if ($validador->estaEnFormulario("recordame"))
			{
				$auth->guardarCookie($usuario);
			}
			header("Location:index.php");exit;
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

    <div class="formulario">
        <h2>Inicia sesión</h2>
				<form method="POST">

					<?php include ("errores.php"); ?>
					<div class="a">
						<label for="email">E-mail:</label>
	          <input type="email" name="email" id="email">
					</div>
					<div class="a">
						<label for="password">Clave:</label>
	          <input type="password"  id="clave"  name="password" checked="checked">
					</div>
					<div class="">
						Recordame
						<input type="checkbox" name="recordame" value="true">
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
