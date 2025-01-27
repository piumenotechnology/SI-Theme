<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha384-PPIZEGYM1v8zp5Py7UjFb79S58UeqCL9pYVnVPURKEqvioPROaVAJKKLzvH2rDnI" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pathway+Extreme:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>?v=1.0" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <?php wp_head(); ?>
  <?php include 'style-variables.php'; ?>
  <?php include 'colors.php'; ?>
  

  <!-- Insert GTM head code -->
  <?php $gtm_head = get_field('google_tag_manager_code_for_head', 'option'); ?>
  <?php if($gtm_head) { ?>
    <?php echo $gtm_head; ?>
  <?php } ?>

  <!-- Custom styles insert -->
  <?php $custom_styles = get_field('custom_css', 'option'); ?>
  <?php if($custom_styles) { ?>
  <style>
    <?php echo $custom_styles; ?>
  </style>
  <?php } ?>
</head>
<body id="body" <?php body_class(); ?>>
<!-- Insert GTM body code -->
<?php $gtm_body = get_field('google_tag_manager_code_for_body', 'option'); ?>
<?php if($gtm_body) { ?>
    <?php echo $gtm_body; ?>
<?php } ?>

<a href="#maincontent" class="skiplink">Go to Main Content</a>

<header id="main-header" class="main-nav main-nav--default">
  <?php
    $header_logo = get_field('header_logo', 'option');
    $header_logo_invert = get_field('header_logo_invert', 'option');
    $location = get_field('event_location', 'option');
    $location_link = get_field('event_location_link', 'option');
    $dates = get_field('event_dates', 'option');
    $header_btn = get_field('register_button', 'option');
    $link_url = $header_btn['url'];
    $link_title = $header_btn['title'];
    $link_target = $header_btn['target'] ? $header_btn['target'] : '_self';
  ?>
  <div class="container mx-auto">
    <div class="w-full flex flex-wrap justify-between items-center md:min-h-32 py-5 md:py-2.5">
      <a href="/" class="brand brand-invert">
        <?php echo wp_get_attachment_image($header_logo_invert, 'medium', false, ["class" => "nav-brand w-40 -mt-1"]); ?>
      </a>
      <a href="/" class="brand">
        <?php echo wp_get_attachment_image($header_logo, 'medium', false, ["class" => "nav-brand w-40 -mt-1"]); ?>
      </a>
      <button class="md:hidden drawer-button">
        <span></span>
        <span></span>
        <span></span>
        <span class="sr-only">Menu</span>
      </button>
      <div class="nav-wrapper md:flex flex-col space-y-5">
        <div class="flex md:hidden lg:flex flex-row flex-wrap justify-center lg:justify-end items-center gap-2 lg:gap-5 text-base mt-5 lg:mt-0">
          <a class="ui-link ui-link--outline flex justify-center lg:justify-start items-center font-bold" href="/download-brochure/">
            <svg class="w-5 mr-2 fill-current -mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500"><path d="M235 41.2v307.4c0 7.8 6.9 15.4 15 15 8.1-.4 15-6.6 15-15V244.5 78.9 41.2c0-7.8-6.9-15.4-15-15-8.1.4-15 6.6-15 15z"></path><path d="M125.4 232c12.8 15.1 25.7 30.2 38.5 45.3 20.5 24.1 40.9 48.1 61.4 72.2 4.7 5.5 9.4 11 14.1 16.6 5 5.8 16.3 5.8 21.2 0 12.8-15.1 25.7-30.2 38.5-45.3 20.5-24.1 40.9-48.1 61.4-72.2 4.7-5.5 9.4-11 14.1-16.6 5.2-6.2 6.1-15.2 0-21.2-5.4-5.4-15.9-6.2-21.2 0-12.8 15.1-25.7 30.2-38.5 45.3-20.5 24.1-40.9 48.1-61.4 72.2-4.7 5.5-9.4 11-14.1 16.6h21.2c-12.8-15.1-25.7-30.2-38.5-45.3-20.5-24.1-40.9-48.1-61.4-72.2-4.7-5.5-9.4-11-14.1-16.6-5.3-6.2-15.8-5.4-21.2 0-6.1 6.1-5.2 15 0 21.2zM70.8 473.3h314.1c14.5 0 29.1.5 43.5 0h.6c7.8 0 15.4-6.9 15-15-.4-8.1-6.6-15-15-15H114.9c-14.5 0-29.1-.5-43.5 0h-.6c-7.8 0-15.4 6.9-15 15 .4 8.1 6.6 15 15 15z"></path></svg>
            <span>Download Brochure</span>
          </a>
          <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"
            class="ui-link ui-link--medium link-register group">
            <div class="flex justify-center lg:justify-start items-center font-bold">
              <span><?php echo esc_html($link_title); ?></span>
              <svg data-v-e1bdab2c="" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                class="relative ml-1 group-hover:ml-1.5 transition-color duration-200" data-new="" aria-hidden="true" style="width: 1em; height: 1em;">
                <polygon data-v-e1bdab2c="" fill="currentColor"
                  points="5 4.31 5 5.69 9.33 5.69 2.51 12.51 3.49 13.49 10.31 6.67 10.31 11 11.69 11 11.69 4.31 5 4.31">
                </polygon>
              </svg>
            </div>
          </a>
        </div>
        <nav class="border-t pt-2">
          <?php wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => 'ul',
            'container_class'   => 'main-navbar',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker()
          )); ?>
        </nav>
      </div>
    </div>
  </div> 
  <div class="menu-overlay--mobile"></div>
</header>

<main id="maincontent" class="px-5 md:px-0">