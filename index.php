<?php //index.php is the last resort template, if no other templates match ?>
<?php
$page_for_posts = get_option( 'page_for_posts' );

?>

<?php get_header(); ?>

<?php get_template_part( 'partials/hero', 'small' ); ?>

<?php get_template_part( 'partials/links', 'inner-post-page' ); ?>

<section class="section no-space step" data-animate-enter="main-nav--solid">
  <div class="wrapper wrapper-padding">

    <div class="content">
        <?php get_template_part( 'loop', 'index' );	?>
    </div> <!--/.content -->

  </div>
</section>

<?php get_template_part( 'partials/newsletter', 'index' ); ?>

<?php get_footer(); ?>