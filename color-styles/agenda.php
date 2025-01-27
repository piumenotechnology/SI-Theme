

/* === agenda ===*/

.agenda--navigation li:before {
    border: 1px solid <?php the_field('primary_color', 'option'); ?>;
}
.agenda--navigation li.active:before {
    background: <?php the_field('accent_color', 'option'); ?>;
    border: 1px solid <?php the_field('accent_color', 'option'); ?>;
}

.agenda--navigation .tracks {
    border-top: 1px solid <?php the_field('primary_color', 'option'); ?>;
    border-bottom: 1px solid <?php the_field('primary_color', 'option'); ?>;
}

.tracks .plus-sign {
    border: 1px solid <?php the_field('primary_color', 'option'); ?>;
}

.tracks .plus-sign:before,
.tracks .plus-sign:after {
    background: <?php the_field('primary_color', 'option'); ?>;
}

.agenda--speakers .flickity-button svg {
    fill: <?php the_field('primary_color', 'option'); ?>;
}
