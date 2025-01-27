<?php
/**
 * ACF: Flexible Content > Layouts > Link Tab
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$grey_background = get_sub_field('grey_background');
?>

<section class="section no-space<?= ($grey_background)? ' background-grey': ''; ?>">
  <div class="md:container mx-auto py-7 md:py-8 px-5 md:px-0">
    <?php if( have_rows('links') ): ?>
      <ul class="flex justify-start items-center gap-5">
      <?php while( have_rows('links') ): the_row();
        $link = get_sub_field('page_link'); ?>

        <li class="border-r border-black last-of-type:border-r-0 uppercase leading-none pr-5">

        <?php if( $link ): ?>
          <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" ><?php echo $link['title']; ?></a>
        <?php endif; ?>

        </li>

      <?php endwhile; ?>
      </ul>
    <?php endif; ?>

  </div>
</section>