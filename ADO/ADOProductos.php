<?php
	class ADOProductos{

		//QUERIES
		private static $QUERY_INSERT_PRODUCTO = "INSERT INTO productos (nombre, descripcion, precio,  color, idCategoria, fecha_insertado) VALUES (:nombre, :descripcion, :precio,  :color, :idCategoria , NOW() );";
		private static $QUERY_DELETE_PRODUCTO = "DELETE FROM productos WHERE idProductos = :idProductos";
		private static $QUERY_UPDATE_PRODUCTO = "UPDATE productos SET nombre=:nombre, descripcion=:descripcion, precio=:precio,  color=:color, idCategoria=:idCategoria WHERE idProductos = :idProductos";

		//SELECCIONAR TODOS LOS PRODUCTOS
		public static function getAllProducts(){
			$con = Conexion::getConn();
			$query = "SELECT * FROM productos;";
			$statement = $con->prepare($query);
			$statement->execute();

			return $statement;
		}
		
		//SELECCIONAR PRODUCTOS POR CATEGORIA
		public static function getProductByCategoria($idCategoria){
			$con = Conexion::getConn();
			$query = "SELECT * FROM productos WHERE idCategoria = ".$idCategoria .";";
			$statement = $con->prepare($query);
			$statement->execute();

			/*while($row = $statement->fetch(PDO::FETCH_ASSOC)){
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

				 
			}*/

			return $statement;
		}

		//SELECCIONAR PRODUCTO POR ID
		public static function getProductById($idProducto){
			$con = Conexion::getConn();
			$query = "SELECT * FROM productos JOIN categorias ON idCategorias = idCategoria WHERE idProductos = ".$idProducto .";";

			$statement = $con->prepare($query);
			$statement->execute();

			//EN UN WHILE PARA OBTENER LA COLECCION DE IMAGENES DEL PRODUCTO SI ES QUE TIENE
			/*while($row = $statement->fetch(PDO::FETCH_ASSOC)){
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

				 
			}*/

			return $statement->fetch(PDO::FETCH_ASSOC);
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

		//GET BY IDS
		public static function getByIds($ids)
		{
			$ids_arr = str_repeat('?,', count($ids) - 1) . '?';
 			$con = Conexion::getConn();
		    // query to select products
		    $query = "SELECT * FROM productos WHERE idProductos IN ({$ids_arr}) ORDER BY nombre";
		 
		    // prepare query statement
		    $statement = $con->prepare($query);
		 
		    // execute query
		    $statement->execute($ids);
		 
		    // return values from database
		    return $statement;
		}

		//SELECCIONAR CATEGORIAS
		public static function getCategorias(){
			$con = Conexion::getConn();
			$query = "SELECT * FROM categorias";
			$statement = $con->prepare($query);
			$statement->execute();

			return $statement;
		}

		//SELECCIONAR CATEGORIA
		public static function getTalla($id){
			$con = Conexion::getConn();
			$query = "SELECT * FROM tallas WHERE idTallas = ".$id;
			$statement = $con->prepare($query);
			$statement->execute();

			$row = $statement->fetch(PDO::FETCH_ASSOC);
			return $row['talla'];
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

			$statement = $con->prepare(self::$QUERY_UPDATE_PRODUCTO);
			$statement->execute($data);

			return true;
		}

		//ELIMINAR PRODUCTO
		public function delete($idProducto) 
		{
			$con = Conexion::getConn();
			
			$statement = $con->prepare(self::$QUERY_DELETE_PRODUCTO);
	 
	        return $statement->execute([':idProductos' => $idProducto]);
	    }

	}

?>
