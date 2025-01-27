<!-- Template Name: About Page
 -->

<?php
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$greyNumSlider =  get_field('add_grey_background_reasons_slider');
$showNumSlider = get_field('show_numbered_reasons_slider');
$titleNumSlider = get_field('numbered_reasons_slider_title');
$greyStatsCards =  get_field('add_grey_background_stats_cards');
$showStatsCards = get_field('show_stats_cards');
$titleStatsCards = get_field('stats_cards_title');
$showLocationSlider = get_field('show_location_slider');
$greyVenue =  get_field('add_grey_background_venue');
$showVenue = get_field('show_venue');
$greyTeam =  get_field('add_grey_background_team');
$showTeam = get_field('show_meet_the_team');
$titleTeam = get_field('meet_the_team_tile');

?>

<?php get_header(); ?>

<?php get_template_part( 'partials/hero', 'small' ); ?>

<?php get_template_part( 'partials/links', 'inner' ); ?>

<?php get_template_part( 'partials/flexible', 'content' ); ?>


<!-- Top Reasons Slider -->
<?php $responsive_images = get_field('remove_images_on_mobile'); ?>
<?php if($showNumSlider): ?>
<?php if($greyNumSlider): ?>
<section class="reasons-slider shadow-section-bottom background-grey" id="reasons-slider">
<?php else: ?>
<section class="reasons-slider shadow-section-bottom" id="reasons-slider">
<?php endif; ?>
    <div class="container wrapper wrapper-padding">
        <div class="reasons-slider--inner">
            <?php if($titleNumSlider): ?> 
            <h2><?php echo $titleNumSlider ?></h2>
            <?php endif; ?>
    <?php if( have_rows('numbered_reasons_slider_content') ): ?>
            <div class="">
                <div class="reasons-carousel">
            <?php while( have_rows('numbered_reasons_slider_content') ): the_row(); 
            // vars
            $image = get_sub_field('image');
            $description = get_sub_field('description');
            ?>
                
                    <div class="half carousel-cell ">
                        <div class="content">
                            <p class="number extra-bold"><?php echo get_row_index() ?></p>
                            <div class="mt-50 description"><?php echo $description; ?></div>
                        </div>
                        <div class="<?php if($responsive_images) { ?> hide-md <?php } ?>">
                            <img class="flickity-image" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt'] ?>" />
                        </div>
                    </div>

            <?php endwhile; ?> 
                </div>  
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?> <!-- end of show if -->

<!-- stats cards with image section  -->
<?php if($showStatsCards): ?>
<?php if($greyStatsCards): ?>
<section class="stats-images stats-card shadow-section-bottom background-grey" id="stats-cards">
<?php else: ?>
<section class="stats-images stats-card shadow-section-bottom" id="stats-cards">
<?php endif; ?>
    <div class="wrapper  wrapper-padding">
        <div class="stats-images--inner">
            <?php if($titleStatsCards): ?> 
            <h2><?php echo $titleStatsCards ?></h2>
            <?php endif; ?>
    <?php if( have_rows('stats_cards_content') ): ?>
            <div class="thirds">
            <?php while( have_rows('stats_cards_content') ): the_row(); 
            // vars
            $imageStat = get_sub_field('stats_image');
            $description = get_sub_field('stats_description');

            ?>
                <div>
                    <div class="card">
                        <?php if($imageStat): ?> 
                        <img class="" src="<?php echo $imageStat['url']; ?>" alt="<?php echo $imageStat['alt'] ?>" />
                        <?php endif; ?>
                        <?php if($description ): ?> 
                        <div class="mt-50 description"><?php echo $description; ?></div>
                        <?php endif; ?>
                    </div>
                </div>

	        <?php endwhile; ?>   
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?> <!-- end of show if -->

<?php get_template_part( 'partials/past', 'attendees' ); ?>

<?php get_template_part( 'partials/flexible', 'content-btn-under' ); ?>

<?php get_template_part( 'partials/flexible', 'content-wide-image' ); ?>

