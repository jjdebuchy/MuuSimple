<?php
	require("funciones-registracion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php require_once 'header.php'; ?>
	Bienvenidos a mi sitio
	<?php if (estaLogueado()) { ?>
		Bienvenido a MuuSimple <?= traerUsuarioLogueado()["nombre"] ?>
		<a href="logout.php">Log Out</a>
	<?php } else { ?>
		<a href="register.php">Registrate</a>
		<a href="log-in.php">Logueate</a>
	<?php } ?>
	<?php require_once 'footer.php' ?>
</body>
</html>
