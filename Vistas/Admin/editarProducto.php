
<?php 
if(isset($_GET['idProducto'])){
    require_once "ADO/ADOProductos.php";
    require_once "ADO/Conexion.php";
    $prod = ADOProductos::getProductById($_GET['idProducto']);
}
?>
<body>
    <div class="main col sc fixFlow">
        <h1 style="font-size: 2.5em; flex:0; padding:25px;">Editar Producto</h1>
        
        <form action="Publicaciones/editarCatalogo.php?id=<?php echo $_GET['idProducto'];?>" method='post' enctype='multipart/form-data' class="form_Productos">
            <label for="nombre">Nombre del Producto</label>
            <input required class="txt_box" id="nombre" type="text" name="nombre" placeholder="Nombre" value="<?php echo $prod['nombre'];?>">
            <label for="precio">Precio del Producto</label>
            <input required class="txt_box" id ="precio" type="number" name="precio" placeholder="Precio" value="<?php echo $prod['precio'];?>">
            <label for="color">Color del Producto</label>
            <select required class="sp_box" id="color" name="color">
                <optgroup label="Actual">
                    <option value="<?php echo $prod['color'];?>"><?php echo $prod['color'];?></option>
                </optgroup>
                <optgroup label="Disponible">
                    <option value="Azul">Azul</option>
                    <option value="Rojo">Rojo</option>
                    <option value="Verde">Verde</option>
                </optgroup>
            </select>
            <label for="cat">Categoria del Producto</label>
            <select required class="sp_box" id="cat" name="cat">
                <optgroup label="Actual">
                    <option value="<?php echo $prod['idCategoria'];?>"><?php echo $prod['categoria'];?></option>
                </optgroup>
                <optgroup label="Elige categoria">
                    <option value="1">Vestidos</option>
                    <option value="2">Zapatos</option>
                    <option value="3">Otros</option>
                </optgroup>
            </select>
            
            <label for="texto">Descripcion del Producto</label>
            <textarea required class="txt_area" id="texto" name="texto" placeholder="Descripcion"><?php echo $prod['descripcion']?></textarea> 
            <label for="arch">Imagen del producto:</label>
            <input required id="arch" type="file" name="imagen">
            <button type="submit" class="boton centerV">MODIFICAR</button>         
        </form>
        <div type="submit" class="boton centerV bg_red" style="text-align:center">ELIMINAR PRODUCTO</div>
    </div>
</body>
