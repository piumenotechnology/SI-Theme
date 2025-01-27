
<?php 

$show_pricing = get_field('show_pricing');
$add_grey_background = get_field('add_grey_background');
$pricing_group = get_field('pricing_table'); ?>

<?php if($show_pricing) { ?>
<section id="pricing" class="pricing shadow-section-bottom
    <?php if($add_grey_background) { ?>
    background-grey
    <?php } ?>">
    <div class="wrapper wrapper-padding">
        <div class="pricing--inner flex">
            <?php if( have_rows('pricing_table') ): 
                while ( have_rows('pricing_table') ) : the_row(); ?>    
                    
                    <div class="pricing--single flex background-grey shadow-section-bottom" 
                    <?php if($add_grey_background) { ?>
                    style="background-color: white;"
                    <?php } ?>>
                        <?php 
                        $pricing_title = get_sub_field('pricing_title');
                        $pricing_subtitle = get_sub_field('pricing_subtitle');
                        $incentive_text = get_sub_field('incentive_text');
                        $price = get_sub_field('price');
                        $register_link = get_sub_field('register_link'); ?>

                        <a class="pricing--main-link" href="<?php echo $register_link["url"]; ?>" target="<?php echo $register_link['target']; ?>"></a>
                        
                        <div class="pricing--top">
                        <?php if($pricing_title) { ?>
                        <p class="pricing--title bold uppercase font-primary"><?php echo $pricing_title; ?></p>
                        <?php } ?>

                        <?php if($pricing_subtitle) { ?>
                        <p class="pricing--subtitle uppercase font-primary"><?php echo $pricing_subtitle; ?></p>
                        <?php } ?>

                        <?php if($incentive_text) { ?>
                        <p class="pricing--incentive-text uppercase font-primary"><?php echo $incentive_text; ?></p>
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
                                    <p class="pricing--perk font-primary"><span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.124" height="16.082" viewBox="0 0 20.124 16.082"><g id="noun_Check_Mark_1320510" data-name="noun_Check Mark_1320510" transform="translate(0.209 -25.367)"><g id="Group_278" data-name="Group 278" transform="translate(-0.209 25.367)"><path id="Path_372" data-name="Path 372" d="M19.169,2c-4.37,3.358-7.834,8.181-11.4,13.7-.64.986-2,.586-2.665-.266A25.4,25.4,0,0,0-.15,10.717c-.32-1.732.693-2.372,2.318-2.5A27.18,27.18,0,0,1,6.4,12.022C16.717-3.246,21.967-.155,19.169,2Z" transform="translate(0.209 -0.196)" fill-rule="evenodd"/></g></g></svg>
                                    </span><span class="font-primary">
                                    <?php echo $perk_text; ?></span></p>
                                <?php } ?>
                        
                            <?php endwhile; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        </div>

                        <div class="pricing--bottom">

                            <?php if($register_link) { ?>
                            <a class="btn-one pricing--register" href="<?php echo $register_link['url']; ?>" target="<?php echo $register_link['target']; ?>"><?php echo $register_link['title']; ?></a>
                            <?php } ?>

                        </div>
                    </div>
            
                <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>
<?php } ?>