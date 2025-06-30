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
    $titulo = $_GET['publication'] ?? ''; 
    $autor = $_GET['author'] ?? '';
    $palavras_chave = $_GET['keyword'] ?? ''; 
    $ano = $_GET['year'] ?? '';

    if (!empty($titulo) || !empty($autor) || !empty($palavras_chave) || !empty($ano)) {
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
    <form action="publicacoes.php" class="filtro" method="get"> 
      <div class="publication">
        <label for="publication">Título</label>
        <input name="publication" type="text" placeholder="Digite o título" value="<?php echo htmlspecialchars($titulo);?>">
      </div>
      <div class="author">
        <label for="author">Autor</label>
        <input name="author" type="text" placeholder="Digite o nome do autor" value="<?php echo htmlspecialchars($autor);?>">
      </div>
      <div class="keyword">
        <label for="keyword">Palavras-chave</label>
        <input name="keyword" type="text" placeholder="Digite uma palavra chave" value="<?php echo htmlspecialchars($palavras_chave);?>">
      </div>
      <div class="year">
        <label for="year">Ano de publicação</label>
        <input name="year" type="text" placeholder="Digite o ano de publicação" value="<?php echo htmlspecialchars($ano);?>">
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
            $query = "SELECT * FROM trabalhos_publicados "; # Query base

            if($buscaRealizada){ # Buscar todas publicações que contém as substrings de cada parâmetro informado
              $query .= "WHERE ";
              $filtros = [];
              $campos = [ # coluna da tabela trabalhos publicados => parametro GET
                'titulo' => $titulo,
                'autor' => $autor,
                'palavras_chave' => $palavras_chave,
                'ano' => $ano
              ];

              foreach ($campos as $coluna => $param) {
                  if (!empty($param)) {
                      $param = mysqli_real_escape_string($mysqli, $param);
                      $filtros[] = "$coluna LIKE '%$param%'";
                  }
              }
              
              $query .= implode(" AND ", $filtros); # Separando cada filtro por AND
            }
            $query .= "ORDER BY ano DESC"; # As publicações vem em ordem por ano independente da busca 
            $trabalhos = mysqli_query($mysqli, $query);
            $num_trabalhos = mysqli_num_rows($trabalhos);

            if($num_trabalhos > 0):
                while($row = mysqli_fetch_array($trabalhos)):
        ?>

      <li class="item">
      <div class="card">
        <div class="details">
          <div class="data-name">
            <h5 class="article-name">
            <?php print_r($row['titulo'])?>
            </h5>
          </div>
          
          <div class="authors">
            <p class="authors-names">Autores</p>
            <ul class="list-authors">
              <li class="item-author-name"><?php print_r($row['autor']) ?></li>
            </ul>
          </div>

        </div>
      
        <div class="panel">

          <div class="resume">
            <p class="resume-title">Resumo</p>
            <p class="resume-text">
              <?php print_r($row['resumo'])?>
            </p>
          </div>
        
        <?php if(isset($row['palavras_chave'])): ?> <!-- Coluna opcional no banco de dados -->
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

          <div class="container-data">
            <div class="card-date">
              <p class="data">Ano de publicação: <span class="data-day"><?php print_r($row['ano'])?></span></p>
            </div>

            <div class="share">
              <!-- <p class="type">Compartilhe</p> -->
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

          </div>

        <div class="line-gray"></div>    
        
      <?php
        endwhile
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
      <?php else: ?>
        <li class="item">
          <div class="resultados">
            <h2>Sem resultados!</h2>
          </div>
        </li>
        <?php endif; ?>
    </section> <!--END section class="container"-->
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>