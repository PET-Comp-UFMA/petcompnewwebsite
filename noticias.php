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

      <section class="filtro">
        <h2 class="filtro__title">Buscar por:</h2>

        <form
          action="noticias.php"
          method="get"
          class="filtro__form"
        >
          <div class="filtro__field">
            <label for="titulo" class="filtro__label">Título</label>
            <input
              id="titulo"
              name="titulo"
              type="text"
              class="filtro__input"
              placeholder="Digite o título"
              value="<?= $titulo !== null ? htmlspecialchars($titulo) : ''; ?>"
            />
          </div>

          <div class="filtro__field">
            <label for="texto" class="filtro__label">Texto</label>
            <input
              id="texto"
              name="texto"
              type="text"
              class="filtro__input"
              placeholder="Digite uma parte de texto"
              value="<?= $texto !== null ? htmlspecialchars($texto) : ''; ?>"
            />
          </div>

          <div class="filtro__actions">
            <button type="submit" class="filtro__button">
              <img src="./assets/svg/search.svg" alt="Buscar" class="filtro__icon" />
            </button>
          </div>
        </form>
      </section>



      <!-- START  -->

      <section id="paginate">

        <ul class="news-list">

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


          <li class="news-list__item">
            <article class="card">
              <div class="card__details">
                <div class="card__meta card__meta--title">
                  <h5 class="card__title">
                    <a href="<?php echo $parametros ?>" class="card__link">
                      <?php echo htmlspecialchars($row['titulo']) ?>
                    </a>
                  </h5>
                </div>
                <div class="card__meta card__meta--share">
                  <p class="card__share-label">Compartilhe</p>
                  <div class="card__share-links">
                    <a
                      class="card__share-link"
                      href="https://twitter.com/intent/tweet?url=<?php echo urlencode($url) ?>"
                      target="_blank"
                      rel="nofollow noopener"
                    >
                      <img src="./assets/svg/twitter_icon_copy.svg" alt="Twitter">
                    </a>
                    <a
                      class="card__share-link"
                      href="https://www.facebook.com/sharer.php?u=<?php echo urlencode($url) ?>"
                      target="_blank"
                      rel="noopener"
                    >
                      <img src="./assets/svg/facebook_icon_copy.svg" alt="Facebook">
                    </a>
                    <a
                      class="card__share-link"
                      href="whatsapp://send?text=<?php echo urlencode('Acesse: - ' . $url) ?>"
                    >
                      <img src="./assets/svg/whatsapp.svg" alt="WhatsApp">
                    </a>
                  </div>
                </div>
              </div>

              <div class="card__body">
                <div class="card__resume">
                  <p class="card__resume-title">Resumo</p>
                  <p class="card__resume-text">
                    <?php
                      $limit = 450;
                      $text = substr($row['texto'], 0, $limit);
                      echo nl2br(htmlspecialchars(strlen($row['texto']) > $limit ? $text.'...' : $text));
                    ?>
                  </p>
                </div>

                <?php if (!empty($row['data'])): ?>
                  <div class="card__date">
                    Publicado em <time datetime="<?= $row['data'] ?>"><?= $row['data'] ?></time>
                  </div>
                <?php endif; ?>
              </div>

              <div class="card__line card__line--gray"></div>
            </article>
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