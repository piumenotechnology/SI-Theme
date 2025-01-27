		
			
<?php
	$loop = new WP_Query( array(
		'post_type' => 'agenda',
		'post_parent' => $post->ID,
		'posts_per_page' => -1,
		'order'				=> 'ASC',
		'orderby'			=> 'meta_value',
		'meta_key'			=> 'start_time',
		'meta_type'			=> 'TIME'
	)
	);
?>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		
	<?php get_template_part('partials/agenda-item', 'loop-agenda'); ?>
		
<?php endwhile; ?>
						
