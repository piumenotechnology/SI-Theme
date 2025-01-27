import { start } from "repl";

export let tabs = function () {
    if ($('.tabsSectionTabs')) {

        // If we have a tabs flickity on the page, then...
        const $tabs = $('.tabsSectionTabs')
        // Initiate flickity
        $tabs.flickity({
            // options
            cellAlign: 'left',
            contain: true,
            pageDots: false,
            draggable: false,
            adaptiveHeight: true,
            fade: true
        });

        let starting_tab = $('.faq').data('open-tab');
        let matching_tab = '';
        let set_index = '';

        if(starting_tab == '') {

            $('.tabsSectionNavArea').find('[data-index=0]').addClass('tabsSectionNavItemCurrent');

        } else {
            matching_tab = $('.tabsSectionNavArea').find('#' + starting_tab);

            $(matching_tab).addClass('tabsSectionNavItemCurrent');
 
            set_index = $('.tabsSectionNavArea').find('#' + starting_tab).data('index');

            $tabs.flickity('select', set_index);
        }   

        // Loop through all our tabsSectionNavItem, assign listeners to navigate to the relevant slides

        $(".tabsSectionNavItem").each(function (index) {
            const $currentNavItem = $('.tabsSectionNavItem-' + index)

            $currentNavItem.click(function () {
                event.preventDefault()

                // Loop through all our nav items, if something has a class of 'tabsSectionNavItemCurrent' we remove it
                $(".tabsSectionNavItem").each(function (index) {
                    $(this).removeClass('tabsSectionNavItemCurrent');
                });

                $tabs.flickity('select', index);
                // After we've selected our new index, we need to assign a 'selected' class 
                $currentNavItem.addClass('tabsSectionNavItemCurrent');
            });

        });
    }
}