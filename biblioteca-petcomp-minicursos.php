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
  <main>
  <div class="container-header">    
    <h2>Biblioteca</h2>
    <h3>Veja os nossos repositórios</h3>
    <h4><a href="index.php">Página Inicial</a></h4>
    <h4> → <a href="biblioteca-petcomp-main.php">Biblioteca PETComp</a></h4>
    <h4> → Material Minicursos</h4>
  </div>

  <?php 
    $href = 'biblioteca-petcomp-main.php';
    include('components/btn-voltar.php');
  ?>

  <div class="main-content" id="aba-1">
    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/arduino-basico.png" alt="imagem placa arduino">
      </div>
      <div class="card-content">
        <h3>Arduíno básico</h3>
        <p>Minicurso sobre placas arduínos</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/banco-de-dados.png" alt="imagem banco">
      </div>
      <div class="card-content">
        <h3>banco de Dados</h3>
        <p>Minicurso sobre Banco de Dados</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/codigo-limpo.png" alt="imagem codigo">
      </div>
      <div class="card-content">
        <h3>Código Limpo</h3>
        <p>Minicurso sobre boas práticas de codificação</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/design-informacional.png" alt="imagem design">
      </div>
      <div class="card-content">
        <h3>Design Informacional</h3>
        <p>Minicurso sobre design digital</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/precificacao.png" alt="imagem jogo">
      </div>
      <div class="card-content">
        <h3>Estimativa e precificação de software</h3>
        <p>Minicurso sobre como precificar o seu software</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/obs-studio.png" alt="imagem encruzilhados">
      </div>
      <div class="card-content">
        <h3>Ferramenta de gravação de tela - OBS</h3>
        <p>Minicurso sobre como utilizar a ferramenta de gravação OBS Studio</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/ferramentas-de-software.png" alt="imagem jogo">
      </div>
      <div class="card-content">
        <h3>Ferramentas de teste de software</h3>
        <p>Minicurso sobre ferramentas para realização de testes de software</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/code-igniter.png" alt="imagem encruzilhados">
      </div>
      <div class="card-content">
        <h3>Framework WEB - CodeIgniter</h3>
        <p>Minicurso sobre utilização do framework WEB - CodeIgniter</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>
  </div>


  <!-- SEGUNDA ABA -->
  <div class="main-content" id="aba-2" style="display: none;">
    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/curso-github.png" alt="imagem git">
      </div>
      <div class="card-content">
        <h3>Gerenciamento de versões - GIT</h3>
        <p>Minicurso sobre Git</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/banco-de-dados.png" alt="imagem banco">
      </div>
      <div class="card-content">
        <h3>Integração de sites com banco de dados</h3>
        <p>Minicurso sobre integração de sites com bancos de dados</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/curso-htmlcss.png" alt="imagem html e css">
      </div>
      <div class="card-content">
        <h3>Introdução a HTML e CSS</h3>
        <p>Minicurso sobre HTML e CSS</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/curso-logica.png" alt="imagem curso logica">
      </div>
      <div class="card-content">
        <h3>Introdução a lógica de programação</h3>
        <p>Minicurso sobre introdução a lógica de programação</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/curso-php.png" alt="imagem curso php">
      </div>
      <div class="card-content">
        <h3>Introdução a PHP</h3>
        <p>Minicurso sobre PHP</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/curso-java.png" alt="imagem curso java">
      </div>
      <div class="card-content">
        <h3>JAVA</h3>
        <p>Minicurso sobre Java</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/curso-javascript.png" alt="imagem curso javascript">
      </div>
      <div class="card-content">
        <h3>Javascript</h3>
        <p>Minicurso sobre Javascript</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/curso-linux.png" alt="imagem curso linux">
      </div>
      <div class="card-content">
        <h3>Linux e servidores</h3>
        <p>Minicurso sobre Linux e servidores</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>
  </div>


  <!-- TERCEIRA ABA -->
  <div class="main-content" id="aba-3" style="display: none;">
    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/curso-poo.png" alt="imagem poo">
      </div>
      <div class="card-content">
        <h3>Programação orientada a objeto</h3>
        <p>Minicurso sobre P.O.O</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/curso-scrum.png" alt="imagem scrum">
      </div>
      <div class="card-content">
        <h3>Projetos Ágeis</h3>
        <p>Minicurso sobre modelo ágil SCRUM</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/curso-react.png" alt="imagem react">
      </div>
      <div class="card-content">
        <h3>React</h3>
        <p>Minicurso sobre React</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/curso-react-native.png" alt="imagem react native">
      </div>
      <div class="card-content">
        <h3>React Native</h3>
        <p>Minicurso sobre React Native</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/curso-redes.png" alt="imagem curso redes">
      </div>
      <div class="card-content">
        <h3>Redes de Computadores</h3>
        <p>Minicurso sobre redes de computadores</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/obs-studio.png" alt="imagem usabilidade">
      </div>
      <div class="card-content">
        <h3>Usabilidade</h3>
        <p>Minicurso sobre ferramentas úteis pro trabalho diário</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/curso-figma.png" alt="imagem figma">
      </div>
      <div class="card-content">
        <h3>Vetorização e prototipação com Figma</h3>
        <p>Minicurso sobre vetorização e prototipação utilizando figma</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>

    <a href="#" class="biblioteca-card">
      <div class="imagens">
        <img src="img/curso-wordpress.png" alt="imagem wordpress">
      </div>
      <div class="card-content">
        <h3>Wordpress</h3>
        <p>Minicurso sobre Wordpress</p>
        <button class="download-btn">Acessar</button>
      </div>
    </a>
  </div>

  <div class="pagination">
    <div id="prev" class="box-pagination">
      <h1><</h1>
    </div>
    <div id="primeiro" class="box-pagination">
      <h1>1</h1>
    </div>
    <div  id="segundo" class="box-pagination">
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