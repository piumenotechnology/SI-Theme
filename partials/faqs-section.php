<?php 

include_once('tabs_functions.php');
$showFAQ = get_field('show_faq');
$FAQTitle = get_field('faq_title', 'option');
$open_faq = get_field('open_tab');
$grey = get_field( 'faq_background_grey');
?>

<?php if($showFAQ): ?>
<?php if($grey): ?>
<section class="faq background-grey shadow-section-bottom" id="faq" data-open-tab="<?php echo $open_faq; ?>">
<?php else: ?>
<section class="faq shadow-section-bottom" id="faq" data-open-tab="<?php echo $open_faq; ?>">
<?php endif; ?>
<section class="faq shadow-section-bottom" id="faq">
    <div class="wrapper wrapper-padding">
        <div class="faq-title--inner">
            <?php if($FAQTitle): ?>
            <h2><?php echo $FAQTitle ?></h2>
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