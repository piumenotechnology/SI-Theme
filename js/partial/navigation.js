export var navigation = function () {

   let headerHeight = $('header').outerHeight();
   let dwidth = $(window).width();
   let openSubNav = function () {
      $(".menu-item-has-children").on("click", function () {
         console.log(this);
         $(this).find('.sub-menu').slideToggle();
      });
   }
   openSubNav();

   // On click of menu button
   $(".menu-button").on("click", function () {
      $(this).toggleClass("open");
      $(".main-nav .menu-container").slideToggle();
      if ($('body').hasClass('home')) {
         $("header:not(.fixed)").toggleClass("fixed");
      }
   });
   
   $(window).on('resize', function () {
      headerHeight = $('header').outerHeight();
      if ($(window).width() > 1200) {
         $(".menu-container").css('display', '');
      } else {
         var wwidth = $(window).width();
         if (dwidth !== wwidth) {
            dwidth = $(window).width();
            $(".menu-container").css('display', 'none');
            $('.menu-button').removeClass('open');
         }
      }
   });
   // open menu on focus
   $(".menu-item-has-children > a").on("focus", function () {
      $(".active").removeClass("active");
      console.log($(this).parent());
      $(this).parent().addClass("active");
   });

   $(window).scroll(function () { 

      if ($(window).scrollTop() > headerHeight) { 
         $("header").addClass("fixed");
         if(!$("body").hasClass('home')){
            $("main").css('margin-top', headerHeight + "px");
         }
      }

      if ($(window).scrollTop() < headerHeight) {
         $("header").removeClass("fixed");
         if (!$("body").hasClass('home')) {
            $("main").css('margin-top', 0);
         }
      }
   });
   
}