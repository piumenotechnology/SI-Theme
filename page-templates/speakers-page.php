<!-- Template Name: Speakers Page
 -->

<?php
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
?>

<?php get_header(); ?>

<?php get_template_part( 'partials/hero', 'small' ); ?>

<?php get_template_part( 'partials/links', 'inner' ); ?>
<section class="featured-speakers shadow-section-bottom">
  <div class="wrapper wrapper-padding pt-20">
    <div class="featured-speakers--inner">
      <?php get_template_part( 'loop', 'speaker' ); ?>
    </div>
  </div>
</section>
<!-- add if statement -->
<?php get_template_part( 'partials/flexible', 'content' ); ?>

<?php get_template_part('partials/newsletter'); ?>

<?php get_footer(); ?>