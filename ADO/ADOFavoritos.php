<?php
	class ADOFavoritos{

		//QUERIES
		private static $QUERY_INSERT_FAVORITO = "INSERT INTO favoritos (fecha_insertado, idUsuario, idProducto) VALUES (NOW(), :idUsuario, :idProducto);";
		private static $QUERY_DELETE_FAVORITO = "DELETE FROM favoritos WHERE idFavoritos = :idFavoritos";


		//SELECCIONAR FAVORITOS POR ID USUARIO
		public static function getFavoritosById($idUsuario){
			$con = Conexion::getConn();
			$query = "SELECT * FROM favoritos WHERE idUsuario = ".$idUsuario .";";

			$statement = $con->prepare($query);
			$statement->execute();

			while($row = $statement->fetch(PDO::FETCH_ASSOC)){
				 /* OBTENER DE AUI 
				 $row['idFavoritos']
				 $row['fecha_insertado']
				 $row['idUsuario']
				 $row['idProducto']
				 */
			}
		}

		//INSERTAR FAVORITO
		public static function inserFavorito ($idUsuario, $idProducto) {
			$con = Conexion::getConn();
			
			$statement = $con->prepare(self::$QUERY_INSERT_FAVORITO);
			$statement->bindParam(':idUsuario', $idUsuario);
			$statement->bindParam(':idProducto', $idProducto);

			$statement->execute();

			return true;
		}

		//ELIMINAR FAVORITO
		public function delete($idFavorito) 
		{
			$con = Conexion::getConn();
			
			$statement = $con->prepare(self::$QUERY_DELETE_FAVORITO);
	 
	        return $statement->execute([':idFavoritos' => $idFavorito]);
	    }

	}

?>
