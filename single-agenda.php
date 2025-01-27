<?php get_header(); ?>

  <div class="content">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <?php
        // Check if this is the parent level
        if($post->post_parent == 0) { ?>
        
          <?php get_template_part( 'partials/hero', 'small' ); ?>

          <section id="agenda-main" class="agenda-main step" data-animate-enter="main-nav--solid">
            <div class="wrapper-large flex flex-wrap agenda-wrapper">
              <aside class="agenda--navigation">              
                <nav>
                  <ul>
    
                  <?php
                    $current_post = get_queried_object_id();

                    $nav_args = array( 
                      'post_type' => 'agenda',
                      'post_status' => 'publish',
                      'post_parent' => 0,
                      'posts_per_page' => -1,
                      'meta_key' => 'date',
                      'order_by' => 'meta_value_num',
                      'order' => 'ASC',
                    );
                  
                  $nav_agenda = new WP_Query($nav_args);
                  
                  if($nav_agenda->have_posts()): ?>
                  
                    <?php while($nav_agenda->have_posts()): $nav_agenda->the_post(); ?>
                    
                    <li class="
                      <?php if($current_post == $post->ID) {
                        echo 'active';                      
                      } ?>
                    ">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                  
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                  <?php endif; ?>
                  </ul>
                </nav>
                <?php $show_printer = get_field('general_printer_friendly', 'option'); ?>
                <?php if($show_printer) { ?>
                <a href="#" print class="printer small-font mb-50"><i class="fas fa-print"></i>Printer Friendly</a> 
                <?php } ?>

              <?php $current_day = get_queried_object_id(); ?>

              <?php
                $track_query_args = array( 
                  'post_type' => 'agenda',
                  'post_status' => 'publish',
                  'posts_per_page' => -1,
                  'post_parent' => $current_day,
                );
              
              $current_tracks = array(); 
              $track_query = new WP_Query($track_query_args);
              
              if($track_query->have_posts()): ?>
              
                <?php while($track_query->have_posts()): $track_query->the_post(); ?>
              
                  <?php 
                  
                  $track_associated_with_post = get_the_terms($post, 'track_types'); 
                  ?>
                  
                 <?php if (is_array($track_associated_with_post)) { foreach($track_associated_with_post as $single_associated_track) {
                    array_push($current_tracks,$single_associated_track->slug); 
                  }} ?>


                  
              
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              <?php endif; ?>

              <?php $current_tracks_unique = array_unique($current_tracks); ?>


                <div class="tracks flex flex-wrap text-lg">
                  <button>Tracks at a glance <span class="plus-sign"></span></button>
                  
                  <div class="tracks--inner w-full">
                    <?php foreach($current_tracks_unique as $track) {

                      $full_track_term = get_term_by('slug', $track, 'track_types');

                      $track_colour = get_field('track_colour', $full_track_term);
                      echo '<div class="tracks--single"><a href="#" data-track="'.$full_track_term->slug.'" style="color:'. $track_colour . ';">'.$full_track_term->name.'</a><p>'.$full_track_term->description.'</p></div>';
                    } ?>
                  </div>
                </div>

                <?php $agenda_cta = get_field('download_brochure_link', 'option'); ?>
                <?php if($agenda_cta) { ?>
                <div class="tracks--btn">
                  <a class="btn-one shadow-section-bottom" href="<?php echo $agenda_cta['url']; ?>" target="<?php echo $agenda_cta['target']; ?>"><?php echo $agenda_cta['title']; ?></a>
                </div>
                <?php } ?>
                
              </aside>
              
              <div class="error-message"><?php the_field('no_agenda_items_message', 'option'); ?></div>

              <div class="agenda--items">
                <?php get_template_part('loop-agenda', 'single-agenda'); ?>
                
              </div>
              
            </div>
          </section>
  
        <!-- This is a child agenda page display nothing -->
        <?php } else {

        } ?>
        
    <?php endwhile;  ?>

  </div>

  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <?php get_template_part('partials/newsletter', 'single-agenda'); ?>
  
  <?php endwhile;  ?>

<?php get_footer(); ?>
