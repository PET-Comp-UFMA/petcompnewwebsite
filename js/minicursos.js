// Solução para os problemas de paginação
document.addEventListener('DOMContentLoaded', function() {
  const aba1 = document.getElementById('aba-1');
  const aba2 = document.getElementById('aba-2');
  const aba3 = document.getElementById('aba-3');
  
  const btnPrimeiro = document.getElementById('primeiro');
  const btnSegundo = document.getElementById('segundo');
  const btnTerceiro = document.getElementById('terceiro');
  const btnPrev = document.getElementById('prev');
  const btnNext = document.getElementById('next');
  
  let paginaAtual = 1;
  
  // Função para mostrar a aba correta
  function mostrarAba(numeroPagina) {
    // Esconde todas as abas
    aba1.style.display = 'none';
    aba2.style.display = 'none';
    aba3.style.display = 'none';
    
    // Remove classe ativa de todos os botões
    btnPrimeiro.classList.remove('ativo');
    btnSegundo.classList.remove('ativo');
    btnTerceiro.classList.remove('ativo');
    
    // Mostra a aba correta com display: grid
    if (numeroPagina === 1) {
      aba1.style.display = 'grid';
      btnPrimeiro.classList.add('ativo');
      paginaAtual = 1;
    } else if (numeroPagina === 2) {
      aba2.style.display = 'grid';
      btnSegundo.classList.add('ativo');
      paginaAtual = 2;
    } else if (numeroPagina === 3) {
      aba3.style.display = 'grid';
      btnTerceiro.classList.add('ativo');
      paginaAtual = 3;
    }
  }
  
  // Event listeners para os botões de página
  btnPrimeiro.addEventListener('click', function(e) {
    e.preventDefault();
    mostrarAba(1);
  });
  
  btnSegundo.addEventListener('click', function(e) {
    e.preventDefault();
    mostrarAba(2);
  });
  
  btnTerceiro.addEventListener('click', function(e) {
    e.preventDefault();
    mostrarAba(3);
  });
  
  // Event listeners para prev/next
  btnPrev.addEventListener('click', function(e) {
    e.preventDefault();
    if (paginaAtual > 1) {
      mostrarAba(paginaAtual - 1);
    }
  });
  
  btnNext.addEventListener('click', function(e) {
    e.preventDefault();
    if (paginaAtual < 3) {
      mostrarAba(paginaAtual + 1);
    }
  });
  
  // Inicializa mostrando a primeira página
  mostrarAba(1);
});