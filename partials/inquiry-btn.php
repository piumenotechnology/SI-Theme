<?php 
$show_inquiry = get_field('show_inquiry_section');
$inquiry = get_field('inquiry');
$add_grey_background = $inquiry['add_grey_background'];
$inquiry_title = $inquiry['inquiry_title'];
$inquiry_text = $inquiry['inquiry_text'];
$inquiry_image = $inquiry['contact_image'];
$inquiry_name = $inquiry['contact_name'];
$inquiry_contact_title = $inquiry['contact_title'];
$inquiry_phone = $inquiry['contact_phone_number'];
$inquiry_phone_extension = $inquiry['contact_phone_number_extension'];
$inquiry_email = $inquiry['contact_email'];
$inquiry_btn = $inquiry['contact_button'];
?>

<?php if($show_inquiry) { ?>
<section id="inquiry" class="inquiry-btn
    <?php if($add_grey_background) { ?>
        background-grey
    <?php } ?>
    ">   
    <div class="wrapper wrapper-padding">
        <?php if($inquiry_title) { ?>
            <h2 class="font-primary"><?php echo $inquiry_title; ?></h2>
        <?php } ?>

        <?php if($inquiry_text) { ?>
            <div class="inquiry-btn--intro-text">
                <?php echo $inquiry_text; ?>
            </div>
        <?php } ?>

        <div class="inquiry-btn--person flex">
            <div class="inquiry-btn--image-container">
                <div class="inquiry-btn--image obj-fit">
                    <?php echo wp_get_attachment_image( $inquiry_image['ID'], 'medium'); ?>
                </div>
            </div>
            <div class="inquiry-btn--text">
                <?php if($inquiry_name) { ?>
                    <p class="bold uppercase inquiry-btn--name font-primary"><?php echo $inquiry_name; ?></p>
                <?php } ?>
                
                <?php if($inquiry_contact_title) { ?>
                    <p class="inquiry-btn--title uppercase font-primary"><?php echo $inquiry_contact_title; ?></p>
                <?php } ?>

                <div class="inquiry-btn--contact-methods flex">
                    <?php if($inquiry_email) { ?>
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50.292" height="51" viewBox="0 0 50.292 51"><g id="Group_67" data-name="Group 67" transform="translate(-1088 -919)"><g id="Group_66" data-name="Group 66" transform="translate(1088 919)"><g id="Path_251" data-name="Path 251" transform="translate(0)" fill="none"><path d="M25.146,0A25.325,25.325,0,0,1,50.291,25.5,25.325,25.325,0,0,1,25.146,51,25.325,25.325,0,0,1,0,25.5,25.325,25.325,0,0,1,25.146,0Z" stroke="none"/><path d="M 25.14574432373047 4 C 19.50809478759766 4 14.20492553710938 6.229331970214844 10.21315383911133 10.27732849121094 C 8.265365600585938 12.2525520324707 6.736103057861328 14.55273056030273 5.667823791503906 17.11399078369141 C 4.561134338378906 19.7673511505127 3.999996185302734 22.58877944946289 3.999996185302734 25.49991035461426 C 3.999996185302734 28.41104125976562 4.561134338378906 31.23246955871582 5.667823791503906 33.88582992553711 C 6.736103057861328 36.44709014892578 8.265365600585938 38.74726867675781 10.21315383911133 40.72248840332031 C 14.20492553710938 44.77048873901367 19.50809478759766 46.99982070922852 25.14574432373047 46.99982070922852 C 30.78339385986328 46.99982070922852 36.08655548095703 44.77048873901367 40.07833480834961 40.72248840332031 C 42.02611541748047 38.74726867675781 43.55538558959961 36.44709014892578 44.62365341186523 33.88582992553711 C 45.73034286499023 31.23246955871582 46.29148483276367 28.41104125976562 46.29148483276367 25.49991035461426 C 46.29148483276367 22.58877944946289 45.73034286499023 19.7673511505127 44.62365341186523 17.11399078369141 C 43.55538558959961 14.55273056030273 42.02611541748047 12.2525520324707 40.07833480834961 10.27732849121094 C 36.08655548095703 6.229331970214844 30.78339385986328 4 25.14574432373047 4 M 25.14574432373047 0 C 39.03335571289062 0 50.29148483276367 11.41669845581055 50.29148483276367 25.49991035461426 C 50.29148483276367 39.58312225341797 39.03335571289062 50.99982070922852 25.14574432373047 50.99982070922852 C 11.25813293457031 50.99982070922852 -3.814697265625e-06 39.58312225341797 -3.814697265625e-06 25.49991035461426 C -3.814697265625e-06 11.41669845581055 11.25813293457031 0 25.14574432373047 0 Z" stroke="none"/></g></g><path id="Subtraction_5" data-name="Subtraction 5" d="M30.231,18.371H0V1.173l5.261,3.4L8.274,6.526c3.709,2.4,6.651,4.134,6.974,4.324l.005,0v-.031L30.231.9V18.371ZM15.244,9.906h0L.187,0h29.68L15.244,9.906Z" transform="translate(1098.2 935.171)"/></g></svg>
                        <a class="font-primary" href="mailto:<?php echo $inquiry_email; ?>"><?php echo $inquiry_email; ?></a>
                    </div>
                    <?php } ?>
                    
                    <?php if($inquiry_phone) { ?>
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50.292" height="51" viewBox="0 0 50.292 51"><g id="Group_70" data-name="Group 70" transform="translate(-1106 -1086)"><g id="Group_68" data-name="Group 68" transform="translate(1106 1086)"><g id="Ellipse_233" data-name="Ellipse 233" transform="translate(0 0)" fill="none" stroke-width="4"><ellipse cx="25.146" cy="25.5" rx="25.146" ry="25.5" stroke="none"/><ellipse cx="25.146" cy="25.5" rx="23.146" ry="23.5" fill="none"/></g></g><g id="Group_69" data-name="Group 69" transform="translate(1116.698 1094.738)"><path id="Path_219" data-name="Path 219" d="M430.155-39.833A9.635,9.635,0,0,1,425.838-41a14.634,14.634,0,0,1-3.311-2.522,71.092,71.092,0,0,1-5.315-5.9,29.746,29.746,0,0,1-4.244-6.783,16.926,16.926,0,0,1-1.42-5.259c-.031-.323-.061-.646-.091-.968v-1.008c.01-.047.021-.094.028-.141.072-.437.113-.882.222-1.31a12.2,12.2,0,0,1,2.923-5.265,8.216,8.216,0,0,1,2.034-1.65,4.494,4.494,0,0,1,1.492-.512h.39a3.232,3.232,0,0,1,2.087,1.508,43.013,43.013,0,0,1,3.333,4.921,1.678,1.678,0,0,1,.166.669,2.788,2.788,0,0,1-.876,2.288,21.5,21.5,0,0,1-2.624,2.228c-.506.371-1,.767-1.479,1.168a1.321,1.321,0,0,0-.358,1.8,6.143,6.143,0,0,0,.775,1.215c.9,1.083,1.826,2.146,2.76,3.2q2.07,2.336,4.171,4.646c.448.49.952.931,1.447,1.377a2.929,2.929,0,0,0,.6.387,1.338,1.338,0,0,0,1.491-.067A15.372,15.372,0,0,0,431.3-48.03c.833-.751,1.64-1.53,2.481-2.271a3.232,3.232,0,0,1,1.8-.8,2.4,2.4,0,0,1,1.5.331,5.694,5.694,0,0,1,.987.681c.814.739,1.613,1.5,2.391,2.272a4.406,4.406,0,0,1,1.057,1.585,7.077,7.077,0,0,1,.192.768v.13a.391.391,0,0,0-.022.077,2.657,2.657,0,0,1-.5,1.288,6.072,6.072,0,0,1-1.46,1.468,14.157,14.157,0,0,1-5.805,2.431S431.723-39.817,430.155-39.833Z" transform="translate(-411.457 72.323)" /></g></g></svg>

                        <?php if($inquiry_phone_extension) { ?>
                        <a class="font-primary" href="tel:<?php echo $inquiry_phone; ?>,<?php echo $inquiry_phone_extension; ?>"><?php echo $inquiry_phone; ?> ext <?php echo $inquiry_phone_extension; ?></a>
                        <?php } else { ?>
                        <a class="font-primary" href="tel:<?php echo $inquiry_phone; ?>"><?php echo $inquiry_phone; ?></a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
                
                <?php if($inquiry_btn) { ?>
                <div class="inquiry-btn--btn">
                    <a href="<?php echo $inquiry_btn['url']; ?>" target="<?php echo $inquiry_btn['target']; ?>" class="btn-one"><?php echo $inquiry_btn['title']; ?></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>