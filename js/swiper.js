var swiper = new Swiper('.carousel', {
    spaceBetween: 50,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      type: 'bullets',
    },
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });