<?php
/**
 * ACF: Flexible Content > Layouts > Ordered lists
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$topTitle = get_sub_field('title');
$greyTop =  get_sub_field('grey_background');
$anchor = get_sub_field('custom_anchor');
$id = 'ordered-list--' . get_row_index();
$anchor_id = 'anchor-' . get_row_index();
if($anchor) {
    $anchor_id = $anchor;
}
?>

<?php if($greyTop): ?>
<section id="<?= $id; ?>" class="top-five background-grey relative step" data-animate-enter="main-nav--solid">
<?php else: ?>
<section id="<?= $id; ?>" class="top-five relative step" data-animate-enter="main-nav--solid">
<?php endif; ?>
  <style>
    #<?= $anchor_id; ?> { top: -120px; }
  </style>
  <div class="custom-anchor" id="<?= $anchor_id; ?>"></div>

  <div class="container wrapper-padding mx-auto">
    <div class="top-five-title--inner">
      <?php if($topTitle): ?>
        <h2 class="font-extrabold text-4xl md:text-5xl uppercase"><?= $topTitle; ?></h2>
        <div class="random-box hidden md:flex flex-wrap w-36 gap-2 mt-5 md:mt-6">
          <div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <?php if( have_rows('lists') ): ?>
  <div class="w-full max-w-screen-3xl mx-auto">
    <div class="top-five-content--inner">
      
      <?php while( have_rows('lists') ): the_row(); 
      // Load values and assing defaults.
      
      $image = get_sub_field('image');
      $heading = get_sub_field('heading');
      $content = get_sub_field('paragraph');
      
      ?>

      <?php if (get_row_index() % 2 == 0 ): ?>
        <!-- even -->
        <div class="half even">
          <div class="content">
            <p class="number extra-bold"><?php echo get_row_index() ?></p>
            <div class="info description">
              <?php if($heading): ?>
              <p class="bold"><?php echo $heading ?></p>
              <?php endif; ?>
              <?php if($content): ?>
              <p ><?php echo $content ?></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="obj-fit">
            <img src="<?= $image['url']; ?>" class="" alt="<?= $image['alt'] ?>" />
          </div>
        </div>
      <?php else: ?>
        <!-- odd -->
        <div class="half">
          <div class="obj-fit">
              <img src="<?= $image['url']; ?>" class="" alt="<?= $image['alt'] ?>" />
          </div>
          <div class="content">
            <p class="number extra-bold"><?php echo get_row_index() ?></p>
            <div class="info description">
              <?php if($heading): ?>
              <p class="bold"><?php echo $heading ?></p>
              <?php endif; ?>
              <?php if($content): ?>
              <p ><?php echo $content ?></p>
              <?php endif; ?>
            </div>
              
          </div>
        </div>
      <?php endif; ?>
    <?php endwhile; ?>
    </div>
  </div>
  <?php endif; ?>
</section>