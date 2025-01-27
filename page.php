<?php get_header();  ?>
<section class="mt-24 step" data-animate-enter="main-nav--solid">
  <div class="wrapper wrapper-padding">
    <div class="default-content">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <h1 class="w-full font-extrabold text-4xl md:text-5xl md:pr-10"><?php the_title(); ?></h1>
        <div class="random-box flex flex-wrap w-36 gap-2 mt-5 md:mt-6 mb-8 md:mb-16">
            <div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div>
        </div>
        <div class="description">
          <?php the_content(); ?>
        </div>
      <?php endwhile; ?>
    </div> 
  </div>
</section>
<?php get_footer(); ?>