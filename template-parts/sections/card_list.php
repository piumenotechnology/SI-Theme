<?php
/**
 * ACF: Flexible Content > Layouts > Card list
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$start_date = get_field('event_starting_date', 'option');
?>

<section class="section text-white mt-4 md:mt-0 relative step" data-animate-enter="main-nav--solid">
  <div class="md:container xl:max-w-screen-xl md:h-screen mx-auto flex justify-center items-center">
    <div class="w-full md:h-2/3 my-auto relative">
      <div class="countdown countdown-absolute md:rounded-md md:px-6">
        <p class="mr-4 text-neutral-500">Starts in:</p>
        <div id="countdown" class="countdown-element space-x-2 transition-all" data-start-date="<?= $start_date; ?>"></div>
      </div>
      <div class="w-full h-full md:grid grid-flow-col auto-cols-fr my-auto">
      <?php if( have_rows('cards') ):
        while( have_rows('cards') ) : the_row();
          $title = get_sub_field('title');
          $subtitle = get_sub_field('subtitle');
          $link = get_sub_field('link');
          $background = get_sub_field('background');
          $overlay = get_sub_field('color_overlay');
        ?>
        <?php if($link): ?>
        <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="group card-img" style="background-color:<?= $overlay; ?>">
          <div class="flex flex-col text-white md:min-h-56 p-5 md:p-10 z-10">
            <h4 class="font-bold uppercase mb-2"><?= $title; ?></h4>
            <p><?= $subtitle; ?></p>
            <p class="ui-link ui-link--light uppercase tracking-wide group-hover:px-5 rounded-xl mt-5 md:mt-auto mr-auto">
              <span class="text-base font-bold"><?= $link['title']; ?></span>
            </p>
          </div>
          <img class="w-full h-full absolute object-cover grayscale brightness-75 mix-blend-multiply group-hover:grayscale-0 group-hover:mix-blend-normal transition-all duration-300"
          src="<?= $background['url']; ?>" alt="<?= $background['alt']; ?>">
        </a>
        <?php endif;
        endwhile; else: ?>
          <p class="text-center font-medium">Sorry there's no detail info yet.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>