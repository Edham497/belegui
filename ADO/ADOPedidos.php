<?php
	class ADOPedidos{
		//QUERIES
		private static $QUERY_INSERT_PEDIDO = "INSERT INTO pedidos (fecha_pedido, idUsuario) VALUES (now(), :idUsuario);";

		private static $QUERY_INSERT_PROD_PED = "INSERT INTO productos_pedidos (idPedido, idProducto, color, idTalla) VALUES (:idPedido, :idProducto, :color, :idTalla);";
		
		//METHODS
		public static function insertPedido ($idUsuario) {
			$con = Conexion::getConn();
			
			$statement = $con->prepare(self::$QUERY_INSERT_PEDIDO);
			$statement->bindParam(':idUsuario', $idUsuario);

			$statement->execute();

			return $con->lastInsertId();;
		}

		public static function insertProductoPedido($idPedido, $idProducto, $color, $idTalla)
		{
			$con = Conexion::getConn();
			$statement = $con->prepare(self::$QUERY_INSERT_PROD_PED);
			$statement->bindParam(':idPedido', $idPedido, PDO::PARAM_INT);
			$statement->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
			$statement->bindParam(':color', $color);
			$statement->bindParam(':idTalla', $idTalla, PDO::PARAM_INT);

			return $statement->execute();
		}
	}

?>
