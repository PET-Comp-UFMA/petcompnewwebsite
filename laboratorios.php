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

function componentePopUp($idPopUp, $caminhoLogo, $titulo, $subtitulo, $descricao, $coordenadores = [])
{
?>
    <div id="<?= $idPopUp ?>" class="popup-overlay">
        <div class="popup-container">
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
        componenteCard("VIPLAB", "Laboratório de Engenharia de Software", "bg-vip", "assets/images/pag-labs/logo-viplab.png", "popUpVip");
        componenteCard("MODAL", "Laboratório de Engenharia de Software", "bg-modal", "assets/images/pag-labs/logo-modal.png", "popUpModal");
        componenteCard("LINT²", "Laboratório de Engenharia de Software", "bg-lint", "assets/svg/pag-labs/logo-lint.svg", "popUpLint");
        componenteCard("NCA", "Laboratório de Engenharia de Software", "bg-nca", "assets/images/pag-labs/logo-nca.png", "popUpNCA");
        componenteCard("LSDi", "Laboratório de Engenharia de Software", "bg-lsdi", "assets/images/pag-labs/logo-lsdi.png", "popUpLsdi");
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
        "assets/images/pag-labs/logo-dxt.png",
        "DEXTERS LAB",
        "Laboratório de Engenharia de Software",
        "O Laboratório de Engenharia de Software atua com pesquisas relacionadas ao processo de desenvolvimento de software com qualidade e inclusão de aspectos de interação humano-computador para aumentar a competitividade de produtos de software.",
        [
            [
                'foto' => 'assets/images/pag-labs/coord-dxt.png',
                'nome' => 'Prof. Dr. Luis Rivero',
                'cargo' => 'Coordenador do DXT Lab'
            ]
        ]
    );
    componentePopUp(
        "popUpDxt",
        "assets/images/pag-labs/logo-nca.png",
        "NCA",
        "Núcleo de Computação Aplicada",
        "O NCA é um espaço destinado à produção de desenvolvimento de tecnologias de ponta, agregando em um mesmo espaço as atividades de dois laboratórios - Labmint (Laboratório de Mídias Interativas) e Labpai (Laboratório de Processamento e Análise de Imagens) - que trabalham nas áreas de processamento de imagens, visão computacional, visualização e interação com dados complexos e sistemas de informações geográficas.",
        [
            [
                'foto' => 'assets/images/pag-labs/logo-inovtec.png',
                'nome' => 'Prof. Dr. Anselmo Cardoso Paiva',
                'cargo' => 'Coordenador do NCA'
            ]
        ]
    );
    componentePopUp(
        "popUpDxt",
        "assets/images/pag-labs/logo-nca.png",
        "NCA",
        "Núcleo de Computação Aplicada",
        "O NCA é um espaço destinado à produção de desenvolvimento de tecnologias de ponta, agregando em um mesmo espaço as atividades de dois laboratórios - Labmint (Laboratório de Mídias Interativas) e Labpai (Laboratório de Processamento e Análise de Imagens) - que trabalham nas áreas de processamento de imagens, visão computacional, visualização e interação com dados complexos e sistemas de informações geográficas.",
        [
            [
                'foto' => 'assets/images/pag-labs/logo-inovtec.png',
                'nome' => 'Prof. Dr. Anselmo Cardoso Paiva',
                'cargo' => 'Coordenador do NCA'
            ]
        ]
    );
    componentePopUp(
        "popUpDxt",
        "assets/images/pag-labs/logo-nca.png",
        "NCA",
        "Núcleo de Computação Aplicada",
        "O NCA é um espaço destinado à produção de desenvolvimento de tecnologias de ponta, agregando em um mesmo espaço as atividades de dois laboratórios - Labmint (Laboratório de Mídias Interativas) e Labpai (Laboratório de Processamento e Análise de Imagens) - que trabalham nas áreas de processamento de imagens, visão computacional, visualização e interação com dados complexos e sistemas de informações geográficas.",
        [
            [
                'foto' => 'assets/images/pag-labs/logo-inovtec.png',
                'nome' => 'Prof. Dr. Anselmo Cardoso Paiva',
                'cargo' => 'Coordenador do NCA'
            ]
        ]
    );
    componentePopUp(
        "popUpDxt",
        "assets/images/pag-labs/logo-nca.png",
        "NCA",
        "Núcleo de Computação Aplicada",
        "O NCA é um espaço destinado à produção de desenvolvimento de tecnologias de ponta, agregando em um mesmo espaço as atividades de dois laboratórios - Labmint (Laboratório de Mídias Interativas) e Labpai (Laboratório de Processamento e Análise de Imagens) - que trabalham nas áreas de processamento de imagens, visão computacional, visualização e interação com dados complexos e sistemas de informações geográficas.",
        [
            [
                'foto' => 'assets/images/pag-labs/logo-inovtec.png',
                'nome' => 'Prof. Dr. Anselmo Cardoso Paiva',
                'cargo' => 'Coordenador do NCA'
            ]
        ]
    );
    componentePopUp(
        "popUpDxt",
        "assets/images/pag-labs/logo-nca.png",
        "NCA",
        "Núcleo de Computação Aplicada",
        "O NCA é um espaço destinado à produção de desenvolvimento de tecnologias de ponta, agregando em um mesmo espaço as atividades de dois laboratórios - Labmint (Laboratório de Mídias Interativas) e Labpai (Laboratório de Processamento e Análise de Imagens) - que trabalham nas áreas de processamento de imagens, visão computacional, visualização e interação com dados complexos e sistemas de informações geográficas.",
        [
            [
                'foto' => 'assets/images/pag-labs/logo-inovtec.png',
                'nome' => 'Prof. Dr. Anselmo Cardoso Paiva',
                'cargo' => 'Coordenador do NCA'
            ]
        ]
    );
    componentePopUp(
        "popUpDxt",
        "assets/images/pag-labs/logo-nca.png",
        "NCA",
        "Núcleo de Computação Aplicada",
        "O NCA é um espaço destinado à produção de desenvolvimento de tecnologias de ponta, agregando em um mesmo espaço as atividades de dois laboratórios - Labmint (Laboratório de Mídias Interativas) e Labpai (Laboratório de Processamento e Análise de Imagens) - que trabalham nas áreas de processamento de imagens, visão computacional, visualização e interação com dados complexos e sistemas de informações geográficas.",
        [
            [
                'foto' => 'assets/images/pag-labs/logo-inovtec.png',
                'nome' => 'Prof. Dr. Anselmo Cardoso Paiva',
                'cargo' => 'Coordenador do NCA'
            ]
        ]
    );
    componentePopUp(
        "popUpDxt",
        "assets/images/pag-labs/logo-nca.png",
        "NCA",
        "Núcleo de Computação Aplicada",
        "O NCA é um espaço destinado à produção de desenvolvimento de tecnologias de ponta, agregando em um mesmo espaço as atividades de dois laboratórios - Labmint (Laboratório de Mídias Interativas) e Labpai (Laboratório de Processamento e Análise de Imagens) - que trabalham nas áreas de processamento de imagens, visão computacional, visualização e interação com dados complexos e sistemas de informações geográficas.",
        [
            [
                'foto' => 'assets/images/pag-labs/logo-inovtec.png',
                'nome' => 'Prof. Dr. Anselmo Cardoso Paiva',
                'cargo' => 'Coordenador do NCA'
            ]
        ]
    );
    componentePopUp(
        "popUpDxt",
        "assets/images/pag-labs/logo-nca.png",
        "NCA",
        "Núcleo de Computação Aplicada",
        "O NCA é um espaço destinado à produção de desenvolvimento de tecnologias de ponta, agregando em um mesmo espaço as atividades de dois laboratórios - Labmint (Laboratório de Mídias Interativas) e Labpai (Laboratório de Processamento e Análise de Imagens) - que trabalham nas áreas de processamento de imagens, visão computacional, visualização e interação com dados complexos e sistemas de informações geográficas.",
        [
            [
                'foto' => 'assets/images/pag-labs/logo-inovtec.png',
                'nome' => 'Prof. Dr. Anselmo Cardoso Paiva',
                'cargo' => 'Coordenador do NCA'
            ]
        ]
    );
    componentePopUp(
        "popUpDxt",
        "assets/images/pag-labs/logo-nca.png",
        "NCA",
        "Núcleo de Computação Aplicada",
        "O NCA é um espaço destinado à produção de desenvolvimento de tecnologias de ponta, agregando em um mesmo espaço as atividades de dois laboratórios - Labmint (Laboratório de Mídias Interativas) e Labpai (Laboratório de Processamento e Análise de Imagens) - que trabalham nas áreas de processamento de imagens, visão computacional, visualização e interação com dados complexos e sistemas de informações geográficas.",
        [
            [
                'foto' => 'assets/images/pag-labs/logo-inovtec.png',
                'nome' => 'Prof. Dr. Anselmo Cardoso Paiva',
                'cargo' => 'Coordenador do NCA'
            ]
        ]
    );
    componentePopUp(
        "popUpDxt",
        "assets/images/pag-labs/logo-nca.png",
        "NCA",
        "Núcleo de Computação Aplicada",
        "O NCA é um espaço destinado à produção de desenvolvimento de tecnologias de ponta, agregando em um mesmo espaço as atividades de dois laboratórios - Labmint (Laboratório de Mídias Interativas) e Labpai (Laboratório de Processamento e Análise de Imagens) - que trabalham nas áreas de processamento de imagens, visão computacional, visualização e interação com dados complexos e sistemas de informações geográficas.",
        [
            [
                'foto' => 'assets/images/pag-labs/logo-inovtec.png',
                'nome' => 'Prof. Dr. Anselmo Cardoso Paiva',
                'cargo' => 'Coordenador do NCA'
            ]
        ]
    );
    componentePopUp(
        "popUpDxt",
        "assets/images/pag-labs/logo-nca.png",
        "NCA",
        "Núcleo de Computação Aplicada",
        "O NCA é um espaço destinado à produção de desenvolvimento de tecnologias de ponta, agregando em um mesmo espaço as atividades de dois laboratórios - Labmint (Laboratório de Mídias Interativas) e Labpai (Laboratório de Processamento e Análise de Imagens) - que trabalham nas áreas de processamento de imagens, visão computacional, visualização e interação com dados complexos e sistemas de informações geográficas.",
        [
            [
                'foto' => 'assets/images/pag-labs/logo-inovtec.png',
                'nome' => 'Prof. Dr. Anselmo Cardoso Paiva',
                'cargo' => 'Coordenador do NCA'
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