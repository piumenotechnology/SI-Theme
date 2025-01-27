<?php
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
<?php get_header(); ?>

<section class="hero-small step" data-animate-enter="main-nav--solid" style="background:url('<?php echo $backgroundImg[0]; ?>'); background-color: #000;background-repeat: no-repeat;background-attachment: scroll;background-size: cover;">
  <div class="wrapper">
    <div class="hero-small-inner">
      <h1>Speakers</h1>
    </div>
  </div>
</section>
<div class="wrapper">
  <div class="content">

    <?php if ( have_posts() ) the_post(); ?>

    <h1>
      <?php if ( is_day() ) : ?>
        Daily Archives: <?php the_date(); ?>
      <?php elseif ( is_month() ) : ?>
        Monthly Archives: <?php the_date('F Y'); ?>
      <?php elseif ( is_year() ) : ?>
        Yearly Archives: <?php the_date('Y'); ?>
      <?php else : ?>
        Blog Archives
      <?php endif; ?>
    </h1>

    <?php
    /* Since we called the_post() above, we need to
      * rewind the loop back to the beginning that way
      * we can run the loop properly, in full.
      */
    rewind_posts();

    /* Run the loop for the archives page to output the posts.
      * If you want to overload this in a child theme then include a file
      * called loop-archives.php and that will be used instead.
      */
    get_template_part( 'loop', 'speaker' );
    ?>

  </div><!--/content-->

  <?php get_sidebar(); ?>

</div> 

<?php get_footer(); ?>