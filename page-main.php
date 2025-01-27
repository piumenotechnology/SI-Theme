<!-- Template Name: Main
-->

<?php
get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-page' );

  get_template_part( 'partials/hero', 'small' );

  get_template_part( 'partials/links', 'inner' );

	// ACF - Flexible Content fields.
	$sections = get_field( 'bigdata_sections' );

  if (have_rows('bigdata_sections')) {
    while (have_rows('bigdata_sections')) {
      the_row();
      include('template-parts/sections/'.get_row_layout().'.php');
    }
  }

endwhile; // End of the loop.

get_footer();