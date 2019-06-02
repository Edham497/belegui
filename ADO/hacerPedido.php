<?php
 
 	session_start();

	require_once 'Conexion.php';
    require_once 'ADOPedidos.php';
	
	if(isset($_SESSION['id']) && isset($_SESSION['carrito']) && count($_SESSION['carrito'])>0){

        $idUsuario = $_SESSION['id'];

        $idPedidoNuevo = ADOPedidos::insertPedido($idUsuario);

        $carrito = $_SESSION['carrito'];
        foreach($carrito as $i => $item) {
        	$idProducto = $i;
		    $color = $carrito[$i]['color'];
		    $talla = $carrito[$i]['talla'];

		    ADOPedidos::insertProductoPedido($idPedidoNuevo, $idProducto, $color, $talla);

		}

		unset($_SESSION['carrito']);
		echo "<script> alert('Pedido realizado con exito') </script>";
		echo "<script> window.location.href = '/HistorialPedidos.php'; </script>";

     }
     
           
?>