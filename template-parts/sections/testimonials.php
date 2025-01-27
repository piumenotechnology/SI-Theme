<?php
/**
 * ACF: Flexible Content > Layouts > Testimonials
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$button = get_sub_field('button');
?>
<section class="section my-10 md:my-16 md:pb-5 step" data-animate-enter="main-nav--solid">
  <div class="section-header">
    <div class="w-full md:w-1/2">
      <h2 class="font-extrabold text-4xl md:text-5xl"><?= $title; ?></h2>
    </div>
    <div class="w-full md:w-1/2 flex justify-between mt-3 md:mt-0">
      <p class="hidden md:inline-block"><?= $subtitle; ?></p>
      <div class="w-auto inline-block space-x-6 text-right">
        <button class="slider-control-prev hover:text-gray-500"><span class="mr-2">←</span>Prev</button>
        <button class="slider-control-next hover:text-gray-500"><span class="mr-2">Next</span>→</button>
      </div>
    </div>
  </div>
  <div class="md:container mx-auto mt-5 text-lg">
    <div class="swiper-container w-full lg:max-h-96 relative">
      <div class="swiper-wrapper">
      <?php if( have_rows('testimony') ):
        while( have_rows('testimony') ) : the_row();
          $name = get_sub_field('name');
          $company = get_sub_field('company');
          $quotes = get_sub_field('quotes');
          $image = get_sub_field('image');
        ?>
        <div class="swiper-slide">
          <div class="w-full h-full md:items-center grid grid-cols-1 lg:grid-cols-4">
            <div class="square-ratio">
              <div class="content-parallax">
                <div class="parallax-bg" style="background-image:url(<?= $image; ?>)" data-swiper-parallax="100" data-swiper-parallax-duration=""></div>
              </div>
            </div>
            <div class="w-3/4 col-span-3 sm:pl-10 md:pl-16">
              <h2 class="text-2xl xl:text-3xl line-clamp-4 md:line-clamp-none overflow-ellipsis md:leading-tight"><?= $quotes; ?></h2>
              <p class="mt-4"><?= $name; ?><span class="block text-gray-500"><?= $company; ?></span></p>
            </div>
          </div>
        </div>
      <?php endwhile; else: ?>
        <p class="text-center font-medium">Please add a testimony.</p>
      <?php endif; ?>
      </div>
      <button class="swiper-control--arrow slider-control-next left-0 hover:text-gray-500">
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
</section>