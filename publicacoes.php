<!DOCTYPE html>
<html lang="en">

<!-- HEAD -->
<?php
    $title = 'Trabalhos publicados';
    $cssFiles = ['css/trabalhos_publicados.css', 'css/publicacoes.css'];
    $jsFiles = ['js/trabalhos_publicados.js'];
    include "head.php";

    require_once("conexao.php");
    require_once('scripts.php/utils.php');

    $buscaRealizada =  false;

    if (isset($_GET['publication'])) {
      $publicacao = $_GET['publication'];
      if ($publicacao == "") $publicacao = null;
      
    } else {
      $publicacao = null;
    }

    if (isset($_GET['author'])) {
      $autor = $_GET['author'];
      if ($autor == "") $autor = null;
    } else {
      $autor = null;
    }

    if (isset($_GET['keyword'])) {
      $palavra_chave = $_GET['keyword'];
      if ($palavra_chave == "") $palavra_chave = null;
    } else {
      $palavra_chave = null;
    }

    if (isset($_GET['year'])) {
      $ano = $_GET['year'];
      if ($ano == "") $ano = null;
    } else {
      $ano = null;
    }

    if (!is_null($publicacao) || !is_null($autor) || !is_null($palavra_chave) || !is_null($ano)) {
      $buscaRealizada = true;
    }
?>

