<?php $resources = get_field('post_details'); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class('resource-post'); ?>>
    
        <div class="post-image">
            <a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
            <div class="resource-post-image obj-fit">
                <?php the_post_thumbnail('resource'); ?>
            </div> 
            </a>
        </div>
    
        <section class="entry-content">
            <a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
            <h2 class="entry-title leading-tight"><?php the_title(); ?></h2>
        
        
            <?php  echo '<p class="excerpt">' . get_the_excerpt() . '</p>' ?>
            <?php if( $resources): ?>
            <div class="entry-details mt-3">
            <img src="<?php echo $resources['company_logo']['url']; ?>" alt="<?php echo $resources['company_logo']['alt']; ?>" />
            <div class="author-title">
                <p><?php echo $resources['author'] ?></p>
                <p><?php echo $resources['job_title']; ?></p>
            </div>
            
            <?php endif; ?>
                </a>
        </section><!-- .entry-content -->

</article><!-- #post-## -->