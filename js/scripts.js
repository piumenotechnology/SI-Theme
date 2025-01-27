import { global } from "./global";
import { images } from "./images";
import { testimonials } from "./testimonials";
import { print } from "./print";
import { agenda } from "./agenda";
import { statScroll } from "./partial/stat-scroll";
import { speaker } from "./speaker";
import { reasons } from "./reasons";
import { location } from "./location";
import { tabs } from "./partial/tabs.js";
import { blog } from "./blog";
import { gravity } from "./gravity-forms.js";
import { imageSlider } from "./partial/image-slider.js";
import { navigation } from "./partial/navigation";
import { links } from "./links";


$(function(){

   // IE Check
   if (navigator.appName == 'Microsoft Internet Explorer' ||  !!(navigator.userAgent.match(/Trident/) || navigator.userAgent.match(/rv:11/)) || (typeof $.browser !== "undefined" && $.browser.msie == 1)) {
      $('body').addClass('IE');
   }

   if (/Edge\/\d./i.test(navigator.userAgent)){
      // This is Microsoft Edge
      $('body').addClass('Edge');
   }
      
   global();
   // navigation();
   images();
   agenda();
   // testimonials();
   statScroll();
   speaker();
   reasons();
   location();
   tabs();
   blog();
   gravity();
   imageSlider();
   // links();
   print();

});