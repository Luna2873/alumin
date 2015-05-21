$(document).ready(function(){ 
    $('.slideshow .cycle').after('<div class="slideshow-controls">').cycle({
        speed: 'fast',
        pager: '.slideshow-controls',
        timeout:6000,
        pause: true,
        pagerAnchorBuilder: function(index, el) {
        return '<a href="#"> </a>';
        } 
    });
    
    $('.slideshow-controls').click(function() {
        $(this).siblings('.cycle').cycle('pause');
    });
});