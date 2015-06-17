$(document).ready(function(){ 
    $('.slideshow .cycle').cycle({
        speed: 'fast',
        pager: '.slideshow-controls',
        timeout:6000,
        pause: true,
        pagerAnchorBuilder: function(index, el) {
        return '<a href="#">123</a>';
        } 
    });
    /*
    $('.slideshow-controls').click(function() {
        $(this).siblings('.cycle').cycle('pause');
    });*/
});