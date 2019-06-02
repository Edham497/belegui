<?php

	 session_start();
  
	 require_once '../Modelos/Carrito.php';

      if(isset($_SESSION['id']) && $_SESSION['id'] && isset($_POST["produto_id"])
  		&& isset($_POST["color"]) && isset($_POST["talla"]))
      {

		$idProducto = $_POST["produto_id"];
		$color = $_POST['color'];
		$talla = $_POST['talla'];


          // add new item on array
		$cart_item = array(
		    'color'=>$color,
		    'talla'=>$talla
		);
		 
		/*
		 * check if the 'cart' session array was created
		 * if it is NOT, create the 'cart' session array
		 */
		if(!isset($_SESSION['carrito'])){
		    $_SESSION['carrito'] = array();
		}
		 
		// check if the item is in the array, if it is, do not add
		if(is_array($_SESSION['carrito']) && array_key_exists($idProducto, $_SESSION['carrito'])){
		    echo "<script> alert('Ya agregaste este producto a tu lista') </script>";
		}
		 
		// else, add the item to the array
		else{
		    $_SESSION['carrito'][$idProducto] = $cart_item;
		 	echo "<script> alert('Producto agregado a tu carrito')  </script>";
		}

          
      }
      else
      {
          echo "<script> alert('No haz iniciado sesión') </script>";
      }


 ?>  