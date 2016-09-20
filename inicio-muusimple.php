<?php
	require("funciones-registracion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	Bienvenidos a mi sitio
	<?php if (estaLogueado()) { ?>
		Bienvenido a MuuSimple <?= traerUsuarioLogueado()["nombre"] ?>
		<a href="logout.php">Log Out</a>
	<?php } else { ?>
		<a href="register.php">Registrate</a>
		<a href="login2.php">Logueate</a>
	<?php } ?>
</body>
</html>
