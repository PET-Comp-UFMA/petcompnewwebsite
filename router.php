<?php 
    $root = "petcomp-newwebsite";
    # regex que aceita qualquer string caso seja precedida por '/'
    # representa os parametros das paginas dinamicas.
    # pode ser qualquer palavra pois a página que deve validar o parametro.
    $param = "[/]?(\w*)"; 

    $routes = [
        $root => function () { require("index.php"); },
        "$root/sobre" => function () { require("sobre.php"); },
        "$root/sobre" => function () { require("sobre.php"); },
        "$root/monitoria" => function () { require("monitoria.php"); },
        "$root/desenvolvimento" => function () { require("desenvolvimento.php"); },
        "$root/minicurso" => function () { require("minicurso.php"); },
        "$root/revista" => function () { require("revista.php"); },
        "$root/banners" => function () { require("banners.php"); },
        "$root/noticias" => function () { require("noticias.php"); },
        "$root/publicacoes" => function () { require("publicacoes.php"); },
        "$root/biblioteca" => function () { require("biblioteca-petcomp-monitoria.php"); },
        "$root/podcast" => function () { require("podcast.php"); },
        "$root/eventos" => function () { require("eventos.php"); },
        "$root/registros" => function () { require("registros.php"); },
        "$root/noticias$param" => function ($id) {
            $_GET['id'] = $id;
            require("noticia.php");
        },
        "$root/integrantes$param" => function ($id) { 
            $_GET['page'] = $id;
            require("integrantes.php");
        }          
    ];

    function route($path, $routes){
        foreach ($routes as $pattern => $handler) {
            if (preg_match("#^$pattern$#", $path, $matches)) {
                // Remove o primeiro elemento (match completo)
                array_shift($matches);
                
                // Chama o handler com os parâmetros capturados
                call_user_func_array($handler, $matches);
                exit; // Importante para não continuar processando
            }
        }
        // Se nenhuma rota corresponder
        http_response_code(404);
        echo "Página não encontrada";
    }

    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); # extraindo url digitada
    $path = ltrim($path, '/'); // removendo '/' à esquerda
    route($path, $routes); // redirecionando a url pra rota correspondente
?>