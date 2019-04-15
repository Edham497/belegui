```php
    <!--Primeros includes-->
    <?php include "../../assets/head.html";?>
    <?php include "../../widgets/header.php";?>
    <?php include "../../widgets/menu.php";?>

    <?php
    //para "simplificar el royo"
        require_once "../../widgets/head.php";
        getHead("../../");
        require_once "../../widgets/header.php";
        session_start();
        getHeader($_SESSION['nombre']);
        require_once "../../widgets/menu.php";
        getMenu("../../");
    ?>
    
    <?php
        //Estas llamadas se sustituyeron por un cotrolador 
        require_once "../../Controladores/widgets/widgetRequires.php";
        prepararComponentes("../../");
    ?>
    
```