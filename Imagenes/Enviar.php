<?php        
    //archivo temporal
    $tmp_name = $_FILES["archivo"]["tmp_name"];
    //datos de la imagen
    $tamano = $_FILES["archivo"]['size'];
    $tipo = $_FILES["archivo"]['type'];
    $nombre = $_FILES["archivo"]["name"];
    //ruta completa
    $archivo_temporal = $_FILES['archivo']['tmp_name'];
    //leer el archivo
    $fp = fopen($archivo_temporal, 'r+b');
    $data = fread($fp, filesize($archivo_temporal));
    ob_end_clean();
    ob_start();
    
    echo $data;
    
    header("Content-Type: image/jpeg");
    header("Content-Disposition: inline; filename='imagen.jpg'");
    header('Expires: 0');
    header('Pragma: cache');
    header('Cache-Control: private');
    ob_end_flush();

    //$data = mysql_escape_string($data);
    fclose($fp);
?>