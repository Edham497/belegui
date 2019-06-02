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

		
        public static function getAllPedidos(){
			$con = Conexion::getConn();

			$query = "SELECT idPedidos, idUsuarios, CONCAT(u.nombre, ' ', u.apellido_paterno) AS usr_name, u.imagen, (SELECT MAX(fecha_pedido) FROM pedidos WHERE idUsuario = u.idUsuarios ) AS fecha_pedido, (SELECT COUNT(*) FROM pedidos WHERE idUsuario = u.idUsuarios ) AS items, SUM(precio) AS total FROM beleguidb.pedidos as ped
			JOIN usuarios AS u ON idUsuarios = idUsuario
			JOIN productos_pedidos ON idPedido = idPedidos
			JOIN productos AS prd ON idProductos = idProducto
			GROUP BY idUsuario;";

			$statement = $con->prepare($query);
			$statement->execute();

			return $statement;
		}

		public static function getPedidosReporte(){
			$con = Conexion::getConn();

			$query = "SELECT idPedidos, idUsuarios, CONCAT(u.nombre, ' ', u.apellido_paterno) AS usr_name, u.imagen, fecha_pedido, COUNT(idProductosPedidos) AS items, SUM(precio) AS total FROM beleguidb.pedidos as ped
			JOIN usuarios AS u ON idUsuarios = idUsuario
			JOIN productos_pedidos ON idPedido = idPedidos
			JOIN productos AS prd ON idProductos = idProducto
			GROUP BY idPedidos;";

			$statement = $con->prepare($query);
			$statement->execute();

			return $statement;
		}

		public static function getPedidosByUser($idUsuario){
			$con = Conexion::getConn();

			$query = "SELECT idPedidos, idUsuarios, CONCAT(u.nombre, ' ', u.apellido_paterno) AS usr_name, prd.imagen, fecha_pedido, COUNT(idProductos) AS items, SUM(precio) AS total FROM beleguidb.pedidos
			JOIN usuarios AS u ON idUsuarios = idUsuario
			JOIN productos_pedidos ON idPedido = idPedidos
			JOIN productos AS prd ON idProductos = idProducto
			WHERE idUsuario = {$idUsuario}
			GROUP BY idPedidos;";

			$statement = $con->prepare($query);
			$statement->execute();

			return $statement;
		}


		public static function getPedido($idPedido)
		{
			$con = Conexion::getConn();

			$query = "SELECT idProductos, fecha_pedido, imagen, nombre, pp.color, precio, talla FROM pedidos AS p
				JOIN productos_pedidos AS pp ON idPedido = idPedidos
				JOIN productos AS prd ON idProductos = idProducto
				JOIN tallas ON idTallas = idTalla
				WHERE idPedidos = {$idPedido} ORDER BY nombre;";

			$statement = $con->prepare($query);
			$statement->execute();

			return $statement;

		}

		

            
		

	}

?>
