<?php
	class ADOProductos{

		//QUERIES
		private static $QUERY_INSERT_PRODUCTO = "INSERT INTO productos (nombre, descripcion, precio,  color, idCategoria, fecha_insertado) VALUES (:nombre, :descripcion, :precio,  :color, :idCategoria , NOW() );";
		private static $QUERY_DELETE_PRODUCTO = "DELETE FROM productos WHERE idProductos = :idProductos";
		private static $QUERY_UPDATE_PRODUCTO = "UPDATE users SET nombre=:nombre, descripcion=:descripcion, precio=:precio,  color=:color, idCategoria=:idCategoria WHERE idProductos = :idProductos";

		//SELECCIONAR TODOS LOS PRODUCTOS
		public static function getAllProducts(){
			$con = Conexion::getConn();
			$query = "SELECT * FROM productos LEFT JOIN imagenes_productos ON idProductos = idProducto GROUP BY idProductos;";
			$statement = $con->prepare($query);
			$statement->execute();

			while($row = $statement->fetch(PDO::FETCH_ASSOC)){
				 /* OBTENER DE AUI 
				 $row['idProductos']
				 $row['nombre']
				 $row['descripcion']
				 $row['precio']
				 $row['color']
				 $row['fecha_insertado']
				 $row['idCategoria']
				 $row['idImagenes']
				 $row['imagen']

				 */
			}
		}
		
		//SELECCIONAR PRODUCTOS POR CATEGORIA
		public static function getProductByCategoria($idCategoria){
			$con = Conexion::getConn();
			$query = "SELECT * FROM productos LEFT JOIN imagenes_productos ON idProductos = idProducto WHERE idCategoria = ".$idCategoria ." GROUP BY idProductos ;";
			$statement = $con->prepare($query);
			$statement->execute();

			while($row = $statement->fetch(PDO::FETCH_ASSOC)){
				 /* OBTENER DE AUI 
				 $row['idProductos']
				 $row['nombre']
				 $row['descripcion']
				 $row['precio']
				 $row['color']
				 $row['fecha_insertado']
				 $row['idCategoria']
				 $row['idImagenes']
				 $row['imagen']

				 */
			}
		}

		//SELECCIONAR PRODUCTO POR ID
		public static function getProductByID($idProducto){
			$con = Conexion::getConn();
			$query = "SELECT * FROM productos LEFT JOIN imagenes_productos ON idProductos = idProducto WHERE idProductos = ".$idProducto .";";

			$statement = $con->prepare($query);
			$statement->execute();

			while($row = $statement->fetch(PDO::FETCH_ASSOC)){
				 /* OBTENER DE AUI 
				 $row['idProductos']
				 $row['nombre']
				 $row['descripcion']
				 $row['precio']
				 $row['color']
				 $row['fecha_insertado']
				 $row['idCategoria']
				 $row['idImagenes']
				 $row['imagen']

				 */
			}
		}

		//INSERTAR PRODUCTO
		public static function inserProducto ($nombre, $descripcion, $precio,  $color, $idCategoria) {
			$con = Conexion::getConn();
			
			$statement = $con->prepare(self::$QUERY_INSERT_PRODUCTO);
			$statement->bindParam(':nombre', $nombre);
			$statement->bindParam(':descripcion', $descripcion);
			$statement->bindParam(':precio', $precio);
			$statement->bindParam(':color', $color);
			$statement->bindParam(':idCategoria', $idCategoria);

			$statement->execute();

			return true;
		}

		//ACTUALIZAR PRODUCTO
		public static function updateProducto ($nombre, $descripcion, $precio,  $color, $idCategoria, $idProducto) {
			$con = Conexion::getConn();
			
			$data = [
			    ':nombre' => $nombre,
			    ':descripcion' => $descripcion,
			    ':precio' => $precio,
			    ':color' => $color,
			    ':idCategoria' => $idCategoria,
			    ':idProducto' => $idProducto
			];

			$statement = $con->prepare(self::$QUERY_INSERT_PRODUCTO);
			$statement->execute($data);

			return true;
		}

		//ELIMINAR PRODUCTO
		public function delete($idProducto) 
		{
			$con = Conexion::getConn();
			
			$statement = $con->prepare(self::$QUERY_INSERT_PRODUCTO);
	 
	        return $statement->execute([':idProductos' => $idProducto]);
	    }

	}

?>
