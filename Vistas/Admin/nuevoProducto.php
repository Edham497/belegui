<body>
    <div class="main col sc fixFlow">
        <h1 style="font-size: 2.5em; flex:0; padding:25px;">Agregar Producto</h1>
        
        <form action="../../Publicaciones/subirCatalogo.php" method='post' enctype='multipart/form-data' class="form_Productos">
            <label for="nombre">Nombre del Producto</label>
            <input class="txt_box" id="nombre" type="text" name="nombre" placeholder="Nombre">
            <label for="precio">Precio del Producto</label>
            <input class="txt_box" id ="precio" type="number" name="precio" placeholder="Precio">
            <label for="color">Color del Producto</label>
            <select class="sp_box" id="color" name="color">
                <option value="0">Elige un color</option>
                <option value="Azul">Azul</option>
                <option value="Rojo">Rojo</option>
                <option value="Verde">Verde</option>
            </select>
            <label for="cat">Categoria del Producto</label>
            <select class="sp_box" id="cat" name="cat">
                <option value="0">Elige categoria</option>
                <option value="1">Vestidos</option>
                <option value="2">Zapatos</option>
                <option value="3">Otros</option>
            </select>
            
            <label for="desc">Descripcion del Producto</label>
            <textarea class="txt_area" id="desc" name="texto" placeholder="Descripcion"></textarea> 
            <label for="arch">Imagen del producto:</label>
            <input id="arch" type="file" name="imagen">
            <button type="submit" class="boton centerV">Agregar</button>         
        </form>
    </div>
</body>
