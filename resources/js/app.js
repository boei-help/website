import 'bootstrap';

global.$ = global.jQuery = require('jquery');

jQuery(function ($) {

    /**
     * Show demo here text on larger screens and shortly on mobile
     */
    if ($(window).width() > 1024) {
        // desktop
        $("#demo_here").toggleClass("d-none");
    } else {
        // mobile, show and hide
        setTimeout(function () {
            $("#demo_here").toggleClass("d-none");

            setTimeout(function () {
                $("#demo_here").toggleClass("d-none");
            }, (5 * 1000)); // seconds

        }, (5 * 1000)); // seconds
    }

    /**
     * Function that tracks a click on an outbound link. At A-href add class ext-tracked
     */
    $("a.ext-tracked").click(function (e) {
        var url = $(this).attr("href");

        // works even if blocked by adblock
        if (url == 'https://app.boei.help/register') {
            fbq('track', 'Lead');
        }

        $.get("/track", {type: 'outbound', name: url})
            .done(function () {
                document.location = url;
            });

        e.preventDefault();
    });
});
