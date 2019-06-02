<link href="css/carrito.css" rel="stylesheet">
<style type="text/css">
    
.generar_repo
{
    transition: 0.3s ease-in-out;
}

.generar_repo:hover{
    color:red;
}

.cart-item-image{
border-radius: 50px;
}

</style>
<body>

    <div class="main col sc">
         

        <?php
            require_once 'ADO/mostrarPedidosUsuarios.php';
        ?>
        <div class="blank"></div>
    </div>
</body>
