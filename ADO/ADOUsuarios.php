<?php
	class ADOUsuarios{
		//QUERIES
		private static $QUERY_SIGNUP = "INSERT INTO usuarios (nombre, apellido_paterno, apellido_materno,nickname,telefono, email, pass, fecha_insertado,codigoAleatorio,estado, idRol) VALUES (:nombre , :apellido_paterno ,:apellido_materno,:nickname,:telefono,:email , MD5(:pass) , NOW(),:codAl,0,3);";
		
		//METHODS
		public static function insertUser ($nombre, $apellido_paterno, $apellido_materno,  $nickname,$telefono, $email, $pass,$codAl) {
			$con = Conexion::getConn();
			
			$statement = $con->prepare(self::$QUERY_SIGNUP);
			$statement->bindParam(':nombre', $nombre);
			$statement->bindParam(':apellido_paterno', $apellido_paterno);
			$statement->bindParam(':apellido_materno', $apellido_materno);
			$statement->bindParam(':nickname', $nickname);
			$statement->bindParam(':telefono', $telefono);
			$statement->bindParam(':email', $email);
			$statement->bindParam(':pass', $pass);
			$statement->bindParam(':codAl', $codAl);
			
			$statement->execute();
			
			return true;
		}
		
		public static function updateUser($id, $nick, $nombre, $app, $apm, $telefono,$sexo,$correo){
			$con = Conexion::getConn();
			$query = "UPDATE usuarios SET nickname='$nick', nombre = '$nombre', apellido_paterno= '$app', 
			apellido_materno = '$apm', telefono='$telefono', genero='$sexo', email='$correo' where idUsuarios = $id ";
			$statement = $con->prepare($query);
			$statement->execute();
		}

		public static function getUser($email, $pass){
			$con = Conexion::getConn();
			
			$query = "SELECT * FROM usuarios WHERE email = '" .$email ."' AND pass = MD5('". $pass ."') AND estado = 1;";
			$statement = $con->prepare($query);

			$statement->execute();

			return  $statement->fetch(PDO::FETCH_ASSOC);
		}

		public static function confirmEmail($ca)
		{
			$con = Conexion::getConn();

			$query = "SELECT * FROM usuarios WHERE codigoAleatorio = '$ca';";
			$statement = $con->prepare($query);

			$statement->execute();

			$row = $statement->fetch(PDO::FETCH_ASSOC);

			if($row===false)
				return false;
			else
			{
				$update = "UPDATE usuarios SET estado = 1 WHERE codigoAleatorio = '$ca'";
				$updateSta = $con->prepare($update);
				$updateSta->execute();

				return true;
			}
		}

		public static function getUserInfo($id){
			$con = Conexion::getConn();
			$query = "SELECT * FROM usuarios WHERE idUsuarios = $id";
			$statement = $con->prepare($query);
			$statement->execute();
			return $statement->fetch(PDO::FETCH_ASSOC);
		}

		public static function getUsers(){
			$con = Conexion::getConn();
			$query = "SELECT * FROM usuarios";
			$statement = $con->prepare($query);
			$statement->execute();
			return $statement;
		}


	}

?>
