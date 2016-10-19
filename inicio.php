<?php
require("soporte.php");

$repoUsuarios = $repo->getRepositorioUsuarios();

$usuarioLogueado = $auth->traerUsuarioLogueado($repoUsuarios);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php require_once 'header.php'; ?>
	Bienvenidos a mi sitio
	<?php if ($auth->estaLogueado()) { ?>
		Bienvenido a MuuSimple <?= $usuarioLogueado->getUsername() ?>
		<a href="logout.php">Log Out</a>
	<?php } else { ?>
		<a href="register.php">Registrate</a>
		<a href="log-in.php">Logueate</a>
	<?php } ?>
	<?php require_once 'footer.php' ?>
</body>
</html>
