
<?php
$show_group = get_field('show_group_discount_area'); 
$add_grey_background = get_field('add_grey_background_to_group_discounts');
$group_discount = get_field('group_discounts');
$group_discount_title = $group_discount['group_discount_title']; 
$group_discount_text = $group_discount['group_discount_text'];
$group_form = $group_discount['group_discount_form'];

?>

<?php if($show_group) { ?>
<section id="group-discount" class="group-discount shadow-section-bottom
    <?php if($add_grey_background) { ?>
        background-grey
    <?php } ?>
    ">
    <div class="wrapper wrapper-padding ">
        <?php if($group_discount_title) { ?>
        <h2 class="font-primary"><?php echo $group_discount_title; ?></h2>
        <?php } ?>

        <?php if($group_discount_text) { ?>
        <?php echo $group_discount_text; ?>
        <?php } ?>
        
        <?php if( have_rows('group_discounts') ): 
            while ( have_rows('group_discounts') ) : the_row(); ?>
                <?php if( have_rows('group_discount_offerings') ): ?>

                    <div class="discounts flex flex-wrap">
                    <?php while ( have_rows('group_discount_offerings') ) : the_row(); ?>
                
                        <?php $discount_label = get_sub_field('label');
                        $discount_text = get_sub_field('offer_text'); ?>

                        <div class="discounts--single ">
                            <p class="discounts--single-label font-primary"><?php echo $discount_label; ?></p>
                            <p class="discounts--single-text font-primary"><?php echo $discount_text; ?></p>
                        </div>
                
                    <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php if($group_form) { ?>
        <div class="discounts--form">
            <?php echo $group_form; ?>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?>