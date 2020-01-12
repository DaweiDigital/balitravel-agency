$(document).ready(function () {
    var isTouchDevice = 'ontouchstart' in document.documentElement;
    if (isTouchDevice) {
        $('html').removeClass('no-touch');
    }

    lightGallery(document.getElementById('aniimated-thumbnials'), {
        thumbnail: true
    });

    new ClipboardJS('.js-copy-text');

    $(".js-copy-text").on("click", function () {
        var currentClick = $(this);

        currentClick.find(".tooltip-clipboard").addClass("succed");

        setTimeout(function () {
            currentClick.find(".tooltip-clipboard").removeClass("succed");
        }, 3000);
    });

    var lh = [];
    var wscroll = 0;
    var wh = $(window).height();

    function update_offsets() {
        $('.lazy-bg').each(function () {
            var x = $(this).offset().top;
            lh.push(x);
        });
    };

    function lazy() {
        wscroll = $(window).scrollTop();
        for (i = 0; i < lh.length; i++) {
            if (lh[i] <= wscroll + (wh - 200)) {
                var imgUrl = $('.lazy-bg').eq(i).attr("data-lazy-bg-md");
                $('.lazy-bg').eq(i).css('background-image', 'url(' + imgUrl + ')');

                if (window.matchMedia("(min-width: 80.625em)").matches) {
                    var imgUrllg = $('.lazy-bg').eq(i).attr("data-lazy-bg-lg");
                    $('.lazy-bg').eq(i).css('background-image', 'url(' + imgUrllg + ')');
                }

                if (window.matchMedia("(min-width: 62.500em) and (max-width: 80.563em)").matches) {
                    var imgUrlmd = $('.lazy-bg').eq(i).attr("data-lazy-bg-md");
                    $('.lazy-bg').eq(i).css('background-image', 'url(' + imgUrlmd + ')');
                }

                if (window.matchMedia("(min-width: 48em) and (max-width: 62.438em)").matches) {
                    var imgUrlsm = $('.lazy-bg').eq(i).attr("data-lazy-bg-sm");
                    $('.lazy-bg').eq(i).css('background-image', 'url(' + imgUrlsm + ')');
                }

                if (window.matchMedia("(max-width: 47.938em)").matches) {
                    var imgUrlxs = $('.lazy-bg').eq(i).attr("data-lazy-bg-xs");
                    $('.lazy-bg').eq(i).css('background-image', 'url(' + imgUrlxs + ')');
                }
            };
        };
    };

    // Page Load
    update_offsets();
    lazy();

    $(window).on("resize", function () {
        lazy();
    });

    $(window).on('scroll', function () {
        lazy();
    });

    if (window.matchMedia("(max-width: 47.938em)").matches) {
        $("html").addClass("bpXs");

        $(document).on("click touchstart", ".js-overlay, .js-close", function (e) {
            $(".hamburger").removeClass("is-show");
            $('.nav-mobile').removeClass("is-active");
            $("html").removeClass("responsive-menu-is-show");
            e.preventDefault();
        });

        /**
         * Hamburger
         */
        $(".hamburger").click(function (e) {
            e.preventDefault();
            if ($(".nav-mobile").hasClass("is-active")) {
                $("html").removeClass("responsive-menu-is-show");
                $('.nav-mobile').removeClass("is-active");
            } else {
                $("html").addClass("responsive-menu-is-show");
                $('.nav-mobile').addClass("is-active");
            }
        });
    };

    $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function (event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
            location.hostname == this.hostname
        ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 85
                }, 1000, function () {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                });
            }
        }
    });

    /**
     * Cookies Info
     */
    // if (readCookie("cookies_info") != "1"){
    // 	$('.cookies-info').delay(1000).slideDown(500);
    // }
    //
    // $('.cookies-info-button').click(function() {
    // 	createCookie("cookies_info", "1", 30);
    // 	$('.cookies-info').slideUp();
    // 	// loadScripts();
    // });


});