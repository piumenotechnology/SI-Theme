<?php
/**
 * ACF: Flexible Content > Layouts > Image Slider
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
?>
<section class="section section-image--slider w-full relative my-10 step" data-animate-enter="main-nav--solid">

  <div class="image-slider">
    <div class="w-full h-full swiper-wrapper">
      <?php if( have_rows('sliders') ):
        $contents = array();
        while( have_rows('sliders') ) : the_row();
          $title = get_sub_field('title');
          $image = get_sub_field('image');
          $paragraph = get_sub_field('paragraph');
          $link = get_sub_field('link');
          
          $contents[] = array(
            'title' => $title,
            'paragraph' => $paragraph,
            'link' => $link
          );
        ?>
        <div class="h-full swiper-slide">
          <img class="h-screen md:h-full w-full brightness-75 rellax object-cover" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" data-rellax-percentage="-0.3"/>
        </div>
        <?php endwhile; else: ?>
        <p class="text-center font-medium">Sorry please add a slide.</p>
      <?php endif; ?>
    </div>
  </div>
  <div class="counter-slider w-full lg:w-1/2 flex justify-between items-center text-white text-xl px-7 py-5">
    <div class="flex items-center">
      <div class="counter-slider--wrapper">
        <?php for ($x = 1; $x <= count(get_sub_field('sliders')); $x++): ?>
          <span class="counter"><?= $x; ?></span>
        <?php endfor; ?>
      </div>
      <span class="ml-1">— <?= count(get_sub_field('sliders')); ?></span>
    </div>
    <div class="action-slider gap-3">
      <span class="action-slider--button action-slider--prev">← Prev</span>
      <span class="action-slider--button action-slider--next">Next →</span>
    </div>
  </div>
  <div class="content-slider w-full md:w-1/2 flex flex-nowrap overflow-hidden">
    <?php foreach ($contents as $content): ?>
      <div class="content-slider--item flex flex-col flex-auto shrink-0 justify-between">
        <h4 class="md:w-2/3 font-extrabold text-white text-4xl md:text-5xl p-5 md:p-0"><?= $content['title']; ?></h4>
        <p class="w-full text-base md:bg-white text-white md:text-black p-5 md:pr-32"><?= $content['paragraph']; ?></p>
        <?php if($content['link']): ?>
        <a href="<?= $content['link']['url']; ?>" target="<?= $content['link']['target']; ?>" class="ui-link ui-link--light">
          <?= $content['link']['title']; ?>
        </a>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
</section>