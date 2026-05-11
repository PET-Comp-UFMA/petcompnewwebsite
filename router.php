<?php $root = trim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
?>
<base href="<?= $root ? "/$root/" : '/' ?>">

<?php
//$root = "petcomp-newwebsite";
//echo "root: " . $root . "<br>"; // imprime
# regex que aceita qualquer string caso seja precedida por '/'
# representa os parametros das paginas dinamicas.
# pode ser qualquer palavra pois a página que deve validar o parametro.
$param = "[/]?(\w*)";

$routes = [
    "$root/" => function () {
        require("index.php");
    },
    ($root ? "$root/sobre" : "sobre") => function () {
        require("sobre.php");
    },
    ($root ? "$root/laboratorios" : "laboratorios") => function () {
        require("laboratorios.php");
    },
    ($root ? "$root/mapa-ccet" : "mapa-ccet") => function () {
        require("mapa-ccet.php");
    },
    ($root ? "$root/monitoria" : "monitoria") => function () {
        require("monitoria.php");
    },
    ($root ? "$root/desenvolvimento" : "desenvolvimento") => function () {
        require("desenvolvimento.php");
    },
    ($root ? "$root/minicurso" : "minicurso") => function () {
        require("minicurso.php");
    },
    ($root ? "$root/revista" : "revista") => function () {
        require("revista.php");
    },
    ($root ? "$root/banners" : "banners") => function () {
        require("banners.php");
    },
    ($root ? "$root/noticias" : "noticias") => function () {
        require("noticias.php");
    },
    ($root ? "$root/publicacoes" : "publicacoes") => function () {
        require("publicacoes.php");
    },
    ($root ? "$root/biblioteca" : "biblioteca") => function () {
        require("biblioteca-petcomp-monitoria.php");
    },
    ($root ? "$root/podcast" : "podcast") => function () {
        require("podcast.php");
    },
    ($root ? "$root/eventos" : "eventos") => function () {
        require("eventos.php");
    },
    ($root ? "$root/repositorio-educacional" : "repositorio-educacional") => function () {
        require("biblioteca-petcomp-main.php");
    },
    ($root ? "$root/repositorio-educacional/jogos-computacionais" : "repositorio-educacional/jogos-computacionais") => function () {
        require("biblioteca-petcomp-jogos.php");
    },
    ($root ? "$root/repositorio-educacional/minicursos" : "repositorio-educacional/minicursos") => function () {
        require("biblioteca-petcomp-minicursos.php");
    },
    ($root ? "$root/repositorio-educacional/monitorias" : "repositorio-educacional/monitorias") => function () {
        require("biblioteca-petcomp-monitoria.php");
    },
    ($root ? "$root/repositorio-educacional/monitorias/materiais" : "repositorio-educacional/monitorias/materiais") => function () {
        require("biblioteca-petcomp-matpet.php");
    },
    ($root ? "$root/repositorio-educacional/monitorias/video-aula" : "repositorio-educacional/monitorias/video-aula") => function () {
        require("repositorio-monitorias.php");
    },
    ($root ? "$root/registros" : "registros") => function () {
        require("registros.php");
    },
    ($root ? "$root/noticias$param" : "noticias$param") => function ($id) {
        $_GET['id'] = $id;
        require("noticia.php");
    },
    ($root ? "$root/integrantes$param" : "integrantes$param") => function ($id) {
        $_GET['page'] = $id;
        require("integrantes.php");
    }
];

function route($path, $routes)
{
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
//echo "url: " . $path . "<br>";
route($path, $routes); // redirecionando a url pra rota correspondente
?>