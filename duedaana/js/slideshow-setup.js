$(document).ready(function(){ 
    $('.slideshow .cycle').cycle({
        speed: 'fast',
        pager: '.dot',
        timeout:6000,
        pause: true,
        pagerAnchorBuilder: function(index, el) {
       // return '<a class="service" href="#" >&bull;</a>';
       return '<li></li>';
        } 
    });
    /*
    $('.slideshow-controls').click(function() {
        $(this).siblings('.cycle').cycle('pause');
    });*/
});