<?php //index.php is the last resort template, if no other templates match ?>
<?php
$page_for_posts = get_option( 'page_for_posts' );
?>

<?php get_header(); ?>

<div class="mt-24 md:mt-32">

<?php get_template_part( 'partials/links', 'inner-post-page' ); ?>

  <section class="section no-space step" data-animate-enter="main-nav--solid">
    <div class="container max-width-screen-2xl mx-auto">

      <div class="content">
          <?php get_template_part( 'loop', 'index' );	?>
      </div> <!--/.content -->

    </div> 
  </section>

</div>

<?php get_footer(); ?>