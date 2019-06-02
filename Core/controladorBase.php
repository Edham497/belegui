<?php 
foreach(glob("assets/*.html") as $file)
    require_once $file;
?>