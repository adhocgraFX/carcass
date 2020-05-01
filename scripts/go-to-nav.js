// go to nav
jQuery(document).ready(function() {
    var offset = 120;
    var duration = 500;
    var $navdrawer = jQuery("#navdrawer");

    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.go-down').fadeOut(duration);
        } else {
            jQuery('.go-down').fadeIn(duration);
        }
    });

    jQuery('.go-down').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: ($navdrawer).offset().top}, duration);
        return false;
    })
});