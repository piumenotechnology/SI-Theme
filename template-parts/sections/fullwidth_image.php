<?php
/**
 * ACF: Flexible Content > Layouts > Fullwidth image
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$title = get_sub_field( 'title' );
$image = get_sub_field('image');
$section_link = get_sub_field('section_link');
$maximum_height = get_sub_field('maximum_height');
$grey = get_sub_field( 'grey_background' );
?>

<?php if($maximum_height): ?>
<style>
    @media screen and (min-width: 768px) {
        #attendees-<?= get_row_index(); ?> .fw-image {
            max-height: <?= $maximum_height; ?>px;
        }
    }
    
</style>
<?php endif; ?>

<?php if($grey): ?>
<section id="attendees-<?= get_row_index(); ?>" class="past-atendees background-grey step" data-animate-enter="main-nav--solid">
<?php else: ?>
<section id="attendees-<?= get_row_index(); ?>" class="section no-space past-atendees step" data-animate-enter="main-nav--solid">
<?php endif; ?>
  <div class="container max-w-screen-2xl wrapper-padding mx-auto">
    <?php if($title): ?>
    <h2 class="md:w-2/3 text-center text-neutral-900 font-extrabold text-4xl md:text-5xl mx-auto mb-5 md:mb-12"><?= $title; ?></h2>
    <?php endif; ?>
    <img class="w-full <?= $maximum_height?'fw-image object-cover':'object-contain'; ?>" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" />
    <?php if( $section_link ):
      $link_target = $section_link['target'] ? $section_link['target'] : '_self';
      ?>
      <a href="<?= esc_url($section_link['url']); ?>" target="<?= esc_attr($link_target); ?>"
      class="ui-link ui-link--big ui-link--outline group table bg-white text-black font-medium rounded-md mx-auto mt-8">
        <div class="flex items-center">
          <span><?= esc_html($section_link['title']); ?></span>
          <div class="h-5 w-5 ml-1 group-hover:ml-1.5 transition-all duration-200">
            <?php include(get_template_directory() . '/assets/icons/chevron-diagonal.svg'); ?>
          </div>
        </div>
      </a>
    <?php endif; ?>
  </div><!-- end of wrapper -->

</section><!-- end of section -->