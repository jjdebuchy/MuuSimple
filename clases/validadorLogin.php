<?php
	require_once("validador.php");
	require_once("repositorio.php");

	class ValidadorLogin extends Validador {
		public function Validar(Array $datos, Repositorio $repo) {

			$repoUsuarios = $repo->getRepositorioUsuarios();

			$errores = [];

	        if (empty(trim($datos["mail"])))
	        {
	            $errores["mail"] = "Por favor ingrese mail";
	        }
	        if (empty(trim($datos["password"])))
	        {
	            $errores["password"] = "Por favor ingrese password";
	        }
	        if (!$repoUsuarios->existeElMail($datos["mail"]))
	        {
	            $errores["mail"] = "El usuario no existe";
	        }
	        else {
	            $usuario = $repoUsuarios->traerUsuarioPorMail($datos["mail"]);

	            if (!password_verify($datos["password"], $usuario->getPassword())) {
	                $errores["password"] ="La contraseña es incorrecta";
	            }
	        }

	        return $errores;
		}
	}