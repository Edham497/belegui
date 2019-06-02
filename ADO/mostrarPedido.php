<?php

		require_once 'Conexion.php';
        require_once 'ADOHistorial.php';

		$idPedido = intval($_GET['idPedido']) ;

        $stmt = ADOHistorial::getPedido($idPedido);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
     
        $total=0;
        $fecha = date("d/m/y ", strtotime($row['fecha_pedido']));

        echo "<section class='container content-section'><h1 style='font-size: 53px'>Pedido</h1>
        	<h2>{$fecha}</h2>
        <div>
      <div class='cart-row' style='margin-top:30px;'>
            <span class='cart-item cart-header cart-column'>PRODUCTO</span>
            <span class='cart-price cart-header cart-column'>COLOR</span>
            <span class='cart-quantity cart-header cart-column'>PRECIO</span>
        </div>
        <div class='cart-items'>";

         echo "
            
           <div class='cart-row item'>
                
                <div class='cart-item cart-column'>
                    <img class='cart-item-image' src='Imagenes Productos/{$imagen}' width='100' height='100'>
                    <span class='cart-item-title'>{$nombre} - {$talla}</span>
                </div>
                
                <span class='cart-price cart-column'>{$color}</span>
                
                <div class='cart-quantity cart-column'>
                    <span class='cart-price cart-column'>$" . number_format($precio, 2, '.', ',') . "</span>
                </div>

                    
            </div>

         ";
            // =================

     
            $total+=$precio;
     
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

     
    // =================
      //Pedido -->
      echo "
            
           <div class='cart-row item'>
                
                <div class='cart-item cart-column'>
                    <img class='cart-item-image' src='Imagenes Productos/{$imagen}' width='100' height='100'>
                    <span class='cart-item-title'>{$nombre} - {$talla}</span>
                </div>
                
                <span class='cart-price cart-column'>{$color}</span>
                
                <div class='cart-quantity cart-column'>
                    <span class='cart-price cart-column'>$" . number_format($precio, 2, '.', ',') . "</span>
                </div>

                    
            </div>

         ";
            // =================

     
            $total+=$precio;
        }
     
        echo "</div><div class='cart-total'>
            <strong class='cart-total-title'>Total</strong>
            <span class='cart-total-price'>$" . number_format($total, 2, '.', ',') . "</span>
        </div>";
     
    

?>