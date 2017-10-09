$(document).ready(function() {

    $('.menu-toggle').on('click', function(e) {
        e.preventDefault();

        var $this = $(this),
            href  = $this.attr('href'),
            $menu = $(href);

        if ( $menu.size() > 0 ) {
            $menu.slideToggle();
        }
    });

    $('.post').each(function() {
        var $post           = $(this),
            $postHeader     = $post.find('.post-header'),
            $postCover      = $postHeader.find('.post-cover'),
            $postCoverImg   = $postCover.find('img'),
            postCoverImgSrc = $postCoverImg.attr('src');

        if ( postCoverImgSrc.length > 0 ) {
            $postHeader.css('background-image', 'url(' + postCoverImgSrc + ')');
            $postCover.hide();
        }
    });

});