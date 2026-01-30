
document.addEventListener("DOMContentLoaded", (e) => {
  var pages = document.querySelectorAll(".page-item")
  var previous = document.querySelector("#previous") 
  var next = document.querySelector("#next") 
  var current_page = window.page // vindo do html
  pages.forEach((page) => {
    if(page.innerText == current_page) {
      page.classList.add("active");
    }
    if(current_page == 1) {
      previous.classList.add("disabled")
    }
    if(current_page == (pages.length-2)) {
      next.classList.add("disabled")
    }
  })
})

document.addEventListener('DOMContentLoaded', () => {
  // Seleciona todos os botões "mostrar mais"
  const showMoreButtons = document.querySelectorAll('.button-showmore');
  const closeButtons = document.querySelectorAll('.popup-close');
  let popupOpen = false; // Flag para verificar se algum popup está aberto

  // Exibir o popup ao clicar no botão
  showMoreButtons.forEach(button => {
    button.addEventListener('click', () => {
      if (!popupOpen) { // Verifica se algum popup está aberto
        const popupId = button.getAttribute('data-id');
        const popup = document.getElementById(`popup-${popupId}`);
        popup.classList.add('show');
        popupOpen = true; // Define a flag como verdadeira quando o popup está aberto
      }
    });
  });

  // Fechar o popup ao clicar no botão "fechar"
  closeButtons.forEach(button => {
    button.addEventListener('click', () => {
      const popup = button.closest('.popup');
      popup.classList.remove('show');
      popupOpen = false; // Define a flag como falsa quando o popup é fechado
    });
  });

  // Fechar o popup clicando fora do conteúdo
  document.querySelectorAll('.popup').forEach(popup => {
    popup.addEventListener('click', (event) => {
      // Verifica se o clique foi fora do conteúdo principal do popup
      const content = popup.querySelector('.popup-content');
      if (!content.contains(event.target)) {
        popup.classList.remove('show');
        popupOpen = false; // Define a flag como falsa quando o popup é fechado
      }
    });
  });
});


