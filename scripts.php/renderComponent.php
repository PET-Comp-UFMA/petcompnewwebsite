<?php
function renderComponent($component, $data = []) {
    $path = __DIR__ . "/../components/$component";

    extract($data);
    include $path; 
}
?>