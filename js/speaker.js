
export let speaker = function() {

    $('.speaker-agenda--single-container').each(function() {
        let amount_of_single_agenda_items = $(this).find('.agenda--item').length;
        
        if(amount_of_single_agenda_items == 0) {
            $(this).prev('.speaker-agenda--day').addClass('hide');
        }
    });


}