

// Botão "voltar ao topo"
window.onscroll = function() {
    const botao = document.getElementById("topo-btn");
    if(document.body,scrollTop > 200 || document.documentElement.scrollTop > 200) {
        botao.style.display = "block";
    } else {
        botao.style.display = "none";
    }
};

function voltarAoTopo() {
    window.scrollTo({top: 0, behavior: 'smooth'});
}


// Função expandir imagem
function expandirImagem(img) {
    const modal = document.getElementById('imagemModal');
    const imagemExpandida = document.getElementById('imagemExpandida');
    imagemExpandida.src = img.src;
    modal.style.display = 'flex';

    // Adiciona a tecla esc quando a imagem é expandida
    document.addEventListener('keydown', escFecharModal);
}

// Fechar modal
function fecharModal(event) {
    if(event) event.stopPropagation(); // evita fechar ao clicar no botão
    document.getElementById('imagemModal').style.display = 'none';

    // Remove a tecla esc quando a imagem é fechada
    document.removeEventListener('keydown', escFecharModal);
}

// Função para lidar com a tecla esc
function escFecharModal(event) {
    if(event.key == 'Escape') {
      fecharModal();
    }
}

// Vincula evento de clique a todas as imagens
document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".galeria img").forEach(img => {
    img.addEventListener("click", () => expandirImagem(img));
  });
});


// Função para diversos tamanhos de imagens
// Mapeamento dos eventos e suas imagens
const imagensPorEvento = {
  exploracomp2025: [
    "img/2025/ExploraComp2025/exploracomp1.png",
    "img/2025/ExploraComp2025/exploracomp2.png",
    "img/2025/ExploraComp2025/exploracomp3.png",
    "img/2025/ExploraComp2025/exploracomp4.png",
    "img/2025/ExploraComp2025/exploracomp5.png",
    "img/2025/ExploraComp2025/exploracomp6.png",
    "img/2025/ExploraComp2025/exploracomp7.png",
    "img/2025/ExploraComp2025/exploracomp8.png"
  ],
  acalourada2025: [
    "img/2025/Acalourada2025/acalourada2025.1_1.jpg",
    "img/2025/Acalourada2025/acalourada2025.1_2.jpg",
    "img/2025/Acalourada2025/acalourada2025.1_7.jpg",
    "img/2025/Acalourada2025/acalourada2025.1_3.jpg",
    "img/2025/Acalourada2025/acalourada2025.1_6.jpg",
    "img/2025/Acalourada2025/acalourada2025.1_4.jpg",
    "img/2025/Acalourada2025/acalourada2025.1_8.jpg",
    "img/2025/Acalourada2025/acalourada2025.1_5.jpg"
  ],
  cnst: [
    "img/2025/Fab.Software2025/Fab.Software1.png",
    "img/2025/Fab.Software2025/Fab.Software2.png",
    "img/2025/Fab.Software2025/Fab.Software3.png",
    "img/2025/Fab.Software2025/Fab.Software4.png"
  ],
  exploracompsite: [
    "img/2025/Fab.Software2025/Fab.Software6.png",
    "img/2025/Fab.Software2025/Fab.Software5.png",
    "img/2025/Fab.Software2025/Fab.Software8.png",
    "img/2025/Fab.Software2025/Fab.Software7.png",
    "img/2025/Fab.Software2025/Fab.Software9.png",
    "img/2025/Fab.Software2025/Fab.Software10.png",
    "img/2025/Fab.Software2025/Fab.Software12.png",
    "img/2025/Fab.Software2025/Fab.Software11.png"
  ],
  acalourada2024_2: [
    "img/2024/Acalourada 2024.1/Acaloura2024.2_1.jpg",
    "img/2024/Acalourada 2024.1/Acaloura2024.2_2.jpg",
    "img/2024/Acalourada 2024.1/Acaloura2024.2_3.jpg",
    "img/2024/Acalourada 2024.1/Acaloura2024.2_4.jpg",
    "img/2024/Acalourada 2024.1/Acaloura2024.2_5.jpg",
    "img/2024/Acalourada 2024.1/Acaloura2024.2_6.jpg",
    "img/2024/Acalourada 2024.1/Acaloura2024.2_7.jpg",
    "img/2024/Acalourada 2024.1/Acaloura2024.2_8.jpg"
  ],
};


document.querySelectorAll('.galeria').forEach(galeria => {
  const evento = galeria.dataset.evento;
  const imagens = imagensPorEvento[evento];
  if (!imagens) return;

  for (let i = 0; i < imagens.length; i += 2) {
    const grupo = document.createElement('div');
    grupo.classList.add('imagens-group');

    const grupoIndex = Math.floor(i / 2);
    const par = grupoIndex % 2 === 0;

    // Primeira imagem do grupo
    const img1 = document.createElement('img');
    img1.src = imagens[i];
    img1.classList.add(par ? 'horizontal' : 'vertical');
    grupo.appendChild(img1);

    // Segunda imagem do grupo (se existir)
    if (imagens[i + 1]) {
      const img2 = document.createElement('img');
      img2.src = imagens[i + 1];
      img2.classList.add(par ? 'vertical' : 'horizontal');
      grupo.appendChild(img2);
    } else {
      // Só tem uma imagem no grupo (ímpar), centraliza
      grupo.style.alignItems = "center";
    }

    galeria.appendChild(grupo);
  }
});