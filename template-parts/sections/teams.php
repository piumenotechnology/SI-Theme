<?php
/**
 * ACF: Flexible Content > Layouts > Teams
 *
 * @package WordPress
 * @subpackage Strategy Institute
 */
$showTeam = get_sub_field('show_team');
$greyTeam = get_sub_field('grey_background');
$titleTeam = get_sub_field('title');
?>

<?php if($showTeam): ?>
<?php if($greyTeam): ?>
<section class="section featured-speakers team background-grey step" data-animate-enter="main-nav--solid" id="team">
<?php else: ?>
<section class="section featured-speakers team step" data-animate-enter="main-nav--solid" id="team">
<?php endif; ?>
    <div class="container wrapper-padding mx-auto">
      <h2 class="w-full font-extrabold text-4xl md:text-5xl md:pr-10"><?php echo $titleTeam ?></h2>
      <div class="random-box flex flex-wrap w-36 gap-2 mt-5 md:mt-6 mb-5 md:mb-10">
          <div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div><div class="boxes"></div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-5 md:gap-7">
        
    <?php if( have_rows('team_fields') ): ?>

        <?php while( have_rows('team_fields') ): the_row(); 

          // vars
          $image = get_sub_field('image');
          $name = get_sub_field('name');
          $job = get_sub_field('job_title');
          $phone = get_sub_field('team_phone_number');
          $phone_extension = get_sub_field('team_phone_number_extension');
          $email = get_sub_field('team_email');
          $linkedin = get_sub_field('team_linkedin');
          ?>
            <article>  
              <div class="img--container obj-fit group relative">
                <?php if($image): ?> 
                  <img class="rounded-lg brightness-75 grayscale group-hover:grayscale-0 transition-all duration-700" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
                <?php else: ?>
                  <img class="rounded-lg brightness-75 grayscale group-hover:grayscale-0 transition-all duration-700" src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon.jpg" alt="">
                <?php endif; ?>
                <div class="team--social-links absolute bottom-0 left-0 translate-y-0 lg:translate-y-full">
                  <?php if($email): ?>
                    <a class="email text-sm" href="mailto:<?php echo $email; ?>" target="_top">email<i class="fa-solid fa-envelope ml-2"></i></a>
                  <?php endif; ?>

                  <?php if($phone_extension) : ?>
                    <div class="">
                      <a href="tel:<?php echo $phone; ?>,<?php echo $phone_extension; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50.292" height="51"><g data-name="Group 70"><g data-name="Group 68"><g data-name="Ellipse 233" fill="none" stroke="<?php the_field('accent_color', 'option'); ?>" stroke-width="4"><ellipse cx="25.146" cy="25.5" rx="25.146" ry="25.5" stroke="none"/><ellipse cx="25.146" cy="25.5" rx="23.146" ry="23.5"/></g></g><g data-name="Group 69"><path data-name="Path 219" d="M29.396 41.228a9.635 9.635 0 0 1-4.317-1.167 14.634 14.634 0 0 1-3.311-2.522 71.092 71.092 0 0 1-5.315-5.9 29.746 29.746 0 0 1-4.244-6.783 16.926 16.926 0 0 1-1.42-5.259l-.091-.968v-1.008c.01-.047.021-.094.028-.141.072-.437.113-.882.222-1.31a12.2 12.2 0 0 1 2.923-5.265 8.216 8.216 0 0 1 2.034-1.65 4.494 4.494 0 0 1 1.492-.512h.39a3.232 3.232 0 0 1 2.087 1.508 43.013 43.013 0 0 1 3.333 4.921 1.678 1.678 0 0 1 .166.669 2.788 2.788 0 0 1-.876 2.288 21.5 21.5 0 0 1-2.624 2.228c-.506.371-1 .767-1.479 1.168a1.321 1.321 0 0 0-.358 1.8 6.143 6.143 0 0 0 .775 1.215c.9 1.083 1.826 2.146 2.76 3.2q2.07 2.336 4.171 4.646c.448.49.952.931 1.447 1.377a2.929 2.929 0 0 0 .6.387 1.338 1.338 0 0 0 1.491-.067 15.372 15.372 0 0 0 1.261-1.052c.833-.751 1.64-1.53 2.481-2.271a3.232 3.232 0 0 1 1.8-.8 2.4 2.4 0 0 1 1.5.331 5.694 5.694 0 0 1 .987.681 74.44 74.44 0 0 1 2.391 2.272 4.406 4.406 0 0 1 1.057 1.585 7.077 7.077 0 0 1 .192.768v.13a.391.391 0 0 0-.022.077 2.657 2.657 0 0 1-.5 1.288 6.072 6.072 0 0 1-1.46 1.468 14.157 14.157 0 0 1-5.805 2.431s-2.198.253-3.766.237z" fill="<?php the_field('accent_color', 'option'); ?>"/></g></g></svg>
                      </a>
                    </div>

                  <?php elseif ($phone): ?>
                    <div class="">
                      <a href="tel:<?php echo $phone; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50.292" height="51"><g data-name="Group 70"><g data-name="Group 68"><g data-name="Ellipse 233" fill="none" stroke="<?php echo the_field('accent_color', 'option'); ?>" stroke-width="4"><ellipse cx="25.146" cy="25.5" rx="25.146" ry="25.5" stroke="none"/><ellipse cx="25.146" cy="25.5" rx="23.146" ry="23.5"/></g></g><g data-name="Group 69"><path data-name="Path 219" d="M29.396 41.228a9.635 9.635 0 0 1-4.317-1.167 14.634 14.634 0 0 1-3.311-2.522 71.092 71.092 0 0 1-5.315-5.9 29.746 29.746 0 0 1-4.244-6.783 16.926 16.926 0 0 1-1.42-5.259l-.091-.968v-1.008c.01-.047.021-.094.028-.141.072-.437.113-.882.222-1.31a12.2 12.2 0 0 1 2.923-5.265 8.216 8.216 0 0 1 2.034-1.65 4.494 4.494 0 0 1 1.492-.512h.39a3.232 3.232 0 0 1 2.087 1.508 43.013 43.013 0 0 1 3.333 4.921 1.678 1.678 0 0 1 .166.669 2.788 2.788 0 0 1-.876 2.288 21.5 21.5 0 0 1-2.624 2.228c-.506.371-1 .767-1.479 1.168a1.321 1.321 0 0 0-.358 1.8 6.143 6.143 0 0 0 .775 1.215c.9 1.083 1.826 2.146 2.76 3.2q2.07 2.336 4.171 4.646c.448.49.952.931 1.447 1.377a2.929 2.929 0 0 0 .6.387 1.338 1.338 0 0 0 1.491-.067 15.372 15.372 0 0 0 1.261-1.052c.833-.751 1.64-1.53 2.481-2.271a3.232 3.232 0 0 1 1.8-.8 2.4 2.4 0 0 1 1.5.331 5.694 5.694 0 0 1 .987.681 74.44 74.44 0 0 1 2.391 2.272 4.406 4.406 0 0 1 1.057 1.585 7.077 7.077 0 0 1 .192.768v.13a.391.391 0 0 0-.022.077 2.657 2.657 0 0 1-.5 1.288 6.072 6.072 0 0 1-1.46 1.468 14.157 14.157 0 0 1-5.805 2.431s-2.198.253-3.766.237z" fill="<?php the_field('accent_color', 'option'); ?>"/></g></g></svg>
                      </a>
                    </div>
                  <?php endif; ?>

                  <?php if($linkedin): ?>
                    <a class="team--social-linkedin text-sm" target="_blank" href="<?php echo $linkedin; ?>">linkedin<i class="fab fa-linkedin ml-2" data-fa-transform="shrink-3.5 down-1.6 right-1.25" data-fa-mask="fas fa-circle"></i></a>
                  <?php endif; ?>
                </div>
              </div>
              <p class="name text-lg font-bold mt-3"><?php echo $name; ?></p>
              <p class="job text-lg"><?php echo $job; ?></p>
            </article>
	        <?php endwhile; ?>

        <?php endif;// end meet the team loop ?>
        </div>
    </div>
</section>
    
<?php endif;  // end meet the team ?>