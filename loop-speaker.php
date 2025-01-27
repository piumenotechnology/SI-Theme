<?php
        $loop = new WP_Query( array(
            'post_type' => 'speakers',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'ASC',
          )
        );
        ?>

        <?php while ( $loop->have_posts() ) : $loop->the_post(); 
        $job = get_field('job_title');
	      $company = get_field('company');
        ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <a href="<?php the_permalink(); ?>" title="Permalink to:    <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
          <div class="img--container obj-fit">
            <?php if(has_post_thumbnail()): ?>
              <?php the_post_thumbnail('card'); ?>
            <?php else : ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon.jpg" alt="">
            <?php endif; ?>
          </div>
					<p class="name"><?php the_title(); ?></p>
					<p class="job"><?php echo $job; ?></p>
          <div class="logo-container obj-fit">
            <img class="logo" src="<?php echo $company['sizes']['medium']; ?>" alt="<?php echo $company['alt']; ?>" />
          </div>
        </a>
		</article><!-- #post-## -->


        <?php endwhile; wp_reset_query(); ?>
<?php // Display navigation to next/previous pages when applicable ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
  <p class="alignleft"><?php next_posts_link('&laquo; Older Entries'); ?></p>
  <p class="alignright"><?php previous_posts_link('Newer Entries &raquo;'); ?></p>
<?php endif; ?>
