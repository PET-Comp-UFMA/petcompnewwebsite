var swiper = new Swiper('.carousel', {
    slidesPerView: 3,
    centeredSlides: true,
    spaceBetween: 30,
    loop: true,

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

document.querySelectorAll('.swiper-slide').forEach((slide, index) => {
  slide.addEventListener('click', () => {
    swiper.slideToLoop(index);
  });
});
