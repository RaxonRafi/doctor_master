(function ($) {
    "use strict"; // Start of use strict
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass("ti-control-skip-backward ti-control-skip-forward");
    });
    /*Loader Javascript
    -------------------*/
    var window_var = $(window);
    window_var.on('load', function () {
        $(".loading").fadeOut("fast");
    });
    // scroll to top
    $(window).on('scroll',function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').on('click', function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    // scroll to top End


    // fullscreen function
    $(".fullscreen").on('click', function () {
        if (document.webkitCurrentFullScreenElement == null) {
            document.documentElement.webkitRequestFullScreen();
        } else {
            document.webkitCancelFullScreen();
        }
    });
    // fullscreen function End
})(jQuery);
