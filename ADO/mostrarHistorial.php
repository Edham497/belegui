<?php

    require_once 'Conexion.php';
    require_once 'ADOHistorial.php';

    if(isset($_SESSION['id']))
    {
        $stmt = ADOHistorial::getHistorial($_SESSION['id']);


        if($stmt)
        {

            $stmt = ADOHistorial::getHistorial($_SESSION['id']);
         

            echo "<section class='container content-section'><h1 style='font-size: 53px'>Historial Pedidos</h1><div>
          <div class='cart-row' style='margin-top:30px;'>
                <span class='cart-item cart-header cart-column'>FECHA PEDIDO</span>
                <span class='cart-price cart-header cart-column'>ITEMS</span>
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
                <a href='pedido.php?idPedido={$idPedidos}'>
               <div class='cart-row item'>
                    
                    <div class='cart-item cart-column'>
                        <img class='cart-item-image' src='Imagenes Productos/{$imagen}' width='100' height='100'>
                        <span class='cart-item-title'>{$fecha}</span>
                        <span class='cart-item-title'>{$hora}</span>
                    </div>
                    
                    <span class='cart-price cart-column'>{$items}</span>
                    
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