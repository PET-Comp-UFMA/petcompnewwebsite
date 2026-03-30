<!DOCTYPE html>
<html lang="pt-br">

<?php
$title = "Laboratórios";
$cssFiles = ['css/laboratorios.css'];
include 'head.php';
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
        <div class="card">
            <div class="card-header">
                <div class="card-bg bg-dxt"></div>
                <img src="assets/images/pag-labs/logo-dxt.png" alt="Logo DEXTERS Lab" class="card-logo-img">
            </div>
            <div class="card-body">
                <h3 class="card-title">DEXTERS Lab</h3>
                <p class="card-text">Lorem ipsum dolor sit amet</p>
                <button class="btn-saiba-mais" onclick="abrirPopUp('popUpNCA')">Saiba mais</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-bg bg-vip"></div>
                <img src="assets/images/pag-labs/logo-viplab.png" alt="Logo Vip Lab" class="card-logo-img">
            </div>
            <div class="card-body">
                <h3 class="card-title">VIPLAB</h3>
                <p class="card-text">Lorem ipsum dolor sit amet</p>
                <button class="btn-saiba-mais">Saiba mais</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-bg bg-modal"></div>
                <img src="assets/images/pag-labs/logo-modal.png" alt="Logo Modal" class="card-logo-img">
            </div>
            <div class="card-body">
                <h3 class="card-title">MODAL</h3>
                <p class="card-text">Lorem ipsum dolor sit amet</p>
                <button class="btn-saiba-mais">Saiba mais</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-bg bg-lint"></div>
                <img src="assets/svg/pag-labs/logo-lint.svg" alt="Logo Lint" class="card-logo-img">
            </div>
            <div class="card-body">
                <h3 class="card-title">LINT²</h3>
                <p class="card-text">Lorem ipsum dolor sit amet</p>
                <button class="btn-saiba-mais">Saiba mais</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-bg bg-nca"></div>
                <img src="assets/images/pag-labs/logo-nca.png" alt="Logo NCA" class="card-logo-img">
            </div>
            <div class="card-body">
                <h3 class="card-title">NCA</h3>
                <p class="card-text">Lorem ipsum dolor sit amet</p>
                <button class="btn-saiba-mais" onclick="abrirPopUp('popUpNCA')">Saiba mais</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-bg bg-lsdi"></div>
                <img src="assets/images/pag-labs/logo-lsdi.png" alt="Logo LSDi" class="card-logo-img">
            </div>
            <div class="card-body">
                <h3 class="card-title">LSDi</h3>
                <p class="card-text">Lorem ipsum dolor sit amet</p>
                <button class="btn-saiba-mais">Saiba mais</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-bg bg-laws"></div>
                <img src="assets/images/pag-labs/logo-laws.png" alt="Logo LAWS" class="card-logo-img">
            </div>
            <div class="card-body">
                <h3 class="card-title">LAWS</h3>
                <p class="card-text">Lorem ipsum dolor sit amet</p>
                <button class="btn-saiba-mais">Saiba mais</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-bg bg-inovtec"></div>
                <img src="assets/images/pag-labs/logo-inovtec.png" alt="Logo INOVTEC" class="card-logo-img">
            </div>
            <div class="card-body">
                <h3 class="card-title">INOVTEC</h3>
                <p class="card-text">Lorem ipsum dolor sit amet</p>
                <button class="btn-saiba-mais">Saiba mais</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-bg bg-lacmor"></div>
                <img src="assets/images/pag-labs/logo-lacmor.png" alt="Logo LACMOR" class="card-logo-img">
            </div>
            <div class="card-body">
                <h3 class="card-title">LACMOR</h3>
                <p class="card-text">Lorem ipsum dolor sit amet</p>
                <button class="btn-saiba-mais">Saiba mais</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-bg bg-telemidia"></div>
                <img src="assets/images/pag-labs/logo-telemidia.png" alt="Logo TELEMÍDIA" class="card-logo-img">
            </div>
            <div class="card-body">
                <h3 class="card-title">TELEMÍDIA</h3>
                <p class="card-text">Lorem ipsum dolor sit amet</p>
                <button class="btn-saiba-mais">Saiba mais</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-bg bg-lidi"></div>
                <img src="assets/images/pag-labs/logo-lidi.png" alt="Logo LIDI" class="card-logo-img">
            </div>
            <div class="card-body">
                <h3 class="card-title">LIDI</h3>
                <p class="card-text">Lorem ipsum dolor sit amet</p>
                <button class="btn-saiba-mais">Saiba mais</button>
            </div>
        </div>
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