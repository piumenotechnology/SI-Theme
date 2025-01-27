<?php
/**
 * ACF: Flexible Content > Layouts > Featured speakers
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$link = get_sub_field('link');
$speakers = get_sub_field('speakers');
?>
<section class="section step" data-animate-enter="main-nav--solid">
  <div class="section-header section-header--sticky">
    <div class="md:w-1/2 mb-5 md:mb-0">
      <h2 class="font-extrabold text-4xl md:text-5xl"><?= $title; ?></h2>
    </div>
    <div class="md:w-1/2 flex flex-wrap <?= ($subtitle)?'justify-between':'justify-end';?> items-start text-lg">
      <p class="md:w-2/3"><?= $subtitle; ?></p>
      <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>"
        class="ui-link ui-link--big ui-link--invert group mt-5 xl:mt-0">
        <div class="flex items-center">
          <span><?= $link['title']; ?></span>
          <svg data-v-e1bdab2c="" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
            class="relative ml-1 group-hover:ml-1.5" data-new="" aria-hidden="true" style="width: 1em; height: 1em;">
            <polygon data-v-e1bdab2c="" fill="currentColor"
              points="5 4.31 5 5.69 9.33 5.69 2.51 12.51 3.49 13.49 10.31 6.67 10.31 11 11.69 11 11.69 4.31 5 4.31">
            </polygon>
          </svg>
        </div>
      </a>
    </div>
  </div>
  <?php if( $speakers ): ?>
  <div class="md:container mx-auto mt-4 md:mt-5">
    <div class="w-full speaker-slider overflow-hidden relative">
      <div class="w-full swiper-wrapper scrollable">
      <?php foreach( $speakers as $post):
        setup_postdata($post);
        $job = get_field('job_title');
        $company = get_field('company_name');
      ?>
        <a class="speaker-item swiper-slide" href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
          <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('card', array('class' => 'w-full h-auto aspect-square rounded-lg')); ?>
          <?php else : ?>
            <img class="w-full h-auto aspect-square rounded-lg" src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon.jpg" alt="speakers">
          <?php endif; ?>
          <h3 class="text-xl font-semibold mt-3"><?php the_title(); ?></h3>
          <p><?= $job; ?></p>
          <p class="text-neutral-400"><?= $company; ?></p>
        </a>
      <?php endforeach; wp_reset_postdata(); ?>
      </div>
      <button class="swiper-control--arrow swiper-control-prev hover:text-gray-500">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px" height="50px" viewBox="0 0 16 28" version="1.1"><script xmlns=""/>
          <g id="Unicode" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
            <g id="Unicode-Character-U+0000-Copy" transform="translate(-1401.000000, -644.000000)" stroke="#000000" stroke-width="2">
              <g id="Group-5" transform="translate(1381.000000, 567.000000)">
                <path d="M15.7373919,85.0407004 L28.1933629,97.2607007 L39.9733974,85.0407004" id="Line-Copy-196" transform="translate(27.855395, 91.150701) scale(-1, 1) rotate(-90.000000) translate(-27.855395, -91.150701) "/>
              </g>
            </g>
          </g>
        </svg>
      </button>
      <button class="swiper-control--arrow swiper-control-next hover:text-gray-500">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px" height="50px" viewBox="0 0 16 28" version="1.1">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
            <g transform="translate(-1402.000000, -585.000000)" stroke="#000000" stroke-width="2">
              <g transform="translate(1381.000000, 567.000000)">
                <path d="M16.7373919,26.0407004 L29.1933629,38.2607007 L40.9733974,26.0407004" transform="translate(28.855395, 32.150701) rotate(-90.000000) translate(-28.855395, -32.150701) "/>
              </g>
            </g>
          </g>
        </svg>
      </button>
    </div>
  </div>
  <?php endif; ?>
</section>