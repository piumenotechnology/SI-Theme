<?php
/**
 * ACF: Flexible Content > Layouts > Pricing Lists
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$add_grey_background = get_sub_field('grey_background');
$pricing_group = get_sub_field('pricing_table'); ?>

<section id="pricing" class="pricing step<?php if($add_grey_background) { ?> background-grey<?php } ?>" data-animate-enter="main-nav--solid">
    <div class="container wrapper wrapper-padding<?php if(!$add_grey_background) { ?> border-b<?php } ?>">
        <div class="pricing--inner flex">
            <?php if( have_rows('pricing_table') ): 
                while ( have_rows('pricing_table') ) : the_row();
                    $pricing_title = get_sub_field('pricing_title');
                    $pricing_subtitle = get_sub_field('pricing_subtitle');
                    $incentive_text = get_sub_field('incentive_text');
                    $pricing_reguler = get_sub_field('pricing_reguler');
                    $price = get_sub_field('price');
                    $register_link = get_sub_field('register_link');
                    $card_color = get_sub_field('card_color'); ?>
                    
                    <div class="pricing--single flex rounded-xl background-grey shadow-section-bottom group" 
                    <?php if($add_grey_background && empty($card_color)) { ?>
                    style="background-color: white;"
                    <?php } else { ?>
                    style="background-color: <?= $card_color; ?>;"
                    <?php } ?>>

                        <a class="pricing--main-link" href="<?php echo $register_link["url"]; ?>" target="<?php echo $register_link['target']; ?>"></a>
                        
                        <div class="pricing--top">
                        <?php if($pricing_title) { ?>
                        <p class="pricing--title bold uppercase font-primary"><?php echo $pricing_title; ?></p>
                        <?php } ?>

                        <?php if($pricing_subtitle) { ?>
                        <p class="pricing--subtitle uppercase font-primary"><?php echo $pricing_subtitle; ?></p>
                        <?php } ?>

                        <?php if($incentive_text) { ?>
                        <hr class="divider">
                        <?php if($pricing_reguler):?><span class="line-through text-lg font-bold"><?= $pricing_reguler; ?></span><?php endif;?>
                        <p class="pricing--incentive-text uppercase font-primary"><?php echo $incentive_text; ?></p>
                        <hr class="divider">
                        <?php } ?>
                        
                        <?php if($price) { ?>
                        <span class="pricing--price font-primary"><?php echo $price; ?></span>
                        <?php } ?>
                        
                        <?php if( have_rows('perks') ): ?>
                            <div class="pricing--perks">
                                <div class="pricing--perks-inner">
                            <?php while ( have_rows('perks') ) : the_row(); ?>
                        
                                <?php $perk_text = get_sub_field('perk'); ?>

                                <?php if($perk_text) { ?>
                                    <p class="pricing--perk flex font-primary">
                                        <span class="pricing-checklist">
                                            <svg height="40.69" viewBox="0 0 59 40.69" width="59" xmlns="http://www.w3.org/2000/svg"><path d="m23.4 40.69-23.4-23.397 4.747-4.747 18.653 18.31 30.853-30.856 4.747 4.747z"></path></svg>
                                        </span>
                                        <span class="font-primary"><?php echo $perk_text; ?></span>
                                    </p>
                                <?php } ?>
                        
                            <?php endwhile; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        </div>

                        <div class="pricing--bottom">

                            <?php if($register_link) { ?>
                            <a class="ui-link ui-link--big flex justify-center items-center rounded-full pricing--register" href="<?php echo $register_link['url']; ?>" target="<?php echo $register_link['target']; ?>">
                                <?php echo $register_link['title']; ?>
                                <svg data-v-e1bdab2c="" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                    class="relative ml-1 group-hover:ml-1.5 transition-color duration-200" data-new="" aria-hidden="true" style="width: 1em; height: 1em;">
                                    <polygon data-v-e1bdab2c="" fill="currentColor"
                                    points="5 4.31 5 5.69 9.33 5.69 2.51 12.51 3.49 13.49 10.31 6.67 10.31 11 11.69 11 11.69 4.31 5 4.31">
                                    </polygon>
                                </svg>
                            </a>
                            <?php } ?>

                        </div>
                    </div>
            
                <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>