<?php 
    $root = "/";
    # regex que aceita qualquer string caso seja precedida por '/'
    # representa os parametros das paginas dinamicas.
    # pode ser qualquer palavra pois a página que deve validar o parametro.
    $param = "[/]?(\w*)"; 

    $routes = [
        $root => function () { require("index.php"); },
        "sobre" => function () { require("sobre.php"); },
        "monitoria" => function () { require("monitoria.php"); },
        "desenvolvimento" => function () { require("desenvolvimento.php"); },
        "minicurso" => function () { require("minicurso.php"); },
        "revista" => function () { require("revista.php"); },
        "banners" => function () { require("banners.php"); },
        "noticias" => function () { require("noticias.php"); },
        "publicacoes" => function () { require("publicacoes.php"); },
        "biblioteca" => function () { require("biblioteca-petcomp-monitoria.php"); },
        "podcast" => function () { require("podcast.php"); },
        "eventos" => function () { require("eventos.php"); },
        "registros" => function () { require("registros.php"); },
        "noticias$param" => function ($id) {
            $_GET['id'] = $id;
            require("noticia.php");
        },
        "integrantes$param" => function ($id) { 
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