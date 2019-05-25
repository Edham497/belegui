
<head>
     <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <!-- CSS -->
    <link href="../css/product.css" rel="stylesheet">

</head>
<body>


    <?php
        require_once            
        require_once '../ADO/Conexion.php';
        require_once '../ADO/ADOProductos.php';
        require_once '../Modelos/Producto.php';

        $idProducto = intval($_GET['idProducto']) ;

        $row = ADOProductos::getProductById($idProducto);

    ?>

    <div class="main col cc">
      <main class="container" >

        <!-- Left Column / Headphones Image -->
        <div class="left-column">
          <img class="active" src="<?php  echo "../Imagenes Productos/".$row['imagen'] ?>">
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
            <button class="cart-btn" id="btnAagregar">Agregar al carrito</button>
          </div>
        </div>
      </main>
    </div>


    <script>
        //AGREGAR AL CARRITO    
        var jq = jQuery.noConflict();
        

        jq(document).ready(function()
        {  
          jq('#btnAagregar').change(function()
          {  
              alert("Lo agregaste a tu carrito");

               /*var brand_id = jq(this).val();  

               jq.ajax({  
                    url:"ADO/load_data.php",  
                    method:"POST",  
                    data:{brand_id:brand_id},  
                    success:function(data){  
                         jQuery('#show_product').html(data);  
                    }  
               });  /*/
          });  
        });

</script>

    
</body>
