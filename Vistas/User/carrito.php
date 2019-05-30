<link href="css/carrito.css" rel="stylesheet">
<body>

    <div class="main col sc">
         
            <?php
                require_once 'ADO/mostrarCarrito.php';
            ?>
            <div class="blank"></div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   
<script>
        //AGREGAR AL CARRITO    
        var jq = jQuery.noConflict();

        jq(document).ready(function()
        {  
          jq('body').on('click', '.cart-items div div button', function()
          {  
               var id = jq(this).attr('value');
               

               if(id)
               {
                    jq.ajax({  
                        url:"ADO/removeItem.php",  
                        method:"POST",  
                        data:{id:id},  
                        success:function(data){  
                             jQuery('.main').html(data);  
                        }  
                   });  
               }
               
          });  
        });

        jq(document).ready(function()
        {  
          jq('#btnPedido').click(function()
          {  
                produto_id = true;
               jq.ajax({  
                    url:"ADO/hacerPedido.php",  
                    method:"POST",  
                    data:{produto_id:produto_id},  
                    success:function(data){  
                        jQuery('.blank').html(data);  
                    }  
               });  
          });  
        });


</script>

