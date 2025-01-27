export var blog = function () {
    
    // Ajax load more posts
    $(".btn--load-more").on("click", function () {
        var that = $(this);
        var ajaxUrl = that.data("url");
        var blog_message = $(".blog-message");
        var blogContainer = $(".blog-content");
        var current_page = that.data("page");
        var newPage = current_page+1;
        var blog_category = that.data("category");
        var sticky_post = $("article.type-post.sticky").data("post-id");
        var loading = $(".loader").addClass("active");
        // $(".btn--load-more").hide();
        
        // Load more button
        $.ajax({
            url: ajaxUrl,
            type: "post",
            data: {
                page: current_page,
                sticky: sticky_post,
                category: blog_category,
                action: "blog_load_more_posts"
            },
            error: function (response) { },
            success: function (response) {
                that.data("page", newPage);
                blogContainer.append(response);
                loading.removeClass("active");
                if (response.length == 0) {
                    blog_message.text("There are no more posts");
                    $(".btn--load-more").hide();
                }
                if($('body').hasClass('IE')){
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
                    ImgObjectFit();
                }
            }
        });
    });
};