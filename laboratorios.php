<!DOCTYPE html>
<html lang="pt-br">

<?php
$title = "Laboratórios";
$cssFiles = ['css/laboratorios.css'];
include 'head.php';

function componenteCard($titulo, $Cor, $Logo, $idPopUp)
{
?>
    <div class="card">
        <div class="card-header">
            <div class="card-bg <?= $Cor ?>"></div>
            <img src="<?= $Logo ?>" alt="Logo <?= $titulo ?>" class="card-logo-img">
        </div>
        <div class="card-body">
            <h3 class="card-title"><?= $titulo ?></h3>
            <p class="card-text">Lorem ipsum dolor sit amet</p>
            <button class="btn-saiba-mais" onclick="abrirPopUp('<?= $idPopUp ?>')">Saiba mais</button>
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
        componenteCard("DEXTERS Lab", "bg-dxt", "assets/images/pag-labs/logo-dxt.png", "popUpDxt");
        componenteCard("VIPLAB", "bg-vip", "assets/images/pag-labs/logo-viplab.png", "popUpVip");
        componenteCard("MODAL", "bg-modal", "assets/images/pag-labs/logo-modal.png", "popUpModal");
        componenteCard("LINT²", "bg-lint", "assets/svg/pag-labs/logo-lint.svg", "popUpLint");
        componenteCard("NCA", "bg-nca", "assets/images/pag-labs/logo-nca.png", "popUpNCA");
        componenteCard("LSDi", "bg-lsdi", "assets/images/pag-labs/logo-lsdi.png", "popUpLsdi");
        componenteCard("LAWS", "bg-laws", "assets/images/pag-labs/logo-laws.png", "popUpLaws");
        componenteCard("INOVTEC", "bg-inovtec", "assets/images/pag-labs/logo-inovtec.png", "popUpInovtec");
        componenteCard("LACMOR", "bg-dxt", "assets/images/pag-labs/logo-lacmor.png", "popUpLacmor");
        componenteCard("TELEMÍDIA", "bg-telemidia", "assets/images/pag-labs/logo-telemidia.png", "popUpTelemidia");
        componenteCard("LIDI", "bg-lidi", "assets/images/pag-labs/logo-lidi.png", "popUpLidi");
        ?>
    </div>

    <div id="popUpNCA" class="popup-overlay">
        <div class="popup-container">
            <span class="close-btn" onclick="fecharPopUp('popUpNCA')">&times;</span>

            <div class="popup-header">
                <img src="assets/images/pag-labs/logo-nca.png" alt="Logo NCA" class="popup-logo">
                <h2>NCA</h2>
                <h3>Núcleo de Computação Aplicada</h3>
            </div>
            <div class="popup-body">
                <p>O NCA é um espaço destinado à produção de desenvolvimento de tecnologias de ponta, agregando em um mesmo espaço as atividades de dois laboratórios - Labmint (Laboratório de Mídias Interativas) e Labpai (Laboratório de Processamento e Análise de Imagens) - que trabalham nas áreas de processamento de imagens, visão computacional, visualização e interação com dados complexos e sistemas de informações geográficas.</p>
                <!-- js -->
                <div class="popup-footer">
                    <div class="coordenador">
                        <img src="assets/images/pag-labs/logo-inovtec.png" alt="Foto Anselmo" class="prof-img">
                        <h4>Prof. Dr. Anselmo Cardoso Paiva</h4>
                        <span>Coordenador do NCA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

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