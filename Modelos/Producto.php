<?php 
	class Producto{
		private $idProductos;
		private $nombre;
		private	$descripcion;
		private $precio;
		private $color;
		private $fecha_insertado;
		private $idCategoria;
		private $imagen;

		public function __construct($array){
			$idProductos = $array['idProductos'];
			$nombre = $array['nombre'];
			$descripcion = $array['descripcion'];
			$precio = $array['precio'];
			$color = $array['color'];
			$fecha_insertado = $array['fecha_insertado'];
			$idCategoria = $array['idCategoria'];
			$imagen = $array['imagen'];
		}

		public static function getProductos($statement){
			while($row = $statement->fetch(PDO::FETCH_ASSOC)){

				echo "<section class='product-card' >".
              "<a class='item' href='productos.php?idProducto=". $row['idProductos']."'><div class='product-image'>".
                "<img src='Imagenes Productos/".$row['imagen']."' />
              </div>".
              "<div class='product-info'>".
                "<h5>".$row['nombre']."</h5>".
                "<h6>$".$row['precio']."</h6>".
              "</div></a>
            </section>";

					
			}
		}

	}

 ?>