<?php require_once "scripts.php/renderComponent.php" ?>

<!DOCTYPE html>
<html lang="pt-BR">
<?php
$title = "Biblioteca";
$cssFiles = ['css/biblioteca-jogos.css', 'css/biblioteca.css'];
$jsFiles = ['js/minicursos.js'];
include "head.php";
?>

<body>
  <?php include('header.php') ?>

  <?php renderComponent("container-header.php", [
    "titulo_pagina" => "Minicursos",
    "descricao" => "Veja os nossos minicursos",
    "caminho" => ["Biblioteca PETComp", "Minicursos"]
  ]);
  ?>

  <main>

    <?php
    $href = 'repositorio-educacional';
    include('components/btn-voltar.php');
    ?>

    <div class="main-content" id="aba-1">
      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/arduino-basico.png" alt="imagem placa arduino">
        </div>
        <div class="card-content">
          <h3>Arduíno básico</h3>
          <p>Minicurso sobre placas arduínos</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1nV3EjkeOaQ05jin912I2RCNC9aIVBxoF?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/banco-de-dados.png" alt="imagem banco">
        </div>
        <div class="card-content">
          <h3>banco de Dados</h3>
          <p>Minicurso sobre Banco de Dados</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1_FPiwrs025vCJfSMahkg-v2VsrgGiQvs?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/codigo-limpo.png" alt="imagem codigo">
        </div>
        <div class="card-content">
          <h3>Código Limpo</h3>
          <p>Minicurso sobre boas práticas de codificação</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/10jDQklpAupkDjPPdxmMN7T0ItvDoPAVJ?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/design-informacional.png" alt="imagem design">
        </div>
        <div class="card-content">
          <h3>Design Informacional</h3>
          <p>Minicurso sobre design digital</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1JOsgZNUdC0wZxlSyXhFDYw7cV33vUCFF?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/precificacao.png" alt="imagem jogo">
        </div>
        <div class="card-content">
          <h3>Estimativa e precificação de software</h3>
          <p>Minicurso sobre como precificar o seu software</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1WC4YsN3RY6t_V34a-lh_s67XYbEm4qWz?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/obs-studio.png" alt="imagem encruzilhados">
        </div>
        <div class="card-content">
          <h3>Ferramenta de gravação de tela - OBS</h3>
          <p>Minicurso sobre como utilizar a ferramenta de gravação OBS Studio</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1H9xEwBUpg5a4FKs0NA69dTYlKrBHfvyH?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/ferramentas-de-software.png" alt="imagem jogo">
        </div>
        <div class="card-content">
          <h3>Ferramentas de teste de software</h3>
          <p>Minicurso sobre ferramentas para realização de testes de software</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1J-x1foQ4BNO0RZO46IlfnWCMGN5NiSgi?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/code-igniter.png" alt="imagem encruzilhados">
        </div>
        <div class="card-content">
          <h3>Framework WEB - CodeIgniter</h3>
          <p>Minicurso sobre utilização do framework WEB - CodeIgniter</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/13Cd1FRjNtaIInJerI5i6yBp5mZpHyFeX?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>
    </div>


    <!-- SEGUNDA ABA -->
    <div class="main-content" id="aba-2" style="display: none;">
      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/curso-github.png" alt="imagem git">
        </div>
        <div class="card-content">
          <h3>Gerenciamento de versões - GIT</h3>
          <p>Minicurso sobre Git</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1dCenrdRcLlEczHjnd6yEH7qoXUdjFZ8j?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/banco-de-dados.png" alt="imagem banco">
        </div>
        <div class="card-content">
          <h3>Integração de sites com banco de dados</h3>
          <p>Minicurso sobre integração de sites com bancos de dados</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1_gqqDl8f4KA08F6tZH1CI5mRWhyx2nw3?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/curso-htmlcss.png" alt="imagem html e css">
        </div>
        <div class="card-content">
          <h3>Introdução a HTML e CSS</h3>
          <p>Minicurso sobre HTML e CSS</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1vdAoKgjkro8k6tY0PpgjxhCtObjhlhng?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/curso-logica.png" alt="imagem curso logica">
        </div>
        <div class="card-content">
          <h3>Introdução a lógica de programação</h3>
          <p>Minicurso sobre introdução a lógica de programação</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1diJS-OJSP0moGQftwPAJIUikWlb1pLIV?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/curso-php.png" alt="imagem curso php">
        </div>
        <div class="card-content">
          <h3>Introdução a PHP</h3>
          <p>Minicurso sobre PHP</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1TGCR4lk-s7CfFaTnaPf2dirSIS-FFgh9?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/curso-java.png" alt="imagem curso java">
        </div>
        <div class="card-content">
          <h3>JAVA</h3>
          <p>Minicurso sobre Java</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/13Ar66sMwoNU6lMv62wTypndRQEOfxvFk?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/curso-javascript.png" alt="imagem curso javascript">
        </div>
        <div class="card-content">
          <h3>Javascript</h3>
          <p>Minicurso sobre Javascript</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1hNgivinayJPvxl6IguZ8DutzaZtRKfMj?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/curso-linux.png" alt="imagem curso linux">
        </div>
        <div class="card-content">
          <h3>Linux e servidores</h3>
          <p>Minicurso sobre Linux e servidores</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1Pmu5McqVaxFU-88RphhgYVTGni0wYVtn?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>
    </div>


    <!-- TERCEIRA ABA -->
    <div class="main-content" id="aba-3" style="display: none;">
      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/curso-poo.png" alt="imagem poo">
        </div>
        <div class="card-content">
          <h3>Programação orientada a objeto</h3>
          <p>Minicurso sobre P.O.O</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/15HfdxZCagfXf4Wlq_XS6AnnSLlzlMlrU?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/curso-scrum.png" alt="imagem scrum">
        </div>
        <div class="card-content">
          <h3>Projetos Ágeis</h3>
          <p>Minicurso sobre modelo ágil SCRUM</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1JuAjrlQeofdqaSGOBx9H5DjdkaIpK1Cg?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/curso-react.png" alt="imagem react">
        </div>
        <div class="card-content">
          <h3>React</h3>
          <p>Minicurso sobre React</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1MxGROhNq376MWvWmdXpr-WFRYr1RK3le?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/curso-react-native.png" alt="imagem react native">
        </div>
        <div class="card-content">
          <h3>React Native</h3>
          <p>Minicurso sobre React Native</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1c2SBaUcuwYJ2vIItbvC6HiylILxaQZMq?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/curso-redes.png" alt="imagem curso redes">
        </div>
        <div class="card-content">
          <h3>Redes de Computadores</h3>
          <p>Minicurso sobre redes de computadores</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1XD2ZYd--aZpUm-LyD1jeBMmwzUYERAX0?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/obs-studio.png" alt="imagem usabilidade">
        </div>
        <div class="card-content">
          <h3>Usabilidade</h3>
          <p>Minicurso sobre ferramentas úteis pro trabalho diário</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1CmKvogI7J6UtrXK-c70oVnDizHikrTTN?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/curso-figma.png" alt="imagem figma">
        </div>
        <div class="card-content">
          <h3>Vetorização e prototipação com Figma</h3>
          <p>Minicurso sobre vetorização e prototipação utilizando figma</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1vbRRfaSiqWtXpiW5qwtP6AOp7XssFPYI?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>

      <div class="biblioteca-card">
        <div class="imagens">
          <img src="img/curso-wordpress.png" alt="imagem wordpress">
        </div>
        <div class="card-content">
          <h3>Wordpress</h3>
          <p>Minicurso sobre Wordpress</p>
          <a class="download-btn" href="https://drive.google.com/drive/folders/1Pdt9CQnxfHa7pehzXeCt_3_ck57l22cj?usp=sharing" target="_blank" style="text-decoration: none;">Acessar</a>
        </div>
      </div>
    </div>

    <div class="pagination">
      <div id="prev" class="box-pagination">
        <h1>
        <h1><</h1>
      </div>
      <div id="primeiro" class="box-pagination">
        <h1>1</h1>
      </div>
      <div id="segundo" class="box-pagination">
        <h1>2</h1>
      </div>
      <div id="terceiro" class="box-pagination">
        <h1>3</h1>
      </div>
      <div id="next" class="box-pagination">
        <h1>></h1>
      </div>
    </div>

    <?php include('footer.php') ?>
</body>

</html>