<?php
	class ADOHistorial{

		public static function getHistorial($idUsuario){
			$con = Conexion::getConn();

			$query = "SELECT idPedidos, prd.imagen, fecha_pedido, COUNT(idProductos) AS items, SUM(precio) AS total FROM beleguidb.pedidos
			JOIN usuarios ON idUsuarios = idUsuario
			JOIN productos_pedidos ON idPedido = idPedidos
			JOIN productos AS prd ON idProductos = idProducto
			WHERE idUsuario = {$idUsuario}
			GROUP BY idPedidos;";

			$statement = $con->prepare($query);
			$statement->execute();

			return $statement;
		}

	}

?>