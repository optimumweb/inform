$(document).ready(function() {

    var $sidebar = $('#sidebar');

    $('.menu-toggle').on('click', function(e) {
        e.preventDefault();

        var $this = $(this),
            href  = $this.attr('href'),
            $menu = $(href);

        if ( $menu.length > 0 ) {
            $menu.slideToggle();
        }
    });

    $('.post').each(function() {
        var $post           = $(this),
            $postHeader     = $post.children('.post-header'),
            $postCover      = $postHeader.children('.post-cover'),
            $postCoverImg   = $postCover.children('img'),
            postCoverImgSrc = $postCoverImg.attr('src');

        if ( typeof postCoverImgSrc !== 'undefined' && postCoverImgSrc.length > 0 ) {
            $postHeader.css('background-image', 'url(' + postCoverImgSrc + ')');
            $postCover.hide();
        }
    });

    if ( $sidebar.find('.post-author').length > 0 ) {
        $sidebar.addClass('raised');
    }

});