<?php
/**
 * ACF: Flexible Content > Layouts > FAQ
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
include_once('tabs_functions.php');
$showFAQ = get_sub_field('show_faq');
$FAQTitle = get_field('faq_title', 'option');
$open_faq = get_sub_field('open_tab');
$grey = get_sub_field( 'faq_background_grey');
?>
<?php if($showFAQ): ?>
<?php if($grey): ?>
<section class="section faq background-grey step" data-animate-enter="main-nav--solid" id="faq" data-open-tab="<?php echo $open_faq; ?>">
<?php else: ?>
<section class="section faq step" data-animate-enter="main-nav--solid" id="faq" data-open-tab="<?php echo $open_faq; ?>">
<?php endif; ?>
    <div class="md:container mx-auto<?= ($grey)? ' py-8 md:py-16 px-5 md:px-0': ''; ?>">
        <div class="faq-title--inner">
            <?php if($FAQTitle): ?>
            <h2 class="w-full font-extrabold text-4xl md:text-5xl md:pr-10"><?php echo $FAQTitle ?></h2>
            <div class="random-box flex flex-wrap w-36 gap-2 mt-5 md:mt-6 mb-5 md:mb-10">
                <div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div>
            </div>
            <?php endif; ?>
        </div>
    
        <div class="tabsSection aligncenter desktop">
            <div class="md:container tabsSectionInterior wrapper">
            <?php renderTabsNavArea() ?>
            <?php renderTabsSection() ?>
            </div>
        </div>

        <div class="tabsSection alignfull mobile-only">
            <div class="tabsSectionInterior wrapper">
            <?php renderMobileTabsSection() ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?> <!-- end of show if -->