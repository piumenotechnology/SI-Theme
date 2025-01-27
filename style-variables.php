<?php 
// color style overides
  $primary = get_field('primary_color', 'option');
  $secondary = get_field('secondary_color', 'option');
  $accent = get_field('accent_color', 'option');
  $greyBG = get_field('grey_background', 'option');
  $heroOverlay = get_field('hero_overlay', 'option');
?> 
<style>
  :root {
    --color-primary: <?= $primary; ?>;
    --color-seconday: <?= $secondary; ?>;
    --color-accent: <?= $accent; ?>;
    --color-accent-darker: color-mix(in oklab, var(--color-accent), black 15%);
    --color-accent-lighter: color-mix(in oklab, var(--color-accent), white 50%);
  }
</style>