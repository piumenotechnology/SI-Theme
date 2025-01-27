export let reasons = function () {

    let $reasonsCarousel = $('.reasons-carousel');

    $reasonsCarousel.flickity({
        wrapAround: true,
        selectedAttraction: 0.05,
        pageDots: false,
        fade: true
    });

    // Dragging patch

    $reasonsCarousel.on( 'dragStart.flickity', function( e, pointer ) {
        document.ontouchmove = function (e) {
            e.preventDefault();
        }
      });
    
    $reasonsCarousel.on( 'dragEnd.flickity', function( e, pointer ) {
    document.ontouchmove = function (e) {
        return true;
    }
    });
    
}