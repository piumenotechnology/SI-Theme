<?php
/**
 * ACF: Flexible Content > Layouts > Post grid
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$postType = get_sub_field('post_type');
$postLimit = get_sub_field('post_limit');
$perPage = ($postLimit)? $postLimit : -1;
$loop = new WP_Query( array(
  'post_type' => $postType,
  'posts_per_page' => $perPage,
  'orderby' => 'date',
  'order' => 'ASC',
));
?>

<section class="section step" data-animate-enter="main-nav--solid">
  <div class="md:container mx-auto">
    <?php if($loop->have_posts()): ?>
    <div class="md:grid<?= ($postType == 'agenda')? ' md:grid-cols-2':' :md:grid-cols-3 lg:grid-cols-4'; ?> gap-10 space-y-5 md:space-y-0">
      <?php while($loop->have_posts()): $loop->the_post();
      ?>
        <article>
          <div class="w-full mb-5">
            <a class="group transition-all duration-200" href="<?= the_permalink(); ?>">
              <?php if(has_post_thumbnail()): ?>
                <div class="w-full h-full max-h-[22rem] rounded-lg overflow-hidden">
                <?php the_post_thumbnail('card', array('class' => 'speaker-profile-picture w-full h-full object-cover group-hover:scale-105')); ?>
                </div>
              <?php else : ?>
                <img class="speaker-profile-picture w-full h-full object-cover max-h-[22rem]" src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon.jpg" alt="">
              <?php endif; ?>
            
              <div class="detail-info text-center w-full mt-3 md:mt-5">
                <h3 class="font-bold text-xl mb-2"><?= the_title(); ?></h3>
                <?php if($postType == 'speakers'):
                  $job = get_field('job_title');
                  $company_name = get_field('company_name');
                ?>
                  <p class="text-base"><?= $job; ?></p>
                  <p class="text-base font-bold"><?= ($company_name)? $company_name: 'Company Name'; ?></p>
                <?php endif; ?>
              </div>
            </a>
            <?php if($postType == 'speakers'):
              $company_url = get_field('company_link');
              $company_img = get_field('company');
            ?>
              <a class="block font-bold text-center mt-5" href="<?= ($company_url)? $company_url: '#';?>">
                <img class="self-end max-h-16 object-center-bottom object-contain mt-auto mx-auto" src="<?php echo $company_img['sizes']['medium']; ?>" alt="<?php echo $company_img['alt']; ?>" />
              </a>
            <?php endif; ?>
          </div>
        </article>
      <?php endwhile; wp_reset_query(); ?>
    </div>
    <?php else: echo '<p class="text-lg opacity-70">There is no ' . $postType . ' found..</p>'; endif; ?>
  </div>

  <?php if ( $wp_query->max_num_pages > 1 ) : ?>
  <p class="alignleft"><?php next_posts_link('&laquo; Older Entries'); ?></p>
  <p class="alignright"><?php previous_posts_link('Newer Entries &raquo;'); ?></p>
  <?php endif; ?>
</section>
