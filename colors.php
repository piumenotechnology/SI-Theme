<?php 
// color style overides
    $primary = get_field('primary_color', 'option');
    $secondary = get_field('secondary_color', 'option');
    $accent = get_field('accent_color', 'option');
    $greyBG = get_field('grey_background', 'option');
    $heroOverlay = get_field('hero_overlay', 'option'); 

{ ?> 
<style>

.font-primary {
    color: <?php echo $primary; ?>;
}

.font-secondary {
    color: <?php echo $secondary; ?>;
}

.font-accent {
    color: <?php echo $accent; ?>
}

.background-primary {
    background-color: <?php echo $primary; ?>;
}

.background-secondary {
    background-color: <?php echo $secondary; ?>;
}

.background-accent {
    background-color: <?php echo $accent; ?>;
}

.background-grey {
    background-color: <?php echo $greyBG; ?>;
}

.border-accent {
    border-color: <?php echo $accent; ?>;
}

h1:after {
    background-color: <?php echo $accent; ?>;
}

h2:after {
    background-color: <?php echo $accent; ?>;  
}

a:hover, a:focus {
    color: <?php echo $accent; ?>;
}

a.btn-one, button.btn-one {
    color: <?php echo $secondary; ?>;
    background-color: <?php echo $accent; ?>;
    border: 1px solid <?php echo $accent; ?>;
}

a.btn-one:hover, a.btn-one:focus, button.btn-one:hover, button.btn-one:focus {
    background: <?php echo $secondary; ?>;
    color: <?php echo $primary; ?>;
}

<?php include 'color-styles/hero.php' ?>
<?php include 'color-styles/flickity.php' ?>
<?php include 'color-styles/home-hero.php' ?> 
<?php include 'color-styles/testimonials.php' ?> 
<?php include 'color-styles/agenda.php' ?> 
<?php include 'color-styles/rave.php' ?> 
<?php include 'color-styles/get-involved.php' ?> 
<?php include 'color-styles/faqs.php' ?> 
<?php include 'color-styles/pricing.php' ?>
<?php include 'color-styles/gravity-forms.php' ?>
<?php include 'color-styles/nav.php' ?>
<?php include 'color-styles/resources.php' ?>
<?php include 'color-styles/about.php' ?>
<?php include 'color-styles/speakers.php' ?>
<?php include 'color-styles/sponsors.php' ?>
<?php include 'color-styles/footer.php' ?>


</style>

<?php } ?>

<?php if(is_singular('agenda')) { ?>
    <style>
    header li.Agenda a {
        color: <?php echo $accent; ?>;
    }
    </style>
<?php } ?>

<?php if(is_singular('post')) { ?>
    <style>
    header li.Resources a {
        color: <?php echo $accent; ?>;
    }
    </style>
<?php } ?>