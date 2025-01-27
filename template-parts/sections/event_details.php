<?php
/**
 * ACF: Flexible Content > Layouts > Event details
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
?>
<section class="section no-space bg-white text-black step" data-animate-enter="main-nav--solid" data-offset="0.7">
  <div class="md:container flex justify-between items-stretch py-4 mx-auto">
    <div class="marquee-text w-full relative">
      <div class="swiper-wrapper xl:justify-between">
      <?php if( have_rows('detail_info') ):
        while( have_rows('detail_info') ) : the_row();
          $title = get_sub_field('title');
          $description = get_sub_field('description');
        ?>
          <div class="swiper-slide flex items-center md:items-start px-5 md:py-2 border-l border-gray-200 first:px-0 first:border-0">
            <p class="flex flex-col text-center md:text-left text-2xl md:text-3xl font-bold w-44"><?= $title; ?>
              <span class="text-sm font-normal leading-tight"><?= $description; ?></span>
            </p>
          </div>
        <?php endwhile; else: ?>
        <p class="text-center font-medium">Sorry there's no detail info yet.</p>
      <?php endif; ?>
      </div>
      <div class="swiper-control">
        <button class="swiper-control--arrow slider-control-prev left-0 hover:text-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px" height="50px" viewBox="0 0 16 28" version="1.1"><script xmlns=""/>
            <g id="Unicode" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
              <g id="Unicode-Character-U+0000-Copy" transform="translate(-1401.000000, -644.000000)" stroke="#000000" stroke-width="2">
                <g id="Group-5" transform="translate(1381.000000, 567.000000)">
                  <path d="M15.7373919,85.0407004 L28.1933629,97.2607007 L39.9733974,85.0407004" id="Line-Copy-196" transform="translate(27.855395, 91.150701) scale(-1, 1) rotate(-90.000000) translate(-27.855395, -91.150701) "/>
                </g>
              </g>
            </g>
          </svg>
        </button>
        <button class="swiper-control--arrow slider-control-next right-0 hover:text-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px" height="50px" viewBox="0 0 16 28" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
              <g transform="translate(-1402.000000, -585.000000)" stroke="#000000" stroke-width="2">
                <g transform="translate(1381.000000, 567.000000)">
                  <path d="M16.7373919,26.0407004 L29.1933629,38.2607007 L40.9733974,26.0407004" transform="translate(28.855395, 32.150701) rotate(-90.000000) translate(-28.855395, -32.150701) "/>
                </g>
              </g>
            </g>
          </svg>
        </button>
      </div>
    </div>
  </div>
</section>