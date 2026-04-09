<!DOCTYPE html>
<html lang="pt-br">

<?php
$title = "Laboratórios";
$cssFiles = ['css/laboratorios.css'];
include 'head.php';

function componenteCard($titulo, $subtitulo, $Cor, $Logo, $idPopUp)
{
?>
    <div class="card">
        <div class="card-header">
            <div class="card-bg <?= $Cor ?>"></div>
            <img src="<?= $Logo ?>" alt="Logo <?= $titulo ?>" class="card-logo-img">
        </div>
        <div class="card-body">
            <h3 class="card-title"><?= $titulo ?></h3>
            <p class="card-text"><?= $subtitulo ?></p>
            <button class="btn-saiba-mais" onclick="abrirPopUp('<?= $idPopUp ?>')">Saiba mais</button>
        </div>
    </div>
<?php
}

function componentePopUp($idPopUp, $cor, $caminhoLogo, $titulo, $subtitulo, $descricao, $coordenadores = [])
{
?>
    <div id="<?= $idPopUp ?>" class="popup-overlay">
        <div class="popup-container" style="background: linear-gradient(180deg, <?= $cor ?> 0%, #ffffff 25%);">
            <span class="close-btn" onclick="fecharPopUp('<?= $idPopUp ?>')">&times;</span>

            <div class="popup-header">
                <img src="<?= $caminhoLogo ?>" alt="Logo <?= $titulo ?>" class="popup-logo">
                <h2><?= $titulo ?></h2>
                <h3><?= $subtitulo ?></h3>
            </div>
            <div class="popup-body">
                <p><?= $descricao ?></p>
                <div class="popup-footer">
                    <?php foreach ($coordenadores as $coord): ?>
                        <div class="coordenador">
                            <img src="<?= $coord['foto'] ?>" alt="Foto <?= $coord['nome'] ?>" class="prof-img">
                            <h4><?= $coord['nome'] ?></h4>
                            <span><?= $coord['cargo'] ?></span>
                            <div class="links">
                                <h5><a href="<?= $coord['email'] ?>" style="color: <?= $cor ?>;">E-mail</a></h5>
                                <h5><a href="<?= $coord['lattes'] ?>" style="color: <?= $cor ?>;">Lattes</a></h5>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
<?php
}

?>