<!-- Location Slider -->
<?php if($showLocationSlider): ?>
<section class="location-slider shadow-section-bottom" id="location-slider">
    <div class="wrapper-full">
        <div class="location-slider--inner">
    <?php if( have_rows('location_slider_content') ): ?>
            
            <div class="location-carousel">
            <?php while( have_rows('location_slider_content') ): the_row(); 
            // vars
            $image = get_sub_field('image');
            $title = get_sub_field('title');
            $description = get_sub_field('description');
            ?>
                
                    <div class="carousel-cell" style="background-image:url('<?php echo $image['sizes']['large']; ?>')">
                        <div class="wrapper">
                            <div class="content">
                                <h2 class=""><?php echo $title; ?></h2>
                                <div class="mt-50 description"><?php echo $description; ?></div>
                            </div>
                        </div>
                    </div>

            <?php endwhile; ?> 
                </div>  
            
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?> <!-- end of show if location slider -->

<!-- the venue -->
<?php if($showVenue): ?> 
<?php if($greyVenue): ?>
<section class="venue background-grey shadow-section-bottom " id="venue">
<?php else: ?>
<section class="venue shadow-section-bottom" id="venue">
<?php endif; ?>

    <?php if( have_rows('venue') ): ?>
    <div class="wrapper-large">
        <div class="venue--inner">
        
        <?php while( have_rows('venue') ): the_row(); 
        // Load values and assing defaults.
        
        $image = get_sub_field('image');
        $heading = get_sub_field('heading');
        $content = get_sub_field('paragraph');
        $addMap = get_sub_field('add_map');
        $map = get_sub_field('map_code');
        
        ?>

    <?php if (get_row_index() % 2 == 0 ): ?>
    <!-- even -->
        <div class="half even">
            <div class="image obj-fit">
                <?php if($image && !$addMap): ?>
                    <img src="<?= $image['sizes']['large']; ?>" class="" alt="<?= $image['alt'] ?>" />
                <?php endif; ?>
                <?php if($addMap): ?>
                    <?php echo $map ?>
                <?php endif; ?>
            </div>
            <div class="content">
                <div class="info">
                    <?php if($heading): ?>
                    <h2><?php echo $heading ?></h2>
                    <?php endif; ?>
                    <?php if($content): ?>
                    <p ><?php echo $content ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php else: ?>
    <!-- odd -->
        <div class="half odd">
            
            <div class="content">
                <div class="info">
                    <?php if($heading): ?>
                    <h2><?php echo $heading ?></h2>
                    <?php endif; ?>
                    <?php if($content): ?>
                    <p ><?php echo $content ?></p>
                    <?php endif; ?>
                </div>
                
            </div>
            <div class="image obj-fit">
                <?php if($image  && !$addMap): ?>
                    <img src="<?= $image['url']; ?>" class="" alt="<?= $image['alt'] ?>" />
                <?php endif; ?>
                <?php if($addMap): ?>
                    <div class="map-responsive">
                        <?php echo $map ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
   
    <?php endwhile; ?>
        </div>
    </div>
     <?php endif; ?>
</section>
<?php endif; ?> <!-- end of show if venue -->
<!-- Meet the team -->

