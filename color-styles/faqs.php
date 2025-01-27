/* === FAQ  ===*/
.tabsSectionNavItemCurrent:after {
    content: "";
    position: absolute;
    background-color: <?php echo $accent ?>;
    height: 4px;
    width: 70px;
    top: -20px;
    left: 0;
}
.tabsSectionNavItem:focus {
    outline: none;
}
.tabsSectionNavItem:focus::after, .tabsSectionNavItem:hover::after {
    content: "";
    position: absolute;
    background-color: <?php echo $accent ?>;
    height: 4px;
    width: 70px;
    top: -20px;
    left: 0;
}

.faq .tabsSection {
        background-color: <?php echo $greyBG; ?>;
}

.faq.background-grey .tabsSection {
    background: #ffffff;
}
/* === End of FAQ  ===*/