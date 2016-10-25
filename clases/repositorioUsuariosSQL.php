<?php
	require_once("repositorioUsuarios.php");

	class RepositorioUsuariosSQL extends RepositorioUsuarios {

		private $conn;

		public function __construct(PDO $conn) {
			$this->conn = $conn;
		}

		public function traerTodosLosUsuarios() {

			$usuarios = [];

			$sql = "Select * from usuario";

			$query = $this->conn->prepare($sql);
			$query->execute();

			$usuariosArrays = $query->fetchAll(PDO::FETCH_ASSOC);

	        foreach ($usuariosArrays as $usuarioArray) {

	        	$usuario = new Usuario(
	        		$usuarioArray["id"],
	        		$usuarioArray["nombre"],
	        		$usuarioArray["email"],
	        		$usuarioArray["apellido"],
	        		$usuarioArray["password"],
	        		$usuarioArray["telefono"]
	        	);

	            $usuarios[] = $usuario;
	        }

	        return $usuarios;
	    }


	    public function guardar(Usuario $usuario) {
	    	if ($usuario->getId() == null) {
	    		$sql = "INSERT into usuarios(id,nombre,apellido,email,telefono,password) values (default, :nombre, :apellido, :email, :telefono, :password)";
	    	}
	    	else {
	    		$sql = "UPDATE usuario set
	    			nombre = :nombre,
	    			apellido = :apellido,
	    			email = :email,
	    			telefono = :telefono,
	    			password = :password
	    			where id = :id";
	    	}

	    	$query = $this->conn->prepare($sql);

	    	$query->bindValue(":nombre", $usuario->getNombre(), PDO::PARAM_STR);
	    	$query->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
	    	$query->bindValue(":apellido", $usuario->getApellido(), PDO::PARAM_STR);
	    	$query->bindValue(":password", $usuario->getPassword(), PDO::PARAM_STR);
	    	$query->bindValue(":telefono", $usuario->getTelefono(), PDO::PARAM_INT);

	    	if ($usuario->getId() != null) {
	    		$query->bindValue(":id", $usuario->getId(), PDO::PARAM_INT);
	    	}

	    	$query->execute();

	    	if ($usuario->getId() == null) {
	    		$usuario->setId($this->conn->lastInsertId());
	    	}

	    }

	    public function traerUsuarioPorEmail($email) {
	        $sql = "Select * from usuario where email = :email";

	        $query = $this->conn->prepare($sql);

	        $query->bindValue(":email", $email, PDO::PARAM_STR);

	        $query->execute();

	        $usuarioArray = $query->fetch();

	        if ($usuarioArray) {
	        	$usuario = new Usuario(
						$usuarioArray["id"],
						$usuarioArray["nombre"],
						$usuarioArray["email"],
						$usuarioArray["apellido"],
						$usuarioArray["password"],
						$usuarioArray["telefono"]
	        	);
	        	return $usuario;
	        }

	        return false;
	    }
	}
