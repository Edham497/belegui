<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<body>
    <div class="main col sc">
        <h1 style="margin-left: 9%; font-size: 53px">Catálogo</h1>
        <br>
        <div class="boton top-bottom" id="newProd" style="width:85%;">agregarProducto</div>
        <script>
            document.getElementById("newProd").addEventListener('click',function(){
                redir("/agregar_producto.php");
            });
        </script>
        <nav style="margin-left: 9%" class="product-filter">
            <!--Boton para dar de Alta -->
            
            <!-- Filtro -->
            <div class="sort" >
                <form class="collection-sort">
                    <label>Categorías:</label>
                    <select name="brand" id="brand" style="padding:5px; font-size:16px">
                        <option value="0">Todos los productos</option>
                        <?php
                            require_once 'ADO/Conexion.php';
                            require_once 'ADO/ADOProductos.php';
                            require_once 'Modelos/Producto.php';
                            


                            $statement = ADOProductos::getCategorias();

                            while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                echo '<option value="' .$row["idCategorias"]. '">' .$row["categoria"]. '</option>';
                        ?>
                    </select>
                </form>
            </div>
        </nav>
    
        <section class="products" id="show_product">
            <?php Producto::getProductosAdmin(ADOProductos::getAllProducts());?>   
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