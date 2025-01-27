<?php 
    $start_time = get_field('start_time');
    $end_time = get_field('end_time');
    $subtitle = get_field('subtitle');
    $content = get_the_content();
    $tracks = get_the_terms($post, 'track_types'); 

    $agenda_id = str_replace(' ', '-', get_the_title());
?>

<!-- Agenda Item ID URL #<?php echo $agenda_id; ?>-->
<div class="agenda--item 
    <?php if($tracks) { ?>
    <?php foreach($tracks as $track) {
        echo $track->slug;
    } ?>
    <?php } ?> ">
    <span class="agenda--item-offset" id="<?php echo $agenda_id; ?>"></span>
    <div class="agenda--time background-accent font-secondary shadow-section-bottom">
        <p><?php echo $start_time; ?></p>
    </div>	
    
    <div class="agenda--inner" style="display:flex;">
		<div>
        <div class="agenda--inner-top flex"> 
            <p class="agenda--full-time"><?php echo $start_time; ?> <?php if($end_time) { echo '<span> - </span>' . $end_time; } ?></p>
            
            <?php $tracks = get_the_terms($post, 'track_types'); ?>
            <?php if($tracks) { ?>
            <?php foreach($tracks as $track) {
                $track_colour = get_field('track_colour', $track);

                if(is_singular('speakers')) {
                    echo '<span data-track="'.$track->slug.'" class="agenda--track" style="background-color:'. $track_colour.';">'.$track->name.'</span>';
                } else {
                    echo '<a href="#" data-track="'.$track->slug.'" class="agenda--track" style="background-color:'. $track_colour.';">'.$track->name.'</a>';
                }
            } ?>
            <?php } ?>
        </div>
        
        <?php if($subtitle) { ?>
        <h4 class="agenda--subtitle"><?php echo $subtitle; ?></h4>
        <?php } ?>

        <?php if(empty($content)) {
            $content_check = 'no-content';
        } else {
            $content_check = "content-present";
        } ?>

        <h3 class="agenda--title <?php echo $content_check; ?>"><?php the_title(); ?></h3>
        
        <?php if($content) { ?>
        <div class="longtext agenda--content">
            <div class="agenda--content-overlay"></div>
            <?php the_content(); ?>
        </div>
        <?php } ?>

        <?php 

        $all_speakers = array();
        $moderator_ids = array();

        $moderators = get_field('agenda_moderators');
        $speakers = get_field('agenda_speakers');
        
        if($speakers) {
            foreach($speakers as $speaker) {
                array_push($all_speakers, $speaker);
            }
        }
		
		if($moderators) {
            foreach($moderators as $moderator) {
                array_push($all_speakers, $moderator);
                array_push($moderator_ids, $moderator->ID);
            }
        }

        if(!empty($all_speakers) && !is_singular('speakers')): ?>
            <div class="agenda--speakers">
            <?php foreach( $all_speakers as $single_speaker):
    
            $job = get_field('job_title', $single_speaker->ID);
            $shortened_job_title = strlen($job) > 100 ? substr($job,0,100)."..." : $job;
            $company = get_field('company_name', $single_speaker->ID);
            ?>

                <div class="agenda--speaker">
                    <a href="<?php echo get_permalink( $single_speaker ->ID ); ?>">
                        <div class="agenda--speaker-image obj-fit">
                            <?php if(has_post_thumbnail($single_speaker ->ID )): ?>
                                <?php echo get_the_post_thumbnail( $single_speaker ->ID ); ?>
                             <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-square.jpg" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="agenda--speaker-info">
                            <p class="agenda--speaker-name"><?php echo get_the_title( $single_speaker ->ID ); ?></p>

                            <?php if($job) { ?>
                            <p class="agenda--speaker-title"><?php echo $shortened_job_title ?></p>
                            <?php } ?>

                            <?php if($company) { ?>
                            <p class="agenda--speaker-company"><?php echo $company; ?></p>
                            <?php } ?>
                        
                            <?php 
                                if(in_array($single_speaker->ID, $moderator_ids)) { ?>
                                <p class="agenda--speaker-moderator font-accent">Moderator</p>
                            <?php } ?>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
            </div>
        <?php endif; ?>
		</div>
		<?php the_post_thumbnail('gradient-agenda-item-photo'); ?>
    </div>
</div>