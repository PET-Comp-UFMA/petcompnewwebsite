<?php 

require_once __DIR__ . '/componentController.php';

function renderPage(string $viewFile, string $pageTitle): void{
    $componentController = new ComponentController();

    

    ob_start();
    include $viewFile;
    $body = ob_get_clean();

    include 'layout.php';
}

?>