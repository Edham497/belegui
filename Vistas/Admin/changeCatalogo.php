<body>
    <div class="main col cc fixFlow">
        <h1 style="margin-left: 9%; font-size: 53px">Catálogo</h1>
        <?php 
            if(isset($_GET['id']) && $_GET['id']){
                echo "<form action='../../Publicaciones/editarCatalogo.php?id=".$_GET['id']."' method='post' enctype='multipart/form-data'>";
            }else{
                echo "<form action='../../Publicaciones/subirCatalogo.php?id=".$_GET['id']."' method='post' enctype='multipart/form-data'>";
            }
        ?>
            <table>
                <tr>
                    <td>
                        <input class = "txt_box" type="text" name="nombre" placeholder="Nombre del producto">
                        <input class = "txt_box" type="text" name="precio" placeholder="precio producto">
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
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea cols="70" rows="4" name="texto" placeholder="Descripcion"></textarea> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>imagen del producto:</p>
                        <input class = "boton centerV" type="file" name="imagen" style="width:60%">
                        <button type="submit" class="boton centerV">publicar</button> 
                    </td>
                </tr>
            </table>
        </form>
        
    </div>
    
</body>