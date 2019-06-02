<?php
	class ADOHistorial{

		public static function getHistorial($idUsuario){
			$con = Conexion::getConn();

			$query = "SELECT idPedidos, prd.imagen, fecha_pedido, COUNT(pp.idProducto) AS items, SUM(prd.precio) AS total FROM pedidos AS ped
				JOIN productos_pedidos AS pp ON idPedidos = idPedido
				JOIN productos AS prd ON idProductos = idProducto
				JOIN usuarios AS usr ON idUsuario = ped.idUsuario
				WHERE idUsuarios = {$idUsuario} GROUP BY idPedidos ORDER BY fecha_pedido DESC;";

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