<?php
	// remove the item from the array
	unset($_SESSION['cart']);
    session_start();
    session_destroy();
    header("Location:../../");
?>