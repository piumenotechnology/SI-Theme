<?php 
$page_for_posts = get_option( 'page_for_posts' );
$grey =  get_field('add_grey_background_links');

	if ( is_category() ) {
	// blog cat archive
	$showLinks = get_field('add_page_links', $page_for_posts);
	} elseif ( is_home() ) {
	// blog page
	$showLinks = get_field('add_page_links', $page_for_posts);
	} else {
	//everything else
	$showLinks = get_field('add_page_links');
	} 
?>
<?php if($showLinks): ?>

<?php if($grey): ?>
<section class="page-links no-space background-grey step" data-animate-enter="main-nav--solid">
<?php else: ?>
<section class="page-links no-space step" data-animate-enter="main-nav--solid">
<?php endif; ?>


<div class="container mx-auto">
    <div class="page-links--inner">



	<ul class="">
		<li><a href="<?php echo get_permalink( $page_for_posts ); ?>">All</a></li>
	
    <?php wp_list_categories( array(
        'orderby'    => 'name',
        'title_li'           => __( '' ),
		'hide_empty'         => 0,
		'use_desc_for_title' => 0,
        'exclude'    => array( 1 )
    ) ); ?> 

		
	

	</ul>

    </div>
  </div>
</section>
<?php endif; ?> <!-- end of show if -->