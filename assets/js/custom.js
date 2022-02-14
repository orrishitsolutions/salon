$(document).ready(function() {
    $('hamburger').click(function() {
        $('.drawer-list').toggleClass('addclass1')
        $(this).toggleClass('hamburger2')
    })
});

$(document).on('ready', function() {
    $(".vertical2").slick({
        dots: true,
        vertical: true,
        slidesToShow: 3,
        slidesToScroll: 3
    });
});
var owl = $('.owl-carousel444');
owl.owlCarousel({
    items: 1,
    loop: true,
    margin: 10,
    autoplay: true,
    animateOut: 'slideOutRight',
    slideSpeed: 3000,
    autoplayTimeout: 5000,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 1,
        },
        1000: {
            items: 1,
        },
    },
});
$('.play').on('click', function() {
    owl.trigger('play.owl.autoplay', [5000])
});
$('.stop').on('click', function() {
    owl.trigger('stop.owl.autoplay')
});
$('#owl-carousel00000').owlCarousel({
    loop: true,
    margin: 10,
    dots: true,
    nav: false,
    mouseDrag: false,
    animateOut: 'fadeOut',
    autoplay: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});
// $(".bnneer-sld").owlCarousel({
//     loop: true,
//     margin: 0,
//     dots: true,
//     autoplay: true,
//     autoplaySpeed: 500,
//     responsive: {
//         0: {
//             items: 1,
//         },
//         600: {
//             items: 1,
//         },
//         1000: {
//             items: 1,
//         },
//     },
// });
$(".firstservicetab1").on("click", function() {
    $(".firstservice").css('opacity', '0');
    $(".serdpser1").css('opacity', '1');

});
$(".firstservicetab2").on("click", function() {
    $(".firstservice").css('opacity', '0');
    $(".serdpser2").css('opacity', '1');

});

$(".firstservicetab3").on("click", function() {
    $(".firstservice").css('opacity', '0');
    $(".serdpser3").css('opacity', '1');

});

$(".firstservicetab4").on("click", function() {
    $(".firstservice").css('opacity', '0');
    $(".serdpser4").css('opacity', '1');

});

$(".firstservicetab5").on("click", function() {
    $(".firstservice").css('opacity', '0');
    $(".serdpser5").css('opacity', '1');

});
$('.owl-carousel234').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 4
        }
    }
});

$("#owl-carousel34").owlCarousel({
    loop: true,
    margin: 0,
    dots: true,
    autoplay: true,
    autoplaySpeed: 500,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 1,
        },
        1000: {
            items: 1,
        },
    },
});




$(document).ready(function() {
    var stickyTop = $('.header').offset().top;

    $(window).scroll(function() {
        var windowTop = $(window).scrollTop();
        $(".header").addClass("active");
        $(this).removeClass("active");
        if (stickyTop < windowTop) {
            $("body").addClass("sticky_header");
            $('.header').css({
                'position': 'fixed',
                'top': '0',
                'background': '#070920'
            });
            // $('.header').css('top', '0');
            // $('.header').css('background', '#070920');
            // $('.header').css('padding-bottom', '10px');

        } else {
            $("body").removeClass("sticky_header");
            $('.header').css({
                'position': 'relative',
                'top': '0',
                'background': 'transparent'
            });
            // $('.header').css('position', 'relative');
            // $('.header').css('background', 'transparent');
            // $('.header').css('padding-bottom', '0px');

        }
    });
    $(".line-toggle").click(function() {
        $("body").toggleClass("menu_active");
        if ($("body").hasClass("menu_active")) {
            $("header").append('<div class="overlay-wrapper"> </div>');
        } else {
            $("body").find(".overlay-wrapper").remove();
        }
    });
    $("body").on("click", ".overlay-wrapper", function() {
        $("body").removeClass("menu_active");
        $("body").find(".overlay-wrapper").remove();
    });
});
$('a.button.secondary.stop').click(function() {
    $("a.button.secondary.stop").hide();
    $("a.button.secondary.play").show();
});
$('a.button.secondary.play').click(function() {
    $("a.button.secondary.play").hide();
    $("a.button.secondary.stop").show();
});


//.sb-search-input input.sb-search-submit sb-icon-search1
$('.sb-search-input').click(function() {
    $(".megamenu.megamenu3").fadeToggle();
});
$('input.sb-search-submit').click(function() {
    $(".megamenu.megamenu3").hide();
});
$('.sb-icon-search1').click(function() {
    $(".megamenu.megamenu3").hide();
});






$('#owl-carousel11').owlCarousel({
    loop: true,
    margin: 10,
    dots: false,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});


$('.historySlider').owlCarousel({
    loop: true,
    margin: 10,
    dots: false,
    nav: true,
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 4
        },
        1000: {
            items: 6
        }
    }
});