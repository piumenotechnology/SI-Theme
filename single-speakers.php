<?php 
$job = get_field('job_title');
$company = get_field('company');
$company_link = get_field('company_link');
$session = get_field('sessions_by', 'option');
$next = get_permalink(get_adjacent_post(false, '', false));
$prev= get_permalink(get_adjacent_post(false, '', true));
?>

<?php get_header(); ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post();
    if(has_post_thumbnail()):
      $image_bg = get_the_post_thumbnail_url(get_the_ID(), 'medium');
    else:
      $image_bg = get_template_directory_uri() . "/assets/icons/icon-square.jpg";
    endif;
  ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="post-header relative flex items-end min-h-[50vh] bg-contain bg-repeat-x mt-24 lg:mt-28 step" style="background-image: url('<?= $image_bg; ?>')" data-animate-enter="main-nav--solid">
        <div class="md:container wrapper w-full z-10">
          <div class="post-header--inner md:justify-between md:items-end">
            <div class="speaker-title space-y-5 md:w-1/2">
              <div class="hidden md:flex gap-[1px] text-sm mb-10 lg:mb-14">
                
                <?php if (get_the_permalink()!=$prev): ?>
                  <a class="tab tab-grey" href='<?php echo $prev; ?>'><i class="fas fa-chevron-left"></i></a>
                <?php else: ?>
                  <a class="tab tab-disable" href="#"><i class="fas fa-chevron-left"></i></a>
                <?php endif; ?>
                <?php if (get_the_permalink()!=$next): ?>
                  <a class="tab tab-grey" href="<?php echo $next; ?>"><i class="fas fa-chevron-right"></i></a>
                <?php else: ?>
                  <a class="tab tab-disable" href="#"><i class="fas fa-chevron-right"></i></a>
                <?php endif; ?>
              </div>
              <h1 class="font-extrabold text-white text-4xl xl:text-5xl"><?php the_title(); ?></h1>
              <div class="random-box hidden md:flex flex-wrap w-36 gap-2 mt-5 md:mt-6 mb-5 md:mb-10">
                <div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div>
              </div>
              <p class="job text-lg text-neutral-100"><?php echo $job; ?></p>
            </div>
            <?php if($company_link) { ?>
              <a href="<?php echo $company_link; ?>" target="_blank">
            <?php } ?>
            <img class="logo" src="<?php echo $company['url']; ?>" alt="<?php echo $company['alt']; ?>" />
            <?php if($company_link) { ?>
              </a>
            <?php } ?>
          </div>
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-gradient-to-t from-neutral-900 via-70% to-transparent mix-blend-multiply"></div>
      </div>

      <div class="entry-content">
        <div class="md:container wrapper wrapper-padding">
          <div class="entry-content--inner text-lg">
            <?php the_content(); ?>
          </div>
    
          <hr>
          <div class="speaker-agenda">
            <div class="speaker-agenda--title">
              <h3 class="text-2xl uppercase mb-10"><?php echo $session ?> <?php the_title(); ?></h3>
              <?php $show_printer = get_field('general_printer_friendly', 'option'); ?>
              <?php if($show_printer) { ?>
              <a href="" class="printer small-font mb-50"><i class="fas fa-print"></i>Printer Friendly</a> 
              <?php } ?>
              
              <?php 

              $link = get_field('agenda_link', 'option');

              if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a href="<?php echo $link_url ?>" class="uppercase bold mb-50 agenda-link" target="<?php echo $link_target ?>"><?php echo $link_title ?></a>
              <?php endif; ?>
              
            </div>

        <?php $current_post = $post->ID; ?>
          
        <?php
          $agenda_parents_args = array( 
            'post_type' => 'agenda',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'post_parent' => 0,
            'meta_key' => 'date',
            'order_by' => 'meta_value_num',
            'order' => 'ASC',
          );
        
        $agenda_parents = new WP_Query($agenda_parents_args);
        
        if($agenda_parents->have_posts()): ?>
        
          <?php while($agenda_parents->have_posts()): $agenda_parents->the_post(); ?>
        
            <?php 
              $parent_id = $post->ID; 
              $parent_title = get_the_title(); ?>

            <?php
              $agenda_children_items_args = array( 
                'post_type' => 'agenda',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'post_parent' => $parent_id,
                'order'				=> 'ASC',
                'orderby'			=> 'meta_value',
                'meta_key'			=> 'start_time',
                'meta_type'			=> 'TIME'
              );
            
            $agenda_children_items = new WP_Query($agenda_children_items_args);
            
            if($agenda_children_items->have_posts()): ?>

              <?php 
              $date = get_field('date', false, false);
              $date_format = new DateTime($date); ?>
              <p class="speaker-agenda--day"><?php echo $parent_title; ?><span><?php echo $date_format->format(' M j, Y'); ?></span></p>

              <div class="speaker-agenda--single-container">
                <?php while($agenda_children_items->have_posts()): $agenda_children_items->the_post(); ?>

                  <?php 
                  $moderators = get_field('agenda_moderators'); 
                  $speakers = get_field('agenda_speakers'); 

                  $all_speakers = array();

                  if ($moderators) {
                    foreach($moderators as $moderator) {
                      array_push($all_speakers, $moderator->ID);
                    }
                  }
                  
                  if ($speakers) {
                    foreach($speakers as $speaker) {
                      array_push($all_speakers, $speaker->ID);
                    } 
                  }
                  
                  if(!empty($all_speakers)) {
                  
                    if(in_array($current_post, $all_speakers)) { ?>

                      <?php get_template_part('partials/agenda-item', 'single-speakers'); ?>

                    <?php }

                  } ?>
              
                <?php endwhile; ?>
              </div>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
  
                  </div>
          </div> <!-- .wrapper-small -->  
      </div><!-- .entry-content -->

      

