<?php 
$inquiry = get_field('inquiry_form');
$greyInquiry =  get_field('add_grey_background_form');
$showInquiry = get_field('show_inquiry_form');
?>

<?php if($showInquiry): ?>
<?php if($greyInquiry): ?>
<section class="inquiry-form background-grey" id="inquiry-form">
<?php else: ?>
<section class="inquiry-form" id="inquiry-form">
<?php endif; ?>

    <div class="wrapper wrapper-padding">
        <div class="inquiry-form--inner">
            <?php if($inquiry['inquiry_form_title']): ?>
            <h2> <?php echo $inquiry['inquiry_form_title']; ?></h2>
            <?php endif; ?>
            <div class="two-thirds">
                <div class="inner-two-thirds">
                    <?php if($inquiry['intro_paragraph']): ?>
                    <p class="large-font mb-50"> <?php echo $inquiry['intro_paragraph']; ?></p>
                    <?php endif; ?>
                    <?php if($inquiry['inquiry_form']): ?>
                    <?php echo $inquiry['inquiry_form']; ?>
                    <?php endif; ?>
                </div>
                <div class="mt-50">
                    <?php if($inquiry['contact_image']): ?>
                    <div class="inquiry-form--image obj-fit">
                        <img src="<?php echo $inquiry['contact_image']['sizes']['large']; ?>" alt="<?php echo  $inquiry['contact_image']['alt']; ?>" class="" />
                    </div>
                    
                    <?php endif; ?>
                    <?php if($inquiry['contact_name']): ?>
                    <p class="contact-name uppercase bold"> <?php echo $inquiry['contact_name']; ?></p>
                    <?php endif; ?>
                    <?php if($inquiry['contact_title']): ?>
                    <p class="uppercase contact-title mb-50"> <?php echo $inquiry['contact_title']; ?></p>
                    <?php endif; ?>
                    <?php if($inquiry['contact_paragraph']): ?>
                    <p class="large-font mb-50"> <?php echo $inquiry['contact_paragraph']; ?></p>
                    <?php endif; ?>
                    <?php if($inquiry['contact_phone_number_extension']) : ?>
                    <div class="contact-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50.292" height="51"><g data-name="Group 70"><g data-name="Group 68"><g data-name="Ellipse 233" fill="none" stroke="<?php the_field('accent_color', 'option'); ?>" stroke-width="4"><ellipse cx="25.146" cy="25.5" rx="25.146" ry="25.5" stroke="none"/><ellipse cx="25.146" cy="25.5" rx="23.146" ry="23.5"/></g></g><g data-name="Group 69"><path data-name="Path 219" d="M29.396 41.228a9.635 9.635 0 0 1-4.317-1.167 14.634 14.634 0 0 1-3.311-2.522 71.092 71.092 0 0 1-5.315-5.9 29.746 29.746 0 0 1-4.244-6.783 16.926 16.926 0 0 1-1.42-5.259l-.091-.968v-1.008c.01-.047.021-.094.028-.141.072-.437.113-.882.222-1.31a12.2 12.2 0 0 1 2.923-5.265 8.216 8.216 0 0 1 2.034-1.65 4.494 4.494 0 0 1 1.492-.512h.39a3.232 3.232 0 0 1 2.087 1.508 43.013 43.013 0 0 1 3.333 4.921 1.678 1.678 0 0 1 .166.669 2.788 2.788 0 0 1-.876 2.288 21.5 21.5 0 0 1-2.624 2.228c-.506.371-1 .767-1.479 1.168a1.321 1.321 0 0 0-.358 1.8 6.143 6.143 0 0 0 .775 1.215c.9 1.083 1.826 2.146 2.76 3.2q2.07 2.336 4.171 4.646c.448.49.952.931 1.447 1.377a2.929 2.929 0 0 0 .6.387 1.338 1.338 0 0 0 1.491-.067 15.372 15.372 0 0 0 1.261-1.052c.833-.751 1.64-1.53 2.481-2.271a3.232 3.232 0 0 1 1.8-.8 2.4 2.4 0 0 1 1.5.331 5.694 5.694 0 0 1 .987.681 74.44 74.44 0 0 1 2.391 2.272 4.406 4.406 0 0 1 1.057 1.585 7.077 7.077 0 0 1 .192.768v.13a.391.391 0 0 0-.022.077 2.657 2.657 0 0 1-.5 1.288 6.072 6.072 0 0 1-1.46 1.468 14.157 14.157 0 0 1-5.805 2.431s-2.198.253-3.766.237z" fill="<?php the_field('accent_color', 'option'); ?>"/></g></g></svg>
                    <a href="tel:<?php echo $inquiry['contact_phone_number']; ?>,<?php echo $inquiry['contact_phone_number_extension']; ?>"><?php echo $inquiry['contact_phone_number']; ?> ext. <?php echo $inquiry['contact_phone_number_extension']; ?></a>
                    </div>
                    <?php elseif ($inquiry['contact_phone_number']): ?>
                    <div class="contact-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50.292" height="51"><g data-name="Group 70"><g data-name="Group 68"><g data-name="Ellipse 233" fill="none" stroke="<?php echo the_field('accent_color', 'option'); ?>" stroke-width="4"><ellipse cx="25.146" cy="25.5" rx="25.146" ry="25.5" stroke="none"/><ellipse cx="25.146" cy="25.5" rx="23.146" ry="23.5"/></g></g><g data-name="Group 69"><path data-name="Path 219" d="M29.396 41.228a9.635 9.635 0 0 1-4.317-1.167 14.634 14.634 0 0 1-3.311-2.522 71.092 71.092 0 0 1-5.315-5.9 29.746 29.746 0 0 1-4.244-6.783 16.926 16.926 0 0 1-1.42-5.259l-.091-.968v-1.008c.01-.047.021-.094.028-.141.072-.437.113-.882.222-1.31a12.2 12.2 0 0 1 2.923-5.265 8.216 8.216 0 0 1 2.034-1.65 4.494 4.494 0 0 1 1.492-.512h.39a3.232 3.232 0 0 1 2.087 1.508 43.013 43.013 0 0 1 3.333 4.921 1.678 1.678 0 0 1 .166.669 2.788 2.788 0 0 1-.876 2.288 21.5 21.5 0 0 1-2.624 2.228c-.506.371-1 .767-1.479 1.168a1.321 1.321 0 0 0-.358 1.8 6.143 6.143 0 0 0 .775 1.215c.9 1.083 1.826 2.146 2.76 3.2q2.07 2.336 4.171 4.646c.448.49.952.931 1.447 1.377a2.929 2.929 0 0 0 .6.387 1.338 1.338 0 0 0 1.491-.067 15.372 15.372 0 0 0 1.261-1.052c.833-.751 1.64-1.53 2.481-2.271a3.232 3.232 0 0 1 1.8-.8 2.4 2.4 0 0 1 1.5.331 5.694 5.694 0 0 1 .987.681 74.44 74.44 0 0 1 2.391 2.272 4.406 4.406 0 0 1 1.057 1.585 7.077 7.077 0 0 1 .192.768v.13a.391.391 0 0 0-.022.077 2.657 2.657 0 0 1-.5 1.288 6.072 6.072 0 0 1-1.46 1.468 14.157 14.157 0 0 1-5.805 2.431s-2.198.253-3.766.237z" fill="<?php the_field('accent_color', 'option'); ?>"/></g></g></svg>
                    <a href="tel:<?php echo $inquiry['contact_phone_number']; ?>"><?php echo $inquiry['contact_phone_number']; ?></a>
                    </div>
                    <?php endif; ?>
                    
                    <?php if($inquiry['contact_email']): ?>
                    <div class="contact-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50.292" height="51"><g data-name="Group 67"><g data-name="Group 66"><g data-name="Path 251" fill="none"><path d="M25.146 0a25.325 25.325 0 0 1 25.145 25.5A25.325 25.325 0 0 1 25.146 51 25.325 25.325 0 0 1 0 25.5 25.325 25.325 0 0 1 25.146 0z"/><path d="M25.146 4c-5.638 0-10.941 2.23-14.933 6.277a21.456 21.456 0 0 0-4.545 6.837A21.67 21.67 0 0 0 4 25.5c0 2.911.561 5.732 1.668 8.386a21.456 21.456 0 0 0 4.545 6.836C14.205 44.77 19.508 47 25.146 47c5.637 0 10.94-2.23 14.932-6.278a21.456 21.456 0 0 0 4.546-6.836A21.67 21.67 0 0 0 46.29 25.5a21.67 21.67 0 0 0-1.667-8.386 21.456 21.456 0 0 0-4.546-6.837C36.087 6.23 30.783 4 25.146 4m0-4C39.033 0 50.29 11.417 50.29 25.5S39.033 51 25.146 51C11.258 51 0 39.583 0 25.5S11.258 0 25.146 0z" fill="<?php the_field('accent_color', 'option'); ?>"/></g></g><path data-name="Subtraction 5" d="M40.431 34.542H10.2V17.344l5.261 3.4 3.013 1.953c3.709 2.4 6.651 4.134 6.974 4.324h.005v-.031l14.978-9.919v17.471zm-14.987-8.465l-15.057-9.906h29.68l-14.623 9.906z" fill="<?php the_field('accent_color', 'option'); ?>"/></g></svg>
                    <a class="email" href="mailto:<?php echo $inquiry['contact_email']; ?>" target="_top"> <?php echo $inquiry['contact_email']; ?></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?> <!-- end of show if -->