<!DOCTYPE html>
<html lang="pt-br">

<?php 
    $title = "Registros";
    $cssFiles = ['css/registros.css'];
    include 'head.php';
?>

<body>
    <?php include 'header.php'; ?>

    <div class="container-header">
        <h2>Registros</h2>
        <h3>Veja tudo que o PETComp realizou</h3>
        <h4><a href="index.php">Página Inicial</a></h4>
        <h4> → Registros</h4>
    </div>

     <div class="section-header">
    <h2>REGISTROS PETCOMP</h2>
  </div>

  <div class="ano-section">
    <h2>2025</h2>

    <div class="atividade">
      <h3>ExploraComp 2025.1</h3>
      
      <div class="galeria" data-evento="exploracomp2025">
        
        
      </div>
    </div>

    <div class="atividade">
      <h3>Acalourada 2025.1</h3>
      <div class="galeria" data-evento="acalourada2025">


      </div>
    </div>
    <div class="atividade">
      <h3>Fábrica de Software</h3>
      <div class="subtitulo">
        <p>Congresso Nacional de Saúde e Tecnologia</p>
      </div>
      <div class="galeria" data-evento="cnst">
        
      </div>

      <div class="subtitulo">
        <p>Exploracomp</p>
      </div>
      <div class="galeria" data-evento="exploracompsite">

      </div>
    </div>

     <div class="atividade">
      <h3>Monitoria</h3>
      <div class="galeria">

        <div class="imagens-group">
            <img src="img/2025/Monitoria2025/Monitoria1.png" class="horizontal">
            <img src="img/2025/Monitoria2025/Monitoria2.png" class="horizontal">
        </div>

         <div class="imagens-group">
            <img src="img/2025/Monitoria2025/Monitoria3.png" class="vertical">
        </div>

         <div class="imagens-group">
            <img src="img/2025/Monitoria2025/Monitoria4.png" class="horizontal">
            <img src="img/2025/Monitoria2025/Monitoria5.png" class="horizontal">
        </div>
      </div>
    </div>
  </div>

  <div class="ano-section">
    <h2>2024</h2>

    <div class="atividade">
      <h3>Acalourada 2024.2</h3>
      
      <div class="galeria" data-evento="acalourada2024_2">
        
        
      </div>
    </div>
  </div>

  <!-- Modal de imagem -->
  <div class="modal" id="imagemModal" onclick="fecharModal()">
    <button class="modal-close" onclick="fecharModal(event)">×</button>
    <img id="imagemExpandida" src="" alt="">
  </div>



  <!-- Botão voltar ao topo -->
  <button onclick="voltarAoTopo()" id="topo-btn" title="Voltar ao topo">↑</button>

    <?php include('footer.php') ?>

    <script src="js/registros.js"></script>

  <script src="./js/js.js"></script>
</html>
