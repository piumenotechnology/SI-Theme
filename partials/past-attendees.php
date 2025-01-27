<?php 
$attendeesTitle = get_field( 'attendees_title' );
$attendeeBtn = get_field( 'attendees_button');
$showAttendees = get_field( 'show_past_attendees');
$grey = get_field( 'add_grey_background_attendees');
?>

<?php if($showAttendees): ?>

<?php if($grey): ?>
<section class="past-atendees background-grey my-12" id="attendees">
<?php else: ?>
<section class="past-atendees my-12" id="attendees">
<?php endif; ?>
    <div class="wrapper wrapper-padding">
        <div class="past-atendees--inner">
        <p class="text-neutral-900 text-sm text-center font-medium uppercase opacity-60 mb-3">Past attendees</p>
				<h2 class="w-2/3 text-center text-neutral-900 font-extrabold text-4xl md:text-5xl mx-auto"><?php echo $attendeesTitle ?></h2>
<?php if( have_rows('attendees') ): ?>
        
    <div class="level-container grid-7 my-10">
    
	<?php while( have_rows('attendees') ): the_row(); 

		// vars
		$image = get_sub_field('logo_image');
		$link = get_sub_field('attendee_website');
        ?>
        <?php if( $link ): ?>
				<a href="<?php echo $link; ?>" target="_self">
				<?php endif; ?>
					<div class="sponsor-square contain obj-fit opacity-75 hover:opacity-100 transition-all duration-300">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
					</div>
			<?php if( $link ): ?>
				</a>
			<?php endif; ?>
        
   <?php endwhile; ?>
   </div><!-- end of level container -->


<?php endif; ?>
<?php if( $attendeeBtn ):
	$link_url = $attendeeBtn['url'];
	$link_title = $attendeeBtn['title'];
	$link_target = $attendeeBtn['target'] ? $attendeeBtn['target'] : '_self';
	?>
	<div class="container mx-auto flex justify-center mt-10">
		<a class="btn-one" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
<?php endif; ?>

        </div><!-- end of inner -->
    </div><!-- end of wrapper -->
</section><!-- end of section -->

<?php endif; ?>