<body>
    <?php include 'header.php'; ?>

    <div class="container-header">
        <h2>Trabalhos publicados</h2>
        <h3>Pesquise os principais trabalhos publicados pelo PET</h3>
        <h4><a href="index.php">Página inicial</a></h4>
        <h4> → Publicações</h4>
        <h4> → Trabalhos publicados</h4>
    </div>
    <div class="container-body">
        <p>
            Aqui, você encontrará nossos projetos, artigos e pesquisas desenvolvidas pelo PETComp. Cada trabalho reflete nosso compromisso com a qualidade e inovação na computação. Nesta página, você terá acesso a artigos, estudos, propostas práticas que visam contribuir para o avanço computacional e da educação. Fique à vontade para explorar e acompanhar nosso trabalho.
        </p>
    </div>

    <main>
      <section class="container">
    	<h2>Buscar por: </h2>
    <form action="publicacoes.php" class="filtro" method="<?php echo $_SERVER['PHP_SELF']?>"> 
      <div class="publication">
        <label for="publication">Título</label>
        <input name="publication" type="text" placeholder="Digite o título" value="<?php echo $publicacao;?>">
      </div>
      <div class="author">
        <label for="author">Autor</label>
        <input name="author" type="text" placeholder="Digite o nome do autor" value="<?php echo $autor;?>">
      </div>
      <div class="keyword">
        <label for="keyword">Palavra-chave</label>
        <input name="keyword" type="text" placeholder="Digite uma palavra chave" value="<?php echo $palavra_chave;?>">
      </div>
      <div class="year">
        <label for="year">Ano de publicação</label>
        <input name="year" type="text" placeholder="Digite o ano de publicação" value="<?php echo $ano;?>">
      </div>
      <div class="search">
        <label for="search-button">Buscar</label>
        <button name="search-button" class="search-button"><img src="./assets/svg/search.svg" alt=""></button>
      </div>
    </form>
      <!-- START  -->
      
    <section id="paginate">
    <ul class="list" style="list-style: none;">  <!-- lista com cada li e cada li tem a box dentro-->
       <?php
            mysqli_select_db($mysqli, $bd) or die("Could not select database");

            if($buscaRealizada){
              $query = "SELECT * FROM trabalhos_publicados WHERE ";
              
              if(!is_null($publicacao)){
                $query = $query . "titulo LIKE '%". $publicacao . "%'";

                if(!is_null($autor) || !is_null($palavra_chave) || !is_null($ano)){
                  $query = $query . " and ";
                }
              }

              if(!is_null($autor)){
                $query = $query . "autor LIKE '%". $autor . "%'";

                if(!is_null($palavra_chave) || !is_null($ano)){
                  $query = $query . " and ";
                }
              }

              if(!is_null($palavra_chave)){
                $query = $query . "palavras_chave LIKE '%". $palavra_chave . "%'";

                if(!is_null($ano)){
                  $query = $query . " and ";
                }
              }

              if(!is_null($ano)){
                $query = $query . "ano LIKE '%". $ano . "%'";
              }

              $query = $query . " ORDER BY ano DESC;";

            } else {
              $query = "SELECT * FROM trabalhos_publicados ORDER BY ano DESC";  
            }
            $result = mysqli_query($mysqli, $query);
            $num_results = mysqli_num_rows($result);

            if($num_results > 0) {
                for($i=0; $i<$num_results; $i++) {
                    $row = mysqli_fetch_array($result);
        ?>

      <li class="item">
      <div class="card">
        <div class="details">
          <div class="data-name">
                <!--  -->
            <h5 class="article-name">
            <?php print_r($row['titulo'])?>
            </h5>
          </div>
          <div class="share">
            <p class="type">Compartilhe</p>
            <div class="links ">
            <?php
                $baseUrl = url();
                $parametro = strtr($row['titulo'], $caracteres_sem_acento);
                $parametro = substr_replace($parametro ,'',-1); //removendo o ultimo ' ' que vem do bd e gera erro no link 
                $parametro = urlencode((str_replace(" ", "+", $parametro)));
                $url =  $baseUrl."publicacoes.php?publication=".$parametro;
              ?>
              <a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo $url?>" id="twitter-share-btt" rel="nofollow" target="_blank"><img src="./assets/svg/twitter_icon_copy.svg" alt=""></a>



              <?php 
                $baseUrl = substr(url(), 0, strpos(url(), "?")); //removendo argumentos do post, tudo depois de "?"
                $baseUrl = str_replace("publicacoes.php", "", $baseUrl); //removendo "publicacoes.php" do link de compartilhamento
                $url =  $baseUrl."publicacoes.php?publication=".urlencode($row['titulo'])."&author=". urlencode($row['autor']);
              ?>
              <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo $url?>"><img src="./assets/svg/facebook_icon_copy.svg" alt=""></a>
              <a href="whatsapp://send?text=<?php echo urlencode('Acesse: - '.$url)?>"><img src="./assets/svg/whatsapp.svg" alt=""></a> 
            </div>
          </div>
          <div class="authors">
            <p class="authors-names">Autores</p>
            <ul class="list-authors">
              <li class="item-author-name"><?php print_r($row['autor']) ?></li>
            </ul>
          </div>
        </div>
      
        <div class="panel">

        <?php if(!is_null($row['resumo'])): ?>
          <div class="resume">
            <p class="resume-title">Resumo</p>
            <p class="resume-text">
              <?php print_r($row['resumo'])?>
            </p>
          </div>
        <?php endif ?>
        
        <?php if(isset($row['palavras_chave'])): ?>
          <p class="tags-title">Palavras-chave</p>
          <div class="tags">
            <ul class="list-tags">
              <li class="item-tag"><?php print_r($row['palavras_chave']) ?></li>
            </ul>
          </div>
        <?php endif ?>

        </div>
      
        <!-- <div class="buttons-container" style="display: flex; justify-content: flex-start;"> -->
        
        <div class="card-bottom">

          <div class="buttons-container">
            <button class="button-show-more">
              Ver mais
              <span class="material-icons">
                add
              </span>
            </button>

            <a href="<?php print_r($row['link'])?>" class="button-download" target="_blank">
              Ver arquivo
              <span class="material-icons">
                  link
              </span>
            </a>
          </div>
        </div>

        <?php if (isset($row['ano'])): ?>
          <div class="container-data">
            <p class="data">Ano de publicação: <span class="data-day"><?php print_r($row['ano'])?></span></p>
          </div>
        <?php endif ?>

        </div>
        
        
        <!-- </div> -->
        
        <div class="line-gray"></div>
        <!-- fim -->
      <?php
        }
      ?>
        </ul>
      </section> <!--END section id="paginate"-->

      <div class="pagination"> <!-- botões -->
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
      <?php }else{ ?>
        <li class="item">
          <div class="resultados">
            <h2>Sem resultados!</h2>
          </div>
        </li>
        <?php } ?>
    </section> <!--END section class="container"-->
    </main>

    <?php include 'footer.php'; ?>


    <script type="text/javascript">
      function cite(str) {
        // Create new element
        var el = document.createElement('textarea');
        // Set value (string to be copied)
        el.value = str;
        // Set non-editable to avoid focus and move outside of view
        el.setAttribute('readonly', '');
        el.style = {position: 'absolute', left: '-9999px'};
        document.body.appendChild(el);
        // Select text inside element
        el.select();
        // Copy text to clipboard
        document.execCommand('copy');
        // Remove temporary element
        document.body.removeChild(el);
        alert('Citação copiada para área de transferêcia');
      }
    </script>
</body>
</html>