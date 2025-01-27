<?php 
  $brandLogo = get_field('header_logo_invert', 'option');
  $footerBG = get_field('footer_background_color', 'option');
  $footerFont = get_field('footer_font_color', 'option');
  $footerTitle = get_field('footer_title', 'option');
  $dates = get_field('footer_dates', 'option');
  $btnone = get_field('footer_button', 'option');
  $btntwo = get_field('second_footer_button', 'option');
  $socialTitle = get_field('social_title', 'option');
  $linkedin = get_field('linkedin', 'option');
  $twitter = get_field('twitter', 'option');
  $instagram = get_field('instagram', 'option');
  $youtube = get_field('youtube', 'option'); 
  $supportTitle = get_field('support_nav', 'option');
  $logo = get_field('footer_logo', 'option');
  $logo_link  = get_field('footer_logo_link', 'option');
  ?>
</main>
<footer class="bg-neutral-900 text-white py-8 md:py-24 px-5 md:px-0 step" data-animate-enter="main-nav--solid">
  <div class="md:container mx-auto flex flex-wrap items-start space-y-7 md:space-y-0">
    <div class="w-full md:w-1/3 pb-7 md:pb-0 border-b md:border-b-0">
      <?php echo wp_get_attachment_image($brandLogo, 'medium', false, ["class" => "mb-5 md:mb-7 md:-mt-2"]); ?>
      <p class="mb-3 md:mb-5 leading-snug"><?php echo $dates; ?></p>
      <?php if($btnone):
        $link_url = $btnone['url'];
        $link_title = $btnone['title'];
        $link_target = $btnone['target'] ? $btnone['target'] : '_self';
        ?>
        <a href="<?php echo esc_url($link_url); ?>" class="ui-link group border border-current hover:bg-white hover:text-black"
        target="<?php echo esc_attr($link_target); ?>">
          <div class="flex items-center">
            <svg class="w-5 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500"><path d="M235 41.2v307.4c0 7.8 6.9 15.4 15 15 8.1-.4 15-6.6 15-15V244.5 78.9 41.2c0-7.8-6.9-15.4-15-15-8.1.4-15 6.6-15 15z"></path><path d="M125.4 232c12.8 15.1 25.7 30.2 38.5 45.3 20.5 24.1 40.9 48.1 61.4 72.2 4.7 5.5 9.4 11 14.1 16.6 5 5.8 16.3 5.8 21.2 0 12.8-15.1 25.7-30.2 38.5-45.3 20.5-24.1 40.9-48.1 61.4-72.2 4.7-5.5 9.4-11 14.1-16.6 5.2-6.2 6.1-15.2 0-21.2-5.4-5.4-15.9-6.2-21.2 0-12.8 15.1-25.7 30.2-38.5 45.3-20.5 24.1-40.9 48.1-61.4 72.2-4.7 5.5-9.4 11-14.1 16.6h21.2c-12.8-15.1-25.7-30.2-38.5-45.3-20.5-24.1-40.9-48.1-61.4-72.2-4.7-5.5-9.4-11-14.1-16.6-5.3-6.2-15.8-5.4-21.2 0-6.1 6.1-5.2 15 0 21.2zM70.8 473.3h314.1c14.5 0 29.1.5 43.5 0h.6c7.8 0 15.4-6.9 15-15-.4-8.1-6.6-15-15-15H114.9c-14.5 0-29.1-.5-43.5 0h-.6c-7.8 0-15.4 6.9-15 15 .4 8.1 6.6 15 15 15z"></path></svg>
            <span><?php echo esc_html($link_title); ?></span>
          </div>
        </a>
      <?php endif; ?>
      <?php if($btntwo): 
        $link_url_two = $btntwo['url'];
        $link_title_two = $btntwo['title'];
        $link_target_two = $btntwo['target'] ? $btntwo['target'] : '_self';
        ?>
        <a href="<?php echo esc_url($link_url_two); ?>" class="ui-link group border border-current hover:bg-white hover:text-black mt-2.5 xl:mt-0 xl:ml-1"
        target="<?php echo esc_attr($link_target_two); ?>">
          <div class="flex items-center">
            <svg class="w-5 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500"><path d="M235 41.2v307.4c0 7.8 6.9 15.4 15 15 8.1-.4 15-6.6 15-15V244.5 78.9 41.2c0-7.8-6.9-15.4-15-15-8.1.4-15 6.6-15 15z"></path><path d="M125.4 232c12.8 15.1 25.7 30.2 38.5 45.3 20.5 24.1 40.9 48.1 61.4 72.2 4.7 5.5 9.4 11 14.1 16.6 5 5.8 16.3 5.8 21.2 0 12.8-15.1 25.7-30.2 38.5-45.3 20.5-24.1 40.9-48.1 61.4-72.2 4.7-5.5 9.4-11 14.1-16.6 5.2-6.2 6.1-15.2 0-21.2-5.4-5.4-15.9-6.2-21.2 0-12.8 15.1-25.7 30.2-38.5 45.3-20.5 24.1-40.9 48.1-61.4 72.2-4.7 5.5-9.4 11-14.1 16.6h21.2c-12.8-15.1-25.7-30.2-38.5-45.3-20.5-24.1-40.9-48.1-61.4-72.2-4.7-5.5-9.4-11-14.1-16.6-5.3-6.2-15.8-5.4-21.2 0-6.1 6.1-5.2 15 0 21.2zM70.8 473.3h314.1c14.5 0 29.1.5 43.5 0h.6c7.8 0 15.4-6.9 15-15-.4-8.1-6.6-15-15-15H114.9c-14.5 0-29.1-.5-43.5 0h-.6c-7.8 0-15.4 6.9-15 15 .4 8.1 6.6 15 15 15z"></path></svg>
            <span><?php echo esc_html($link_title_two); ?></span>
          </div>
        </a>
      <?php endif; ?>
    </div>
    <div class="w-full md:w-2/3 grid grid-cols-2 md:grid-cols-3 md:text-base">
      <div class="col-auto">
        <h3 class="text-base mb-1 md:mb-5"><?php echo $supportTitle; ?></h3>
        <?php wp_nav_menu( array(
        'theme_location' => 'support',
        'container' => 'ul',
        'container_class' => 'space-y-1 md:space-y-2',
        'menu_class' => 'underline-transparent underline-offset-4 hover:underline'
        )); ?>
      </div>
      <div class="col-auto">
        <h3 class="text-base mb-1 md:mb-5"><?php echo $socialTitle; ?></h3>
        <ul class="space-y-1 md:space-y-2">
          <?php if($instagram): ?>
            <li>
              <a target="_blank" href="<?php echo $instagram; ?>" class="underline-transparent underline-offset-4 hover:underline"><i class="fab fa-instagram" data-fa-transform="shrink-3.5 down-1.6 right-1.25" data-fa-mask="fas fa-circle"></i> <p class="inline ml-3">instagram</p></a>
            </li>
          <?php endif; ?>
          <?php if($twitter): ?>
            <li>
              <a target="_blank" href="<?php echo $twitter; ?>" class="underline-transparent underline-offset-4 hover:underline"><i class="fab fa-twitter" data-fa-transform="shrink-3.5 down-1.6 right-1.25" data-fa-mask="fas fa-circle"></i> <p class="inline ml-3">Twitter</p></a>
            </li>
          <?php endif; ?>

          <?php if($linkedin): ?>
            <li>
              <a target="_blank" href="<?php echo $linkedin; ?> class="underline-transparent underline-offset-4 hover:underline""><i class="fab fa-linkedin" data-fa-transform="shrink-3.5 down-1.6 right-1.25" data-fa-mask="fas fa-circle"></i> <p class="inline ml-3">Linkedin</p></a>
            </li>
          <?php endif; ?>
          
          <?php if($youtube): ?>
            <li>
              <a target="_blank" href="<?php echo $youtube; ?> class="underline-transparent underline-offset-4 hover:underline""><i class="fab fa-youtube" data-fa-transform="shrink-3.5 down-1.6 right-1.25" data-fa-mask="fas fa-circle"></i> <p class="inline ml-3">YouTube</p></a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
      <div class="col-span-2 md:col-auto mt-7 md:mt-0">
        <a href="<?php echo $logo_link; ?>" target="_blank">
          <img class="w-40" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
        </a>
        <p class="mb-5">&copy; <?php echo date('Y'); ?> <?php _e("STRATEGY INSTITUTE", "SI") ?></p>
        <a href="#body" class="underline underline-offset-4"><span class="inline-block -rotate-90 mr-1.5">↳</span>Back to top</a>
      </div>
    </div>
  </div>
</footer>



<?php wp_footer(); ?>

<?php $custom_script = get_field('custom_js', 'option'); ?>
<?php if($custom_script) { ?>
    <script>
        <?php echo $custom_script; ?>
    </script>
<?php } ?>

<?php 

$activate_cookie = get_field('activate_cookie_warning', 'option'); 

if($activate_cookie) { ?>
<script>
    window.cookieconsent.initialise({
      palette: {
        popup: {
            "background": "<?php the_field('secondary_color', 'option'); ?>",
        },
        button: {
            "background": "<?php the_field('accent_color', 'option'); ?>",
        }
      },
      content: {
        href: "<?php echo get_privacy_policy_url(); ?>",
        link: "<?php echo the_field('cookie_link_text', 'option'); ?>",
        dismiss: "<?php echo the_field('cookie_dismiss_text', 'option'); ?>",
        message: "<?php echo the_field('cookie_message', 'option'); ?>"
        }
      });
</script>
<?php } ?>
<script src="https://unpkg.com/scrollama" defer="defer"></script>
</body>
</html>