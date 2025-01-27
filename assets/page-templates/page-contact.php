<!-- Template Name: Contact Us
 -->

<?php

$contact_form_area = get_field('contact_form_area');
$contact_form_grey = $contact_form_area['add_grey_background'];
$contact_subtitle = $contact_form_area['contact_subtitle'];
$contact_text = $contact_form_area['contact_text'];
$contact_form = $contact_form_area['contact_form'];
$contact_other_title = $contact_form_area['other_contact_title'];
$general_email_label = $contact_form_area['general_email_label'];
$general_email = $contact_form_area['general_email_address'];
$sponsor_email_label = $contact_form_area['sponsorships_email_label'];
$sponsor_email = $contact_form_area['sponsorships_email_address'];
$phone_number_label = $contact_form_area['phone_number_label'];
$phone_number = $contact_form_area['phone_number'];
$phone_number_extension = $contact_form_area['phone_number_extension'];
$conference_address_label = $contact_form_area['conference_address_label'];
$conference_address = $contact_form_area['conference_address'];
$strategy_address_label = $contact_form_area['strategy_institute_address_label'];
$strategy_address = $contact_form_area['strategy_institute_address'];


?>

<?php get_header(); ?>

<?php get_template_part( 'partials/hero', 'small' ); ?>

<?php if($contact_subtitle) { ?>
<section class="contact--form
  <?php if($contact_form_grey) { ?>
  background-grey
  <?php } ?> shadow-section-bottom">
  <div class="wrapper wrapper-padding">
    <div class="contact--form-inner half">
      <div class="contact--form-fields pr-60">
        <?php if($contact_subtitle) { ?>
        <h3><?php echo $contact_subtitle; ?></h3>
        <?php } ?>

        <?php if($contact_text) { ?>
        <div>
          <?php echo $contact_text; ?>
        </div>
        <?php } ?>

        <?php if($contact_form) { ?>
        <div class="contact--form-fields-container">
          <?php echo $contact_form; ?>
        </div>
        <?php } ?>
      </div>

      <div class="contact--form-text">
        <?php if($contact_other_title) { ?>
          <h3><?php echo $contact_other_title; ?></h3>
        <?php } ?>

        <?php if($general_email_label) { ?>
        <div>
          <p class="bold"><?php echo $general_email_label; ?></p>
          <a href="mailto:<?php echo $general_email; ?>"><?php echo $general_email; ?></a>
        </div>
        <?php } ?>

        <?php if($sponsor_email_label) { ?>
        <div>
          <p class="bold"><?php echo $sponsor_email_label; ?></p>
          <a href="mailto:<?php echo $sponsor_email; ?>"><?php echo $sponsor_email; ?></a>
        </div>
        <?php } ?>

        <?php if($phone_number_label) { ?>
        <div>
          <p class="bold"><?php echo $phone_number_label; ?></p>
          <?php if($phone_number_extension) { ?>
          <a href="tel:<?php echo $phone_number; ?>,<?php echo $phone_number_extension; ?>"><?php echo $phone_number; ?> ext. <?php echo $phone_number_extension; ?></a>
          <?php } else { ?>
          <a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a>
          <?php } ?>
        </div>
        <?php } ?>

        <?php if($conference_address_label) { ?>
        <div>
          <p class="bold"><?php echo $conference_address_label; ?></p>
          <address><?php echo $conference_address; ?></address>
        </div>
        <?php } ?>

        <?php if($strategy_address_label) { ?>
        <div>          
          <p class="bold"><?php echo $strategy_address_label; ?></p>
          <address><?php echo $strategy_address; ?></address>
        </div>
        <?php } ?>

      </div>
    </div>
  </div>
</section>
<?php } ?>

<?php get_template_part( 'partials/flexible', 'content' ); ?>

<?php get_template_part('partials/newsletter'); ?>

<?php get_footer(); ?>