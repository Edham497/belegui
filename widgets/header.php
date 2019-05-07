
<?php
    function getLogo(){
        echo "<div class='logo'>Belegui</div>";
    }
    function getHeader($user){
        echo"<header class='row sa'>";
        getLogo();
        if(isset($_GET['status'])){
            switch($_GET['status']){
                case "error":
                    $msg = "Usuario o Contraseña incorrecto";
                break;
                case "alreadyExist":
                    $msg = "El Usuario ya esta registrado";
                break;
            }
            echo "<span class='superTostada show'>".$msg."</span>";
        }
        echo "<div id='menubtn'>Menu</div>";
        //if(isset($user)) echo "Bienvenido, " . $user;
        echo "</header>";
        
    }
?>