<?php
/**
 * ACF: Flexible Content > Layouts > Hero
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$type = get_sub_field('type');
$image = get_sub_field('image');
$video = get_sub_field('video');
$buttons = get_sub_field('links');
$height = get_sub_field('height');
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$overlay_color = get_sub_field('overlay_color');
$show_event = get_sub_field('show_event');
$location = get_field('event_location', 'option');
$dates = get_field('event_dates', 'option');
$start_date = get_field('event_starting_date', 'option');
$date_now = date('F j, Y');
$instagram = get_field('instagram', 'options');
$linkedin = get_field('linkedin', 'options');
$twitter = get_field('twitter', 'options');
$youtube = get_field('youtube', 'options');
?>

<section class="flex hero hero-<?php echo get_row_index(); ?> section no-space relative overflow-hidden step"
data-animate-enter="main-nav--transparent" data-offset="0.8">
  <style>
    .hero-<?php echo get_row_index(); ?> {
      min-height: 100lvh;
    }
    @media screen and (min-width: 768px) {
      .hero-<?php echo get_row_index(); ?> {
        height: 100vh;
        min-height: unset;
      }
    }
    @media screen and (min-width: 1440px) {
      .hero-<?php echo get_row_index(); ?> {
        height: <?php echo $height; ?>vh;
        min-height: unset;
      }
    }
    .hero-<?php echo get_row_index(); ?> .hero-wrapper {
      background-image: linear-gradient(to top, <?php echo $overlay_color; ?> 60%, transparent);
    }
    .hero-<?php echo get_row_index(); ?> h2 span {
      font-weight: 100;
      font-style: italic;
    }
  </style>
  <div class="w-full h-full bg-gradient-to-t from-gray-950 via-60% to-transparent z-20 mt-auto md:mt-44 lg:mt-40">
    <div class="container flex relative mb-8 mx-auto">
      <?php if(strtotime($start_date) > strtotime($date_now)): ?>
      <div class="countdown w-full lg:w-auto rounded-md px-4 md:px-6 lg:ml-auto">
        <p class="mr-4 text-neutral-500">Starts in:</p>
        <div id="countdown" class="countdown-element space-x-2 transition-all" data-start-date="<?= $start_date; ?>"></div>
      </div>
      <?php else: ?>
      <p class="font-normal text-base md:text-xl text-white text-center md:text-left mx-auto md:mx-0">The event has ended! Stay tune for the Next Event!</p>
      <?php endif; ?>
    </div>
    <div class="container md:flex flex-wrap justify-between items-start mx-auto pb-14 md:pb-20">
      <div class="md:h-2/3 w-full xl:w-2/3 2xl:w-3/5 text-white text-center md:text-left">
        <h2 class="font-extrabold text-4xl xl:text-5xl 2xl:text-[3.4rem] step" data-animate-enter="main-nav--solid" data-offset="150px"><?php echo $title; ?></h2>
        <p class="text-lg md:text-xl leading-snug mt-4 px-10 md:px-0"><?php echo $subtitle; ?></p>
        <!-- <div class="separator w-40 h-1.5 bg-cyan-500 mt-4 mx-auto md:mx-0"></div> -->
        <?php if($show_event === true): ?>
        <div class="event-info-container">
          <div class="event-info">
            <?php include(get_template_directory() . '/assets/icons/location_icon.svg'); ?>
            <div class="h-full border-l border-white min-h-10"></div>
            <p class="text-left font-light"><?php echo $location; ?></p>
          </div>
          <div class="event-info">
            <?php include(get_template_directory() . '/assets/icons/calendar_icon.svg'); ?>
            <div class="h-full border-l border-white min-h-10"></div>
            <p class="text-left font-light"><?php echo $dates; ?></p>
          </div>
        </div>
        <div class="event-info-container--mobile">
          <div class="flex items-center first:border-b py-2.5">
            <div class="event-info--icon">
              <?php include(get_template_directory() . '/assets/icons/location_icon.svg'); ?>
            </div>
            <div class="w-4/5">
              <p class="text-center font-light"><?php echo $location; ?></p>
            </div>
          </div>
          <div class="flex items-center first:border-b py-2.5">
            <div class="event-info--icon">
              <?php include(get_template_directory() . '/assets/icons/calendar_icon.svg'); ?>
            </div>
            <div class="w-4/5">
              <p class="text-center font-light"><?php echo $dates; ?></p>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php if($buttons): ?>
        <div class="flex flex-wrap justify-center md:justify-start items-center gap-3 mt-16 md:mt-12">
          <?php 
          $i = 0;
          $len = count($buttons);
          foreach($buttons as $button):
            if ($i == 0): ?>
              <a href="<?php echo $button['link']['url']?>" target="<?php echo $button['link']['target']?>"
              class="ui-link ui-link--medium group bg-white text-[color:var(--color-accent)] hover:bg-transparent hover:text-white border border-white px-5 py-4">
                <div class="w-4 h-4 mr-1.5 fill-current inline-block">
                  <?php include(get_template_directory() . '/assets/icons/download-arrow.svg'); ?>
                </div>
                <span class="font-bold"><?php echo $button['link']['title'] ?></span>
              </a>
            <?php else: ?>
              <a href="<?php echo $button['link']['url']?>" target="<?php echo $button['link']['target']?>"
              class="ui-link ui-link--medium group bg-[color:var(--color-accent)] text-white hover:bg-transparent hover:text-[color:var(--color-accent)] border border-[color:var(--color-accent)] px-5 py-4">
                <span class="font-bold"><?php echo $button['link']['title'] ?></span>
                <div class="w-4 h-4 ml-1.5 fill-current inline-block">
                  <?php include(get_template_directory() . '/assets/icons/chevron-diagonal.svg'); ?>
                </div>
              </a>
            <?php endif;
              $i++;
              endforeach; ?>
        </div>
        <?php endif; ?>

      </div>
      
      <div class="flex-0 relative px-5 md:px-0 mt-7 xl:mt-0">
        
        <div class="flex justify-center lg:justify-start xl:justify-end space-x-7 mt-7 lg:mt-5 xl:mt-0">
          <?php if($twitter): ?>
            <a class="text-3xl text-white social--icons" href="<?= $twitter; ?>" target="_blank"><i class="fab fa-x-twitter" data-fa-transform="shrink-10 down-1.6 right-2" data-fa-mask="fas fa-circle"></i></a>
          <?php endif; ?>
          <?php if($linkedin): ?>
            <a class="text-3xl text-white social--icons" href="<?= $linkedin; ?>" target="_blank"><i class="fab fa-linkedin" data-fa-transform="shrink-10 down-1.6 right-2" data-fa-mask="fas fa-circle"></i></a>
          <?php endif; ?>
          <?php if($instagram): ?>
            <a class="text-3xl text-white social--icons" href="<?= $instagram; ?>" target="_blank"><i class="fab fa-instagram" data-fa-transform="shrink-10 down-1.6 right-2" data-fa-mask="fas fa-circle"></i></a>
          <?php endif; ?>
          <?php if($youtube): ?>
            <a class="text-3xl text-white social--icons" href="<?= $youtube; ?>" target="_blank"><i class="fab fa-youtube-play" data-fa-transform="shrink-10 down-1.6 right-2" data-fa-mask="fas fa-circle"></i></a>
          <?php endif; ?>
        </div>
        
      </div>
    </div>
  </div>
  <?php if($type === 'image'): ?>
    <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="z-10 h-full w-full object-cover brightness-[0.8] rellax"/>
  <?php else: ?>
    <video autoplay muted loop playsinline defaultMuted preload="none"
      class="background-video absolute top-0 -z-10 h-full w-full object-cover brightness-[0.8] rellax">
      <source
        src="<?= $video['url']; ?>"
        type="video/mp4">
    </video>
  <?php endif; ?>
</section>