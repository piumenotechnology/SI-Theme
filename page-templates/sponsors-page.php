<!-- Template Name: Sponsors Page
 -->

<?php
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$greyStats = get_field('add_grey_background_stats');
$showStats = get_field('show_stats');
$titleStats = get_field('stats_and_images_title');
?>

<?php get_header(); ?>

<?php get_template_part( 'partials/hero', 'small' ); ?>

<?php get_template_part( 'partials/links', 'inner' ); ?>

<?php get_template_part( 'partials/flexible', 'content-img-left' ); ?>

<!-- stats with images section -->
<?php if($showStats): ?>
    <?php if($greyStats): ?>
    <section class="stats-images background-grey" id="sponsor-stats">
    <?php else: ?>
    <section class="stats-images" id="sponsor-stats">
    <?php endif; ?>
    <div class="wrapper  wrapper-padding">
        <div class="stats-images--inner">
            <?php if($titleStats): ?>
            <h2><?php echo $titleStats ?></h2>
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
<?php endif; ?> <!-- end of show if -->
<!-- stats with images section -->
<?php get_template_part( 'partials/top', 'five' ); ?>

<?php get_template_part( 'partials/past', 'attendees' ); ?>

<?php get_template_part( 'partials/sponsors', 'levels' ); ?>

<?php get_template_part( 'partials/inquiry', 'form' ); ?>

<?php get_template_part('partials/newsletter'); ?>

<?php get_footer(); ?>