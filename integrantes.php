<?php
   require_once("conexao.php");

   $limit = 20; // máximo de petianos por página
   $page = isset($_GET["page"]) ? filter_var($_GET["page"], FILTER_VALIDATE_INT) : 1; // garantindo que a entrada é um inteiro

   $total_petianos = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT count(id) AS id FROM petianos"))['id'];
   $pages = ceil($total_petianos / $limit);
   
   // Redireciona caso a pagina esteja fora do intervalo legal
   if ($page < 1) header("Location: integrantes.php?page=1");
   if ($page > $pages) header("Location: integrantes.php?page=$pages");

   $start = ($page - 2) * $limit;  // valor negativo pra pagina 1, 0 pra pagina > 1

   function geraCard($pessoa, $titulo, $icone)
   {
      ob_start(); ?>
      <div class="card">
         <div class="card-img">
            <figure>
               <img src="./assets/images/integrantes/<?= $pessoa["imagem"] ?>" alt="">
            </figure>
         </div>
         <div class="job-img"><i class="fas fa-<?= htmlspecialchars($icone) ?>"></i></div>
         <div class="card-name">
            <h3><?= $pessoa["primeiro_nome"] ?> <?= $pessoa["ultimo_nome"] ?></h3>
            <h6><?= $titulo ?></h6>
         </div>
         <?php if ($pessoa['social'] || $pessoa['sobre']): ?>
            <div class="expand">
               <button class="button-showmore" data-id="<?= $pessoa["id"] ?>">
                  <h4 class="sabermais-text"> Saber mais </h4> 
               </button>
            </div>
         <?php endif; ?>
      </div>
      <?php if ($pessoa['social'] || $pessoa['sobre']): ?>
         <div class="popup hide" id="popup-<?= $pessoa["id"] ?>">
            <div class="popup-content">
               <button class="popup-close">&times;</button>
               <?php if ($pessoa["sobre"]): ?>
                  <h2 class="sobre-name">Sobre <?= htmlspecialchars($pessoa["primeiro_nome"]) ?> <?= htmlspecialchars($pessoa["ultimo_nome"]) ?></h2>
                  <p class="sobre-text" style="text-align: justify;"><?= htmlspecialchars($pessoa["sobre"]) ?></p>
               <?php endif; ?>
               <?php if ($pessoa['social']): ?>
                  <h2>Você pode encontrar <?= htmlspecialchars($pessoa["primeiro_nome"]) ?> <?= htmlspecialchars($pessoa["ultimo_nome"]) ?> em</h2>
                  <div class="social-logos">
                     <?php $socialpairs = explode(';', $pessoa["social"]);
                     foreach ($socialpairs as $pair):
                        if (strpos($pair, '=')):
                           list($platform, $link) = explode('=', $pair); ?>
                           <div class="social-logo">
                              <a href="<?= htmlspecialchars(trim($link, '"')) ?>" target="_blank">
                                 <i class="fa fa-<?= htmlspecialchars(trim($platform)) ?>" style="font-size:40px;"></i>
                              </a>
                           </div>
                        <?php endif; ?>
                     <?php endforeach; ?>
                  </div>
               <?php endif; ?>
            </div>
         </div>
      <?php endif;
      return ob_get_clean();
   }
   

   if ($page == 1) {
      $orientadoresAtivos = mysqli_fetch_all(mysqli_query($mysqli, "SELECT * FROM petianos WHERE ativo = 1 AND orientador = 1 ORDER BY ano DESC, periodo DESC"), MYSQLI_ASSOC);
      $integrantes = mysqli_fetch_all(mysqli_query($mysqli, "SELECT * FROM petianos WHERE ativo = 1 AND orientador = 0 AND voluntario = 0 ORDER BY ano DESC, periodo DESC"), MYSQLI_ASSOC);
      $voluntarios = mysqli_fetch_all(mysqli_query($mysqli, "SELECT * FROM petianos WHERE ativo = 1 AND voluntario = 1 AND orientador = 0 ORDER BY ano DESC, periodo DESC"), MYSQLI_ASSOC);
   } else {
      $orientadoresInativos = mysqli_fetch_all(mysqli_query($mysqli, "SELECT * FROM petianos WHERE ativo = 0 AND orientador = 1 ORDER BY ano DESC, periodo DESC LIMIT $start, $limit"), MYSQLI_ASSOC);
      $inativos = mysqli_fetch_all(mysqli_query($mysqli, "SELECT * FROM petianos WHERE ativo = 0 AND orientador = 0 ORDER BY id DESC LIMIT $start, $limit"), MYSQLI_ASSOC);
   }

   
?>
<!DOCTYPE html>
   <?php 
   $title = "Integrantes";
   $cssFiles = ['css/integrantes.css'];
   $jsFiles = ['js/integrantes.js'];
   include "head.php"; 
   ?>
   <body>
      <?php include('header.php') ?>
      <div class="container-header">
         <h2>Equipe PETComp</h2>
         <h3>Veja os rostos que já passaram pelo PETComp </h3>
         <h4><a href="index.php">Página Inicial</a></h4>
         <h4> -> Conheça o PETComp</h4> 
         <h4> -> Integrantes</h4> 
      </div>
      <div class="color">
      <?php if ($page == 1): ?>
         <?php if (count($integrantes) > 0 || count($orientadoresAtivos) > 0): ?>
            <div class="integrantes">
               <div class="orientadores">
                  <?php foreach ($orientadoresAtivos as $orientador): echo geraCard($orientador, "Orientador", "chalkboard-teacher"); endforeach; ?>
               </div>
               <div class="discentes">
                  <?php foreach ($integrantes as $integrante): echo geraCard($integrante, "Orientando", "user-graduate"); endforeach; ?>
               </div>
               <?php if (count($voluntarios) > 0): ?>
                  <div class="section-header"><h2>Voluntários</h2></div>
                  <div class="integrantes voluntarios">
                     <div class="discentes">
                        <?php foreach ($voluntarios as $voluntario): echo geraCard($voluntario, "Voluntário", "user-graduate"); endforeach; ?>
                     </div>
                  </div>
               <?php endif; ?>
            </div>
         <?php endif; ?>
      <?php else: ?>
         <?php if (count($inativos) > 0): ?>
            <div class="section-header"><h2>Ex-Integrantes</h2></div>
            <div class="integrantes ex">
               <div class="orientadores">
                  <?php foreach ($orientadoresInativos as $orientador): echo geraCard($orientador, "Orientador", "chalkboard-teacher"); endforeach; ?>
               </div>
               <div class="discentes ex">
                  <?php foreach ($inativos as $inativo): echo geraCard($inativo, "Orientando", "user-graduate"); endforeach; ?>
               </div>
            </div>
         <?php endif; ?>
      <?php endif; ?>
      </div>
      <nav>
         <?php $previous = $page - 1; $next = $page + 1; ?>
         <ul class="pagination">
            <li class="page-item" id="previous">
               <a class="page-link" href="?page=<?= $previous ?>" aria-label="Previous">
                  <span aria-hidden="true"><</span>
                  <span class="sr-only">Previous</span>
               </a>
            </li>
            <?php for ($i = 1; $i <= $pages; $i++): ?>
               <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
            <?php endfor; ?>
            <li class="page-item" id="next">
               <a class="page-link" href="?page=<?= $next ?>" aria-label="Next">
                  <span aria-hidden="true">></span>
                  <span class="sr-only">Next</span>
               </a>
            </li>
         </ul>
      </nav>
      <?php include('footer.php') ?>
   </body>
</html>
