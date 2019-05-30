<!--<body>
    <div class="main col sc fixFlow">
        <h1>CU07 | Usuarios del Sistema</h1>
        <br>
        <div class="container">
            <div class="descripcion">
                <div class="desc">Rol</div>
                <div class="desc">Nombre y Correo</div>
                <div class="desc">Eliminar</div>
            </div>
        </div>
        <div class="container">
        <?php
            /*require_once 'ADO/Conexion.php';
            require_once 'ADO/ADOUsuarios.php';
            require_once 'Modelos/Usuario.php';
            Usuario::getUserComp(ADOUsuarios::getUserInfo($_SESSION['id']));
            Usuario::getUsers(ADOUsuarios::getUsers());*/
        ?>
        </div>
    </div>
</body>-->
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>      

</head>
<body>
    <div class="main col ">
        <h1 style="margin-left: 9%; font-size: 53px">Catálogo</h1>
        <br>
        <nav style="margin-left: 9%" class="product-filter">
        
        <form action="Catalogo.php" method="post" class="formulario" style="width:15%;">
            <button type="submit" class="boton centerV">Dar de Alta</button>
        </form>
        
        <div class="sort" >
            <form class="collection-sort">
                <label>Categorías:</label>
                <select name="brand" id="brand">
                    <option value="0">Todos los productos</option>
                    <?php
                    
                        require_once 'ADO/Conexion.php';
                        require_once 'ADO/ADOProductos.php';
                        require_once 'Modelos/Producto.php';
                        $statement = ADOProductos::getCategorias();

                        while($row = $statement->fetch(PDO::FETCH_ASSOC))
                        {
                            echo '<option value="' .$row["idCategorias"]. '">' .$row["categoria"]. '</option>';
                        }
                    ?>
                </select>
            </form>
            
        </div>
    </nav>
    

    <section class="products" id="show_product">
             <?php
            
                Producto::getProductos(ADOProductos::getAllProducts());
            ?>
       
    </section>

    </div>
    <script>
        
        var jq = jQuery.noConflict();
        

        jq(document).ready(function()
        {  
          jq('#brand').change(function()
          {  
               var brand_id = jq(this).val();  

               jq.ajax({  
                    url:"ADO/load_data.php",  
                    method:"POST",  
                    data:{brand_id:brand_id},  
                    success:function(data){  
                         jQuery('#show_product').html(data);  
                    }  
               });  
          });  
        });

</script>
</body>