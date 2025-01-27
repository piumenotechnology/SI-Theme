<?php
/**
 * ACF: Flexible Content > Layouts > Image Slider
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$greyVenue = get_sub_field('grey_background');
?>

<?php if($greyVenue): ?>
<section class="section venue background-grey step" id="venue" data-animate-enter="main-nav--solid">
<?php else: ?>
<section class="section venue step" id="venue" data-animate-enter="main-nav--solid">
<?php endif; ?>

    <?php if( have_rows('venues') ): ?>
    <div class="wrapper-large">
        <div class="venue--inner">
        
        <?php while( have_rows('venues') ): the_row(); 
        // Load values and assing defaults.
        
        $image = get_sub_field('image');
        $heading = get_sub_field('heading');
        $content = get_sub_field('paragraph');
        $addMap = get_sub_field('show_maps');
        $map = get_sub_field('map_code');
        
        ?>

    <?php if (get_row_index() % 2 == 0 ): ?>
    <!-- even -->
        <div class="half even">
            <div class="image obj-fit">
                <?php if($image && !$addMap): ?>
                    <img src="<?= $image['sizes']['large']; ?>" class="" alt="<?= $image['alt'] ?>" />
                <?php endif; ?>
                <?php if($addMap): ?>
                    <?php echo $map ?>
                <?php endif; ?>
            </div>
            <div class="content">
                <div class="info description">
                    <?php if($heading): ?>
                    <h2 class="text-3xl md:text-4xl font-extrabold mb-5 md:mb-10"><?php echo $heading ?></h2>
                    <?php endif; ?>
                    <?php if($content): ?>
                    <p><?php echo $content ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php else: ?>
    <!-- odd -->
        <div class="half odd">
            <div class="content">
                <div class="info description">
                    <?php if($heading): ?>
                    <h2 class="text-3xl md:text-4xl font-extrabold mb-5 md:mb-10"><?php echo $heading ?></h2>
                    <?php endif; ?>
                    <?php if($content): ?>
                    <p><?php echo $content ?></p>
                    <?php endif; ?>
                </div>
                
            </div>
            <div class="image obj-fit">
                <?php if($image  && !$addMap): ?>
                    <img src="<?= $image['url']; ?>" class="" alt="<?= $image['alt'] ?>" />
                <?php endif; ?>
                <?php if($addMap): ?>
                    <div class="map-responsive">
                        <?php echo $map ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
   
    <?php endwhile; ?>
        </div>
    </div>
     <?php endif; ?>
</section>