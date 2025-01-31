<?php 
$resources = get_field('post_details');
$relatedTitle = get_field('related_articles_title', 'options');
$backgroundImg = get_the_post_thumbnail_url($post->ID, 'large');
$author_avatar = $resources['company_logo']['url'] ? $resources['company_logo']['url'] : get_template_directory_uri().'/assets/icons/si_logo.jpg';
?>

<?php get_header(); ?>

<div class="post-header mt-24 md:mt-32 pt-5 step" data-animate-enter="main-nav--solid">
    <img class="post-header--bg" src="<?= $backgroundImg; ?>" alt="<?php the_title(); ?>">
    <div class="post-header--details">
        <h2 class="md:w-4/5 font-bold text-3xl md:text-4xl"><?php the_title(); ?></h2>
        <p class="md:w-4/5 font-thin mt-5"><?= get_the_excerpt(); ?></p>
        <div class="flex items-center space-x-20 !mt-12">
            <div class="inline-block">
                <p>Written by</p>
                <p class="font-semibold text-lg mt-3"><?= $resources['author']?$resources['author']:'Strategy Institute'; ?></p>
            </div>
            <div class="inline-block">
                <p>Published on</p>
                <p class="font-semibold text-lg mt-3"><?= get_the_date('d M Y'); ?></p>
            </div>
            <div class="hidden md:block relative !ml-auto">
                <a class="copylink-containter flex items-center fill-white" onclick="console.log('test');this.insertAdjacentHTML('afterend', '<div class=linktooltips-container>Link copied</div>');setTimeout(() => { document.querySelectorAll('.linktooltips-container').forEach(el => el.remove()); }, 3000);" target="_blank">
                    <span class="mr-1.5 text-white">Copy link</span>
                    <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M172.5 131.1C228.1 75.51 320.5 75.51 376.1 131.1C426.1 181.1 433.5 260.8 392.4 318.3L391.3 319.9C381 334.2 361 337.6 346.7 327.3C332.3 317 328.9 297 339.2 282.7L340.3 281.1C363.2 249 359.6 205.1 331.7 177.2C300.3 145.8 249.2 145.8 217.7 177.2L105.5 289.5C73.99 320.1 73.99 372 105.5 403.5C133.3 431.4 177.3 435 209.3 412.1L210.9 410.1C225.3 400.7 245.3 404 255.5 418.4C265.8 432.8 262.5 452.8 248.1 463.1L246.5 464.2C188.1 505.3 110.2 498.7 60.21 448.8C3.741 392.3 3.741 300.7 60.21 244.3L172.5 131.1zM467.5 380C411 436.5 319.5 436.5 263 380C213 330 206.5 251.2 247.6 193.7L248.7 192.1C258.1 177.8 278.1 174.4 293.3 184.7C307.7 194.1 311.1 214.1 300.8 229.3L299.7 230.9C276.8 262.1 280.4 306.9 308.3 334.8C339.7 366.2 390.8 366.2 422.3 334.8L534.5 222.5C566 191 566 139.1 534.5 108.5C506.7 80.63 462.7 76.99 430.7 99.9L429.1 101C414.7 111.3 394.7 107.1 384.5 93.58C374.2 79.2 377.5 59.21 391.9 48.94L393.5 47.82C451 6.731 529.8 13.25 579.8 63.24C636.3 119.7 636.3 211.3 579.8 267.7L467.5 380z"/></svg>
                </a>
            </div>
        </div>
        <hr class="md:hidden border-neutral-200 my-3">
    </div>
</div>

<section class="post no-space step" data-animate-enter="main-nav--solid">
    <div class="md:flex gap-x-5 items-start container max-w-screen-2xl wrapper-padding mx-auto">
        <div class="content md:w-3/4">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="entry-content description">
                <?php if($resources['is_video_post']): ?>
                <?php echo $resources['video_embed_code']; ?>
                <?php endif; ?>
                <?php the_content(); ?>
                <?php wp_link_pages(array(
                    'before' => '<div class="page-link"> Pages: ',
                    'after' => '</div>'
                )); ?>
                </div><!-- .entry-content -->
            </div><!-- /.post -->
        <?php endwhile; // end of the loop. ?>

        </div> <!-- /.content -->

        <aside class="entry-meta md:w-1/4">
            <div class="meta-author flex items-center space-x-1.5 py-3">
                <img class="w-12 h-12 object-cover rounded-full" src="<?= $author_avatar; ?>" alt="<?php echo $resources['company_logo']['alt']; ?>" />
                <div class="author-title">
                    <p class="text-base m-0"><?= $resources['author']?$resources['author']:'Strategy Institute'; ?></p>
                    <p class="text-base text-neutral-400"><?php echo $resources['job_title']; ?></p>
                </div>
            </div>
            
        </aside><!-- .entry-meta -->
    </div><!-- /.wrapper -->
</section>
<!-- related posts  -->
<section class="related-posts no-space step" data-animate-enter="main-nav--solid">
    <div class="container maxx-w-screen-2xl mx-auto">
        <hr class="border-neutral-200">
        <div class="related-posts--inner">
            <h2 class="font-extrabold text-4xl md:text-5xl uppercase"><?= $relatedTitle; ?></h2>
            <div class="random-box hidden md:flex flex-wrap w-36 gap-2 mt-5 md:mt-6">
            <div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div>
            </div>
            <div class="related-posts-container my-10">
        <!-- if selected posts show -->
<?php 
$ids = get_field('related_articles', false, false);

if($ids):

$query = new WP_Query(array(
	'post_type'      	=> 'post',
	'posts_per_page'	=> 2,
	'post__in'			=> $ids,
	'post_status'		=> 'any',
	'orderby'        	=> 'post__in',
));?>
    <?php while ( $query->have_posts() ) : $query->the_post();?>

        <?php get_template_part( 'partials/resources', 'post' ); ?>
    <?php endwhile;
        wp_reset_postdata(); ?>

<?php endif; ?><!-- end of if selected posts show -->
<!-- calculate how many posts still remaining to be fillied by category -->
<?php if (is_string ($ids)): ?>
    <?php $remaining = 2; ?>
<?php elseif ( count($ids) < 2): ?>
    <?php $number = count($ids);
    $remaining = 2 - $number; ?>
<?php else: ?>
    <?php $remaining = 0; ?>
<?php endif ?>

<!-- if remaining has a value do loop --> 
<?php if ($remaining !== 0 ): ?>
        
        <!-- if less than 2 add cat -->
        <?php
    
        $the_query = new WP_Query( 
            array(
            'category__in'   => wp_get_post_categories( $post->ID ),
            'posts_per_page' => $remaining,
            'post__not_in'   => array( $post->ID )
        ) );?>
    
    <?php while ( $the_query->have_posts() ) :
        $the_query->the_post();?>
        <?php get_template_part( 'partials/resources', 'post' ); ?>
    <?php endwhile;
    wp_reset_postdata(); ?>

<!-- else if $ids equal or geater exit -->
<?php else: ?>
    
<?php endif ?>
            </div><!-- end of related-posts-container -->
        </div>
    </div>
</section>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php get_template_part('partials/newsletter', 'single'); ?>

<?php endwhile;  ?>

<?php get_footer(); ?>