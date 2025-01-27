
export let gravity = function() {

    $('.gform_body li').find('textarea').parent().prev('label').addClass('textarea-label');

    $('.gform_body li').find('textarea').parent().prev('label').parent().addClass('textarea');

    $('.gform_body li').find('.ginput_container_radio').prev('label').addClass('radio-btns');

    $('.gform_body li').find('.ginput_container_radio').prev('label').parent().addClass('radio-btns');

    $('.gform_body li').find('.ginput_container_checkbox').parent().addClass('checkbox');


}