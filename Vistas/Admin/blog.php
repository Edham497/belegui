<style type="text/css">
	

.container {
  max-width: 1200px;
  display: inline-block;
  width: 40%;
  height: 40%;
  margin-top: 20px;
  padding: 20px;

}

/* Columns */


.right-column {
  background: white;
  padding-top: 25px;
  
}

.item{
	margin-bottom:40px;
}

/* Right Column */

/* Product Description */
.product-description {
  margin-bottom: 20px;
}
.product-description span {
  font-size: 10px;
  color: #358ED7;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
  padding-left: 20px;
}
.product-description h1 {
  font-weight: 300;
  font-size: 32px;
  color: #43484D;
  letter-spacing: -2px;
  padding-left : 20px;
  font-weight: bold;
}
.product-description p {
  font-size: 16px;
  font-weight: 300;
  color: #86939E;
  margin-top: 10px;
  margin-bottom: 10px;
  line-height: 24px;
  padding-left : 20px;
  padding-right : 20px;
}

/* Product Configuration */
.product-color span,
.cable-config span {
  font-size: 14px;
  font-weight: 400;
  color: #86939E;
  margin-bottom: 20px;
  display: inline-block;
}

/* Product Color */
.product-color {
  margin-bottom: 30px;
}


/* Product Price */
.product-price {
  display: inline-block;
  align-items: center;
  margin-left: 30px;
  margin-bottom: 30px;
  transition: all .5s;
  cursor: pointer;
}

.product-price i {
  font-size: 20px;
  color: black;
  margin-right: 10px;
  
  
}

.cart-btn {
  display: inline-block;
  background-color: white;
  font-size: 16px;
  color: #000;
  text-decoration: none;
  transition: all .5s;
  
}

.product-price i.heart2 {
  font-size: 20px;
  color: red;
  margin-right: 10px;
  
}

.cart-btn2 {
  display: inline-block;
  background-color: white;
  font-size: 16px;
  color: red;
  text-decoration: none;
  transition: all .5s;
  
}


/* Responsive */
@media (max-width: 940px) {
  .container {
    flex-direction: column;
    margin-top: 60px;
     width: 100%;
  }

  .left-column,
  .right-column {
    width: 100%;
  }

  .left-column img {
    width: 300px;
    right: 0;
    top: -65px;
    left: initial;
  }
}

@media (max-width: 535px) {
  .left-column img {
    width: 220px;
    top: -85px;
  }
}

.crearPublicacion{
  width: 100%;
  max-width: 600px;
  padding: 30px 0;
}

.crearPublicacion form{
  display: grid;
  grid-template-columns:auto;
  border:solid 1px gray;
}
.inputs{
  display:grid;
  grid-template-columns:auto 50px;
  grid-template-rows:50px;
}
.upload{
  position:relative;
}

.upload::after{
  content:"";
  position:absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background:white;
  z-index:10;
  transition:.25s ease-in-out;
}
.upload:hover::after, .botonSimple:hover{
  background:#666;
  color:white;
}
.upload::before{
  content:"";top:0;
  left:0;
  position:absolute;
  width:100%;
  height:100%;
  background:url("../../img/add_img_md.png");
  z-index:50;
}

.txt_area{
  padding:1em;
  border:none;
  border-bottom:solid 1px gray;
}

.botonSimple{
  font-size:1.125em;
  width: 100%;
  background:white;
  border:none;
  cursor: pointer;
  transition: .5s;
  border-right:solid 1px gray;
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="main col cc">
	<h1 style="font-size: 53px">Blog</h1>
  <div class="crearPublicacion">
      <form action="../../Publicaciones/subirBlog.php" method="post" enctype="multipart/form-data">
        <textarea class="txt_area" name="texto" placeholder="Escribe algo..."></textarea>
        <div class="inputs">
          <input class = "botonSimple" type="submit" value="Publicar">
          <input class = "upload" type="file" name="imagen">
        </div>
      </form>
  </div>
  
  <main class="container">
      <h1 style="font-size: 33px; text-align:center;">Publicaciones Recientes</h1>
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