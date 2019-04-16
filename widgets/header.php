
<?php
    function getLogo(){
        echo "<div class='logo'>Belegui</div>";
    }
    function getHeader($user){
        echo"<header class='row sa'>";
        getLogo();
        if(isset($_GET['status'])){
            if($_GET['status']=="error"){
            echo "<span class='superTostada show'>
                    Usuario Inexistente.
                 </span>";
            echo "<script>
                    setTimeout(function(){ document.querySelector('.superTostada').classList.remove('show'); }, 4500);
                </script>";
            }
            elseif($_GET['status']=="errorExist"){
                echo "<span class='superTostada show'>
                        El Usuario Existe.
                     </span>";
                echo "<script>
                        setTimeout(function(){ document.querySelector('.superTostada').classList.remove('show'); }, 4500);
                    </script>";
            }
        }
        echo "<div id='menubtn'>Menu</div>";
        if(isset($user))
            echo "Bienvenido, " . $user . "</header>";
        else 
            echo "</header>";
        
    }
?>