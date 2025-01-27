<?php 
$website = get_field('sponsors_website');
$next = get_permalink(get_adjacent_post(false, '', false));
$prev= get_permalink(get_adjacent_post(false, '', true));
?>

<?php get_header(); ?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-header background-grey mt-24 lg:mt-28 step" data-animate-enter="main-nav--solid">
      <div class="wrapper">
        <div class="post-header--inner md:justify-between md:items-end">
          <div class="sponsor-title space-y-5 md:w-1/2">
            <div class="hidden md:flex gap-[1px] text-sm mb-10 lg:mb-14">
              <?php if (get_the_permalink()!=$prev): ?>
                <a class="tab tab-grey" href='<?php echo $prev ?>'><i class="fas fa-chevron-left"></i></a>
              <?php else: ?>
                <a class="tab tab-disable" href="<?php echo $prev ?>"><i class="fas fa-chevron-left"></i></a>
              <?php endif; ?>
              <?php if (get_the_permalink()!=$next): ?>
                <a class="tab tab-grey" href="<?php echo $next ?>"><i class="fas fa-chevron-right"></i></a>
              <?php else: ?>
                <a class="tab tab-disable" href="<?php echo $next ?>"><i class="fas fa-chevron-right"></i></a>
              <?php endif; ?>
            </div>

            <h1 class="font-extrabold text-4xl xl:text-5xl"><?php the_title(); ?></h1>
            <div class="random-box hidden md:flex flex-wrap w-36 gap-2 mt-5 md:mt-6 mb-5 md:mb-10">
              <div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div>
            </div>
            <?php $levels = get_the_terms($post, 'sponsor_levels'); ?>
            <?php if($levels) { ?>
              <?php foreach($levels as $level) {
                echo '<h3 class="sponsor-level uppercase">'.$level->name.' Sponsor</h3>';
              } ?>
            <?php } ?>

            <?php if( $website ): ?>
              <a href="<?php echo $website; ?>" target="_blank"
                class="ui-link ui-link--medium ui-link--outline group">
                <div class="flex items-center">
                  <span>Visit Website</span>
                  <div class="h-5 w-5 ml-1 group-hover:ml-1.5 transition-all duration-200">
                    <?php include(get_template_directory() . '/assets/icons/chevron-diagonal.svg'); ?>
                  </div>
                </div>
              </a>
            <?php endif; ?>
          </div>
          <?php the_post_thumbnail('full'); ?>
        </div>
      </div>
    </div>

    <div class="entry-content">
      <div class="wrapper wrapper-padding">
        <a class="inline-block text-sm mb-10 lg:mb-18" href="<?php echo home_url('/sponsors/'); ?>"><i class="fas fa-arrow-left-long mr-2"></i>Back to Sponsors</a>
        <div class="entry-content--inner text-lg">
          <?php the_content(); ?>
        </div>
        <hr>
      </div> <!-- .wrapper-small -->
    </div><!-- .entry-content -->
</div>
<?php endwhile; ?>

  

<?php get_footer(); ?>