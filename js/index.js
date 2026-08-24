
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



(function dropdownController() {
    let mediaQuery = window.matchMedia("(max-width: 950px)");
    window.addEventListener("change", () => {
        mediaQuery = window.matchMedia("(max-width: 950px)");
    })

    let dropdownActive = null;

    function enableDropdown(dropdown) {
        dropdown.classList.add("open");
    }

    function disableDropdown(dropdown) {
        dropdown.classList.remove("open");
    }

    function handleClick(click) {
        const dropdown = click.target.closest(".dropdown");
        const dropbtn = click.target.closest(".dropbtn");


        // Clicar fora de dropdowns
        if (!dropdown) {
            if (dropdownActive) {
                disableDropdown(dropdownActive);
                dropdownActive = null;
            }
            return;
        }

        // Clicar para abrir um primeiro dropdown
        if (!dropdownActive) {
            enableDropdown(dropdown);
            dropdownActive = dropdown;
            return;
        }

        // Clicar para abrir um segundo dropdown e fechar o primeiro
        if (dropdown !== dropdownActive) {
            disableDropdown(dropdownActive);
            enableDropdown(dropdown);
            dropdownActive = dropdown;
            return;
        }
        
        // Se clicou no contéudo do dropdown, e não no botão
        if (!dropbtn) {
            return;
        }

        // Clicar para fechar o dropdown aberto
        disableDropdown(dropdownActive);
        dropdownActive = null;
    }

    document.addEventListener("click", handleClick);
})();