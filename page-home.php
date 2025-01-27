<!-- Template Name: Home -->

<?php
get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-page' );

	// ACF - Flexible Content fields.
	$sections = get_field( 'bigdata_sections' );

  if (have_rows('bigdata_sections')) {
    while (have_rows('bigdata_sections')) {
      the_row();
      include('template-parts/sections/'.get_row_layout().'.php');
    }
  }

	// if ( $sections ) :
	// 	foreach ( $sections as $section ) :
	// 		$template = str_replace( '_', '-', $section['acf_fc_layout'] );
	// 		get_template_part( 'template-parts/sections/' . $template, '', $section );
	// 	endforeach;
	// endif;

endwhile; // End of the loop.

get_footer();