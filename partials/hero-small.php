<?php
$page_for_posts = get_option( 'page_for_posts' );
$custom_height = get_field('hero_custom_height');
if ( is_front_page() && is_home() ) {
  // Default homepage
  $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
  $smallHero = get_field('small_hero');
} elseif ( is_front_page() ) {
  // static homepage
  $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
  $smallHero = get_field('small_hero');
} elseif ( is_home() ) {
  // blog page
  $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($page_for_posts), 'large' ); 
  $smallHero = get_field('small_hero', $page_for_posts);
} elseif ( is_category() ) {
  // blog cat
  $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($page_for_posts), 'large' ); 
  $smallHero = get_field('small_hero', $page_for_posts);
} else {
  //everything else
  $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
  $smallHero = get_field('small_hero');
}
?>

<?php if($custom_height) : ?>
<style>
  <?php if(get_field('hero_custom_height')): ?>
  @media (min-width: 768px) {
    .hero-small {
      height: <?= get_field('hero_custom_height'); ?>px!important;
    }
  }
  <?php endif; ?>
</style>
<?php endif; ?>

<section class="section no-space hero-small h-svh step" data-animate-enter="main-nav--transparent">
  <?php if($smallHero['add_overlay']): ?>
  <div class="hero-small--overlay flex items-center">
  <?php endif; ?>
    <div class="container mx-auto">
      <div class="hero-small-inner font-secondary">
        <?php if($smallHero['alternative_page_title']): ?>
          <div class="Subheading w-full md:w-2/3">
            <h1 class="font-extrabold text-5xl xl:text-6xl uppercase step" data-animate-enter="main-nav--solid" data-offset="30px"><?php echo $smallHero['alternative_page_title'] ?></h1>
            <div class="random-box hidden md:flex flex-wrap w-36 gap-2 mt-5 md:mt-6 mb-5 md:mb-10">
              <div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div>
            </div>
          </div>
        <?php else: ?>
        <h1 class="font-extrabold text-5xl xl:text-6xl uppercase step" data-animate-enter="main-nav--solid" data-offset="30px"><?php the_title(); ?></h1>
        <div class="random-box hidden md:flex flex-wrap w-36 gap-2 mt-5 md:mt-6">
          <div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div>
        </div>
        <?php endif; ?>
        <?php if($smallHero['subheading_paragraph']): ?>
          <div class="Subheading w-full md:w-2/3 lg:space-y-2.5 mt-5 md:mt-10">
            <?php echo $smallHero['subheading_paragraph'] ?>
          </div>
        <?php endif; ?>
        <?php if(is_page_template('page-templates/thank-you.php')) { ?>
          <?php 
            $download_label = get_field('download_button_label');
            $download_resource = get_field('download_resource'); ?>
            <?php if($download_resource && $download_label) { ?>
              <a class="btn-one mt-5" href="<?php echo $download_resource['url']; ?>" download><?php echo $download_label; ?></a>
            <?php } ?>
        <?php } ?>
      </div>
    </div>
  <?php if($smallHero['add_overlay']): ?>
  </div>
  <?php endif; ?>
  <img src="<?php echo $backgroundImg[0]; ?>" alt="Hero" class="z-10 h-full w-full object-cover brightness-[0.8] rellax"/>
</section>