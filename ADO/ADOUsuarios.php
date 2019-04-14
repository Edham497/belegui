<?php
	class ADOUsuarios{
		//QUERIES
		private static $QUERY_SIGNUP = "INSERT INTO usuarios (nombre, apellido_paterno, apellido_materno, email, pass, fecha_insertado) VALUES (:nombre , :apellido_paterno ,:apellido_materno,:email , MD5(:pass) , NOW() );";

		private static $QUERY_LOGIN = "SELECT * FROM usuarios WHERE email LIKE :email AND pass LIKE :pass;";
		
		//METHODS
		public static function insertUser ($nombre, $apellido_paterno, $apellido_materno,  $email, $pass) {
			$con = Conexion::getConn();
			
			$statement = $con->prepare(self::$QUERY_SIGNUP);
			$statement->bindParam(':nombre', $nombre);
			$statement->bindParam(':apellido_paterno', $apellido_paterno);
			$statement->bindParam(':apellido_materno', $apellido_materno);
			$statement->bindParam(':email', $email);
			$statement->bindParam(':pass', $pass);

			$statement->execute();

			return true;
		}

		public static function getUser($email, $pass){
			$con = Conexion::getConn();
			
			$query = "SELECT * FROM usuarios WHERE email = '" .$email ."' AND pass = MD5('". $pass ."');";
			$statement = $con->prepare($query);

			$statement->execute();

			$row = $statement->fetch(PDO::FETCH_ASSOC);

			if($row===false)
 				return false;
 			else
 				return $row['nombre']; 
		}
	}

?>
