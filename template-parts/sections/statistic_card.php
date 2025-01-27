<?php
/**
 * ACF: Flexible Content > Layouts > Statistics
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$greyStats = get_sub_field('grey_background');
$titleStats = get_sub_field('title');
?>

<?php if($greyStats): ?>
<section class="stats-images background-grey step" data-animate-enter="main-nav--solid" id="sponsor-stats">
<?php else: ?>
<section class="stats-images step" data-animate-enter="main-nav--solid" id="sponsor-stats">
<?php endif; ?>
  <div class="container wrapper wrapper-padding">
    <div class="stats-images--inner">
      <?php if($titleStats): ?>
      <h2 class="font-extrabold text-4xl md:text-5xl uppercase"><?php echo $titleStats; ?></h2>
      <div class="random-box hidden md:flex flex-wrap w-36 gap-2 mt-5 md:mt-6 mb-5 md:mb-10">
        <div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div>
      </div>
      <?php endif; ?>
      <?php if( have_rows('stats_and_images_content') ): ?>
        <div class="thirds">
          <?php while( have_rows('stats_and_images_content') ): the_row(); 
          // vars
          $imageStat = get_sub_field('stats_image');
          $stat = get_sub_field('stats_number');
          $symbol = get_sub_field('stats_symbol');
          $placement = get_sub_field('symbol_placement');
          $description = get_sub_field('stats_description');
          ?>
            <div>
              <?php if($imageStat): ?>
              <img class="mt-12 mx-auto" src="<?php echo $imageStat['url']; ?>" alt="<?php echo $imageStat['alt'] ?>" />
              <?php if($placement): ?>
              <p class="number mt-12 mb-0"><?php echo $symbol; ?><span class="stat-amount" data-number="<?php echo $stat; ?>">0</span></p>
              <?php else: ?>
              <p class="number mt-12 mb-0"><span class="stat-amount" data-number="<?php echo $stat; ?>">0</span><?php echo $symbol; ?></p>
              <?php endif; ?>
              <p class="bold stat-desc"><?php echo $description; ?></p>
              <?php endif; ?>
            </div>
          <?php endwhile; ?>   
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
