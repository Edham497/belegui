<?php

	class Publicacion
	{

		public static function getPublicaciones($statement)
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{

				$likes = $row['likes'];

				if($likes > 0)
				{
					$count = 0;
					if(isset($_SESSION['id']) && $_SESSION['id'])
					{
						$count = ADOPublicaciones::dioLike($row['idPublicaciones'], $_SESSION['id']);
					}

					if($count > 0)
					{
						echo "<section class='item'>
				      	<div class='right-column'>

				        <div class='product-description'>
				          
				          <h1>". $row['nombreU'] ."</h1>
						  <span>".  date("d M Y", strtotime($row['fecha_publicacion'])) ."</span>
				          <p>". $row['publicacion'] ."</p>

				          <img src='../Imagenes Productos/". $row['imagen'] ."' style='width: 100%'>
				        </div>


				       <div id='idPublicacion' class='product-price' name='". $row['idPublicaciones'] ."'>
				        	<i class='fa fa-heart heart2'></i>
				          	<a class='cart-btn2'>". $likes ."</a>
				        </div>
								</div>";
								if(isset($_SESSION['rol']) && $_SESSION['rol']=='1')
									echo "<a href='../Publicaciones/borrarBlog.php?id=".$row['idPublicaciones']."'>Eliminar</a>";
								echo "</section>";
					}
					else
					{
						echo "<section class='item'>
				      	<div class='right-column'>

				        <div class='product-description'>
				          
				          <h1>". $row['nombreU'] ."</h1>
						  <span>".  date("d M Y", strtotime($row['fecha_publicacion'])) ."</span>
				          <p>". $row['publicacion'] ."</p>

				          <img src='../Imagenes Productos/". $row['imagen'] ."' style='width: 100%'>
				        </div>
				       <div id='idPublicacion' class='product-price' name='". $row['idPublicaciones'] ."'>
				        	<i class='fa fa-heart-o'></i>
				          	<a class='cart-btn'>". $likes ."</a>
				        </div>
							</div>";
							if(isset($_SESSION['rol']) && $_SESSION['rol']=='1')
								echo "<a href='../Publicaciones/borrarBlog.php?id=".$row['idPublicaciones']."'>Eliminar</a>";
							echo "</section>";
					}
					
				}
				else
				{
					echo "<section class='item'>
			      	<div class='right-column'>

			        <div class='product-description'>
			          
			          <h1>". $row['nombreU'] ."</h1>
					  <span>".  date("d M Y", strtotime($row['fecha_publicacion'])) ."</span>
			          <p>". $row['publicacion'] ."</p>

			          <img src='../Imagenes Productos/". $row['imagen'] ."' style='width: 100%'>
			        </div>


			        <div id='idPublicacion' class='product-price' name='". $row['idPublicaciones'] ."'>
			        	<i class='fa fa-heart-o'></i>
			          	<a class='cart-btn'>". $likes ."</a>
			        </div>
							</div>";
							if(isset($_SESSION['rol']) && $_SESSION['rol']=='1')
								echo "<a href='../Publicaciones/borrarBlog.php?id=".$row['idPublicaciones']."'>Eliminar</a>";
							echo "</section>";
				}

					
			}
		}

	}


?>