<body>
    <?php include 'header.php'; ?>

    <div class="container-header">
        <h2>Laboratórios</h2>
        <h3>Confira os laboratórios do curso</h3>
        <h4><a href="index.php">Página Inicial</a></h4>
        <h4> → Laboratórios</h4>
    </div>

    <div class="container-body">
        <p>
            Os laboratórios de Ciência da Computação e Inteligência Artificial da UFMA (CCET) formam um ecossistema integrado e colaborativo focado em inovação tecnológica e na resolução de problemas complexos. Em vez de atuarem isoladamente, esses espaços se complementam em pesquisas de ponta que envolvem Inteligência Artificial, aprendizado de máquina e visão computacional (com aplicações médicas e em dados geográficos); engenharia de software e interação humano-computador; além de sistemas web avançados, computação pervasiva, mídias interativas, TV digital e jogos. Funcionando como verdadeiros centros de formação, esses laboratórios mantêm as portas abertas para os alunos, que podem ingressar em projetos de pesquisa bastando entrar em contato direto e conversar com os professores responsáveis.
        </p>
    </div>

    <div class="grid-container">
        <?php
        componenteCard("DEXTERS Lab", "Laboratório de Engenharia de Software", "bg-dxt", "assets/images/pag-labs/logo-dxt.png", "popUpDxt");
        componenteCard("VIPLAB", "Laboratório de Visão e Processamento de Imagens", "bg-vip", "assets/images/pag-labs/logo-viplab.png", "popUpVip");
        componenteCard("MODAL", "Laboratório de Modelagem Matemática e Algoritmos", "bg-modal", "assets/images/pag-labs/logo-modal.png", "popUpModal");
        componenteCard("LINT²", "Laboratório de Inteligência Interativa", "bg-lint", "assets/svg/pag-labs/logo-lint.svg", "popUpLint");
        componenteCard("NCA", "Núcleo de Computação Aplicada", "bg-nca", "assets/images/pag-labs/logo-nca.png", "popUpNCA");
        componenteCard("LSDi", "Laboratório de Sistemas Distribuídos Inteligentes", "bg-lsdi", "assets/images/pag-labs/logo-lsdi.png", "popUpLsdi");
        componenteCard("LAWS", "Laboratório de Engenharia de Software", "bg-laws", "assets/images/pag-labs/logo-laws.png", "popUpLaws");
        componenteCard("INOVTEC", "Laboratório de Engenharia de Software", "bg-inovtec", "assets/images/pag-labs/logo-inovtec.png", "popUpInovtec");
        componenteCard("LACMOR", "Laboratório de Engenharia de Software", "bg-dxt", "assets/images/pag-labs/logo-lacmor.png", "popUpLacmor");
        componenteCard("TELEMÍDIA", "Laboratório de Engenharia de Software", "bg-telemidia", "assets/images/pag-labs/logo-telemidia.png", "popUpTelemidia");
        componenteCard("LIDI", "Laboratório de Engenharia de Software", "bg-lidi", "assets/images/pag-labs/logo-lidi.png", "popUpLidi");
        ?>
    </div>

    <?php // AINDA FALTA FAZER O CARROSSEL DEPOIS
    componentePopUp(
        "popUpDxt",
        "#ABF3FF",
        "assets/images/pag-labs/logo-dxt.png",
        "DEXTERS LAB",
        "Laboratório de Engenharia de Software",
        "O Laboratório de Engenharia de Software atua com pesquisas relacionadas ao processo de desenvolvimento de software com qualidade e inclusão de aspectos de interação humano-computador para aumentar a competitividade de produtos de software.",
        [
            [
                'foto' => 'assets/images/pag-labs/coord-dxt.jpeg',
                'nome' => 'Prof. Dr. Luis Rivero',
                'cargo' => 'Coordenador do DXT Lab',
                'email' => 'mailto:luis.rivero@ufma.br',
                'lattes' => 'http://lattes.cnpq.br/8534667641706692'
            ]
        ]
    );

    componentePopUp(
        "popUpVip",
        "#B8DB87",
        "assets/images/pag-labs/logo-viplab.png",
        "VIPLAB",
        "Vision and Image Processing Lab",
        "O Vision and Image Processing Lab (Laboratório de Visão e Processamento de Imagens) - VIPLab - é um dos laboratórios vinculados ao Núcleo de Computação Aplicada (NCA). O laboratório desenvolve pesquisas nas áreas de algoritmos de aprendizado profundo aplicados a problemas médicos e ciência de dados.",
        [
            [
                'foto' => 'assets/images/pag-labs/coord-vip1.jpeg',
                'nome' => 'Prof. Dr. Geraldo Braz Júnior',
                'cargo' => 'Coordenador do VIPLab',
                'email' => 'mailto:geraldo@nca.ufma.br',
                'lattes' => 'http://lattes.cnpq.br/8287861610873629'
            ],
            [
                'foto' => 'assets/images/pag-labs/coord_vip2.jpeg',
                'nome' => 'Prof. Dr. João Dallyson',
                'cargo' => 'Coordenador do VIPLab',
                'email' => 'mailto:joao.dallyson@ufma.br',
                'lattes' => 'http://lattes.cnpq.br/6047330108382641'
            ]
        ]
    );

    componentePopUp(
        "popUpModal",
        "#D28B8B",
        "assets/images/pag-labs/logo-modal.png",
        "MODAL",
        "Laboratório de Modelagem Matemática e Algoritmos",
        "O Laboratório de Modelagem Matemática e Algoritmos é voltado para o estudo, desenvolvimento e aplicações de modelos matemáticos que possam representar fenômenos do mundo real, com a implementação de algoritmos que resolvem ou aproximam as soluções desses modelos.",
        [
            [
                'foto' => 'assets/images/pag-labs/coord-modal.jpeg',
                'nome' => 'Prof. Dr. Francisco Glaubos',
                'cargo' => 'Coordenador do MODAL',
                'email' => 'mailto:francisco.glaubos@ufma.br',
                'lattes' => 'http://lattes.cnpq.br/1711180190759554'
            ]
        ]
    );

    componentePopUp(
        "popUpLint",
        "#BDE2D0",
        "assets/svg/pag-labs/logo-lint.svg",
        "LINT²",
        "Laboratório de Inteligência Interativa",
        "O laboratório de Inteligência Interativa atua nas áreas de Inteligência Artificial, Ciência de Dados, Jogos Digitais, entre outras atuações.",
        [
            [
                'foto' => 'assets/images/pag-labs/coord-lint.jpeg',
                'nome' => 'Prof. Dr. Tiago Bonini Borchartt',
                'cargo' => 'Coordenador do LINT²',
                'email' => 'mailto:tiago.bonini@ufma.br',
                'lattes' => 'http://lattes.cnpq.br/2352727269839328'
            ]
        ]
    );

    componentePopUp(
        "popUpNCA",
        "#D2C0DA",
        "assets/images/pag-labs/logo-nca.png",
        "NCA",
        "Núcleo de Computação Aplicada",
        "O NCA é um espaço destinado à produção e desenvolvimento de tecnologias de ponta, agregando em um mesmo espaço as atividades de dois laboratórios (LABMINT e LABPAI) que trabalham nas áreas de processamento de imagens, visão computacional, visualização e interação com dados complexos e sistemas de informações geográficos.",
        [
            [
                'foto' => 'assets/images/pag-labs/coord-nca.jpeg',
                'nome' => 'Prof. Dr. Anselmo Cardoso de Paiva',
                'cargo' => 'Coordenador do NCA',
                'email' => 'mailto:anselmo.paiva@ufma.br',
                'lattes' => 'http://lattes.cnpq.br/6446831084215512'
            ]
        ]
    );

    componentePopUp(
        "popUpLsdi",
        "#ABD6DE",
        "assets/images/pag-labs/logo-lsdi.png",
        "LSDi",
        "Laboratório de Sistemas Distribuídos Inteligentes",
        "O LSDi tem como principal linha de pesquisa a área de sistemas distribuídos, com ênfase em sistemas de computação móvel e pervasiva que combinam com o uso de inteligência computacional.",
        [
            [
                'foto' => 'assets/images/pag-labs/coord-lsdi.jpeg',
                'nome' => 'Prof. Dr. Francisco José da Silva e Silva',
                'cargo' => 'Coordenador do LSDi',
                'email' => 'mailto:francisco.silva@ufma.br',
                'lattes' => 'http://lattes.cnpq.br/0770343284012942'
            ]
        ]
    );
    ?>

    <?php include 'footer.php'; ?>

    <script>
        function abrirPopUp(idPopUp) {
            const popUp = document.getElementById(idPopUp);
            popUp.style.display = 'flex';
        }

        function fecharPopUp(idPopUp) {
            const popUp = document.getElementById(idPopUp);
            popUp.style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target.classList.contains('popup-overlay')) {
                popUp.style.display = 'none';
            }
        }
    </script>

</body>

</html>