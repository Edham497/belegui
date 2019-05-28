<?php
	class ADOPublicaciones{

		//QUERIES
		private static $QUERY_INSERT_PUBLICACION = "INSERT INTO publicaciones (publicacion, fecha_publicacion, idUsuario) VALUES (:publicacion, NOW(), :imagen,:idUsuario);";
		private static $QUERY_DELETE_PUBLICACION = "DELETE FROM publicaciones WHERE idPublicaciones = :idPublicaciones";

		//SELECCIONAR TODOS LAS PUBLICACIONES
		public static function getAllPublicaciones(){
			$con = Conexion::getConn();
			$query = "SELECT idPublicaciones, publicacion, fecha_publicacion, pu.imagen, idUsuarios, concat(nombre, ' ', apellido_paterno, ' ', apellido_materno) AS 'nombreU', (SELECT count(*) FROM likes WHERE idPublicacion = idPublicaciones) AS likes FROM publicaciones AS pu JOIN usuarios ON idUsuarios = idUsuario LEFT JOIN likes ON idPublicacion = idPublicaciones GROUP BY idPublicaciones ORDER BY fecha_publicacion;";
			$statement = $con->prepare($query);
			$statement->execute();

			return $statement;
		}
		
		//INSERTAR PUBLICACION
		public static function inserPublicacion ($publicacion, $imagen,    $idUsuario) {
			$con = Conexion::getConn();
			
			$statement = $con->prepare(self::$QUERY_INSERT_PUBLICACION);
			$statement->bindParam(':publicacion', $publicacion);
			$statement->bindParam(':idUsuario', $idUsuario);

			$statement->execute();

			return true;
		}

		//ELIMINAR PUBLICACION
		public function deletePublicacion($idPublicacion) 
		{
			$con = Conexion::getConn();
			
			$statement = $con->prepare(self::$QUERY_DELETE_PUBLICACION);
	 
	        return $statement->execute([':idPublicaciones' => $idPublicacion]);
	    }

	}

?>