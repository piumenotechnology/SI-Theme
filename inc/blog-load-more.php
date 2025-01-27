<?php
/**
 * 
 * @package dayshiftdigital
 * 
 * AJAX Functions
 */

add_action('wp_ajax_nopriv_blog_load_more_posts', 'blog_load_more_posts');
add_action('wp_ajax_blog_load_more_posts', 'blog_load_more_posts');


function blog_load_more_posts() {
    $paged = $_POST["page"]+1;
    $sticky_post = $_POST["sticky"];
    $current_category = $_POST["category"];

    $query = new WP_Query( array(
		'post_type' => 'post',
		'posts_per_page' => 9,
		'paged' => $paged,
		'post__not_in' => array($sticky_post),
		'post_status' => 'publish',
		'cat' => $current_category,
		
	));

    if($query->have_posts()): 
		while($query->have_posts()): $query->the_post();

	        get_template_part( 'partials/resources', 'post' );

        endwhile; // End the loop. Whew. 
    
    endif;

    wp_reset_postdata();

    die();
}