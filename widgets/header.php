
<?php
    function getLogo(){
        echo "<div class='logo'>Belegui</div>";
    }
    function getHeader($user){
        echo"<header class='row sa'>";
        getLogo();
        if(isset($_GET['status'])){
            echo "<span class='superTostada show'>
                    ALV, este usuario no existe.
                 </span>";
            echo "<script>
                    setTimeout(function(){ document.querySelector('.superTostada').classList.remove('show'); }, 4500);
                </script>";
        }
        echo "<div id='menubtn'>Menu</div>";
        if(isset($user))
            echo "Bienvenido, " . $user . "</header>";
        else 
            echo "</header>";
        
    }
    /*
    function getHeaderL(){
        echo"<header class='col cs'>";
        getLogo();
        echo "</header>";
    }*/
?>