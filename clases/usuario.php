<?php
	require_once("repositorioUsuarios.php");

	class Usuario {
		private $nombre;
		private $apellido;
		private $email;
		private $id;
		private $password;
		private $telefono;


		public function __construct($id, $nombre, $apellido, $email, $telefono, $password) {
			$this->id = $id;
			$this->nombre =$nombre;
			$this->apellido = $apellido;
			$this->email = $email;
			$this->telefono = $telefono;
			$this->password = $password;
		}

		public function getNombre()
		{
			return $this->nombre;
		}
		public function getApellido()
		{
			return $this->apellido;
		}
		public function getEmail()
		{
			return $this->email;
		}
		public function getId()
		{
			return $this->id;
		}
		public function getPassword()
		{
			return $this->password;
		}
		public function getTelefono()
		{
			return $this->telefono;
		}

		public function setNombre($nombre) {
			$this->name = $nombre;
		}
		public function setEmail($email) {
			$this->mail = $email;
		}
		public function setApellido($apellido) {
			$this->apellido = $apellido;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function setTelefono($telefono) {
			$this->telefono = $telefono;
		}
		public function setPassword($password) {
			$this->password = password_hash($password, PASSWORD_DEFAULT);
		}


		public function guardar(RepositorioUsuarios $repo) {
			$repo->guardar($this);
		}

		public function toArray() {
			return [
				"id" => $this->getId(),
				"nombre" => $this->getNombre(),
				"apellido" => $this->getApellido(),
				"email" => $this->getEmail(),
				"password" => $this->getPassword(),
				"telefono" => $this->getTelefono()
			];

		}
	}
