<!DOCTYPE html>
<html lang="pt-BR">
<?php 
    $title = "Biblioteca";
    $cssFiles = ['css/biblioteca.css', 'css/biblioteca-jogos.css'];
    include "head.php";
?>
<body>
  <?php include('header.php') ?>
  <main>
  <div class="container-header">    
    <h2>Biblioteca</h2>
    <h3>Veja os nossos repositórios</h3>
    <h4><a href="index.php">Página Inicial</a></h4>
    <h4> → <a href="biblioteca-petcomp-main.php">Biblioteca PETComp</a></h4>
    <h4> → Material Jogos</h4>
  </div>

  <?php 
    $href = 'biblioteca-petcomp-main.php';
    include('components/btn-voltar.php');
  ?>

  <div class="main-content">
    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img\algoritimizando - jogo.svg" alt="imagem algoritmizando">
      </div>
      <div class="card-content">
        <h3>Algoritmizando</h3>
        <p class="p-maior">Dinâmicas para o desenvolvimento de habilidades algorítmicas</p>
        <button class="download-btn">Download</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img\bingo_binario- jogo.svg" alt="imagem bingo">
      </div>
      <div class="card-content">
        <h3>Bingo Binário</h3>
        <p class="p-maior">Dinâmica para auxiliar no aprendizado do sistema de numeração binário</p>
        <button class="download-btn">Download</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img\boliche_binario - jogo.svg" alt="imagem boliche">
      </div>
      <div class="card-content">
        <h3>Boliche computacional</h3>
        <p>Dinâmica de perguntas envolvendo boliche</p>
        <button class="download-btn">Download</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img\couptacao - jogo.svg" alt="imagem couptacao">
      </div>
      <div class="card-content">
        <h3>Couptação</h3>
        <p class="p-maior">Dinâmica de cartas para desenvolvimento da comunicação</p>
        <button class="download-btn">Download</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img\desvendando- jogo.svg" alt="imagem jogo">
      </div>
      <div class="card-content">
        <h3>Desvendando os programadores</h3>
        <p>Dinâmica de lógica de múltipla escolha</p>
        <button class="download-btn">Download</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img\Encruzilhados - jogo.svg" alt="imagem encruzilhados">
      </div>
      <div class="card-content">
        <h3>Encruzilhados</h3>
        <p class="p-maior">Dinâmica para desenvolvimento de habilidades em conhecimentos gerais e atuação</p>
        <button class="download-btn">Download</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img\fecha_conta - jogo.svg" alt="imagem fecha a conta">
      </div>
      <div class="card-content">
        <h3>Fecha a Conta</h3>
        <p>Dinâmica de resolução de expressões</p>
        <button class="download-btn">Download</button>
      </div>
    </a>

    <a href="#"class="biblioteca-card">
      <div class="imagens">
        <img src="img\pure_logic - jogo.svg" alt="imagem pure logic">
      </div>
      <div class="card-content">
        <h3>Pure Logic</h3>
        <p>Jogo de enigmas cooperativo</p>
        <button class="download-btn">Download</button>
      </div>
    </a>

    <a href="#"class="biblioteca-card">
      <div class="imagens">
        <img src="img\l1m1tand0 - jogo.svg" alt="imagem limitando">
      </div>
      <div class="card-content">
        <h3>L1M1TANDO</h3>
        <p>Jogo envolvendo binário e limitação</p>
        <button class="download-btn">Download</button>
      </div>
    </a>

    <a href="#"class="biblioteca-card">
      <div class="imagens">
        <img src="img\tab_algorithm - jogo.svg" alt="imagem jogo">
      </div>
      <div class="card-content">
        <h3>Tab algorithm</h3>
        <p>Jogo de tabuleiro para ensino de computação</p>
        <button class="download-btn">Download</button>
      </div>
    </a>

    <a href="#"class="biblioteca-card">
      <div class="imagens">
        <img src="img\resolve_p_mim - jogo.svg" alt="imagem jogo">
      </div>
      <div class="card-content">
        <h3>Resolve Pra Mim</h3>
        <p>Jogo envolvendo Caixeiro Viajante</p>
        <button class="download-btn">Download</button>
      </div>
    </a>

    <a href="#"class="biblioteca-card">
      <div class="imagens">
        <img src="img\tabuleiro_algoritmo- jogo.svg" alt="imagem jogo">
      </div>
      <div class="card-content">
        <h3>Tabuleiro De Algoritmos</h3>
        <p>Jofo de tabuleiro para ensino de algoritmos</p>
        <button class="download-btn">Download</button>
      </div>
    </a>

    <a href="#"class="biblioteca-card">
      <div class="imagens">
        <img src="img\tabquiz - jogo.svg" alt="imagem jogo">
      </div>
      <div class="card-content">
        <h3>Tab-Quiz</h3>
        <p>Jogo de aprendizagem de hardware e sistema binário</p>
        <button class="download-btn">Download</button>
      </div>
    </a>

    <a href="#"class="biblioteca-card">
      <div class="imagens">
        <img src="img\while- jogo.svg" alt="imagem jogo">
      </div>
      <div class="card-content">
        <h3>While</h3>
        <p>Jogo de enigma cooperativo</p>
        <button class="download-btn">Download</button>
      </div>
    </a>
  </div>

  <?php include('footer.php') ?>
</body>
</html>