<div class="speaker-single--next">     
  <div class="wrapper">
    <div class="speaker-single--inner--next clearfix">
      <div>
        <?php $next_post = get_next_post();
        $prev_post = get_previous_post(); ?>
          <?php if($next_post) {
              $post_title = $next_post->post_title; ?>

              <a href="<?php echo get_permalink($next_post->ID); ?>">
                  <p class="bold mb-25">Next Speaker</p>
                  <?php 
    
                      $nextThumbnail = get_the_post_thumbnail($next_post->ID ,'small-profile'); 
                      ?>
                  <div class="arrow-right--container flex">
                      <?php if($nextThumbnail): ?>
                      <?php echo $nextThumbnail; ?>
                      <?php else : ?>
                      <img width="176" height="132" src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon.jpg" alt="">
                    <?php endif; ?>
                    <div class="arrow-right background-grey">
                      <span ><svg xmlns="http://www.w3.org/2000/svg" width="19.4" height="19.401"><path data-name="Path 233" d="M9.7 0L7.937 1.764l6.677 6.677H0v2.52h14.613l-6.676 6.676L9.7 19.4l9.7-9.7z" fill="#313131"/></svg></span>
                    </div> 
                  </div>
              </a>
              
          <?php } elseif($prev_post) { ?>
              <?php $last_person = new WP_Query(array(
                  'post_type' => "speakers",
                  'post_status' => "publish",
                  'posts_per_page' => 1,
                  'order' => "ASC"
              )); ?>

              <?php if($last_person->have_posts()): while($last_person->have_posts()):
                  $last_person->the_post(); ?>
                  
                  <a href="<?php the_permalink(); ?>">
                    <p class="bold mb-25">Next Speaker</p>
                        <?php $firstThumbnail = get_the_post_thumbnail($post->ID ,'small-profile'); ?>

                      <?php if ($firstThumbnail) {
                          echo $firstThumbnail;
                      
                      } ?>
                          <div class="arrow-right">
                              <span ><svg xmlns="http://www.w3.org/2000/svg" width="19.4" height="19.401"><path data-name="Path 233" d="M9.7 0L7.937 1.764l6.677 6.677H0v2.52h14.613l-6.676 6.676L9.7 19.4l9.7-9.7z" fill="#313131"/></svg></span>
                          </div>
                  </a>
                  
                  <?php endwhile;
              wp_reset_postdata();
              endif; ?>

          <?php } ?>
      </div>
  <?php endwhile; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>