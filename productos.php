<!DOCTYPE html>
<html lang="en">
<?php
    require_once "Core/controladorBase.php";
    session_start();

    //Verificar si hay una sesion activa
    if(isset($_SESSION['id']) && $_SESSION['id']){
        //Dependiendo del tipo de usuario se cargara un home diferente
        if(isset($_SESSION['rol']) && $_SESSION['rol']){

            
            
            switch($_SESSION['rol'])
            {
                case "1":{
                    echo "<script>\n\tmain();\n\tmenuAdmin();\n</script>";
                }break;
                case "2":{
                    echo "<script>\n\tmain();\n\tmenuAdmin();\n</script>";
                }break;
                case "3":{
                    echo "<script>\n\tmain();\n\tmenuUsuario();\n</script>";
                }break;
                default: {
                    include "assets/404.php";
                }
                break;
            }
        }
        else{
            //En caso de que no tenga tipo de usuario o un error dentro de la sesion lo mandara al 404, donde tendra que cerrar la sesion
            include "assets/404.php";
            echo "<script>\n\tmain();\n\tmenuVisita();\n</script>";
        }
        
    }
    else{
        echo"<script>\n\tmain();\n\tmenuVisita();\n</script>";
    }
    
?>
<link href="css/producto.css" rel="stylesheet">
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

            <!-- Talla Selection -->
            <div class="cable-config">
              <span>Tallas</span>

              <div class="cable-choose">
                <form class="collection-sort">
                  <select name="brand" id="brand">
                      <?php
                      
                          require_once 'ADO/Conexion.php';
                          require_once 'ADO/ADOTallas.php';
                          $statement = ADOTallas::getTallas();

                          while($row2 = $statement->fetch(PDO::FETCH_ASSOC))
                          {
                              echo '<option value="' .$row2["idTallas"]. '">' .$row2["talla"]. '</option>';
                          }
                      ?>
                  </select>
                </form>
              </div>

            </div>
          </div>

          <!-- Product Pricing -->
          <div class="product-price">
            <span>$<?php  echo $row['precio'] ?></span>
            <button  class="cart-btn" id="btnAgregar">Agregar al carrito</button>
          </div>

          <div class="product-price">
            
                <a href="/" style="margin-top: 30px;" >Seguir comprando</a>
          </div>

          <div class="blank"></div>
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
               var color = jq('.color-choose input:checked').attr('data-image');
               var talla = jq("#brand option:selected").val();

               jq.ajax({  
                    url:"ADO/addItem.php",  
                    method:"POST",  
                    data:{produto_id:produto_id, color:color, talla:talla},  
                    success:function(data){  
                        jQuery('.blank').html(data);  
                    }  
               });  
          });  
        });



</script>



</html>