<?php if($showTeam): ?>
<?php if($greyTeam): ?>
<section class="featured-speakers team shadow-section-bottom background-grey" id="team">
<?php else: ?>
<section class="featured-speakers team shadow-section-bottom" id="team">
<?php endif; ?>
    <div class="wrapper wrapper-padding">
        <h2><?php echo $titleTeam; ?></h2>
        <div class="featured-speakers--inner">
        
    <?php if( have_rows('meet_the_team_content') ): ?>

	<?php while( have_rows('meet_the_team_content') ): the_row(); 

		// vars
		$image = get_sub_field('image');
		$name = get_sub_field('name');
        $job = get_sub_field('job_title');
        $phone = get_sub_field('team_phone_number');
        $phone_extension = get_sub_field('team_phone_number_extension');
        $email = get_sub_field('team_email');
        $linkedin = get_sub_field('team_linkedin');
		?>
            <article>  
                <div class="img--container obj-fit">
                    <img class="" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
                </div>
                <p class="name"><?php echo $name; ?></p>
                <p class="job"><?php echo $job; ?></p>

                <div class="team--social-links">
                <?php if($email): ?>
                    <div class="">
                    <a class="email" href="mailto:<?php echo $email; ?>" target="_top">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50.292" height="51"><g data-name="Group 67"><g data-name="Group 66"><g data-name="Path 251" fill="none"><path d="M25.146 0a25.325 25.325 0 0 1 25.145 25.5A25.325 25.325 0 0 1 25.146 51 25.325 25.325 0 0 1 0 25.5 25.325 25.325 0 0 1 25.146 0z"/><path d="M25.146 4c-5.638 0-10.941 2.23-14.933 6.277a21.456 21.456 0 0 0-4.545 6.837A21.67 21.67 0 0 0 4 25.5c0 2.911.561 5.732 1.668 8.386a21.456 21.456 0 0 0 4.545 6.836C14.205 44.77 19.508 47 25.146 47c5.637 0 10.94-2.23 14.932-6.278a21.456 21.456 0 0 0 4.546-6.836A21.67 21.67 0 0 0 46.29 25.5a21.67 21.67 0 0 0-1.667-8.386 21.456 21.456 0 0 0-4.546-6.837C36.087 6.23 30.783 4 25.146 4m0-4C39.033 0 50.29 11.417 50.29 25.5S39.033 51 25.146 51C11.258 51 0 39.583 0 25.5S11.258 0 25.146 0z" fill="<?php the_field('accent_color', 'option'); ?>"/></g></g><path data-name="Subtraction 5" d="M40.431 34.542H10.2V17.344l5.261 3.4 3.013 1.953c3.709 2.4 6.651 4.134 6.974 4.324h.005v-.031l14.978-9.919v17.471zm-14.987-8.465l-15.057-9.906h29.68l-14.623 9.906z" fill="<?php the_field('accent_color', 'option'); ?>"/></g></svg>
                    </a>
                    </div>
                <?php endif; ?>

                <?php if($phone_extension) : ?>
                    <div class="">
                    <a href="tel:<?php echo $phone; ?>,<?php echo $phone_extension; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50.292" height="51"><g data-name="Group 70"><g data-name="Group 68"><g data-name="Ellipse 233" fill="none" stroke="<?php the_field('accent_color', 'option'); ?>" stroke-width="4"><ellipse cx="25.146" cy="25.5" rx="25.146" ry="25.5" stroke="none"/><ellipse cx="25.146" cy="25.5" rx="23.146" ry="23.5"/></g></g><g data-name="Group 69"><path data-name="Path 219" d="M29.396 41.228a9.635 9.635 0 0 1-4.317-1.167 14.634 14.634 0 0 1-3.311-2.522 71.092 71.092 0 0 1-5.315-5.9 29.746 29.746 0 0 1-4.244-6.783 16.926 16.926 0 0 1-1.42-5.259l-.091-.968v-1.008c.01-.047.021-.094.028-.141.072-.437.113-.882.222-1.31a12.2 12.2 0 0 1 2.923-5.265 8.216 8.216 0 0 1 2.034-1.65 4.494 4.494 0 0 1 1.492-.512h.39a3.232 3.232 0 0 1 2.087 1.508 43.013 43.013 0 0 1 3.333 4.921 1.678 1.678 0 0 1 .166.669 2.788 2.788 0 0 1-.876 2.288 21.5 21.5 0 0 1-2.624 2.228c-.506.371-1 .767-1.479 1.168a1.321 1.321 0 0 0-.358 1.8 6.143 6.143 0 0 0 .775 1.215c.9 1.083 1.826 2.146 2.76 3.2q2.07 2.336 4.171 4.646c.448.49.952.931 1.447 1.377a2.929 2.929 0 0 0 .6.387 1.338 1.338 0 0 0 1.491-.067 15.372 15.372 0 0 0 1.261-1.052c.833-.751 1.64-1.53 2.481-2.271a3.232 3.232 0 0 1 1.8-.8 2.4 2.4 0 0 1 1.5.331 5.694 5.694 0 0 1 .987.681 74.44 74.44 0 0 1 2.391 2.272 4.406 4.406 0 0 1 1.057 1.585 7.077 7.077 0 0 1 .192.768v.13a.391.391 0 0 0-.022.077 2.657 2.657 0 0 1-.5 1.288 6.072 6.072 0 0 1-1.46 1.468 14.157 14.157 0 0 1-5.805 2.431s-2.198.253-3.766.237z" fill="<?php the_field('accent_color', 'option'); ?>"/></g></g></svg>
                    </a>
                    </div>

                    <?php elseif ($phone): ?>
                    <div class="">
                    <a href="tel:<?php echo $phone; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50.292" height="51"><g data-name="Group 70"><g data-name="Group 68"><g data-name="Ellipse 233" fill="none" stroke="<?php echo the_field('accent_color', 'option'); ?>" stroke-width="4"><ellipse cx="25.146" cy="25.5" rx="25.146" ry="25.5" stroke="none"/><ellipse cx="25.146" cy="25.5" rx="23.146" ry="23.5"/></g></g><g data-name="Group 69"><path data-name="Path 219" d="M29.396 41.228a9.635 9.635 0 0 1-4.317-1.167 14.634 14.634 0 0 1-3.311-2.522 71.092 71.092 0 0 1-5.315-5.9 29.746 29.746 0 0 1-4.244-6.783 16.926 16.926 0 0 1-1.42-5.259l-.091-.968v-1.008c.01-.047.021-.094.028-.141.072-.437.113-.882.222-1.31a12.2 12.2 0 0 1 2.923-5.265 8.216 8.216 0 0 1 2.034-1.65 4.494 4.494 0 0 1 1.492-.512h.39a3.232 3.232 0 0 1 2.087 1.508 43.013 43.013 0 0 1 3.333 4.921 1.678 1.678 0 0 1 .166.669 2.788 2.788 0 0 1-.876 2.288 21.5 21.5 0 0 1-2.624 2.228c-.506.371-1 .767-1.479 1.168a1.321 1.321 0 0 0-.358 1.8 6.143 6.143 0 0 0 .775 1.215c.9 1.083 1.826 2.146 2.76 3.2q2.07 2.336 4.171 4.646c.448.49.952.931 1.447 1.377a2.929 2.929 0 0 0 .6.387 1.338 1.338 0 0 0 1.491-.067 15.372 15.372 0 0 0 1.261-1.052c.833-.751 1.64-1.53 2.481-2.271a3.232 3.232 0 0 1 1.8-.8 2.4 2.4 0 0 1 1.5.331 5.694 5.694 0 0 1 .987.681 74.44 74.44 0 0 1 2.391 2.272 4.406 4.406 0 0 1 1.057 1.585 7.077 7.077 0 0 1 .192.768v.13a.391.391 0 0 0-.022.077 2.657 2.657 0 0 1-.5 1.288 6.072 6.072 0 0 1-1.46 1.468 14.157 14.157 0 0 1-5.805 2.431s-2.198.253-3.766.237z" fill="<?php the_field('accent_color', 'option'); ?>"/></g></g></svg>
                    </a>
                    </div>
                <?php endif; ?>

                <?php if($linkedin): ?>
                <a class="team--social-linkedin" target="_blank" href="<?php echo $linkedin; ?>"><i class="fab fa-linkedin" data-fa-transform="shrink-3.5 down-1.6 right-1.25" data-fa-mask="fas fa-circle"></i></a>
                <?php endif; ?>

                </div>
            </article>
	    <?php endwhile; ?>

        <?php endif;// end meet the team loop ?>
        </div>
    </div>
</section>
    
<?php endif;  // end meet the team ?>

<?php get_template_part( 'partials/faqs', 'section' ); ?>

<?php get_template_part('partials/newsletter'); ?>

<?php get_footer(); ?>