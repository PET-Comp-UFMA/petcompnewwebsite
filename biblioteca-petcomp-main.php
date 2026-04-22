<?php require_once "scripts.php/renderComponent.php" ?>

<!DOCTYPE html>
<html lang="pt-BR">
  <?php 
    $title = "Biblioteca";
    $cssFiles = ['css\biblioteca-main.css', 'css/biblioteca.css'];
    include "head.php";
  ?>

<body>
  <?php include('header.php') ?>
  <main>

  <?php
      renderComponent("container-header.php", [
        "titulo_pagina" => "Biblioteca",
        "descricao" => "Veja os nossos repositórios",
        "caminho" => ["Biblioteca PETComp"]
      ]);

    ?> 

    <div class="container-body">
      <div class="container-body-content">
        <div class="container-body-text">
          <h5>REA-PET</h5>
          <p>Com o objetivo de apoiar tanto a comunidade acadêmica quanto a local, o PETComp criou o repositório educacional aberto REA-PET, onde oferece uma variedade de documentos e materiais de apoio que estão disponíveis para consulta a qualquer momento. Esses recursos foram cuidadosamente selecionados para atender às necessidades de estudantes, professores e pesquisadores, e podem ser acessados facilmente através do nosso site. Abaixo, você encontrará uma coleção de arquivos de auxílio educacional, que abrangem diferentes áreas do conhecimento e têm o intuito de complementar e enriquecer o aprendizado de todos.</p>
        </div>
        <img src="img/logoreapet.png" alt="Logo REA-PET">
      </div>
    </div>

    <div class="repositorio-opcoes">
      <a href="biblioteca-petcomp-monitoria.php" class="biblioteca-card">
        <div class="card-topo card-topo-monitoria" style="background-image: url('img/backgroundmonitorias.png'); background-size: cover; background-position: center;">
          <img src="img/monitoriaimagem.png" alt="monitorias">
        </div>
        <div class="card-content">
          <h3 class="card-titulo">Monitorias</h3>
          <p class="card-subtitulo">Apoio Acadêmico</p>
          <button class="acessar">Acessar</button>
        </div>
      </a>

      <a href="biblioteca-petcomp-jogos.php" class="biblioteca-card">
        <div class="card-topo card-topo-jogos" style="background-image: url('img/backgroundjogos.png'); background-size: cover; background-position: center;">
          <img src="img/controle.png" alt="controle">
        </div>
        <div class="card-content">
          <h3 class="card-titulo">Jogos Computacionais</h3>
          <p class="card-subtitulo">Prática e Interação</p>
          <button class="acessar">Acessar</button>
        </div>
      </a>

      <a href="biblioteca-petcomp-minicursos.php" class="biblioteca-card card-largo">
        <div class="card-topo card-topo-minicursos" style="background-image: url('img/backgroundminicursos.png'); background-size: cover; background-position: center;">
          <img src="img/logominicurso.png" alt="logo minicursos">
        </div>
        <div class="card-content">
          <h3 class="card-titulo">Minicursos</h3>
          <p class="card-subtitulo">Cursos Rápidos</p>
          <button class="acessar">Acessar</button>
        </div>
      </a>
    </div>
  </main>

  <?php include('footer.php') ?>
</body>
</html>