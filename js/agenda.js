

export let agenda = function() {


    // Setup Flickity First
    if($('body').hasClass('single-agenda')) {
        // Setup flickity for speakers in agenda item
        let agenda_speakers_carousels = document.querySelectorAll('.agenda--item');

        for ( var i=0; i < agenda_speakers_carousels.length; i++ ) {
            let container = agenda_speakers_carousels[i];
            initCarouselContainers( container );
        }

        function initCarouselContainers(container) {
            let items = container.querySelector('.agenda--speakers');
            let total_speakers = container.querySelectorAll('.agenda--speaker');

            if(items && total_speakers.length > 3) {
                let agenda_speakers = new Flickity( items,{
                    wrapAround: false,
                    contain: true,
                    pageDots: false,
                    cellAlign: 'left'
                });

                // Dragging patch

                agenda_speakers.on( 'dragStart.flickity', function( e, pointer ) {
                    document.ontouchmove = function (e) {
                        e.preventDefault();
                    }
                });
                
                agenda_speakers.on( 'dragEnd.flickity', function( e, pointer ) {
                document.ontouchmove = function (e) {
                    return true;
                }
                });
                
            } else if (items) {
                $(items).addClass('flex');
            } else {

            }
        }

        // Clicking on flickity button don't open the description
        $('.flickity-button').on('click', function(e) {
            e.stopPropagation();
        });
    }

    // Overall Agenda Items
    let agenda_items = $('.agenda--items').isotope({
        itemSelecter: 'agenda--item'
    }); 

    // On both single agenda and single speaker page
    if($('body').hasClass('single-agenda') || $('body').hasClass('single-speakers')) {

        // On click of the agenda content display the full content 
        $('.agenda--inner').on('click', function() {
            $(this).find('.agenda--content').toggleClass('show-full');
            agenda_items.isotope('layout');
        });
    }

    // On single agenda page
    if($('body').hasClass('single-agenda')) {

        // Clicking on speaker don't open the description
        $('.agenda--speaker').on('click', function(e) {
            e.stopPropagation();
        });


        // Track sorting
        $('.agenda--track').on('click', function(e) {
            e.stopPropagation();
            e.preventDefault();
            let selected_track = $(this).data('track');
            agenda_items.isotope({
                filter: '.' + selected_track,
            });

            location.hash = 'filter=' + encodeURIComponent( selected_track );

            var target = $('#agenda-main');

            $('html, body').animate({
                scrollTop: target.offset().top - 90
              }, 1000, function() {
                // Callback after animation
                // Must change focus!
                target.focus();
            });
        });

        $('.tracks--single a').on('click', function(e) {
            e.preventDefault();

            let selected_track = $(this).data('track');
            agenda_items.isotope({
                filter: '.' + selected_track,
            });

            var target = $('#agenda-main');

            $('html, body').animate({
                scrollTop: target.offset().top - 90
              }, 1000, function() {
                // Callback after animation
                // Must change focus!
                target.focus();
            });

            location.hash = 'filter=' + encodeURIComponent( selected_track );

            noItemsCheck();
        });

        //If no items, show no items message
        var noItemsCheck = function() {
            if (!agenda_items.data("isotope").filteredItems.length) {
                $(".error-message").show();
            } 
        };

        // Opening tracks at a glance
        $('.tracks button').on('click', function() {
            $('.tracks--inner').css('height', '30vh');
            $('.tracks--inner').slideToggle();
            $(this).toggleClass('active');
            if($(this).hasClass('active')) {
                
            } else {
                
                var target = $('#agenda-main');

                $('html, body').animate({
                    scrollTop: target.offset().top - 90
                }, 1000, function() {
                    // Callback after animation
                    // Must change focus!
                    target.focus();
                });

                agenda_items.isotope({
                    filter: '*'
                });

                location.hash = "filter=all";
            }
        });

        // get the hash and set filter
        function getHashFilter() {
            let hash = location.hash;
            let matches = location.hash.match( /filter=([^&]+)/i );
            let hashFilter = matches && matches[1];

            return hashFilter && decodeURIComponent( hashFilter );
        }

        let hashFilter = getHashFilter();

        if (hashFilter) {

            let selected_track = hashFilter;

            if(selected_track == 'all') {

            } else {
                agenda_items.isotope({
                    filter: '.' + selected_track,
                });

                noItemsCheck();
            }
        }
        
        // On window resize make sure items layout is still good
        $(window).resize(function() {
            agenda_items.isotope('layout');
        });

    }



}