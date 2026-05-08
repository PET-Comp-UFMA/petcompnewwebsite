<?php require_once "scripts.php/renderComponent.php" ?>

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

    <?php renderComponent("container-header.php", [
      "titulo_pagina" => "Jogos Computacionais",
      "descricao" => "Veja os nossos Jogos",
      "caminho" => ["Biblioteca PETComp", "Jogos Computacionais"]
    ]);
    ?>

    <?php
    $href = 'repositorio-educacional';
    include('components/btn-voltar.php');
    ?>

    <div class="main-content">
      <a href="https://drive.google.com/drive/folders/1J-iSZRhVLzaDzJzj_L5kGSMnuT52sxpw?usp=sharing" class="biblioteca-card">
        <div class="imagens">
          <img src="img\algoritimizando - jogo.svg" alt="imagem algoritmizando">
        </div>
        <div class="card-content">
          <h3>Algoritmizando</h3>
          <p class="p-maior">Dinâmicas para o desenvolvimento de habilidades algorítmicas</p>
          <button class="download-btn">Acessar</button>
        </div>
      </a>

      <a href="https://drive.google.com/drive/folders/1z7xq1YGo-r5MNQ0apHzgLMZQrmbuKStb?usp=sharing" class="biblioteca-card">
        <div class="imagens">
          <img src="img\bingo_binario- jogo.svg" alt="imagem bingo">
        </div>
        <div class="card-content">
          <h3>Bingo Binário</h3>
          <p class="p-maior">Dinâmica para auxiliar no aprendizado do sistema de numeração binário</p>
          <button class="download-btn">Acessar</button>
        </div>
      </a>

      <a href="https://drive.google.com/drive/folders/19nc9o4xyHID6kKgdeO379r9O-yN_u2gG?usp=sharing" class="biblioteca-card">
        <div class="imagens">
          <img src="img\boliche_binario - jogo.svg" alt="imagem boliche">
        </div>
        <div class="card-content">
          <h3>Boliche computacional</h3>
          <p>Dinâmica de perguntas envolvendo boliche</p>
          <button class="download-btn">Acessar</button>
        </div>
      </a>

      <a href="https://drive.google.com/drive/folders/1ua_bJdBWdoSSWWk9gMqwL6Gv3PLGpwV6?usp=sharing" class="biblioteca-card">
        <div class="imagens">
          <img src="img\couptacao - jogo.svg" alt="imagem couptacao">
        </div>
        <div class="card-content">
          <h3>Couptação</h3>
          <p class="p-maior">Dinâmica de cartas para desenvolvimento da comunicação</p>
          <button class="download-btn">Acessar</button>
        </div>
      </a>

      <a href="https://drive.google.com/drive/folders/10aiuBI1c40ym6_rULVMPyC2YO2ZiWexd?usp=sharing" class="biblioteca-card">
        <div class="imagens">
          <img src="img\desvendando- jogo.svg" alt="imagem jogo">
        </div>
        <div class="card-content">
          <h3>Desvendando os programadores</h3>
          <p>Dinâmica de lógica de múltipla escolha</p>
          <button class="download-btn">Acessar</button>
        </div>
      </a>

      <a href="https://drive.google.com/drive/folders/1nm-mzXmjRxFWCNmUXMfc_dnHfc67UOWc?usp=sharing" class="biblioteca-card">
        <div class="imagens">
          <img src="img\Encruzilhados - jogo.svg" alt="imagem encruzilhados">
        </div>
        <div class="card-content">
          <h3>Encruzilhados</h3>
          <p class="p-maior">Dinâmica para desenvolvimento de habilidades em conhecimentos gerais e atuação</p>
          <button class="download-btn">Acessar</button>
        </div>
      </a>

      <a href="https://drive.google.com/drive/folders/1Jp8B2fgihqrDZ1CnMg6pyxkKYX98LUC8?usp=sharing" class="biblioteca-card">
        <div class="imagens">
          <img src="img\fecha_conta - jogo.svg" alt="imagem fecha a conta">
        </div>
        <div class="card-content">
          <h3>Fecha a Conta</h3>
          <p>Dinâmica de resolução de expressões</p>
          <button class="download-btn">Acessar</button>
        </div>
      </a>

      <a href="https://drive.google.com/drive/folders/16hTWg06et0_YZt1kaPtJjlbGjtOavfno?usp=sharing" class="biblioteca-card">
        <div class="imagens">
          <img src="img\pure_logic - jogo.svg" alt="imagem pure logic">
        </div>
        <div class="card-content">
          <h3>Pure Logic</h3>
          <p>Jogo de enigmas cooperativo</p>
          <button class="download-btn">Acessar</button>
        </div>
      </a>

      <a href="https://drive.google.com/drive/folders/1tPMFaniiYhX3hjPrU0XOTX1eAC3PM6EA?usp=sharing" class="biblioteca-card">
        <div class="imagens">
          <img src="img\l1m1tand0 - jogo.svg" alt="imagem limitando">
        </div>
        <div class="card-content">
          <h3>L1M1TANDO</h3>
          <p>Jogo envolvendo binário e limitação</p>
          <button class="download-btn">Acessar</button>
        </div>
      </a>

      <a href="https://drive.google.com/drive/folders/1BK5yHy7TOKLVzo0d0y5mb6yaY5bZXese?usp=sharing" class="biblioteca-card">
        <div class="imagens">
          <img src="img\tab_algorithm - jogo.svg" alt="imagem jogo">
        </div>
        <div class="card-content">
          <h3>Tab algorithm</h3>
          <p>Jogo de tabuleiro para ensino de computação</p>
          <button class="download-btn">Acessar</button>
        </div>
      </a>

      <a href="https://drive.google.com/drive/folders/1XTa3kRUOL9bHo_g20bkiMi2tzPf7fLGr?usp=sharing" class="biblioteca-card">
        <div class="imagens">
          <img src="img\resolve_p_mim - jogo.svg" alt="imagem jogo">
        </div>
        <div class="card-content">
          <h3>Resolve Pra Mim</h3>
          <p>Jogo envolvendo Caixeiro Viajante</p>
          <button class="download-btn">Acessar</button>
        </div>
      </a>

      <a href="https://drive.google.com/drive/folders/1v6-RQ4EGoLYeNxwKrNscXPzC2mHdivg3?usp=sharing" class="biblioteca-card">
        <div class="imagens">
          <img src="img\tabuleiro_algoritmo- jogo.svg" alt="imagem jogo">
        </div>
        <div class="card-content">
          <h3>Tabuleiro De Algoritmos</h3>
          <p>Jofo de tabuleiro para ensino de algoritmos</p>
          <button class="download-btn">Acessar</button>
        </div>
      </a>

      <a href="https://drive.google.com/drive/folders/1wFV_S87_0qP5eBRMbC6UnX69I0Dw27Dk?usp=sharing" class="biblioteca-card">
        <div class="imagens">
          <img src="img\tabquiz - jogo.svg" alt="imagem jogo">
        </div>
        <div class="card-content">
          <h3>Tab-Quiz</h3>
          <p>Jogo de aprendizagem de hardware e sistema binário</p>
          <button class="download-btn">Acessar</button>
        </div>
      </a>

      <a href="https://drive.google.com/drive/folders/1AntImoGCCqj7GPlVqdK3EewTQOnHzNEJ?usp=sharing" class="biblioteca-card">
        <div class="imagens">
          <img src="img\while- jogo.svg" alt="imagem jogo">
        </div>
        <div class="card-content">
          <h3>While</h3>
          <p>Jogo de enigma cooperativo</p>
          <button class="download-btn">Acessar</button>
        </div>
      </a>
    </div>

    <?php include('footer.php') ?>
</body>

</html>