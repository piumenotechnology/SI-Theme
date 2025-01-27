

<?php 
$show = get_field('show_newsletter');
$grey_background = get_field('newsletter_background_grey');

$newsletter_title = get_field('newsletter_title', 'option');
$newsletter_form = get_field('newsletter_form', 'option');
$privacy_link = get_field('privacy_policy_link', 'option');
$additional_info = get_field('additional_info_title', 'option');
$general_email_label = get_field('general_email_label', 'option');
$general_email = get_field('general_email_address', 'option');
$sponsorships_label = get_field('sponsorships_label', 'option');
$sponsorship_email = get_field('sponsorships_email_address', 'option');
$phone_label = get_field('phone_label', 'option');
$phone_number = get_field('phone_number', 'option');
$phone_number_extension = get_field('phone_number_extension', 'option');

?>

<?php if($show) { ?>

<section class="newsletter step
<?php if($grey_background) { ?> background-grey <?php } ?>" data-animate-enter="main-nav--solid">
    <div class="wrapper-large wrapper-padding half">
        <div>
            <?php if($newsletter_title) { ?>
                <h2 class="font-extrabold text-4xl md:text-5xl"><?= $newsletter_title; ?></h2>
                <div class="random-box flex flex-wrap w-36 gap-2 mt-5 md:mt-6">
                    <div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div>
                </div>
            <?php } ?>
            <?php echo $newsletter_form; ?>
            <?php if($privacy_link) { ?>
            <a class="privacy-link font-primary" href="<?php echo $privacy_link['url']; ?>" target="<?php echo $privacy_link['target']; ?>"><?php echo $privacy_link['title']; ?></a>
            <?php } ?>
        </div>
        <div class="newsletter--info">
            <div class="newsletter--info-inner">
                <?php if($additional_info) { ?>
                <h3 class="font-extrabold text-2xl md:text-3xl"><?php echo $additional_info; ?></h3>
                <?php } ?>
                
                <?php if($general_email_label) { ?>
                <div>
                    <p class="bold"><?php echo $general_email_label; ?></p>
                    <a href="mailto:<?php echo $general_email; ?>"><?php echo $general_email; ?></a>
                </div>
                <?php } ?>

                <?php if($sponsorships_label) { ?>
                <div>
                    <p class="bold"><?php echo $sponsorships_label; ?></p>
                    <a href="mailto:<?php echo $sponsorship_email; ?>"><?php echo $sponsorship_email; ?></a>
                </div>
                <?php } ?>

                <?php if($phone_label) { ?>
                <div>
                    <p class="bold"><?php echo $phone_label; ?></p>
                    <?php if($phone_number_extension) { ?>
                    <a href="tel:<?php echo $phone_number; ?>,<?php echo $phone_number_extension; ?>"><?php echo $phone_number; ?> ext. <?php echo $phone_number_extension; ?></a>
                    <?php } else { ?>
                    <a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php } ?>

