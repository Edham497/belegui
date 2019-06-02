<link href="css/blog.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="main col cc">
	<h1 style="font-size: 53px">Blog</h1>

	
  <main class="container">

      <?php

		    require_once 'ADO/Conexion.php';
        require_once 'ADO/ADOPublicaciones.php';
        require_once 'Modelos/Publicacion.php';

        Publicacion::getPublicaciones(ADOPublicaciones::getAllPublicaciones());

      ?>
      
    </main>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <script>
        
        //DAR LICK    
        var jq = jQuery.noConflict();

        
        jq(document).ready(function()
        {  
          jq('body').on('click', '.container div div', function()
          {  
               var publicacion_id = jq(this).attr('name');
               
               if(publicacion_id)
               {
	               	jq.ajax({  
	                    url:"ADO/dar_like.php",  
	                    method:"POST",  
	                    data:{publicacion_id:publicacion_id},  
	                    success:function(data){  
	                         jQuery('.container').html(data);  
	                    }  
	               });  
               }
               
          });  
        });

	</script>

</div>