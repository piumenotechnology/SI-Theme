<?php
//get value from page
$openTab = get_field('open_tab');

function assignCurrentStateToFirstItem($index) {

    if($index === 0) {
        echo ' tabsSectionNavItemCurrent';
    }
}

function renderTabsNavArea() {

    if( have_rows('faq_repeater', 'option') ):

        ?> 
        
        
        <div class="tabsSectionNavArea wrapper">

        <?php

        // initiate our index so we can make dynamic classnames, and reference them with our flickity jquery
        $index = 0;

        // loop through the rows of data
        while ( have_rows('faq_repeater', 'option') ) : the_row();
        ?>  

            <?php $button_id = strtolower(get_sub_field('tab_title', 'option')); ?>

            <button class="tabsSectionNavItem tabsSectionNavItem-<?php echo $index; ?> bold uppercase" id="<?php echo $button_id; ?>" data-index="<?php echo $index; ?>">
                <?php the_sub_field('tab_title', 'option') ?>
            </button>


    <?php
        // boost our index after the loop rolls through 
        $index++;

     endwhile; ?>
       
    </div>
   
    <!-- end heroHeader-cta-wrapper -->
    <?php endif; }?>

<?php function renderTabsSection() {
    //check for rows (parent repeater)
    if( have_rows('faq_repeater', 'option') ): ?> 
        <div class="tabsSectionTabs wrapper">
            <?php while ( have_rows('faq_repeater', 'option') ) : the_row(); ?>
        <!-- check for rows (sub repeater) -->
            <?php if( have_rows('tab_content', 'option') ): ?> 
            <div class="tabsSectionTabIndividual ">
                <hr>
            <?php while ( have_rows('tab_content', 'option') ) : the_row(); ?>
                
                <div class="question-container">
                    <p class="bold"><?php the_sub_field('question', 'option') ?></p>
                    <?php the_sub_field('answer', 'option') ?>
                </div>
                <hr>
            
            <?php endwhile;?>
             </div>
            <?php endif; ?>  <!-- end (sub repeater) if -->
    <?php endwhile;?>
   </div>
    <!-- end heroHeader-cta-wrapper -->
<?php endif; } ?>

<?php function renderMobileTabsSection() {
    //check for rows (parent repeater)
    if( have_rows('faq_repeater', 'option') ): ?> 
        <div class="tabsSectionNoTabs wrapper">
            <?php while ( have_rows('faq_repeater', 'option') ) : the_row(); ?>
            <p class="bold uppercase mt-50"><?php the_sub_field('tab_title', 'option') ?></p>
            <!-- check for rows (sub repeater) -->
            <?php if( have_rows('tab_content', 'option') ): ?> 
            <div class="tabsSectionTabIndividual ">
                <hr>
            <?php while ( have_rows('tab_content', 'option') ) : the_row(); ?>
                
                <div class="question-container">
                    <p class="bold"><?php the_sub_field('question', 'option') ?></p>
                    <?php the_sub_field('answer', 'option') ?>
                </div>
                <hr>
            
            <?php endwhile;?>
             </div>
            <?php endif; ?>  <!-- end (sub repeater) if -->
    <?php endwhile;?>
   </div>
    <!-- end heroHeader-cta-wrapper -->
<?php endif; } ?>
