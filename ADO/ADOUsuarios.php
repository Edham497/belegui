<?php
	class ADOUsuarios{
		//QUERIES
		private static $QUERY_SIGNUP = "INSERT INTO usuarios (nombre, apellido_paterno, apellido_materno, email, pass, fecha_insertado) VALUES (:nombre , :apellido_paterno ,:apellido_materno,:email , MD5(:pass) , NOW() );";
		
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

		public static function getUsers(){
			$con = Conexion::getConn();
			$query = "SELECT * FROM usuarios";
			$statement = $con->prepare($query);
			$statement->execute();
			echo "<div class='users'><div class='title'>Usuarios Registrados</div>";
			while($row = $statement->fetch(PDO::FETCH_ASSOC)){
				echo "<div class='user'>";
				echo "<div class='item'>ID: ". $row['idUsuarios']."</div>";
				echo "<div class='item'>Nombre: ". $row['nombre']."</div>";
				echo "<div class='item'>Apellido Paterno: ". $row['apellido_paterno']."</div>";
				echo "<div class='item'>Apellido Materno: ". $row['apellido_materno']."</div>";
				echo "<div class='item'>Correo: ". $row['email']."</div>";
				echo "<div class='item'>Pass: ". $row['pass']."</div>";
				echo "</div>";
			}
			echo "</div>";
		}

		public static function getUsersSlider(){
			$con = Conexion::getConn();
			$query = "SELECT * FROM usuarios";
			$statement = $con->prepare($query);
			$statement->execute();
			while($row = $statement->fetch(PDO::FETCH_ASSOC)){
				echo "<div class='slide col cc'>";
				echo "<div class='item'>ID: ". $row['idUsuarios']."</div>";
				echo "<div class='item'>Nombre: ". $row['nombre']."</div>";
				echo "<div class='item'>Apellido Paterno: ". $row['apellido_paterno']."</div>";
				echo "<div class='item'>Apellido Materno: ". $row['apellido_materno']."</div>";
				echo "<div class='item'>Correo: ". $row['email']."</div>";
				echo "<div class='item'>Pass: ". $row['pass']."</div>";
				echo "</div>";
			}
			echo "</div>";
		}
	}

?>
