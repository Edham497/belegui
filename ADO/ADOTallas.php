<?php
	class ADOTallas{

		public static function getTallas(){
			$con = Conexion::getConn();
			$query = "SELECT * FROM tallas;";
			$statement = $con->prepare($query);
			$statement->execute();

			return $statement;
		}
	}

?>