<!DOCTYPE html>
<html lang="pt-BR">


<?php 
    $title = "PETComp";
    $cssFiles = ['css/fab-de-software.css'];
    $jsFiles = ['js/swiper.js'];
    include "head.php";
?>


<body>
  <?php include('header.php') ?>
    <div class="container-header">
        <h2>Fábrica de software</h2>
        <h3>Engenharia de Software no PETComp</h3>
        <h4><a href="index.php">Página Inicial</a></h4>
        <h4> → Projetos</h4>
        <h4> → Fáb.Software</h4>
    </div>

    <div class="container-body">
        <p>A Engenharia de Softwares é uma das vertentes mais fortes na área de Ciência da Computação. A construção de um software pode ser para fins administrativos, de pesquisa, entretenimento, etc. A atividade visa a coleta, criação e manutenção de softwares para a UFMA, também visa solucionar problemáticas da comunidade e projetos apoiados pela IES. Além disso, a atividade colabora juntamente para o ensino de tecnologias aos integrantes do grupo PET e para o compartilhamento desse conhecimento fazendo o uso de políticas de troca de conhecimento, pesquisa e desenvolvimento de tecnologias, e a extensão tecnológica.</p>
      <p>A atividade da continuidade às políticas já realizadas pelo PETComp. Os projetos serão adotados por toda a equipe, de forma que cada um se responsabiliza por algumas sub funcionalidades, usando de processos de desenvolvimento de software hábil a ser pesquisado pelos alunos, bem como metodologias para a gestão de atividades. O software que apresentar melhor desempenho no processo de ensino e aprendizagem será escolhido e produzido. Poderão ser produzidos durante o desenvolvimento da atividade: objetos de aprendizado, aplicações móveis para fins diversos, sistemas de informação, e sistemas computacionais para atender demandas, através das pesquisas realizadas em outras políticas desta proposta.</p>
    </div>

    <div class="main">
      <div class="swiper carousel">
          <div class="swiper-wrapper">
            
            <!-- Slide 1 -->
            <div class="swiper-slide">
              <a href="https://www.darti.ufma.br/CientAlcantara/" target="_blank">
                <div class="software-card">
                  <img src="./assets/images/logos/CientAlcantara.svg" alt="">
                  <div class="text">
                    <h2>Cientistas de Alcântara</h2>
                    <div class="wrapper-labels">
                      <div class="label php">PHP</div>
                      <div class="label html">HTML</div>
                      <div class="label css">CSS</div>
                      <div class="label javascript">JavaScript</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide">
              <a href="http://observatoriodesaudemental.com.br/" target="_blank">
                <div class="software-card">
                  <img src="./assets/images/logos/observatorio.svg" alt="">
                  <div class="text">
                    <h2>Observatório Saúde Mental</h2>
                    <div class="wrapper-labels">
                      <div class="label php">PHP</div>
                      <div class="label html">HTML</div>
                      <div class="label css">CSS</div>
                      <div class="label javascript">JavaScript</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide">
              <a href="https://petcompufma.org/cocom/" target="_blank">
                <div class="software-card">
                  <img src="./assets/images/logos/cocom.svg" alt="">
                  <div class="text">
                    <h2>COCOM</h2>
                    <div class="wrapper-labels">
                      <div class="label php">PHP</div>
                      <div class="label html">HTML</div>
                      <div class="label css">CSS</div>
                      <div class="label javascript">JavaScript</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <!-- Slide 4 -->
            <div class="swiper-slide">
              <a href="https://petcompufma.org/eacomp/" target="_blank">
                <div class="software-card">
                  <img src="./assets/images/logos/eacomp.svg" alt="">
                  <div class="text">
                    <h2>EAComp</h2>
                    <div class="wrapper-labels">
                      <div class="label html">HTML</div>
                      <div class="label css">CSS</div>
                      <div class="label javascript">JavaScript</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <!-- Slide 5 -->
            <div class="swiper-slide">
              <a href="#" target="_blank">
                <div class="software-card">
                  <img src="./assets/images/logos/mamaprev.png" alt="">
                  <div class="text">
                    <h2>MAMAPrev</h2>
                    <div class="wrapper-labels">
                      <div class="label react">React-Native</div>
                      <div class="label javascript">JavaScript</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <!-- Slide 6 -->
            <div class="swiper-slide">
              <a href="#" target="_blank">
                <div class="software-card">
                  <img src="./assets/images/logos/aconchego.svg" alt="">
                  <div class="text">
                    <h2>Aconchego</h2>
                    <div class="wrapper-labels">
                      <div class="label react">React-Native</div>
                      <div class="label javascript">JavaScript</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <!-- Slide 7 -->
            <div class="swiper-slide">
              <a href="http://bauxiteresidue.ufma.br/" target="_blank">
                <div class="software-card">
                  <img src="./assets/images/logos/bauxita.svg" alt="">
                  <div class="text">
                    <h2>Resíduo Bauxita</h2>
                    <div class="wrapper-labels">
                      <div class="label php">PHP</div>
                      <div class="label html">HTML</div>
                      <div class="label css">CSS</div>
                      <div class="label javascript">JavaScript</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
      </div>


  <?php include('footer.php') ?>
  <script src="./js/js.js"></script>
</body>

</html>