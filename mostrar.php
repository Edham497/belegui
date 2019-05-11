<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    require_once '../ADO/Conexion.php';
    $con = Conexion::getConn();

    session_start();
    $id = $_SESSION['id'];
    $statement = $con->prepare("SELECT * FROM usuarios WHERE idUsuarios = :id");
    $statement->bindParam(":id",$_SESSION['id']);
    $statement->execute();

    $img = $statement->fetch(PDO::FETCH_ASSOC);
    ?>
		<tr>
			<td><img src="<?php print($img['imagen']); ?>" width="200"></td>
		</tr>
		<?php 
?>