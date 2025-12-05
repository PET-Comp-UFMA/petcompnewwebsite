<?php 
    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    $path = ltrim($path, '/');
    
    switch ($path){
        case "petcompnewwebsite/":
            break;
        case "petcompnewwebsite/integrantes":
            require("integrantes.php");
    }
?>