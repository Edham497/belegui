<?php

      session_start();
   

      require_once 'Conexion.php';
      require_once 'ADOPublicaciones.php';
      require_once '../Modelos/Publicacion.php';


      if(isset($_SESSION['id']) && $_SESSION['id'] && isset($_POST["publicacion_id"]))
      {
          $idPublicacion = $_POST["publicacion_id"];
          $idUsuario = $_SESSION['id'];
          ADOPublicaciones::likePublicacion($idPublicacion, $idUsuario);
      }
      else
      {
          echo "<script> alert('No haz iniciado sesión') </script>";
      }


     Publicacion::getPublicaciones(ADOPublicaciones::getAllPublicaciones());

 ?> 