

/* === Gravity Forms  ===*/

div.gform_wrapper .gform_body input, div.gform_wrapper .gform_body select {
    border-bottom: 1px solid <?php echo $primary; ?>;
}

div.gform_wrapper .gform_body label,  div.gform_wrapper .gform_body input::placeholder, div.gform_wrapper .gform_body select {
    color: <?php echo $primary; ?>;
}

section.newsletter .gform_wrapper div.gform_body ul.gform_fields li.gfield input,
section.newsletter .gform_wrapper div.gform_body ul.gform_fields li.gfield.gfield_error input {
    border: 1px solid <?php echo $primary; ?> !important;
}

div.gform_wrapper div.gform_body textarea {
    border: 1px solid <?php echo $primary; ?> !important;
}

section.newsletter input[type="submit"],
div.gform_wrapper .gform_footer input[type=submit] {
    color: <?php echo $secondary; ?>;
    background-color: <?php echo $accent; ?>;
    border: 1px solid <?php echo $accent; ?>;
}

section.newsletter input[type="submit"]:hover,
section.newsletter input[type="submit"]:focus,
div.gform_wrapper .gform_footer input[type=submit]:hover,
div.gform_wrapper .gform_footer input[type=submit]:focus {
    background-color: <?php echo $secondary; ?>;
    color: <?php echo $primary; ?>;
    border-color: <?php echo $primary; ?>;
}

div.gform_wrapper div.gform_body div.ginput_container_radio ul.gfield_radio li label:before {
    border: 2px solid <?php echo $accent; ?>;
}

div.gform_wrapper div.gform_body div.ginput_container_radio ul.gfield_radio li input:checked+label:before {
    background: <?php echo $accent; ?>;
}

div.gform_wrapper div.gform_body ul.gfield_checkbox li input[type=checkbox] + label:before {
    border: 2px solid <?php echo $accent; ?>;
}

div.gform_wrapper div.gform_body ul.gfield_checkbox li input[type=checkbox]:checked+label:before {
    background: <?php echo $accent; ?>;
}
