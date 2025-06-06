<?php

require_once('conexao.php');
require_once('scripts.php/utils.php');

$buscaRealizada =  false;

if (isset($_GET['titulo'])) {

  $titulo = $_GET['titulo'];

  if ($titulo == "") $titulo = null;

} else {

  $titulo = null;

}

if (isset($_GET['texto'])) {

  $texto = $_GET['texto'];

  if ($texto == "") $texto = null;

} else {

  $texto = null;

}

if (!is_null($titulo) || !is_null($texto)) {

  $buscaRealizada = true;

}

?>

<!DOCTYPE html>

<html lang="en">

<!-- HEAD -->
<?php
  $title = 'Notícias | PETComp';
  $cssFiles = ['css/globals.css', 'css/noticias.css'];
  include 'head.php';
?>  

<body>

  <!--- HEADER --->
  <?php include('header.php') ?>

  <main>

    <div class="container-body">
      <p>
        Bem-vindo à seção de notícias do PETComp, onde você encontrará as atualizações mais recentes sobre nossas ações, projetos e iniciativas. Nossa missão é promover a transparência e a comunicação com todos os nossos colaboradores, parceiros e comunidade em geral.
        Aqui, você poderá acompanhar os avanços de nossos programas, eventos, parcerias e novidades importantes que fazem parte do nosso dia a dia. Através dessas atualizações, buscamos compartilhar nosso compromisso com a excelência e o impacto positivo que geramos nas áreas em que atuamos.
      </p>
    </div>

    <section class="container">

      <h2>Buscar por: </h2>

      <form action="noticias.php" class="filtro" method="<?php echo $_SERVER['PHP_SELF'] ?>">

        <div class="search-field">
          <label for="titulo">Título</label>
          <input id="titulo" name="titulo" class="search-input" type="text" placeholder="Digite o título" value="<?php echo $titulo; ?>">
        </div>

        <div class="search-field">
          <label for="texto">Texto</label>
          <input id="texto" name="texto" class="search-input" type="text" placeholder="Digite uma parte de texto" value="<?php echo $texto; ?>">
        </div>


        <div class="search">
          <label for="search-button">Buscar</label>
          <button name="search-button" class="search-button"><img src="./assets/svg/search.svg" alt=""></button>
        </div>
      </form>


      <!-- START  -->

      <section id="paginate">

        <ul class="list" style="list-style: none;">

          <!-- lista com cada li e cada li tem a box dentro-->

          <?php

            mysqli_select_db($mysqli, $bd) or die("Could not select database");

            if ($buscaRealizada) {

              $query = "SELECT * FROM noticias WHERE ";

              if (!is_null($titulo)) {

                $query = $query . "titulo LIKE '%" . $titulo . "%'";

                if (!is_null($texto)) {

                  $query = $query . " and ";

                }

              }

              if (!is_null($texto)) {

                $query = $query . "texto LIKE '%" . $texto . "%'";

              }

              $query = $query . " ORDER BY data DESC;";

            } else {

              $query = "SELECT * FROM noticias ORDER BY data DESC";

            }

            $result = mysqli_query($mysqli, $query);

            $num_results = mysqli_num_rows($result);

            if ($num_results > 0) {

              for ($i = 0; $i < $num_results; $i++) :  

                $row = mysqli_fetch_array($result);  

                $baseUrl = url();

                $id = $row['id'];

                $parametros = "noticia.php?id=" . $id;

                $url =  $baseUrl . $parametros;

          ?>


              <li class="item">

                <div class="card">

                  <div class="details">

                    <div class="data-name">

                      <h5 class="article-name">

                        <a href="<?php echo $parametros ?>">

                          <?php print_r($row['titulo']) ?>

                        </a>

                      </h5>

                    </div>


                    <div class="share">

                      <p class="type">Compartilhe</p>

                      <div class="links ">

                        <a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo $url ?>" id="twitter-share-btt" rel="nofollow" target="_blank"><img src="./assets/svg/twitter_icon_copy.svg" alt=""></a>

                        <?php

                        $baseUrl = substr(url(), 0, strpos(url(), "?")); //removendo argumentos do post, tudo depois de "?"

                        $baseUrl = str_replace("publicacoes.php", "", $baseUrl); //removendo "publicacoes.php" do link de compartilhamento

                        $url =  $baseUrl . "noticia.php?id=" . $id;

                        ?>

                        <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo $url ?>"><img src="./assets/svg/facebook_icon_copy.svg" alt=""></a>

                        <a href="whatsapp://send?text=<?php echo urlencode('Acesse: - ' . $url) ?>"><img src="./assets/svg/whatsapp.svg" alt=""></a>

                      </div>

                    </div>

                  </div>


                  <div class="card-bottom">

                    <div class="resume">

                      <?php

                        $tamanho_resumo = 450;

                        $resumo= substr($row['texto'], 0, $tamanho_resumo); //escolhendo quantos caracteres aparecerão no resumo (450)

                      ?>


                      <p class="resume-title">Resumo</p>

                      <p class="resume-text">

                        <?php 

                          if ($tamanho_resumo < strlen($row['texto'])){

                            $resumo .= "...";

                          }

                          echo $resumo;

                        ?>

                      </p>

                    </div>


                    <?php if (isset($row['data'])) : ?>

                      <div class="container-data">

                        <p class="data">Data de publicação: <span class="data-day"><?=$row['data']?></span></p>

                      </div>

                    <?php endif ?>


                  </div>


                  <div class="line-gray"></div>

              </li>


          <?php endfor; ?>

                
        </ul>

      </section>

     

      <div class="pagination">

        <!-- botões -->

        <div class="prev">

          <span class="material-icons">

            navigate_before

          </span>

        </div>

        <div class="numbers">

          <div>1</div>

          <div>2</div>

          <div>3</div>

        </div>

        <div" class="next">

          <span class="material-icons">

            navigate_next

          </span>

      </div>

      </div>

    <?php } else { ?>

      <li class="item">

        <div class="resultados">

          <h2>Sem resultados!</h2>

        </div>

      </li>

    <?php } ?>

    </section>

  

  </main>



</body>



<?php include('footer.php') ?>

</div>

<script src="./scripts/script.js"></script>

</body>



</html>