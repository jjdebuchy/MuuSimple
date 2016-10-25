<?php
	require_once("repositorio.php");
	require_once("repositorioUsuariosSQL.php");

	class RepositorioSQL extends Repositorio {

		private $conn;

		public function __construct() {
			$dsn = 'mysql:host=localhost;dbname=MuuSimple;charset=utf8mb4;port:3306';

			$user = "root";
			$pass = "123456";

			$this->conn = new PDO($dsn, $user, $pass);

			$this->repositorioUsuarios = new RepositorioUsuariosSQL($this->conn);
		}

	}
