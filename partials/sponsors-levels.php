<?php 
$showSponsors = get_sub_field( 'show_section');
$sponsorTitle = get_sub_field( 'section_title' );
$terms = get_field('sponsor_level_order', 'option');
// $sponsorLink = get_field( 'sponsors_website' );
$sponsorBtn = get_sub_field( 'current_sponsor_button');
?>

<?php if($showSponsors): ?>

  <section id="sponsor-levels-container" class="section no-space background-grey py-5 md:py-14 px-5 md:px-0 step" data-animate-enter="main-nav--solid">
    <div class="tabs background-grey sticky top-[75px] lg:top-32 z-10 pt-7 md:pt-10 px-5 md:px-0">
      <div class="md:container mx-auto border-b border-b-neutral-300">
        <h2 class="font-extrabold text-4xl md:text-5xl"><?php echo $sponsorTitle ?></h2>
        <div class="flex gap-[1px] my-5 md:my-12 font-medium overflow-x-scroll no-scrollbar">
          <?php if( $terms ): ?>
            <?php foreach( $terms as $term ): ?>
              <a href="#tier-<?php echo $term->name; ?>" data-target="tier-<?php echo $term->name; ?>"
              class="tab <?= ($term->count == 0) ? ' tab-disable': '';?>"><?php echo $term->name; ?></a>
            <?php endforeach; 
          endif; ?>
        </div>
      </div>
    </div>
    <div class="container mx-auto font-bold pb-5" id="sponsor-levels">
      <?php if( $terms ): ?>
        <?php foreach( $terms as $term ): ?>
          <?php if ( $term->count > 0 ): ?>
            <div id="tier-<?php echo $term->name; ?>" class="tab-list" data-tab-name="tier-<?php echo $term->name; ?>">
              <h3 class="tab-list--title"><?php echo $term->name; ?></h3>
              <?php
              $the_query = new WP_Query( array(
                'post_type' => 'sponsors',
                'tax_query' => array(
                  array (
                    'taxonomy' => 'sponsor_levels',
                    'field' => 'slug',
                    'terms' =>  $term,
                  )
                ),
              ));?>
              <?php if( $the_query->have_posts() ): ?>
              <div class="w-full grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-2 md:gap-4 lg:gap-7">
                <?php while ( $the_query->have_posts() ) :
                  $the_query->the_post();?>
                  <a class="tab-list--item group cursor-pointer" href="<?php echo get_permalink($post->ID); ?>" target="_self">
                    <div class="sponsor-list sponsor-list--animate">
                      <?php echo get_the_post_thumbnail($post->ID,'sponsor', array('class' => 'sponsor-list--image')); ?>
                    </div>
                  </a>
                <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php else: ?><!-- If no terms -->
      <?php
      $the_query = new WP_Query( array(
        'post_type' => 'sponsors',
      ));?>
        <div class="level-container mt-100">
          <?php while ( $the_query->have_posts() ) :
          $the_query->the_post();?>
            <a href="<?php echo get_permalink($post->ID); ?>" target="_self">
              <div class="sponsor-square">
                <?php echo get_the_post_thumbnail($post->ID,'sponsor'); ?>
              </div>
            </a>
          <?php endwhile; ?>
        </div><!-- end of level container -->
        <?php endif; ?>
    </div>
   
    <?php if( $sponsorBtn ):
      $link_url = $sponsorBtn['url'];
      $link_title = $sponsorBtn['title'];
      $link_target = $sponsorBtn['target'] ? $sponsorBtn['target'] : '_self';
    ?>
      <div class="md:container mx-auto md:mt-7">
        <a class="group flex items-center text-neutral-700 hover:text-black uppercase tracking-widest transition-all" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
          <?php echo esc_html($link_title); ?>
          <span class="bg-black text-white ml-2 px-3 py-2.5 rounded-full transition-all motion-safe:animate-shake">
            <svg class="h-4 rotate-45 -ml-0.5" width="100%" height="100%" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.41899 11.5437L0.92041 10.0451L8.44172 2.51669H2.73149L2.74569 0.457031H12V9.7184H9.92609L9.9403 4.01527L2.41899 11.5437Z" fill="currentColor"></path></svg>
          </span>
        </a>
      </div>
    <?php endif;
    /* Restore original Post Data 
      * NB: Because we are using new WP_Query we aren't stomping on the 
      * original $wp_query and it does not need to be reset.
      */
      wp_reset_postdata(); ?>
    
  </section><!-- end of sponsor-levels -->
<?php endif; ?>
