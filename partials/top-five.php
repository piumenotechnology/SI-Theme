<?php 
$topTitle = get_field('top_five_title');
$greyTop =  get_field('add_grey_background_top_5');
$showTop = get_field('show_top_five');
?>

<?php if($showTop): ?>
<?php if($greyTop): ?>
<section class="top-five background-grey shadow-section-bottom " id="top-five">
<?php else: ?>
<section class="top-five shadow-section-bottom" id="top-five">
<?php endif; ?>

    <div class="container wrapper wrapper-padding">
        <div class="top-five-title--inner">
            <?php if($topTitle): ?>
            <h2 class="mb-0"><?php echo $topTitle ?></h2>
            <?php endif; ?>
        </div>
    </div>
    <?php if( have_rows('top_five') ): ?>
    <div class="wrapper-full">
        <div class="top-five-content--inner">
        
        <?php while( have_rows('top_five') ): the_row(); 
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
<?php endif; ?> <!-- end of show if -->