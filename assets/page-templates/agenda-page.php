<!-- Template Name: Agenda Page
 -->
<?php get_header(); ?>

<div class="wrapper">
  <div class="content">

    
    <?php
   
    /* Run the loop for the archives page to output the posts.
      * If you want to overload this in a child theme then include a file
      * called loop-archives.php and that will be used instead.
      */
    get_template_part( 'loop', 'agenda' );
    ?>

  </div><!--/content-->

  <?php get_sidebar(); ?>

</div> 

<?php get_footer(); ?>