export var imageSlider = function () {

  const imageSlider = new Swiper('.image-slider', {
    // loop: true,
    draggable: false,
    speed: 500,
    on: {
      slideChange: slidesChange
    },
    navigation: {
      nextEl: ".action-slider--next",
      prevEl: ".action-slider--prev",
    },
  });

  function slidesChange(swiper) {
    var index = swiper.realIndex * -1;
    var counterItems = document.querySelectorAll('.counter');
    var contentItems = document.querySelectorAll('.content-slider--item');
    var wrapperWidth =  document.querySelector('.content-slider').offsetWidth;
    for (var i = 0; i < counterItems.length; i++) {
      counterItems[i].style.transform = "translateY(" + (counterItems[i].offsetHeight * index) + "px)";
    }
    
    for (var i = 0; i < contentItems.length; i++) {
      contentItems[i].style.transform = "translateX(" + (wrapperWidth * index) + "px)";
    }
  }
}