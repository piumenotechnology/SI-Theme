<?php
/**
 * ACF: Flexible Content > Layouts > Group cards
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$add_grey_background = get_sub_field('grey_background');
$group_card = get_sub_field('cards');
$group_card_layout = get_sub_field('group_card_layout');
$group_card_title = get_sub_field('group_card_title');
$group_card_text = get_sub_field('group_card_text');
$group_card_type = get_sub_field('group_card_type');
$group_form = get_sub_field('group_card_form');
?>


<section id="group-discount<?= get_row_index(); ?>" class="section group-discount step<?= ($add_grey_background) ? ' background-grey' : ''; ?> <?= ($group_card_layout == 'split')?'no-space':''; ?>" data-animate-enter="main-nav--solid">
  <div id="discount" class="container <?= ($group_card_layout == 'split')?'wrapper-padding lg:flex lg:space-x-10 mx-auto':'wrapper'; ?>">
    <?php if($group_card_layout == 'split'): ?>
      <div class="splited lg:w-1/2 lg:pr-10">
    <?php endif; ?>
      <?php if($group_card_title) { ?>
      <h2 class="w-full font-extrabold text-4xl md:text-5xl md:pr-10"><?php echo $group_card_title; ?></h2>
      <div class="random-box flex flex-wrap w-36 gap-2 mt-5 md:mt-6 mb-5 md:mb-10">
        <div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div>
      </div>
      <?php } ?>

      <?php if($group_card_text) { ?>
      <?php echo $group_card_text; ?>
      <?php } ?>
      
        <?php if( have_rows('group_card_offerings') ): ?>

            <div class="discounts flex flex-wrap <?= ($group_card_type == 'cards')?'type-card':''; ?>">
            <?php while ( have_rows('group_card_offerings') ) : the_row(); ?>
        
                <?php $discount_label = get_sub_field('label');
                $discount_text = get_sub_field('offer_text'); ?>
                <?php if($group_card_type == 'cards'): ?>
                <div class="discounts--single">
                  <p class="discounts--single-label font-primary"><?php echo $discount_label; ?></p>
                  <p class="discounts--single-text font-primary"><?php echo $discount_text; ?></p>
                </div>
                <?php else: ?>
                <div class="discounts--table">
                  <div class="discounts--table-column w-1/3 flex justify-center items-center">
                    <p class="text-center text-sm"><?php echo $discount_label; ?></p>
                  </div>
                  <div class="discounts--table-column w-2/3 flex justify-center items-center">
                    <p class="text-center text-4xl xl:text-5xl font-extrabold">
                      <?php echo $discount_text; ?>
                      <span class="block font-medium text-lg text-neutral-500 xl:ml-1">/ person</span>
                    </p>
                  </div>
                </div>
                <?php endif; ?>
        
            <?php endwhile; ?>
            </div>
        <?php endif; ?>
      <?php if($group_card_layout == 'split'): ?>
        </div>
        <div class="splited lg:w-1/2">
      <?php endif; ?>

      <?php if($group_form) { ?>
      <div class="discounts--form <?= ($group_card_layout == 'full')?'mt-10':''; ?>">
          <?php echo $group_form; ?>
      </div>
      <?php } ?>
      <?php if($group_card_layout == 'split'): ?>
        </div>
      <?php endif; ?>
  </div>
</section>