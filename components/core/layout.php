<!DOCTYPE html>
<html lang="pt-br">

<?php
$title = $pageTitle;
$cssFiles = $componentController->getCssDependencies();
$jsFiles = $componentController->getJsDependencies();
include __DIR__ . '/../../head.php';
?>

<?= $body ?>

</html>