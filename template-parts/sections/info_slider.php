<?php
/**
 * ACF: Flexible Content > Layouts > Info Slider
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$title = get_sub_field('title');
$headline = get_sub_field('headline');
$link = get_sub_field('link');
$image = get_sub_field('image');
$alignment = get_sub_field('alignment');
$color = get_sub_field('color');
$grey_bg = get_sub_field('grey_background');
$anchor = get_sub_field('custom_anchor');
$id = 'info-slider--' . get_row_index();
$anchor_id = 'anchor-' . get_row_index();
if($anchor) {
    $anchor_id = $anchor;
}
?>

<?php $responsive_images = get_field('remove_images_on_mobile'); ?>
<?php if($grey_bg): ?>
<section id="<?= $id; ?>" class="reasons-slider relative background-grey step" data-animate-enter="main-nav--solid">
<?php else: ?>
<section class="reasons-slider relative step" data-animate-enter="main-nav--solid">
<?php endif; ?>
  <style>
    #<?= $anchor_id; ?> { top: -120px; }
  </style>
  <div class="custom-anchor" id="<?= $anchor_id; ?>"></div>
  <div class="container wrapper wrapper-padding">
    <div class="reasons-slider--inner">
      <?php if($title): ?> 
      <h2 class="w-full font-extrabold text-4xl md:text-5xl mb-5 xl:mb-10"><?php echo $title ?></h2>
      <?php endif; ?>
      <?php if( have_rows('info_slider_content') ): ?>
        <div class="">
          <div class="reasons-carousel">
            <?php while( have_rows('info_slider_content') ): the_row(); 
            // vars
            $image = get_sub_field('image');
            $description = get_sub_field('description');
            ?>
              <div class="half carousel-cell rounded-xl overflow-clip ">
                <div class="content">
                  <p class="number extra-bold"><?php echo get_row_index() ?></p>
                  <article class="mt-8 description"><?php echo $description; ?></article>
                </div>
                <div class="<?php if($responsive_images) { ?> hide-md <?php } ?>">
                  <img class="flickity-image" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt'] ?>" />
                </div>
              </div>
            <?php endwhile; ?> 
          </div>  
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>