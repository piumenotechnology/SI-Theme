<?php
/**
 * ACF: Flexible Content > Layouts > cta with features
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$caption = get_sub_field('caption');
$link = get_sub_field('link');
$bg_color = get_sub_field('bg_color');
$gradient_start = get_sub_field('gradient_start');
$gradient_end = get_sub_field('gradient_end');
?>

<section class="cta-<?php echo get_row_index(); ?> section no-space px-5 lg:px-0">
  <style>
    .cta-<?php echo get_row_index(); ?> {
      background: <?php echo $bg_color; ?>;
    }
    .cta-<?php echo get_row_index(); ?> .cta-title {
      background: <?= $gradient_start; ?>;
      background: linear-gradient(90deg, <?= $gradient_start; ?> 0%, <?= $gradient_end; ?> 100%);
    }
  </style>
  <div class="container mx-auto py-5 md:py-7">
    <div class="rounded-lg overflow-hidden border border-neutral-300">
      <div class="cta-title md:flex justify-between items-center px-12 py-8 text-center md:text-left">
        <h2 class="text-3xl lg:text-4xl font-extrabold"><?= $caption; ?></h2>
        <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"
            class="group inline-block bg-black text-right text-white hover:text-neutral-200 rounded-full mt-5 md:mt-0 px-6 py-2.5">
            <div class="flex items-center font-medium">
              <?php echo $link['title']; ?>
              <span class="w-5 ml-2">
                <?php include(get_template_directory() . '/assets/icons/arrow-down.svg'); ?>
              </span>
            </div>
          </a>
      </div>
      <div class="md:grid grid-flow-col bg-white divide-y md:divide-y-0 divide-x-0 md:divide-x divide-neutral-300 border-t border-neutral-300">
      <?php if( have_rows('cta_features') ): 
        while ( have_rows('cta_features') ) : the_row();
          $feature = get_sub_field('feature'); ?>
          <div class="flex flex-auto justify-center items-center text-lg font-bold py-6 px-5 md:px-0">
            <span class="flex justify-center items-center bg-white border border-black w-6 h-6 rounded-full mr-3">
              <svg class="w-3.5" height="40.69" viewBox="0 0 59 40.69" width="59" xmlns="http://www.w3.org/2000/svg"><path d="m23.4 40.69-23.4-23.397 4.747-4.747 18.653 18.31 30.853-30.856 4.747 4.747z"></path></svg>
            </span>
            <p class="md:max-w-48 text-center md:text-left"><?= $feature; ?></p>
          </div>
        <?php endwhile;
      endif; ?>
      </div>
    </div>
  </div>
 
</section>