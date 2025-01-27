<?php
/**
 * ACF: Flexible Content > Layouts > Call to action
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$caption = get_sub_field('caption');
$headline = get_sub_field('headline');
$link = get_sub_field('link');
$image = get_sub_field('image');
$alignment = get_sub_field('alignment');
$color = get_sub_field('color');
$bg_color = get_sub_field('bg_color');
?>

<section class="cta-<?php echo get_row_index(); ?> section no-space px-5 lg:px-0">
  <style>
    .cta-<?php echo get_row_index(); ?> {
      color: <?php echo $color; ?>;
      background: <?php echo $bg_color; ?>;
    }
    .cta-<?php echo get_row_index(); ?> .ui-link {
      color: <?php echo $bg_color; ?>;
      background: <?php echo $color; ?>;
    }
  </style>
  <?php if($alignment == 'center'): ?>
  <div class="container xl:max-w-screen-xl mx-auto flex flex-col items-center text-center py-12 md:py-14">
    <h2 class="text-lg uppercase tracking-wider mb-2"><?php echo $caption; ?></h2>
    <p class="text-sm font-normal w-2/3"><?php echo $headline; ?></p>
    <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"
      class="ui-link ui-link--big group inline-block bg-white text-right text-cyan-500 font-semibold rounded-full mt-5 md:mt-7">
      <div class="flex items-center">
        <svg class="w-5 mr-2 fill-current -mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 625"><path d="M235 41.2v307.4c0 7.8 6.9 15.4 15 15 8.1-.4 15-6.6 15-15V244.5 78.9 41.2c0-7.8-6.9-15.4-15-15-8.1.4-15 6.6-15 15z"></path><path d="M125.4 232c12.8 15.1 25.7 30.2 38.5 45.3 20.5 24.1 40.9 48.1 61.4 72.2 4.7 5.5 9.4 11 14.1 16.6 5 5.8 16.3 5.8 21.2 0 12.8-15.1 25.7-30.2 38.5-45.3 20.5-24.1 40.9-48.1 61.4-72.2 4.7-5.5 9.4-11 14.1-16.6 5.2-6.2 6.1-15.2 0-21.2-5.4-5.4-15.9-6.2-21.2 0-12.8 15.1-25.7 30.2-38.5 45.3-20.5 24.1-40.9 48.1-61.4 72.2-4.7 5.5-9.4 11-14.1 16.6h21.2c-12.8-15.1-25.7-30.2-38.5-45.3-20.5-24.1-40.9-48.1-61.4-72.2-4.7-5.5-9.4-11-14.1-16.6-5.3-6.2-15.8-5.4-21.2 0-6.1 6.1-5.2 15 0 21.2zM70.8 473.3h314.1c14.5 0 29.1.5 43.5 0h.6c7.8 0 15.4-6.9 15-15-.4-8.1-6.6-15-15-15H114.9c-14.5 0-29.1-.5-43.5 0h-.6c-7.8 0-15.4 6.9-15 15 .4 8.1 6.6 15 15 15z"></path></svg>
        <span class="text-sm font-bold uppercase"><?php echo $link['title']; ?></span>
      </div>
    </a>
  <?php else: ?>
  <div class="mx-auto flex flex-wrap">
    <img class="md:w-1/4 object-cover mt-5 md:mt-0" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
    <div class="md:w-3/4 md:flex items-center py-12 md:py-14 md:px-16">
      <div class="md:w-3/4">
        <h2 class="text-lg uppercase tracking-wider mb-2"><?php echo $caption; ?></h2>
        <p class="text-sm font-normal w-2/3"><?php echo $headline; ?></p>
      </div>
      <div class="md:w-1/4 flex md:justify-end items-center">
        <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"
          class="ui-link ui-link--big group inline-block bg-white text-right text-cyan-500 font-semibold rounded-full mt-5 md:mt-0">
          <div class="flex items-center">
            <svg class="w-5 mr-2 fill-current -mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 625"><path d="M235 41.2v307.4c0 7.8 6.9 15.4 15 15 8.1-.4 15-6.6 15-15V244.5 78.9 41.2c0-7.8-6.9-15.4-15-15-8.1.4-15 6.6-15 15z"></path><path d="M125.4 232c12.8 15.1 25.7 30.2 38.5 45.3 20.5 24.1 40.9 48.1 61.4 72.2 4.7 5.5 9.4 11 14.1 16.6 5 5.8 16.3 5.8 21.2 0 12.8-15.1 25.7-30.2 38.5-45.3 20.5-24.1 40.9-48.1 61.4-72.2 4.7-5.5 9.4-11 14.1-16.6 5.2-6.2 6.1-15.2 0-21.2-5.4-5.4-15.9-6.2-21.2 0-12.8 15.1-25.7 30.2-38.5 45.3-20.5 24.1-40.9 48.1-61.4 72.2-4.7 5.5-9.4 11-14.1 16.6h21.2c-12.8-15.1-25.7-30.2-38.5-45.3-20.5-24.1-40.9-48.1-61.4-72.2-4.7-5.5-9.4-11-14.1-16.6-5.3-6.2-15.8-5.4-21.2 0-6.1 6.1-5.2 15 0 21.2zM70.8 473.3h314.1c14.5 0 29.1.5 43.5 0h.6c7.8 0 15.4-6.9 15-15-.4-8.1-6.6-15-15-15H114.9c-14.5 0-29.1-.5-43.5 0h-.6c-7.8 0-15.4 6.9-15 15 .4 8.1 6.6 15 15 15z"></path></svg>
            <span class="text-sm font-bold uppercase"><?php echo $link['title']; ?></span>
          </div>
        </a>
      </div>
    </div>
  </div>
  <?php endif; ?>
</section>