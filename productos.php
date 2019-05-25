<!DOCTYPE html>
<html lang="en">
<?php
    require_once "Core/controladorBase.php";
    session_start();

    echo"<script>\n\tmain();\n\tmenuUsuario();\n</script>";
    
?>
<link href="css/product.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>      
 <?php
        require_once 'ADO/Conexion.php';
        require_once 'ADO/ADOProductos.php';
        require_once 'Modelos/Producto.php';

        $idProducto = intval($_GET['idProducto']) ;

        $row = ADOProductos::getProductById($idProducto);

    ?>

    <div class="main col cc"  id="idProducto" name="<?php echo $idProducto ?>">
      <main class="container" id="container">

        <!-- Left Column / Headphones Image -->
        <div class="left-column">
          <img class="active" src="<?php  echo "/Imagenes Productos/".$row['imagen'] ?>">
        </div>


        <!-- Right Column -->
        <div class="right-column">

          <!-- Product Description -->
          <div class="product-description">
            <span> <?php  echo $row['categoria'] ?> </span>
            <h1><?php  echo $row['nombre'] ?></h1>
            <p><?php  echo $row['descripcion'] ?></p>
          </div>

          <!-- Product Configuration -->
          <div class="product-configuration">

            <!-- Product Color -->
            <div class="product-color">
              <span>Color</span>

              <div class="color-choose">
                <div>
                  <input data-image="red" type="radio" id="red" name="color" value="red" checked>
                  <label for="red"><span></span></label>
                </div>
                <div>
                  <input data-image="blue" type="radio" id="blue" name="color" value="blue">
                  <label for="blue"><span></span></label>
                </div>
                <div>
                  <input data-image="black" type="radio" id="black" name="color" value="black">
                  <label for="black"><span></span></label>
                </div>
              </div>

            </div>

            <!-- Cable Configuration -->
            <div class="cable-config">
              <span>Cable configuration</span>

              <div class="cable-choose">
                <button>Straight</button>
                <button>Coiled</button>
                <button>Long-coiled</button>
              </div>

            </div>
          </div>

          <!-- Product Pricing -->
          <div class="product-price">
            <span>$<?php  echo $row['precio'] ?></span>
            <button  class="cart-btn" id="btnAgregar">Agregar al carrito</button>
          </div>
        </div>
      </main>
    </div>

     <script>
        //AGREGAR AL CARRITO    
        var jq = jQuery.noConflict();

        jq(document).ready(function()
        {  
          jq('#btnAgregar').click(function()
          {  
               var produto_id = jq('#idProducto').attr('name');
               jq.ajax({  
                    url:"ADO/addItem.php",  
                    method:"POST",  
                    data:{produto_id:produto_id},  
                    success:function(data){  
                         //jQuery('.product-price').html(data);  
                    }  
               });  
          });  
        });


</script>



</html>