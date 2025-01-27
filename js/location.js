export let location = function () {

    let $locationCarousel = $('.location-carousel');

    $locationCarousel.flickity({
        wrapAround: true,
        selectedAttraction: 0.05,
        pageDots: false,
        fade: true
    });

    // Dragging patch

    $locationCarousel.on( 'dragStart.flickity', function( e, pointer ) {
      document.ontouchmove = function (e) {
          e.preventDefault();
      }
    });
  
    $locationCarousel.on( 'dragEnd.flickity', function( e, pointer ) {
      document.ontouchmove = function (e) {
          return true;
      }
    });
}