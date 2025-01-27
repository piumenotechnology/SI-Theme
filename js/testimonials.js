export let testimonials = function () {
   $('.testimonial:nth-of-type(2), .testimonial:last-of-type').addClass("next-to-is-selected"); 
   
   
   let $testimonialImage = $('.testimonials-image');

   $testimonialImage.flickity({
      wrapAround: true,
      pageDots: false,
      adaptiveHeight: true,
      dragThreshold: 2,
      selectedAttraction: 0.05,
   });
   
   // Dragging patch

   $testimonialImage.on( 'dragStart.flickity', function( e, pointer ) {
      document.ontouchmove = function (e) {
          e.preventDefault();
      }
  });

  $testimonialImage.on( 'dragEnd.flickity', function( e, pointer ) {
      document.ontouchmove = function (e) {
          return true;
      }
  });

   $testimonialImage.on('change.flickity', function () {
      testimonialSizes();
      $testimonialImage.flickity('resize');
   });

      $testimonialImage.flickity('resize');

   let testimonialSizes = function () {
      $('.next-to-is-selected').removeClass("next-to-is-selected");
      // if there is a next element, add class, otherwise loop to first
      if($(".testimonials-image .is-selected").next().is('li')){
         $(".testimonials-image .is-selected").next().addClass('next-to-is-selected');
      } else {
         $('.testimonial:first-of-type').addClass("next-to-is-selected");
      }
       // if there is a previous element, add class, otherwise loop to last
      if ($(".testimonials-image .is-selected").prev().is('li')) {
         $(".testimonials-image .is-selected").prev().addClass('next-to-is-selected');
      } else {
         $('.testimonial:last-of-type').addClass("next-to-is-selected");
      }
      $testimonialImage.flickity('reposition');
   }
}