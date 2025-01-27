<?php
/**
 * ACF: Flexible Content > Layouts > Text with Image
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$paragraph = get_sub_field('paragraph');
$button = get_sub_field('button');
$media_type = get_sub_field('media_type');
$media_caption = get_sub_field('media_caption');
$image = get_sub_field('image');
$image_size = get_sub_field('image_size');
$video_type = get_sub_field('video_type');
$iframe = get_sub_field('embed_url');
$file_url = get_sub_field('media_file');
$show_content = get_sub_field('show_content');
$inside_text = get_sub_field('inside_text');
$switch_layout = get_sub_field('switch_layout');
$sticky_header = get_sub_field('sticky_header');
$anchor = get_sub_field('custom_anchor');
$id = 'text-image--' . get_row_index();
$anchor_id = 'anchor-' . get_row_index();
if($anchor) {
    $anchor_id = $anchor;
}
?>

<section id="<?= $id; ?>" class="section relative text-with-image mt-0 step" data-animate-enter="main-nav--solid">
  <style>
    #<?= $anchor_id; ?> { top: -120px; }
  </style>
  <div class="custom-anchor" id="<?= $anchor_id; ?>"></div>
<?php if($sticky_header == 1): ?>
  <div class="section-header section-header--sticky">
    <div class="xl:w-1/2 mb-5 md:mb-0">
      <h2 class="font-extrabold text-4xl md:text-5xl"><?= $title; ?></h2>
    </div>
    <div class="xl:w-1/2 flex flex-wrap <?= ($subtitle)?'justify-between':'justify-end'; ?> items-start text-lg">
	  <?php if($subtitle): ?>
      <p class="w-2/3"><?= $subtitle; ?></p>
	  <?php endif; ?>
      <?php if($button): ?>
      <a href="<?php echo $button['url']?>" target="<?php echo $button['target']?>"
        class="ui-link ui-link--big ui-link--invert group mt-5 xl:mt-0">
        <div class="flex items-center">
          <span><?php echo $button['title']?></span>
          <div class="h-5 w-5 ml-1 group-hover:ml-1.5 transition-all duration-200">
            <?php include(get_template_directory() . '/assets/icons/chevron-diagonal.svg'); ?>
          </div>
        </div>
      </a>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>
  <div class="md:container bg-white border-t border-gray-200 grid grid-cols-1 md:grid-cols-2 gap-4 mx-auto pt-5">
  <?php if($switch_layout == 1): ?>
    <div class="w-full">
      <div class="w-full flex flex-col<?= ($media_type == 'image' && $image_size == 'object-cover')?' lg:h-[calc(100vh-11rem)]': ''; ?> sticky lg:top-36 z-10">
        <?php if($show_content == 1): ?>
        <div class="absolute top-0 left-0 w-full md:w-2/3 h-full flex flex-col justify-end items-start p-7 md:p-10 text-white md:text-lg z-10">
          <p class="hidden md:block"><?php echo $inside_text; ?></p>
          <?php if($button): ?>
          <a href="<?php echo $button['url']?>" target="<?php echo $button['target']?>"
          class="ui-link ui-link--big group inline-block bg-white text-black font-medium rounded-md mt-6">
            <div class="flex items-center">
              <span><?php echo $button['title']?></span>
              <div class="h-5 w-5 ml-1 group-hover:ml-1.5 transition-all duration-200">
                <?php include(get_template_directory() . '/assets/icons/chevron-diagonal.svg'); ?>
              </div>
            </div>
          </a>
          <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php if($media_caption): ?>
          <h3 class="font-bold text-2xl md:text-[1.85rem] text-left mb-5 md:mb-7"><?= $media_caption; ?></h3>
        <?php endif; ?>
        <?php if($media_type == "image"): ?>
          <img class="w-full flex-auto rounded-xl <?= ($image_size == 'object-cover')?'h-full md:h-0 ':'h-full '; ?><?php if($show_content == 1): ?>brightness-75 <?php endif;?><?php echo $image_size; ?>" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
        <?php else: ?>
        <?php
            if($video_type == "embed") {
              preg_match('/src="(.+?)"/', $iframe, $matches);
              $src = $matches[1];

              // Add extra parameters to src and replace HTML.
              $params = array(
                  'controls'  => 0,
                  'loop'      => 1,
                  'autoplay'  => 1,
                  'mute'      => 1,
                  'vq'        => 'hd720'
              );
              $new_src = add_query_arg($params, $src);
              $iframe = str_replace($src, $new_src, $iframe);

              // Add extra attributes to iframe HTML.
              $attributes = 'frameborder="0"';
              $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

              echo $iframe;
            } else { ?>
              <video autoplay muted loop playsinline defaultMuted preload="none"
                class="h-full w-full object-contain rounded-xl">
                <source
                  src="<?= $file_url; ?>"
                  type="video/mp4">
              </video>
            <?php }
          ?>
        <?php endif; ?>
      
      </div>
    </div>
    <div class="w-full md:pr-5 xl:pr-28 md:pl-10">
      <?php if($sticky_header != 1): ?>
      <h2 class="w-full font-extrabold text-4xl xl:text-[2.375rem]"><?php echo $title; ?></h2>
      <div class="random-box flex flex-wrap w-36 gap-2 mt-5 md:mt-6">
        <div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div>
      </div>
      <?php endif; ?>
      <?php if($paragraph): ?>
        <article class="longtext">
          <?php echo $paragraph; ?>
        </article>
      <?php endif; ?>
      <?php if($show_content != 1): ?>
        <?php if($button): ?>
        <a href="<?php echo $button['url']?>" target="<?php echo $button['target']?>"
        class="ui-link ui-link--big ui-link--outline group inline-block bg-white text-black font-medium rounded-md">
          <div class="flex items-center">
            <span><?php echo $button['title']?></span>
            <div class="h-5 w-5 ml-1 group-hover:ml-1.5 transition-all duration-200">
              <?php include(get_template_directory() . '/assets/icons/chevron-diagonal.svg'); ?>
            </div>
          </div>
        </a>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  <?php else: ?>
    <div class="w-full md:pr-5 xl:pr-28">
      <?php if($sticky_header != 1): ?>
      <h2 class="w-full font-extrabold text-4xl xl:text-[2.35rem]"><?php echo $title; ?></h2>
      <div class="random-box flex flex-wrap w-36 gap-2 mt-5 md:mt-6">
        <div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div>
      </div>
      <?php endif; ?>
      <?php if($paragraph): ?>
        <article class="longtext">
          <?php echo $paragraph; ?>
        </article>
      <?php endif; ?>
      <?php if($show_content != 1 && $sticky_header != 1): ?>
        <?php if($button): ?>
        <a href="<?php echo $button['url']?>" target="<?php echo $button['target']?>"
        class="ui-link ui-link--big ui-link--outline group inline-block bg-white text-black font-medium rounded-md">
          <div class="flex items-center">
            <span><?php echo $button['title']?></span>
            <div class="h-5 w-5 ml-1 group-hover:ml-1.5 transition-all duration-200">
              <?php include(get_template_directory() . '/assets/icons/chevron-diagonal.svg'); ?>
            </div>
          </div>
        </a>
        <?php endif; ?>
      <?php endif; ?>
    </div>
    <div class="w-full">
      <div class="w-full flex flex-col<?= ($media_type == 'image' && $image_size == 'object-cover')?' lg:h-[calc(100vh-11rem)]': ''; ?> sticky lg:top-36 z-10">
        <?php if($media_caption): ?>
          <h3 class="font-bold text-2xl md:text-[1.85rem] text-left mb-5 md:mb-7"><?= $media_caption; ?></h3>
        <?php endif; ?>
        <?php if($show_content == 1): ?>
        <div class="absolute top-0 left-0 w-full md:w-2/3 h-full flex flex-col justify-end items-start p-7 md:p-10 text-white md:text-lg z-10">
          <p class="hidden md:block"><?php echo $inside_text; ?></p>
          <?php if($button): ?>
          <a href="<?php echo $button['url']?>" target="<?php echo $button['target']?>"
          class="ui-link ui-link--big group inline-block bg-white text-black font-medium rounded-md mt-6">
            <div class="flex items-center">
              <span><?php echo $button['title']?></span>
              <div class="h-5 w-5 ml-1 group-hover:ml-1.5 transition-all duration-200">
                <?php include(get_template_directory() . '/assets/icons/chevron-diagonal.svg'); ?>
              </div>
            </div>
          </a>
          <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <?php if($media_type == "image"): ?>
          <img class="w-full flex-auto rounded-xl <?= ($image_size == 'object-cover')?'h-full md:h-0 ':'h-full '; ?><?php if($show_content == 1): ?>brightness-75 <?php endif;?><?php echo $image_size; ?>" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
        <?php else: ?>
          <?php
            if($video_type == "embed") {
              preg_match('/src="(.+?)"/', $iframe, $matches);
              $src = $matches[1];

              // Add extra parameters to src and replace HTML.
              $params = array(
                  'controls'  => 0,
                  'loop'      => 1,
                  'autoplay'  => 1,
                  'mute'      => 1,
                  'vq'        => 'hd720'
              );
              $new_src = add_query_arg($params, $src);
              $iframe = str_replace($src, $new_src, $iframe);

              // Add extra attributes to iframe HTML.
              $attributes = 'frameborder="0"';
              $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

              echo $iframe;
            } else { ?>
              <video autoplay muted loop playsinline defaultMuted preload="none"
                class="h-full w-full object-contain rounded-xl">
                <source
                  src="<?= $file_url; ?>"
                  type="video/mp4">
              </video>
            <?php }
          ?>
        <?php endif; ?>

      </div>
    </div>
  <?php endif; ?>
  </div>
</section>