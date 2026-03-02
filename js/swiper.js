var infoSwiper = new Swiper('.info-carousel',{
  slidesPerView: 1,
  centeredSlides: true,
  spaceBetween: 30,
  loop: true,
  autoHeight: true,
  allowTouchMove: false 
});

var swiper = new Swiper('.carousel', {
    slidesPerView: 3,
    centeredSlides: true,
    spaceBetween: 30,
    loop: true,

    slideToClickedSlide: false, 
    preventClicks: true,      
    preventClicksPropagation: true,

    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },

    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },

    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 3,
    }
  }
});

swiper.controller.control = infoSwiper;
infoSwiper.controller.control = swiper;

document.querySelectorAll('.carousel .swiper-slide').forEach((slide, index) => {
  slide.addEventListener('click', () => {
    swiper.slideToLoop(index);
  });
});

const modal = document.getElementById('bannerModal');
const modalImg = document.getElementById('modalImage');
const closeModal = document.getElementById('closeModal');

document.querySelectorAll('.swiper-slide img').forEach(img => {
  img.addEventListener('click', (e) => {
    e.preventDefault();     // bloqueia ação padrão
    e.stopImmediatePropagation(); // BLOQUEIA o Swiper

    modal.style.display = 'flex';
    modalImg.src = img.src;
  });
});

// Fechar ao clicar no X
closeModal.addEventListener('click', () => {
  modal.style.display = 'none';
});

// Fechar ao clicar fora da imagem
modal.addEventListener('click', (e) => {
  if (e.target === modal) {
    modal.style.display = 'none';
  }
});

