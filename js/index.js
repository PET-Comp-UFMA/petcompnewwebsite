
let currentIndex = 0;
// Função para mudar as notícias a cada 6 segundos
function changeNews() {
    const noticias = document.querySelectorAll('.noticia');
    
    // Adiciona a classe fade-out a todas as notícias para iniciar a transição de saída
    noticias.forEach((noticia) => {
        noticia.classList.remove('fade-in');
        noticia.classList.add('fade-out');
    });

    // Após 500ms, atualiza as notícias e aplica fade-in
    setTimeout(() => {
        noticias.forEach((noticia, index) => {
            const newsIndex = (currentIndex + index) % newsData.length;
            noticia.querySelector('img').src = newsData[newsIndex].foto; 
            newhref = "noticia.php?id=" + newsData[newsIndex].id
            noticia.setAttribute('href', newhref)
            
            // Define o título de acordo com a posição
            if (index === 0) { // Notícia principal (60 caracteres)
                noticia.querySelector('.titulo').innerText = newsData[newsIndex].titulo.length > 60 
                    ? newsData[newsIndex].titulo.substring(0, 60) + '...' 
                    : newsData[newsIndex].titulo;
            } else { // Notícias laterais (30 caracteres)
                noticia.querySelector('.titulo').innerText = newsData[newsIndex].titulo.length > 30 
                    ? newsData[newsIndex].titulo.substring(0, 30) + '...' 
                    : newsData[newsIndex].titulo;
            }
        });

        // Aplica a transição fade-in
        noticias.forEach((noticia) => {
            noticia.classList.remove('fade-out');
            noticia.classList.add('fade-in');
        });

        // Atualiza o índice
        currentIndex = (currentIndex + 1) % newsData.length;
    }, 500); // Tempo para a transição suave
}


// Inicia o loop para mudança de notícias
setInterval(changeNews, 6000);

// Função para abrir menu mobile do header
function openMenu() {
    document.querySelector('.navbar').classList.toggle('active');
}

