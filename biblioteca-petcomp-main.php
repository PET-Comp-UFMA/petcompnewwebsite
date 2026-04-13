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

    <?php 
      $href = 'index.php';
      include('components/btn-voltar.php');
    ?>
      
    <div class="container-body">
      <p>Com o objetivo de apoiar tanto a comunidade acadêmica quanto a local, o PETComp oferece uma variedade de documentos e materiais de apoio que estão disponíveis para consulta a qualquer momento. Esses recursos foram cuidadosamente selecionados para atender às necessidades de estudantes, professores e pesquisadores, e podem ser acessados facilmente através do nosso site. Abaixo, você encontrará uma coleção de arquivos de auxílio educacional, que abrangem diferentes áreas do conhecimento e têm o intuito de complementar e enriquecer o aprendizado de todos.  </p>        
    </div>

    <div class="repositorio-opcoes">
      <a href="biblioteca-petcomp-monitoria.php" class="biblioteca-card">
        <div class="card-imagens-juntas">
          <img class="imgs-juntas" src="img/algoritmos.png" alt="algoritmos">
          <img class="imgs-juntas" src="img/calculo.png" alt="calculo">
          <img class="imgs-juntas" src="img/ed1.png" alt="ed1">
          <img class="imgs-juntas" src="img/lp1.png" alt="lp1">
          <img class="imgs-juntas" src="img/mdl.png" alt="mdl">
        </div>
        <div class="card-content">
          <h3 class="card-titulo">Monitorias</h3>
          <p class="card-descricao">A atividade é realizada 3 vezes por semana, durante duas horas em uma sala do Google Meet criada previamente. Os petianos responsáveis pela atividade ficam a disposição para responder as perguntas surgidas durante a aula e/ou durante a resolução dos exercícios e passam exercícios sobre o atual assunto dado naquele momento da disciplina que podem ser respondidos durante a monitoria ou em um momento posterior. </p>
          <button class="saiba-mais">Saber mais</button>
        </div>
      </a>

      <a href="biblioteca-petcomp-jogos.php" class="biblioteca-card">
        <div class="card-imagem">
          <img src="assets/svg/LOGO-Jogos-Computacionais.svg" alt="logo jogos">
        </div>
        <div class="card-content">
          <h3 class="card-titulo">Jogos Computacionais</h3>
          <p class="card-descricao">A atividade de Jogos Computacionais é realizada durante eventos como da Acalourada e consiste em ofertar  diversos jogos para os calouros, promovendo interação, integração e acolhimento entre os novos estudantes. Os petianos responsáveis organizam a dinâmica em um espaço previamente preparado e permanecem à disposição para orientar os participantes, explicar as regras de cada jogo e auxiliar no uso dos equipamentos.  A proposta da dinâmica é aproximar o PET dos calouros, estimulando um primeiro contato leve com o curso e fortalecendo o espírito de comunidade.</p>
          <button class="saiba-mais">Saber mais</button>
        </div>
      </a>

      <a href="biblioteca-petcomp-minicursos.php" class="biblioteca-card">
        <div class="card-imagem">
          <img src="assets/svg/logo-minicursos.svg" alt="logo minicursos">
        </div>
        <div class="card-content">
          <h3 class="card-titulo">Minicursos</h3>
          <p class="card-descricao">A atividade de Minicursos do PETComp é realizada sempre que o grupo participa de eventos internos ou externos, oferecendo formações rápidas e acessíveis para diferentes públicos. Os minicursos são preparados e ministrados pelos petianos, que organizam o conteúdo, estruturam o material e acompanham os participantes durante toda a execução da atividade. Há duas modalidades principais: minicursos voltados para a comunidade em geral, com temas introdutórios e acessíveis a qualquer interessado, e minicursos focados em programação.</p>
          <button class="saiba-mais">Saber mais</button>
        </div>
      </a>
    </div>
  </main>

  <?php include('footer.php') ?>
</body>
</html>