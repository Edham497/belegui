<?php
	class ADOPublicaciones{

		//QUERIES
		private static $QUERY_INSERT_PUBLICACION = "INSERT INTO publicaciones (publicacion, fecha_publicacion, idUsuario) VALUES (:publicacion, NOW(), :idUsuario);";
		private static $QUERY_DELETE_PUBLICACION = "DELETE FROM publicaciones WHERE idPublicaciones = :idPublicaciones";

		//SELECCIONAR TODOS LAS PUBLICACIONES
		public static function getAllPublicaciones(){
			$con = Conexion::getConn();
			$query = "SELECT * FROM publicaciones LEFT JOIN imagenes_publicaciones ON idPublicaciones = idPublicacion;";
			$statement = $con->prepare($query);
			$statement->execute();

			while($row = $statement->fetch(PDO::FETCH_ASSOC)){
				 /* OBTENER DE AUI 
				 $row['idPublicaciones']
				 $row['publicacion']
				 $row['fecha_publicacion']
				 $row['idImagenesPublicaciones']
				 $row['imagen']

				 */
			}
		}
		
		//INSERTAR PUBLICACION
		public static function inserPublicacion ($publicacion, $idUsuario) {
			$con = Conexion::getConn();
			
			$statement = $con->prepare(self::$QUERY_INSERT_PUBLICACION);
			$statement->bindParam(':publicacion', $nombre);
			$statement->bindParam(':idUsuario', $descripcion);

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