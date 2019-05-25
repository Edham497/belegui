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

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="main col cc">
	<h1 style="font-size: 53px">Blog</h1>

	
  <main class="container">

      <!-- Right Column -->
      <section class="item">
      	<div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
          
          <h1>Hector Luevano</h1>
		  <span>20 de Marzo 2019</span>
          <p>The preferred choice of a vast range of acclaimed DJs. Punchy, bass-focused sound and high isolation. Sturdy headband and on-ear cushions suitable for live performance</p>

          <img src="../Imagenes Productos/img11.jpg" style="width: 100%">
        </div>


        <!-- Product Pricing -->
        <div class="product-price">
        	<i class="fa fa-heart heart2"></i>
          	<a class="cart-btn2">12</a>
        </div>
      </div>
      </section>

      <!-- Right Column -->
      <section class="item">
      	<div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
          
          <h1>Hector Luevano</h1>
		  <span>20 de Marzo 2019</span>
          <p>The preferred choice of a vast range of acclaimed DJs. Punchy, bass-focused sound and high isolation. Sturdy headband and on-ear cushions suitable for live performance</p>

          <img src="../Imagenes Productos/img02.jpg" style="width: 100%">
        </div>


        <!-- Product Pricing -->
        <div class="product-price">
        	<i class="fa fa-heart-o"></i>
          	<a class="cart-btn">0</a>
        </div>
      </div>
      </section>

      <!-- Right Column -->
      <section class="item">
      	<div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
          
          <h1>Hector Luevano</h1>
		  <span>20 de Marzo 2019</span>
          <p>The preferred choice of a vast range of acclaimed DJs. Punchy, bass-focused sound and high isolation. Sturdy headband and on-ear cushions suitable for live performance</p>

          <img src="../Imagenes Productos/img11.jpg" style="width: 100%">
        </div>


        <!-- Product Pricing -->
        <div class="product-price">
        	<i class="fa fa-heart-o"></i>
          	<a class="cart-btn">2</a>
        </div>
      </div>
      </section>

      <!-- Right Column -->
      <section class="item">
      	<div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
          
          <h1>Hector Luevano</h1>
		  <span>20 de Marzo 2019</span>
          <p>The preferred choice of a vast range of acclaimed DJs. Punchy, bass-focused sound and high isolation. Sturdy headband and on-ear cushions suitable for live performance</p>

          <img src="../Imagenes Productos/img11.jpg" style="width: 100%">
        </div>


        <!-- Product Pricing -->
        <div class="product-price">
        	<i class="fa fa-heart-o"></i>
          	<a class="cart-btn">123</a>
        </div>
      </div>
      </section>
      
    </main>

</div>