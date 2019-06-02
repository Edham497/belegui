<?php

    require_once 'Conexion.php';
    require_once 'ADOPedidos.php';

    if(isset($_SESSION['id']))
    {
        $stmt = ADOPedidos::getAllPedidos();


        if($stmt)
        {

            echo "<section class='container content-section'><h1 style='font-size: 53px'>Pedidos Usuarios</h1>
            	<a href='../ADO/PDF.php' class='generar_repo'>Generar reporte</a>
            <div>
	          	<div class='cart-row' style='margin-top:30px;'>
	                <span class='cart-item cart-header cart-column'>USUARIO</span>
	                <span class='cart-price cart-header cart-column'>FECHA</span>
	                <span class='cart-quantity cart-header cart-column'>PEDIDOS</span>
	                <span class='cart-quantity cart-header cart-column'>TOTAL</span>
	            </div>
            <div class='cart-items'>";
         
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $fecha = date("d/m/y ", strtotime($row['fecha_pedido']));
                $hora = date("H:m ", strtotime($row['fecha_pedido']));
         
        // =================
          //Carrito -->
          echo "
                <a href='pedidosUsuario.php?idUsuario={$idUsuarios}'>
               <div class='cart-row item'>
                    
                    <div class='cart-item cart-column'>
                        <img class='cart-item-image' src='img/{$imagen}' width='100' height='100'>
                        <span class='cart-item-title'>{$usr_name}</span>
                    </div>

                    <div class='cart-quantity cart-column'>
                        <span class='cart-item-title'>{$fecha}</span>
                    </div>
                    
                    <span class='cart-quantity cart-column'>{$items}</span>
                    
                    <div class='cart-quantity cart-column'>
                        <span class='cart-price cart-column'>$" . number_format($total, 2, '.', ',') . "</span>
                    </div>
                        
                </div><a>

             ";
                // =================

            }
         
            echo "</section>";
         
        }
    }
    else{
        echo "<h1 style='font-size: 53px'>Historial Vacío</h1><div'>";
                echo "<img src='img/empty.png' style='width: 100%;' />";
        echo "</div>";
    }

?>