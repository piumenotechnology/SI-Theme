<?php 
$resources = get_field('post_details');
$relatedTitle = get_field('related_articles_title', 'options');

?>

<?php get_header(); ?>

<?php get_template_part( 'partials/hero', 'small' ); ?>

<section class="post background-grey no-space step" data-animate-enter="main-nav--solid">
    <div class="wrapper wrapper-padding ">
        <div class="content">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2 class="entry-title font-extrabold text-4xl md:text-5xl"><?php the_title(); ?></h2>

                <div class="entry-meta flex flex-wrap items-center space-x-5 mt-4 mb-12">
                <img class="object-cover" src="<?php echo $resources['company_logo']['url']; ?>" alt="<?php echo $resources['company_logo']['alt']; ?>" />
                    <div class="author-title">
                        <p><?php echo $resources['author'] ?></p>
                        <p><?php echo $resources['job_title']; ?></p>
                    </div>
                </div><!-- .entry-meta -->

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
    </div><!-- /.wrapper -->
</section>
<!-- related posts  -->
<section class="related-posts no-space step" data-animate-enter="main-nav--solid">
    <div class="wrapper wrapper-padding">
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