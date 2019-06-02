<?php

  require_once 'Conexion.php';
  require_once 'ADOProductos.php';
  require_once '../Modelos/Producto.php';

   if(isset($_POST["brand_id"]))  
   {  
        if($_POST["brand_id"] != '0')  
        {  

            Producto::getProductos(ADOProductos::getProductByCategoria($_POST["brand_id"]));
        }  
        else  
        {  
            Producto::getProductos(ADOProductos::getAllProducts());
        }  

   }
 ?>  