<?php

    require_once 'Conexion.php';
    require_once 'ADOProductos.php';


    if(isset($_SESSION['carrito']) && count($_SESSION['carrito'])>0){

        // get the product ids
        $ids = array();
        foreach($_SESSION['carrito'] as $id=>$value){
            array_push($ids, $id);
        }
     
        $stmt = ADOProductos::getByIds($ids);
     
        $total=0;

        echo "<section class='container content-section'><h1 style='font-size: 53px'>Carrito</h1><div>
      <div class='cart-row' style='margin-top:30px;'>
            <span class='cart-item cart-header cart-column'>PRODUCTO</span>
            <span class='cart-price cart-header cart-column'>COLOR</span>
            <span class='cart-quantity cart-header cart-column'>PRECIO</span>
        </div>
        <div class='cart-items'>";
     
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
     
            $color = $_SESSION['carrito'][$idProductos]['color'];
            $idTalla = $_SESSION['carrito'][$idProductos]['talla'];
            $talla = ADOProductos::getTalla($idTalla);
     
    // =================
      //Carrito -->
      echo "
            
           <div class='cart-row item'>
                
                <div class='cart-item cart-column'>
                    <img class='cart-item-image' src='Imagenes Productos/{$imagen}' width='100' height='100'>
                    <span class='cart-item-title'>{$nombre} - {$talla}</span>
                </div>
                
                <span class='cart-price cart-column'>{$color}</span>
                
                <div class='cart-quantity cart-column'>
                    <span class='cart-price cart-column'>$" . number_format($precio, 2, '.', ',') . "</span>
                    <button class='btn btn-danger' type='button' value='{$idProductos}'>ELIMINAR</button>
                </div>
                    
            </div>

         ";
            // =================

     
            $total+=$precio;
        }
     
        echo "</div><div class='cart-total'>
            <strong class='cart-total-title'>Total</strong>
            <span class='cart-total-price'>$" . number_format($total, 2, '.', ',') . "</span>
        </div>
        <button class='btn btn-primary btn-purchase' id='btnPedido' type='button'>HACER PEDIDO</button></section>";
     
    }
 
    // no products were added to cart
    else{
        echo "<h1 style='font-size: 53px'>Carrito Vacío</h1><div'>";
                echo "<img src='img/empty.png' style='width: 100%;' />";
        echo "</div>";
    }

?>