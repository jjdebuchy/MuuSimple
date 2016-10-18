<?php
	require_once("repositorioUsuarios.php");

	class Usuario {
		private $nombre;
		private $apellido;
		private $mail;
		private $id;
		private $password;
		private $telefono;
		private $avatar;

		public function __construct($id, $nombre, $apellido, $mail, $password, $telefono) {
			$this->id = $id;
			$this->nombre =$nombre;
			$this->apellido = $apellido;
			$this->mail = $mail;
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
		public function getMail()
		{
			return $this->mail;
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
		public function getAvatar()
		{
			$name = "img/" . $this->getId();
			$matching = glob($name . ".*");

			$info = pathinfo($matching[0]);
			$ext = $info['extension'];

			return $name . "." . $ext;
		}
		public function setName($name) {
			$this->name = $name;
		}
		public function setMail($mail) {
			$this->mail = $mail;
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
		public function setAvatar($avatar) {
			if ($avatar["error"] == UPLOAD_ERR_OK) {

				$path = "img/";

				if (!is_dir($path)) {
					mkdir($path, 0777);
				}

				$ext = pathinfo($avatar["name"], PATHINFO_EXTENSION);

				move_uploaded_file($avatar["tmp_name"], $path . $this->getId() . "." . $ext);
			}
		}

		public function guardar(RepositorioUsuarios $repo) {
			$repo->guardar($this);
		}

		public function toArray() {
			return [
				"id" => $this->getId(),
				"name" => $this->getNombre(),
				"apellido" => $this->getApellido(),
				"mail" => $this->getMail(),
				"password" => $this->getPassword(),
				"telefono" => $this->getTelefono()
			];

		}
	}
