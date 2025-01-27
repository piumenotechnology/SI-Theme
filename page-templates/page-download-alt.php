<!-- Template Name: Download Alt
 -->

 <?php 
$hero = get_field('hero'); 
$hero_image = $hero['hero_image'];
$hero_title = $hero['hero_title'];
$hero_text = $hero['hero_text'];
$hero_subtitle = $hero['hero_subtitle'];

$callout_image = get_field('callout_image');
$callout_link = get_field('callout_link');

$form = get_field('form');
$form_fields = $form['form_fields'];

$show_flexible = get_field('show_whats_inside_section');
$flexible = get_field('whats_inside');
$flexible_title = $flexible['title'];
$flexible_grey = $flexible['add_grey_background?']; 

?>

<?php get_header(); ?>

<section class="section no-space download-hero mt-24 relative bg-neutral-200 step" data-animate-enter="main-nav--solid">
  <div class="container wrapper-padding mx-auto relative z-10">
    <div class="lg:flex lg:space-x-5">
      <div class="lg:pr-10">
        <h1 class="w-full lg:w-2/3 font-bold text-2xl md:text-3xl"><?= ($hero_title)?$hero_title:the_title(); ?></h1>
        <?php if($hero_text) { ?>
        <div class="download-hero--text description lg:w-2/3 mt-5">
          <?php echo $hero_text; ?>
        </div>
        <?php } ?>
        <div class="lg:flex mt-5 lg:mt-7">
          <?php if($hero_image) { ?>
            <div class="lg:w-1/2 xl:w-3/5 flex-shrink-0">
              <?php echo wp_get_attachment_image( $hero_image, 'large', '', ['class' => 'w-full']); ?>
            </div>
          <?php } ?>
          <?php if( have_rows('hero_details') ): ?>
            <div class="flex flex-wrap flex-auto lg:ml-5 mt-5 lg:mt-0">
            <?php if($hero_subtitle): ?>
            <p class="text-xl self-end"><?= $hero_subtitle; ?></p>
            <?php endif; ?>
            <?php while ( have_rows('hero_details') ) : the_row();
              $details_text = get_sub_field('featured_text'); ?>
              <div class="flex nowrap items-center mt-2 first:mt-0">
                <div class="flex items-center w-6 h-6 border-2 border-black rounded-md p-1">
                  <svg fill="#000000" height="40.69" viewBox="0 0 59 40.69" width="59" xmlns="http://www.w3.org/2000/svg"><path d="m23.4 40.69-23.4-23.397 4.747-4.747 18.653 18.31 30.853-30.856 4.747 4.747z"/></svg>
                </div>
                <span class="w-0.5 h-8 bg-black mx-5"></span>
                <p class="font-bold leading-tight"><?php echo $details_text; ?></p>
              </div>
            <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <?php if($form_fields) { ?>
        <div id="gradient-form" class="download-form mt-10 lg:mt-0">
          <div class="bg-gradient-to-br from-[var(--color-accent)] to-[var(--color-accent-darker)] pl-7 pr-7 lg:pr-0 py-8 rounded-lg">
            <?php echo $form_fields; ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <div class="absolute top-0 mb-[100px] ml-[-50%] h-[500px] w-[200%] rounded-b-[100%] bg-white"></div>
</section>

<?php if($callout_image) { ?>
<section class="section no-space lg:h-64 step" data-animate-enter="main-nav--solid">
  <?php if($callout_link): ?><a href="<?= $callout_link['url']; ?>" target="<?= $callout_link['target']; ?>"><?php endif; ?>
    <?php echo wp_get_attachment_image( $callout_image, 'large', '', ['class' => 'w-full h-full object-cover object-center']); ?>
  <?php if($callout_link): ?></a><?php endif; ?>
</section>
<?php } ?>

<?php if($show_flexible) { ?>
<section class="container wrapper wrapper-padding <?= ($flexible_grey)?'background-grey':''; ?>">
  <div class="download-flexible--inner">
    <h2 class="font-extrabold text-4xl md:text-5xl"><?php echo $flexible_title; ?></h2>
    <div class="random-box md:flex flex-wrap w-36 gap-2 mt-5 md:mt-6 mb-5 md:mb-10">
        <div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div>
    </div>
    <div class="download-flexible--features flex">
      
      <?php if( have_rows('whats_inside') ): 
        while( have_rows('whats_inside') ): the_row(); ?>

          <?php if($hero_details) { ?>
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

                <div class="flex flex-wrap justify-center download-form--details-single shadow-section-bottom">
                  <?php echo $features_icon; ?>
                  <h3 class="text-2xl uppercase"><?php echo $features_title; ?></h3>
                  <p class="font-light text-lg"><?php echo $features_text; ?></p>
                </div>
            
              <?php endwhile; endif; ?>
          </div>
          <?php } ?>

      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
<?php } ?>

<?php get_template_part('partials/newsletter'); ?>

<?php get_footer(); ?>