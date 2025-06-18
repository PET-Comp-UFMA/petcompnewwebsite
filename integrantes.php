<?php
   require_once("conexao.php");
   
   $limit = 20;
   // Sanitizar a entrada de 'page' na URL para garantir que seja um número inteiro válido.
   if (isset($_GET["page"])){
      $page = filter_var($_GET["page"], FILTER_VALIDATE_INT);
      if (!$page || $page < 1){
         $page = 1;
      }
   }
   else $page = 1;
  
   $start = ($page - 2) * $limit;  // O cálculo correto para a páginação

   if ($start < 0) {
       $start = 0;
   }

   // consulta para a quantidade de petianos
   $quantidadePetianos = "SELECT count(id) AS id FROM petianos";

   $resultQuantidadePetianos = mysqli_query($mysqli, $quantidadePetianos);
   $quantidadePetianos = mysqli_fetch_assoc($resultQuantidadePetianos);
   $total = $quantidadePetianos['id'];
   $pages = ceil($total / $limit); // cálculo correto da quantidade de páginas de acordo com a quantidade de petianos
      
   // Consultas para obter orientadores e integrantes ativos
   if ($page == 1) {
      $queryOrientadoresAtivos = "SELECT id, primeiro_nome, ultimo_nome, imagem, sobre, social FROM petianos WHERE ativo = 1 AND orientador = 1 ORDER BY ano DESC, periodo DESC";
      $queryIntegrantes = "SELECT id, primeiro_nome, ultimo_nome, imagem, sobre, social FROM petianos WHERE ativo = 1 AND voluntario = 0 AND orientador = 0 ORDER BY ano DESC, periodo DESC";
      $queryVoluntarios = "SELECT id, primeiro_nome, ultimo_nome, imagem, sobre, social FROM petianos  WHERE ativo = 1 AND voluntario = 1 AND orientador = 0 ORDER BY ano DESC, periodo DESC";

      // executando as consultas com os parâmetros de paginação
      $resultOrientadoresAtivos = mysqli_query($mysqli, $queryOrientadoresAtivos);
      $orientadoresAtivos = mysqli_fetch_all($resultOrientadoresAtivos, MYSQLI_ASSOC);

      $resultIntegrantes = mysqli_query($mysqli, $queryIntegrantes);
      $integrantes = mysqli_fetch_all($resultIntegrantes, MYSQLI_ASSOC);

      $resultVoluntarios = mysqli_query($mysqli, $queryVoluntarios);
      $voluntarios = mysqli_fetch_all($resultVoluntarios, MYSQLI_ASSOC);
   }
   else { // Consultas para orientadores e integrantes inativos com paginação
      $queryOrientadoresInativos = "SELECT id, primeiro_nome, ultimo_nome, imagem, sobre, social FROM petianos WHERE ativo = 0 AND orientador = 1 ORDER BY ano DESC, periodo DESC LIMIT $start, $limit";
      $queryInativos = "SELECT id, primeiro_nome, ultimo_nome, imagem, sobre, social FROM petianos WHERE ativo = 0 AND orientador = 0 ORDER BY id DESC LIMIT $start, $limit";
   
      // executando as consultas com os parâmetros de paginação
      $resultOrientadoresInativos = mysqli_query($mysqli, $queryOrientadoresInativos);
      $orientadoresInativos = mysqli_fetch_all($resultOrientadoresInativos, MYSQLI_ASSOC);
      
      $resultInativos = mysqli_query($mysqli, $queryInativos);
      $inativos = mysqli_fetch_all($resultInativos, MYSQLI_ASSOC);
   }

   if ($page < 1) {
       header("Location: integrantes.php?page=1");
       exit();
   } elseif ($page > $pages) {
       header("Location: integrantes.php?page=$pages");
       exit();
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
  
    
      <?php if($page == 1): ?>
      <?php if(count($integrantes) > 0 && count($orientadoresAtivos) > 0): ?>
      <div class="integrantes">
         <div class="orientadores">
            <?php foreach ($orientadoresAtivos as $orientadorAtivo): ?>
            <div class="card">
               <div class="card-img">
                  <figure>
                     <img src="./assets/images/integrantes/<?= $orientadorAtivo["imagem"]?>" alt="">
                  </figure>
               </div>
               <div class="job-img"><i class="fas fa-chalkboard-teacher"></i></div>
               <div class="card-name">
                  <h3><?= $orientadorAtivo["primeiro_nome"]?> <?= $orientadorAtivo["ultimo_nome"]?></h3>
                  <h6>Orientador</h6>
               </div>
               <?php if ($orientadorAtivo['social'] || $orientadorAtivo['sobre']): ?>
               <div class="expand">
                  <button class="button-showmore" data-id="<?= $orientadorAtivo["id"] ?>">
                  <h4 class="sabermais-text"> Saber mais </h4> 
                  </button>
               </div>
               <?php endif; ?>
            </div>
            <?php if ($orientadorAtivo['social'] || $orientadorAtivo['sobre']): ?>
            <div class="popup hide" id="popup-<?= $orientadorAtivo["id"] ?>">
               <div class="popup-content">
                  <button class="popup-close">&times;</button>
                  <?php if ($orientadorAtivo["sobre"]): ?>
                  <h2 class="sobre-name">Sobre <?php echo htmlspecialchars($orientadorAtivo["primeiro_nome"]) ?> <?php echo htmlspecialchars($orientadorAtivo["ultimo_nome"]) ?></h2>
                  <p class="sobre-text" style="text-align: justify;"><?php echo htmlspecialchars($orientadorAtivo["sobre"]) ?></p>
                  <?php endif; ?>
                  <?php if ($orientadorAtivo['social']): ?>
                  <h2>Você pode encontrar <?php echo htmlspecialchars($orientadorAtivo["primeiro_nome"]) ?> <?php echo htmlspecialchars($orientadorAtivo["ultimo_nome"]) ?> em</h2>
                  <div class="social-logos">
                     <?php $socialtext = $orientadorAtivo["social"]; ?>
                     <?php $socialpairs = explode(';', $socialtext); ?>
                     <?php foreach ($socialpairs as $pair): ?>
                     <?php if (strpos($pair, '=')): ?>
                     <?php list($platform, $link) = explode('=', $pair); ?>
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
            <?php endif; ?>
         </div>
         <?php endforeach ?>
         <div class="discentes">
            <?php foreach ($integrantes as $integrante): ?>
            <div class="card">
               <div class="card-img">
                  <figure>
                     <img src="./assets/images/integrantes/<?= $integrante["imagem"] ?>" alt="">
                  </figure>
               </div>
               <div class="job-img"><i class="fas fa-user-graduate"></i></div>
               <div class="card-name">
                  <h3><?= $integrante["primeiro_nome"] ?> <?= $integrante["ultimo_nome"] ?></h3>
                  <h6>Orientando</h6>
               </div>
               <?php if ($integrante['social'] || $integrante['sobre']): ?>
               <div class="expand">
                  <button class="button-showmore" data-id="<?= $integrante["id"] ?>">
                     <h4 class="sabermais-text"> Saber mais </h4> 
                  </button>
               </div>
               <?php endif; ?>
            </div>
            <?php if ($integrante['social'] || $integrante['sobre']): ?>
            <div class="popup hide" id="popup-<?= $integrante["id"] ?>">
               <div class="popup-content">
                  <button class="popup-close">&times;</button>
                  <?php if ($integrante["sobre"]): ?>
                  <h2 class="sobre-name">Sobre <?php echo htmlspecialchars($integrante["primeiro_nome"]) ?> <?php echo htmlspecialchars($integrante["ultimo_nome"]) ?></h2>
                  <p class="sobre-text" style="text-align: justify;"><?php echo htmlspecialchars($integrante["sobre"]) ?></p>
                  <?php endif; ?>
                  <?php if ($integrante['social']): ?>
                  <h2>Você pode encontrar <?php echo htmlspecialchars($integrante["primeiro_nome"]) ?> <?php echo htmlspecialchars($integrante["ultimo_nome"]) ?> em</h2>
                  <div class="social-logos">
                     <?php $socialtext = $integrante["social"]; ?>
                     <?php $socialpairs = explode(';', $socialtext); ?>
                     <?php foreach ($socialpairs as $pair): ?>
                     <?php if (strpos($pair, '=')): ?>
                     <?php list($platform, $link) = explode('=', $pair); ?>
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
            <?php endif; ?>
            <?php endforeach; ?>
         </div>
         <?php endif; ?>
         <?php if(count($voluntarios) > 0): ?>       
         <div class="section-header">
            <h2>Voluntários</h2>
         </div>
         <!-- Voluntários-->
         <div class="integrantes voluntarios">
            <div class="discentes">
               <?php foreach ($voluntarios as $voluntario): ?>
               <div class="card">
                  <div class="card-img">
                     <figure>
                        <img src="./assets/images/integrantes/<?= $voluntario["imagem"]?>" alt="">
                     </figure>
                  </div>
                  <div class="job-img"><i class="fas fa-user-graduate"></i></div>
                  <div class="card-name">
                     <h3><?= $voluntario["primeiro_nome"]?> <?= $voluntario["ultimo_nome"]?></h3>
                     <h6>Orientando</h6>
                  </div>
                  <?php if ($voluntario['social'] || $voluntario['sobre']): ?>
               <div class="expand">
                  <button class="button-showmore" data-id="<?= $voluntario["id"] ?>">
                  <h4 class="sabermais-text"> Saber mais </h4> 
                  </button>
               </div>
               <?php endif; ?>
            </div>
            <?php if ($voluntario['social'] || $voluntario['sobre']): ?>
            <div class="popup hide" id="popup-<?= $voluntario["id"] ?>">
               <div class="popup-content">
                  <button class="popup-close">&times;</button>
                  <?php if ($voluntario["sobre"]): ?>
                  <h2 class="sobre-name">Sobre <?php echo htmlspecialchars($voluntario["primeiro_nome"]) ?> <?php echo htmlspecialchars($voluntario["ultimo_nome"]) ?></h2>
                  <p class="sobre-text" style="text-align: justify;"><?php echo htmlspecialchars($voluntario["sobre"]) ?></p>
                  <?php endif; ?>
                  <?php if ($voluntario['social']): ?>
                  <h2>Você pode encontrar <?php echo htmlspecialchars($voluntario["primeiro_nome"]) ?> <?php echo htmlspecialchars($voluntario["ultimo_nome"]) ?> em</h2>
                  <div class="social-logos">
                     <?php $socialtext = $voluntario["social"]; ?>
                     <?php $socialpairs = explode(';', $socialtext); ?>
                     <?php foreach ($socialpairs as $pair): ?>
                     <?php if (strpos($pair, '=')): ?>
                     <?php list($platform, $link) = explode('=', $pair); ?>
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
            <?php endif; ?>
                  <?php endforeach ?>
               </div>
            </div>
         </div>
         <?php endif;?>         
         <!-- Ex Integrantes-->
      </div>
      <?php else: ?>
      <?php if(count($inativos) > 0):?>
      <div class="section-header">
         <h2>Ex-Integrantes</h2>
      </div>
      <div class="integrantes ex">
         <div class="tutores">
            <?php foreach ($orientadoresInativos as $orientadorInativo): ?>
            <div class="card">
               <div class="card-img">
                  <figure>
                     <img src="./assets/images/integrantes/<?= $orientadorInativo["imagem"]?>" alt="">
                  </figure>
               </div>
               <div class="job-img"><i class="fas fa-chalkboard-teacher"></i></div>
               <div class="card-name">
                  <h3><?= $orientadorInativo["primeiro_nome"]?> <?= $orientadorInativo["ultimo_nome"]?></h3>
                  <h6>Orientador</h6>
               </div>
               <?php if ($orientadorInativo['social'] || $orientadorInativo['sobre']): ?>
               <div class="expand">
                  <button class="button-showmore" data-id="<?= $orientadorInativo["id"] ?>">
                  <h4 class="sabermais-text"> Saber mais </h4> 
                  </button>
               </div>
               <?php endif; ?>
            </div>
            <?php if ($orientadorInativo['social'] || $orientadorInativo['sobre']): ?>
            <div class="popup hide" id="popup-<?= $orientadorInativo["id"] ?>">
               <div class="popup-content">
                  <button class="popup-close">&times;</button>
                  <?php if ($orientadorInativo["sobre"]): ?>
                  <h2 class="sobre-name">Sobre <?php echo htmlspecialchars($orientadorInativo["primeiro_nome"]) ?> <?php echo htmlspecialchars($orientadorInativo["ultimo_nome"]) ?></h2>
                  <p class="sobre-text" style="text-align: justify;"><?php echo htmlspecialchars($orientadorInativo["sobre"]) ?></p>
                  <?php endif; ?>
                  <?php if ($orientadorInativo['social']): ?>
                  <h2>Você pode encontrar <?php echo htmlspecialchars($orientadorInativo["primeiro_nome"]) ?> <?php echo htmlspecialchars($orientadorInativo["ultimo_nome"]) ?> em</h2>
                  <div class="social-logos">
                     <?php $socialtext = $orientadorInativo["social"]; ?>
                     <?php $socialpairs = explode(';', $socialtext); ?>
                     <?php foreach ($socialpairs as $pair): ?>
                     <?php if (strpos($pair, '=')): ?>
                     <?php list($platform, $link) = explode('=', $pair); ?>
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
            <?php endif; ?>    
            <?php endforeach ?>
            <div class="discentes ex">
               <?php foreach ($inativos as $inativo): ?>
               <div class="card">
                  <div class="card-img">
                     <figure>
                        <img src="./assets/images/integrantes/<?= $inativo["imagem"]?>" alt="">
                     </figure>
                  </div>
                  <div class="job-img"><i class="fas fa-user-graduate"></i></div>
                  <div class="card-name">
                     <h3><?= $inativo["primeiro_nome"]?> <?= $inativo["ultimo_nome"]?></h3>
                     <h6>Orientando</h6>
                  </div>
                  <?php if ($inativo['social'] || $inativo['sobre']): ?>
               <div class="expand">
                  <button class="button-showmore" data-id="<?= $inativo["id"] ?>">
                  <h4 class="sabermais-text"> Saber mais </h4> 
                  </button>
               </div>
               <?php endif; ?>
               </div>
                  <?php if ($inativo['social'] || $inativo['sobre']): ?>
                  <div class="popup hide" id="popup-<?= $inativo["id"] ?>">
                     <div class="popup-content">
                        <button class="popup-close">&times;</button>
                        <?php if ($inativo["sobre"]): ?>
                        <h2 class="sobre-name">Sobre <?php echo htmlspecialchars($inativo["primeiro_nome"]) ?> <?php echo htmlspecialchars($inativo["ultimo_nome"]) ?></h2>
                        <p class="sobre-text" style="text-align: justify;"><?php echo htmlspecialchars($inativo["sobre"]) ?></p>
                        <?php endif; ?>
                        <?php if ($inativo['social']): ?>
                        <h2>Você pode encontrar <?php echo htmlspecialchars($inativo["primeiro_nome"]) ?> <?php echo htmlspecialchars($inativo["ultimo_nome"]) ?> em</h2>
                        <div class="social-logos">
                           <?php $socialtext = $inativo["social"]; ?>
                           <?php $socialpairs = explode(';', $socialtext); ?>
                           <?php foreach ($socialpairs as $pair): ?>
                           <?php if (strpos($pair, '=')): ?>
                           <?php list($platform, $link) = explode('=', $pair); ?>
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
                  <?php endif; ?>
               <?php endforeach ?>
            </div>
         </div>
      </div>
      <?php endif; ?>
      <?php endif; ?>
      </div>
      <nav>
         <?php 
         $previous = $page - 1;
         $next  = $page + 1; ?>
         <ul class="pagination">
            <li class="page-item" id="previous">
               <a class="page-link" href="?page=<?= $previous; ?>" aria-label="Previous">
               <span aria-hidden="true"><</span>
               <span class="sr-only">Previous</span>
               </a>
            </li>
            <?php for ($i = 1; $i<=$pages; $i++): ?>
            <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
            <?php endfor; ?>
            <li class="page-item" id="next">
               <a class="page-link" href="?page=<?= $next; ?>" aria-label="Next">
               <span aria-hidden="true">></span>
               <span class="sr-only">Next</span>
               </a>
            </li>
         </ul>
      </nav>
    
      <?php include('footer.php') ?>
   </body>
</html>