<!-- Template Name: Become Speaker Page
 -->
<?php
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
?>

<?php get_header(); ?>

<?php get_template_part( 'partials/hero', 'small' ); ?>

<?php get_template_part( 'partials/links', 'inner' ); ?>

<?php get_template_part( 'partials/flexible', 'content-img-left' ); ?>

<?php get_template_part( 'partials/top', 'five' ); ?>

<?php get_template_part( 'partials/inquiry', 'form' ); ?>

<?php get_footer(); ?>