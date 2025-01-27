
export let images = function() {

    function ImgObjectFit() {
        
        $('.obj-fit').each(function(){
            let imgSrc = $(this).find('img').attr('src');
            let fitType = '';
            if($(this).hasClass('contain')){
                fitType = 'contain';
            } else {
                fitType = 'cover';
            }
            $(this).css({ 'background' : 'transparent url("'+imgSrc+'") no-repeat center center/'+fitType, });
            $(this).find('img').remove(); 
        });

    }
      

    if (navigator.appName == 'Microsoft Internet Explorer' ||  !!(navigator.userAgent.match(/Trident/) || navigator.userAgent.match(/rv:11/)) || (typeof $.browser !== "undefined" && $.browser.msie == 1)) {
        setTimeout(function(){
            ImgObjectFit();
        }, 3000);
    }


}