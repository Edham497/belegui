
<?php
    function getLogo(){
        echo "<div class='logo'>Belegui</div>";
    }
    function getHeader($user){
        echo"<header class='row sa'>";
        getLogo();
        if(isset($user))
            echo "Bienvenido, " . $user . "</header>";
        else echo "</header>";
    }
    /*
    function getHeaderL(){
        echo"<header class='col cs'>";
        getLogo();
        echo "</header>";
    }*/
?>