<body>
    <div class="main col cc fixFlow">
        <h1 style="margin-left: 9%; font-size: 53px">Catálogo</h1>
        <?php
            if(isset($_GET['id'])){
                require_once "../../ADO/ADOProductos.php";
                require_once "../../ADO/Conexion.php";
                $prod = ADOProductos::getProductById($_GET['id']);
                $action = "../../Publicaciones/editarCatalogo.php?id=".$_GET['id'];
            }
             else
                $action = "../../Publicaciones/subirCatalogo.php?id=".$_GET['id'];
        ?>
        <form action="<?php echo $action?>" method='post' enctype='multipart/form-data'>
            <input class = "txt_box" type="text" name="nombre" placeholder="Nombre del producto" value="<?php echo $prod['nombre'];?>">
            <input class = "txt_box" type="text" name="precio" placeholder="precio producto" value="<?php echo $prod['precio'];?>">
            <select name="color" id="">
                <option value="0">Elige un color</option>
                <option value="Azul">Azul</option>
                <option value="Rojo">Rojo</option>
                <option value="Verde">Verde</option>
            </select>
            <select name="cat" id="">
                <option value="0">Elige categoria</option>
                <option value="1">Vestidos</option>
                <option value="2">Zapatos</option>
                <option value="3">Otros</option>
            </select>
            <textarea cols="70" rows="4" name="texto" placeholder="Descripcion"><?php echo $prod['nombre'];?></textarea> 
            <p>imagen del producto:</p>
            <input class = "boton centerV" type="file" name="imagen" style="width:60%">
            <button type="submit" class="boton centerV">publicar</button>         
        </form>
    </div>
</body>