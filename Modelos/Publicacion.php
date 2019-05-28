<?php

	class Publicacion
	{

		public function __construct($array)
		{

		}

		public static function getPublicaciones($statement)
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{

				echo "<section class='item'>
		      	<div class='right-column'>

		        <div class='product-description'>
		          
		          <h1>". row['nombreU'] ."</h1>
				  <span>20 de Marzo 2019</span>
		          <p>". row['publicacion'] ."</p>

		          <img src='../Imagenes Productos/". row['imagen'] ."' style='width: 100%'>
		        </div>


		        <div class='product-price'>
		        	<i class='fa fa-heart heart2'></i>
		          	<a class='cart-btn2'>". row['likes'] ."</a>
		        </div>
		      </div>
		      </section>";

					
			}
		}

	}


?>
