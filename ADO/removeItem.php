<?php
	// start session
	session_start();
	 
	// get the product id
	if(isset($_POST["id"]))
	{
		$idProducto = $_POST["id"];
		// remove the item from the array
		unset($_SESSION['carrito'][$idProducto]);

		require_once 'mostrarCarrito.php';
	}
	else
	{
		echo "<script>alert('No se pudo eliminar el item')</script>";
	}
?>