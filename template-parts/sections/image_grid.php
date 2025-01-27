<?php
/**
 * ACF: Flexible Content > Layouts > Image Grid
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */

$attendeesTitle = get_sub_field( 'grid_title' );
$attendeesSubtitle = get_sub_field( 'grid_subtitle' );
$attendeeBtn = get_sub_field( 'grid_button' );
$columnSize = get_sub_field( 'grid_columns' );
$grey = get_sub_field( 'grey_background' );
$anchor = get_sub_field( 'custom_anchor' );
$id = 'image-grid--' . get_row_index();
$anchor_id = 'anchor-' . get_row_index();
if($anchor) {
    $anchor_id = $anchor;
}
?>

<?php if($grey): ?>
<section id="<?= $id; ?>" class="past-atendees relative background-grey step" data-animate-enter="main-nav--solid">
<?php else: ?>
<section id="<?= $id; ?>" class="section no-space relative past-atendees step" data-animate-enter="main-nav--solid">
<?php endif; ?>
  <style>
    #<?= $anchor_id; ?> { top: -120px; }
  </style>
  <div class="custom-anchor" id="<?= $anchor_id; ?>"></div>
  <div class="wrapper wrapper-padding">
    <div class="past-atendees--inner">
      <?php if($attendeesSubtitle): ?>
        <p class="text-neutral-900 text-[12px] text-center font-bold uppercase opacity-60 mb-3"><?php echo $attendeesSubtitle; ?></p>
      <?php endif; ?>
      <h2 class="md:w-2/3 text-center text-neutral-900 font-extrabold text-4xl md:text-5xl mx-auto"><?php echo $attendeesTitle ?></h2>
      <?php if( have_rows('grid_item') ): ?>
      <div class="level-container grid grid-cols-2 md:grid-cols-4 lg:grid-cols-<?= $columnSize; ?> my-10">
        <?php while( have_rows('grid_item') ): the_row(); 
        // vars
        $image = get_sub_field('item_thumbnail');
        $link = get_sub_field('item_link');
        ?>
          <?php if( $link ): ?>
          <a href="<?php echo $link; ?>" target="_self">
          <?php endif; ?>
            <div class="sponsor-square object-contain opacity-100 hover:opacity-75 p-5 transition-all duration-300">
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
            </div>
          <?php if( $link ): ?>
            </a>
          <?php endif; ?>
        <?php endwhile; ?>
      </div><!-- end of level container -->
      <?php endif; ?>
      <?php if( $attendeeBtn ):
        $link_url = $attendeeBtn['url'];
        $link_title = $attendeeBtn['title'];
        $link_target = $attendeeBtn['target'] ? $attendeeBtn['target'] : '_self';
        ?>
        <div class="md:container mx-auto flex justify-center mt-10">
          <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"
          class="ui-link ui-link--big ui-link--outline group inline-block bg-white text-black font-medium rounded-md">
            <div class="flex items-center">
              <span><?php echo esc_html($link_title); ?></span>
              <div class="h-5 w-5 ml-1 group-hover:ml-1.5 transition-all duration-200">
                <?php include(get_template_directory() . '/assets/icons/chevron-diagonal.svg'); ?>
              </div>
            </div>
          </a>
        </div>
      <?php endif; ?>

    </div><!-- end of inner -->
  </div><!-- end of wrapper -->
</section><!-- end of section -->
