<?php
	require_once("validador.php");
	require_once("repositorio.php");

	class ValidadorUsuario extends Validador {
		public function validar(Array $datos, Repositorio $repo) {

			$repoUsuarios = $repo->getRepositorioUsuarios();

			$errores = [];

			/*Validacion del nombre*/
	    if (empty(trim($datos["nombre"])) ||
	      is_numeric($datos["nombre"])) {
	          $errores["nombre"] = "Por favor completa el nombre";
	    }

	    /*Validacion del apellido*/
	    if (empty(trim($datos["apellido"])) ||
	      is_numeric($datos["apellido"])){
	          $errores["apellido"] = "Por favor completa el apellido";
	    }

	    /*Validacion del mail*/
	    if (empty(trim($datos["mail"]))) {
	        $errores["mail"] = "Completa el mail";
	    }
	    elseif (!filter_var($datos["mail"], FILTER_VALIDATE_EMAIL)) {
	        $errores["mail"] = "Ingresa un mail valido";
	    }

	    /*Validacion del telefono*/
	    if (empty(trim($datos["telefono"])) ||
	      !is_numeric($datos["telefono"])){
	          $errores["telefono"] = "Por favor completa el telefono";
	    }
	    elseif (strlen($datos["telefono"]) < 6) {
	      $errores["telefono"] = "Por favor ingresa un numero de telefono valido";
	    }

	    /*Validacion de la contraseña*/
	    if (empty(trim($datos["clave"]))) {
	        $errores["clave"] = "Completa la clave";
	    }



	        return $errores;
		}
	}