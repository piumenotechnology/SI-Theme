<!-- Template Name: Download
 -->

<?php 

  $hero = get_field('hero'); 
  $hero_image = $hero['hero_image'];
  $hero_text = $hero['hero_text']; 
  
  $form = get_field('form'); 
  $form_fields = $form['form_fields'];
  $form_details = $form['details'];

  $show_flexible = get_field('show_whats_inside_section');
  $flexible = get_field('whats_inside');
  $flexible_title = $flexible['title'];
  $flexible_grey = $flexible['add_grey_background?']; 

  ?>

<?php get_header(); ?>

<section class="download-hero">
  <div class="wrapper wrapper-padding">
    <div class="download-hero--inner flex two-thirds">
      <div class="inner-two-thirds">
        <h1 class="uppercase font-primary"><?php the_title(); ?></h1>
      </div>
    
      <?php if($hero_image) { ?>
      <div class="download-hero--image">
        <?php echo wp_get_attachment_image( $hero_image, 'medium'); ?>
      </div>
      <?php } ?>

    </div>

    <?php if($hero_text) { ?>
    <div class=download-hero--text>
      <?php echo $hero_text; ?>
    </div>
    <?php } ?>

  </div>
</section>

<?php if($form_fields) { ?>
<section class="download-form shadow-section-bottom">
  <div class="wrapper">
      <div class="download-form--inner flex two-thirds">
        <div class="download-form--form inner-two-thirds">
            <?php echo $form_fields; ?>
        </div>
        
        <?php if( have_rows('hero') ): 
          while( have_rows('hero') ): the_row(); ?>

            <?php if($form_details) { ?>
            <div class="download-form--details background-grey ">
              <?php if( have_rows('form_details') ): 
                while ( have_rows('form_details') ) : the_row(); ?>

                <?php $details_text = get_sub_field('feature_text'); ?>
                <div class="flex nowrap">
                  <div class="download-form--checkbox">
                    <svg fill="<?php the_field('accent_color', 'option'); ?>"height="40.69" viewBox="0 0 59 40.69" width="59" xmlns="http://www.w3.org/2000/svg"><path d="m23.4 40.69-23.4-23.397 4.747-4.747 18.653 18.31 30.853-30.856 4.747 4.747z"/></svg>
                  </div>
                  <p class="uppercase font-primary"><?php echo $details_text; ?></p>
                </div>
                
              
                <?php endwhile; endif; ?>
            </div>
            <?php } ?>

        <?php endwhile; endif; ?>
      </div>
  </div>
</section>
<?php } ?>

<?php if($show_flexible) { ?>
<section class="download-flexible
 <?php if($flexible_grey) { ?>
 background-grey
 <?php } ?>">
  <div class="wrapper wrapper-padding">
    <div class="download-flexible--inner">
      <h2 class="font-primary"><?php echo $flexible_title; ?></h2>
      <div class="download-flexible--features flex">
        
        <?php if( have_rows('whats_inside') ): 
          while( have_rows('whats_inside') ): the_row(); ?>

            <?php if($form_details) { ?>
            <div class="download-form--details flex flex-center">
              <?php if( have_rows('inside_features') ): 
                while ( have_rows('inside_features') ) : the_row(); ?>

                <?php 
                  $features_icon = get_sub_field('icon');
                  $features_title = get_sub_field('title');
                  $features_text = get_sub_field('text'); ?>

                <style>
                .download-form--details-single svg {
                  fill: <?php the_field('accent_color', 'option'); ?>;
                }

                .download-form--details-single svg path {
                  fill: <?php the_field('accent_color', 'option'); ?>;
                }

                .download-form--details-single h3:after {
                  background: <?php the_field('accent_color', 'option'); ?>;
                }
                </style>

                  <div class="download-form--details-single shadow-section-bottom">
                    <?php echo $features_icon; ?>
                    <h3 class="uppercase"><?php echo $features_title; ?></h3>
                    <p><?php echo $features_text; ?></p>
                  </div>
              
                <?php endwhile; endif; ?>
            </div>
            <?php } ?>

        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
</section>
<?php } ?>

<?php get_template_part('partials/newsletter'); ?>

<?php get_footer(); ?>