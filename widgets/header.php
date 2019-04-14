
<?php
    function getLogo(){
        echo "<div class='logo'>Belegui</div>";
    }
    function getHeader($user){
        echo"<header class='row sa'>";
        getLogo();
        echo "Bienvenido, " . $user . "</header>";
    }
    function getHeaderL(){
        echo"<header class='col cs'>";
        getLogo();
        echo "</header>";
    }
?>