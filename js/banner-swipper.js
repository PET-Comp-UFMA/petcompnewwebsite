var infoSwiper = new Swiper('.info-carousel',{
  slidesPerView: 1,
  centeredSlides: true,
  spaceBetween: 30,
  loop: false,
  allowTouchMove: false,
  autoHeight: true 
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
        delay: 10000,
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

swiper.on('realIndexChange', function () {
  infoSwiper.slideTo(swiper.realIndex);
});

document.querySelectorAll('.carousel .swiper-slide').forEach((slide, index) => {
  slide.addEventListener('click', () => {
    swiper.slideToLoop(index);
  });
});

const modal = document.getElementById('bannerModal');
const modalImg = document.getElementById('modalImage');
const closeModal = document.getElementById('closeModal');

document.querySelectorAll('.btn-view').forEach(btn => {
  btn.addEventListener('click', (e) => {
    e.stopPropagation();
    const imgSrc = btn.getAttribute('data-img');
    modal.style.display = 'flex';
    modalImg.src = imgSrc;
    swiper.autoplay.stop();
  });
});

document.querySelectorAll('.swiper-slide img').forEach(img => {
  img.addEventListener('click', (e) => {
    e.preventDefault();     // bloqueia ação padrão
    e.stopImmediatePropagation(); // BLOQUEIA o Swiper

    modal.style.display = 'flex';
    modalImg.src = img.src;
    swiper.autoplay.stop();
  });
});

// Fechar ao clicar no X
closeModal.addEventListener('click', () => {
  modal.style.display = 'none';
  setTimeout(() => swiper.autoplay.start(), 300);
});

// Fechar ao clicar fora da imagem
modal.addEventListener('click', (e) => {
  if (e.target === modal) {
    modal.style.display = 'none';
    setTimeout(() => swiper.autoplay.start(), 300); //loop volta quando fecha
  }
});
