<?php 
$page_for_posts = get_option( 'page_for_posts' );
$grey =  get_field('add_grey_background_links');
$showLinks = get_field('add_page_links');

?>
<?php if($showLinks): ?>

<?php if($grey): ?>
<section class="page-links no-space background-grey step" data-animate-enter="main-nav--solid">
<?php else: ?>
<section class="page-links no-space shadow-section-bottom step" data-animate-enter="main-nav--solid">
<?php endif; ?>

<div class="container mx-auto">
    <div class="page-links--inner">

<?php if( have_rows('page_links') ): ?>

	<ul class="">

	<?php while( have_rows('page_links') ): the_row(); 

		//vars
		$link = get_sub_field('page_link');
	
		?>
		

		<li>

			<?php if( $link ): ?>
				<a class="quick-pagelink" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" ><?php echo $link['title']; ?></a>
			<?php endif; ?>

		</li>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?> <!-- end of show if -->