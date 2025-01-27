export let statScroll = function () {
   // animate scroll in of numbers
   var count_to_number_of_names = function () {
      $(".stat-amount").addClass('fired');
      $(".stat-amount").each(function () {
         var $this = $(this),
            countTo = $this.attr('data-number');
         $({
            countNum: $this.text()
         }).animate({
            countNum: countTo
         }, {
            duration: 2000,
            easing: 'swing',
            step: function () {
               var thousands = (Math.floor(this.countNum));
               $this.text(thousands.toLocaleString());
            },
            complete: function () {
               var thousands = (Math.floor(this.countNum));
               $this.text(thousands.toLocaleString());

            }
         });
      });
   }

   $.fn.isInViewport = function () {
      var elementTop = $(this).offset().top;
      var elementBottom = elementTop + $(this).outerHeight();

      var viewportTop = $(window).scrollTop();
      var viewportBottom = viewportTop + $(window).height();

      return elementBottom > viewportTop && elementTop < viewportBottom;
   };

   function scrollIn() {
      // if ($("body").hasClass("home")) {
      //    if ($('.stats-container').isInViewport()) {
      //       if (!$('.stat-amount').hasClass('fired')) {
      //          count_to_number_of_names();
      //       }
      //    }
      // }

      if ($('.number').isInViewport()) {
         if (!$('.stat-amount').hasClass('fired')) {
            count_to_number_of_names();
         }
      }

   }
   if ($("section").hasClass("stats-images")){
      $(window).on('resize scroll', function () {
         scrollIn();
      });
      
      scrollIn();

   }

}
