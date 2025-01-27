header li.current-menu-item a {
    color: <?php echo $accent; ?>;
}

header li.current-page-ancestor {
    color: <?php echo $accent; ?>;
}

.menu-item.menu-item-has-children.active:after {
    color: <?php echo $accent; ?>;
}

.page-links--inner a.active {
    color: <?php echo $accent; ?>;
}

.nav-section .menu-item-has-children.current-menu-item:after{
    color: <?php echo $accent; ?>;
}

.nav-section .menu-item-has-children.current-page-ancestor:after{
    color: <?php echo $accent; ?>;
}



.nav-section .menu-item-has-children .sub-menu {
    color: <?php echo $primary; ?>;
}

.nav-section .menu-item-has-children .sub-menu a {
    color: <?php echo $primary; ?>;
}

.nav-section .menu-item-has-children .sub-menu a:hover, .nav-section .menu-item-has-children .sub-menu a:focus {
    color: <?php echo $accent; ?>;
}

<?php if(is_singular('agenda')) { ?>
    header li.Agenda a {
        color: <?php echo $accent; ?>;
    }

    .nav-section .menu-item-has-children.Agenda:after{
        color: <?php echo $accent; ?>;
    }
  
<?php } ?>

<?php if(is_category()) { ?>
    header li.Resources a {
        color: <?php echo $accent; ?>;
    }
    .nav-section .menu-item-has-children.Resources:after{
        color: <?php echo $accent; ?>;
    }
<?php } ?>