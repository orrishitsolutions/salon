$('.menu1').mouseenter(function() {
    $('.part3slidemenu11').removeClass('active');
    $('.menu1:first a:first').removeClass('active3');
});
$('.menu1').mouseleave(function() {
    $('.part3slidemenu11').addClass('active');
    $('.menu1:first a:first').addClass('active3');
});
$('.menu2').mouseenter(function() {
    $('.paramenus11').removeClass('active');
    $('.part3slidemenu11').removeClass('active');
});
$('.menu2').mouseleave(function() {
    $('.part3slidemenu11').addClass('active');
    $('.paramenus11').addClass('active');
});

$('#slider-sec1').click(function() {
    $(".aboutsimgd").hide();
    $('.slick-slide1').removeClass('bg-black');
    $('#slider-sec1').addClass('bg-black');
    $("#box01").show();
});

$('#slider-sec2').click(function() {
    $(".aboutsimgd").hide();
    $('.slick-slide1').removeClass('bg-black');
    $('#slider-sec2').addClass('bg-black');
    $("#box02").show();
});

$('#slider-sec3').click(function() {
    $(".aboutsimgd").hide();
    $('.slick-slide1').removeClass('bg-black');
    $('#slider-sec3').addClass('bg-black');
    $("#box03").show();
});

$('#slider-sec4').click(function() {
    $(".aboutsimgd").hide();
    $('.slick-slide1').removeClass('bg-black');
    $('#slider-sec4').addClass('bg-black');
    $("#box04").show();
});

$('#slider-sec5').click(function() {
    $(".aboutsimgd").hide();
    $('.slick-slide1').removeClass('bg-black');
    $('#slider-sec5').addClass('bg-black');
    $("#box05").show();
});

$('#slider-sec6').click(function() {
    $(".aboutsimgd").hide();
    $('.slick-slide1').removeClass('bg-black');
    $('#slider-sec6').addClass('bg-black');
    $("#box06").show();
});

$('#slider-sec7').click(function() {
    $(".aboutsimgd0").hide();
    $('.slidpara19').removeClass('bg-black');
    $('#slider-sec7').addClass('bg-black');
    $("#box07").show();
});
$('#slider-sec8').click(function() {
    $(".aboutsimgd0").hide();
    $('.slidpara19').removeClass('bg-black');
    $('#slider-sec8').addClass('bg-black');
    $("#box08").show();
});
$('#slider-sec9').click(function() {
    $(".aboutsimgd0").hide();
    $('.slidpara19').removeClass('bg-black');
    $('#slider-sec9').addClass('bg-black');
    $("#box09").show();
});
$('#slider-sec10').click(function() {
    $(".aboutsimgd0").hide();
    $('.slidpara19').removeClass('bg-black');
    $('#slider-sec10').addClass('bg-black');
    $("#box010").show();
});
$('#slider-sec11').click(function() {
    $(".aboutsimgd0").hide();
    $('.slidpara19').removeClass('bg-black');
    $('#slider-sec11').addClass('bg-black');
    $("#box011").show();
});
$('#slider-sec12').click(function() {
    $(".aboutsimgd0").hide();
    $('.slidpara19').removeClass('bg-black');
    $('#slider-sec12').addClass('bg-black');
    $("#box012").show();
});

$('.mensalons1').click(function() {
    $(".womensalon").css('opacity', '0');
    $(".mensalon").css('opacity', '1');
});
$('.womensalons1').click(function() {
    $(".mensalon").css('opacity', '0');
    $(".womensalon").css('opacity', '1');
});


$(".owl-carousel8").owlCarousel({
    loop: true,
    margin: 20,
    autoplay: true,
    dots: false,
    nav: false,
    autoplayTimeout: 2000,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 3,
        },
        1000: {
            items: 6,
        },
    },
});

function showSignUpModal() {
    $("#twomodallabel").modal("hide");
    $("#exampleModal").modal("show");
};
$('#formRanking2a').owlCarousel({
    loop: true,
    margin: 10,
    autoplay: false,
    autoplayTimeout: 3000,
    dots: true,
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
$('.formRanking2a').owlCarousel({
    loop: true,
    margin: 10,
    autoplay: false,
    autoplayTimeout: 3000,
    dots: true,
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
$('.offerservices').owlCarousel({
    loop: true,
    margin: 0,
    autoplay: true,
    autoplayTimeout: 3000,
    dots: true,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 6
        }
    }
});
$(document).ready(function() {
    $(".owl-carousel45").owlCarousel({
        items: 3,
        loop: false,
        mouseDrag: false,
        touchDrag: false,
        pullDrag: false,
        rewind: true,
        autoplay: true,
        margin: 0,
        nav: true
    });
});
$(".aboutimg1").click(function() {
    $(".about-about1").hide();
    $(".aboutbig1").show();
});

$(".aboutimg2").click(function() {
    $(".about-about1").hide();
    $(".aboutbig2").show();
});

$(".aboutimg3").click(function() {
    $(".about-about1").hide();
    $(".aboutbig3").show();
});
$(document).on('ready', function() {
    $(".vertical-center-4").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 4,
        slidesToScroll: 2
    });
    $(".vertical-center-3").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 3
    });
    $(".vertical-center-2").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 2,
        slidesToScroll: 2
    });
    $(".vertical-center").slick({
        dots: true,
        autoplay: true,
        vertical: true,
        autoplaySpeed: 1000,
        cssEase: 'linear',
        infinite: true,
        speed: 1000,
        centerMode: true,
    });
    $(".vertical").slick({
        dots: true,
        vertical: true,
        slidesToShow: 3,
        slidesToScroll: 3
    });
    $(".vertical2").slick({
        dots: true,
        vertical: true,
        slidesToShow: 3,
        slidesToScroll: 3
    });
    $(".center").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3
    });
    $(".variable").slick({
        dots: true,
        infinite: true,
        variableWidth: true
    });
    $(".lazy").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true
    });
});


$('.agents-carousel1').owlCarousel({
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



$('.owl-carousel0202').owlCarousel({
    loop: true,
    margin: 10,
    dots: true,
    nav: false,
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
$('.owl-carousel02021').owlCarousel({
    loop: true,
    margin: 10,
    dots: true,
    nav: false,
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

$('.owl-carousel00000').owlCarousel({
    loop: true,
    margin: 10,
    dots: true,
    nav: false,
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

$('.owl-carousel000002').owlCarousel({
    loop: true,
    margin: 10,
    dots: true,
    nav: false,
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
$('.about-owl').owlCarousel({
    loop: true,
    margin: 0,
    autoplay: true,
    nav: true,
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
$('.about-ribbon1').owlCarousel({
    loop: true,
    margin: 0,
    autoplay: true,
	dots:false,
    nav: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 7
        }
    }
});
$('.slide-1').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
	dots:false,
    autoplay: false,
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

$('.slide-2').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
	dots:false,
    autoplay: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 5
        },
        1000: {
            items: 5
        }
    }
});

$('.slide-3').owlCarousel({
    loop: true,
    margin: 20,
    nav: false,
	dots:false,
    autoplay: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
});

$("#navbarDropdown").on("click", function() {
    $("#2a").addClass("d-none");
    $(".dropdown-menu").toggle();
    $(".dropdown-menu").css("border-radius", "5px");
});

$("#tabone").on("click", function() {
    $("#2a").addClass("d-none");
    $("#1a").removeClass("d-none");
    $("#tabtwo").removeClass("active");
    $("#tabone").addClass("active");
});

$("#tabtwo").on("click", function() {
    $("#1a").addClass("d-none");
    $("#2a").removeClass("d-none");
    $("#tabone").removeClass("active");
    $("#tabtwo").addClass("active");
});

$('.trans-dot.dot1').click(function() {
    $(".colams-dp").removeClass("opacity1");
    $(".colams-dp.colams1-dp").addClass("opacity1");
    $(".trans-dot").removeClass("active");
    $(".dot1").addClass("active");
});
$('.trans-dot.dot2').click(function() {
    $(".colams-dp").removeClass("opacity1");
    $(".colams-dp.colams2-dp").addClass("opacity1");
    $(".trans-dot").removeClass("active");
    $(".dot2").addClass("active");
});

$('.trans-dot.dot3').click(function() {
    $(".colams-dp").removeClass("opacity1");
    $(".colams-dp.colams3-dp").addClass("opacity1");
    $(".trans-dot").removeClass("active");
    $(".dot3").addClass("active");
});

$('.trans-dot.dot4').click(function() {
    $(".colams-dp").removeClass("opacity1");
    $(".colams-dp.colams4-dp").addClass("opacity1");
    $(".trans-dot").removeClass("active");
    $(".dot4").addClass("active");
});

$('.trans-dot.dot5').click(function() {
    $(".colams-dp").removeClass("opacity1");
    $(".colams-dp.colams5-dp").addClass("opacity1");
    $(".trans-dot").removeClass("active");
    $(".dot5").addClass("active");
});

$('.trans-dot.dot6').click(function() {
    $(".colams-dp").removeClass("opacity1");
    $(".colams-dp.colams6-dp").addClass("opacity1");
    $(".trans-dot").removeClass("active");
    $(".dot6").addClass("active");
});

$('.trans-dot.dot7').click(function() {
    $(".colams-dp").removeClass("opacity1");
    $(".colams-dp.colams7-dp").addClass("opacity1");
    $(".trans-dot").removeClass("active");
    $(".dot7").addClass("active");
});




// $('.trans-dot .dot1').click(function() {
//     $('colams-dp1').addClass('active-opacity').siblings().removeClass('active-opacity');
//     $('.trans-dot dot1').addClass('active').siblings().removeClass('active');
// });
// $('li').click(function() {
//     $(this).addClass('')
//     $('div').addClass('').siblings().removeClass();
// });
// sb-icon-search.bg-black1
$('.sb-icon-search').click(function() {
    $('.sb-search').addClass('sb-search-open');
    $('.sb-icon-search').hide();
    $('.sb-icon-search1').show();
});
$('.sb-icon-search1').click(function() {
    $('.sb-search').removeClass('sb-search-open');
    $('.sb-icon-search1').hide();
    $('.sb-icon-search').show();
});

// $('.sb-icon-search.bg-black1').click(function() {
//     $('.sb-search').removeClass('bg-black').siblings().removeClass('bg-black');

// });

$(".login-fomr-dp1").on("click", function() {
    $(".ulanes123-dp").hide();
    $('.pop-up1 li.pop-login1').removeClass('active');
    $(".login-fomr-dp1").addClass('active');

    $(".ulanes123-dp1").show();
});
$(".login-fomr-dp2").on("click", function() {
    $(".ulanes123-dp").hide();
    $('.pop-up1 li.pop-login1').removeClass('active');
    $(".login-fomr-dp2").addClass('active');
    $(".ulanes123-dp2").show();
});
$(".login-fomr-dp3").on("click", function() {
    $('.pop-up1 li.pop-login1').removeClass('active');
    $(".ulanes123-dp").hide();
    $(".ulanes123-dp3").show();
});
$('#nine-slider').owlCarousel({
    loop: false,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 3
        }
    }
});
$('.nine-slider').owlCarousel({
    loop: false,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 3
        }
    }
});

function segments(evt, cityName) {
    var i, seg_tabcontent, seg_tablinks;
    seg_tabcontent = document.getElementsByClassName("seg_tabcontent");
    for (i = 0; i < seg_tabcontent.length; i++) {
        seg_tabcontent[i].style.display = "none";
    }
    var seg_tablinks = document.getElementsByClassName("seg_tablinks");
    for (i = 0; i < seg_tablinks.length; i++) {
        seg_tablinks[i].className = seg_tablinks[i].className.replace("active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className = "active;"
}

document.getBody;

$(".pkg-owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 3,
        },
        1000: {
            items: 4,
        },
    },
});
$(".pkg-owl-carousel2").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 3,
        },
        1000: {
            items: 4,
        },
    },
});
$(".pkg-owl-carousel3").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 3,
        },
        1000: {
            items: 4,
        },
    },
});
$(".pkg-owl-carousel4").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 3,
        },
        1000: {
            items: 4,
        },
    },
});
$(".owl-carousel6").owlCarousel({
    loop: true,
    margin: 10,
	dots:true,
    nav: false,
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
$("#listing-toggle li ").on("click", function() {
    $("#listing-toggle li ").removeClass('active');
    $(this).addClass('active');

});
$(".right-section ul.nav.nav-tabs li ").on("click", function() {
    $(".right-section ul.nav.nav-tabs li ").removeClass('active');
    $(this).addClass('active');

});
$(".services-dp1").on("click", function() {
    $(".package-slider").hide();
    $(".package-slider1").show();
});
$(".services-dp2").on("click", function() {

    $(".package-slider").hide();
    $(".package-slider2").show();
});
$(".services-dp3").on("click", function() {

    $(".package-slider").hide();
    $(".package-slider3").show();
});
$(".services-dp4").on("click", function() {

    $(".package-slider").hide();
    $(".package-slider4").show();
});

$(".selected").on("click", function() {
    $('.options-container2').removeClass('active');
    $('.options-container3').removeClass('active');
    $('.options-container').toggleClass('active');
});
$(".selected2").on("click", function() {
    $('.options-container').removeClass('active');
    $('.options-container3').removeClass('active');
    $('.options-container2').toggleClass('active');
});
$(".selected3").on("click", function() {
    $('.options-container2').removeClass('active');
    $('.options-container1').removeClass('active');
    $('.options-container3').toggleClass('active');
});


$(".div-tab-dps ul li ").on("click", function() {
    $(".div-tab-dps ul li ").removeClass('active');
    $(this).addClass('active');

});


$(".col-tabs-1 ").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-1").addClass('active');

});

$(".col-tabs-2 ").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-2").addClass('active');

});

$(".col-tabs-3 ").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-3").addClass('active');

});

$(".col-tabs-4 ").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-4").addClass('active');

});

$(".col-tabs-5 ").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-5").addClass('active');

});

$(".col-tabs-6 ").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-6").addClass('active');

});

$(".col-tabs-7 ").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-7").addClass('active');

});
$(".col-tabs-8 ").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-8").addClass('active');

});
$(".col-tabs-9 ").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-9").addClass('active');

});
$(".col-tabs-10 ").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-10").addClass('active');

});
$(".col-tabs-11").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-11").addClass('active');

});
$(".col-tabs-12").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-12").addClass('active');

});
$(".col-tabs-13").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-13").addClass('active');

});
$(".col-tabs-13").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-13").addClass('active');

});
$(".col-tabs-13").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-13").addClass('active');

});
$(".col-tabs-14").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-14").addClass('active');

});
$(".col-tabs-15").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-15").addClass('active');

});
$(".col-tabs-16").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-16").addClass('active');

});
$(".col-tabs-17 ").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-17").addClass('active');

});
$(".col-tabs-18").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-18").addClass('active');

});
$(".col-tabs-19").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-19").addClass('active');

});
$(".col-tabs-20").on("click", function() {
    $(".div-tab-dps.sections ul li ").removeClass('active');
    $(".col-tabs-20").addClass('active');

});



$(".box-ind1").on("click", function() {
    $(".box-ind").removeClass('active');
    $(".box-ind1").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views1").addClass('active');

});

$(".box-ind2").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind2").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views2").addClass('active');

});

$(".box-ind3").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind3").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views3").addClass('active');

});

$(".box-ind4").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind4").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views4").addClass('active');

});

$(".box-ind5").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind5").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views5").addClass('active');

});

$(".box-ind6").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind6").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views6").addClass('active');

});
$(".box-ind7").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind7").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views7").addClass('active');

});
$(".box-ind8").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind8").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views8").addClass('active');

});
$(".box-ind9").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind9").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views9").addClass('active');

});
$(".box-ind10").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind10").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views10").addClass('active');

});
$(".box-ind11").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind11").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views11").addClass('active');

});
$(".box-ind12").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind12").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views12").addClass('active');

});
$(".box-ind13").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind13").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views13").addClass('active');

});
$(".box-ind14").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind14").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views14").addClass('active');

});
$(".box-ind15").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind15").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views15").addClass('active');

});
$(".box-ind16").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind16").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views16").addClass('active');

});
$(".box-ind17").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind17").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views17").addClass('active');

});
$(".box-ind18").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind18").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views18").addClass('active');

});
$(".box-ind19").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind19").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views19").addClass('active');

});
$(".box-ind20").on("click", function() {
	  $(".box-ind").removeClass('active');
    $(".box-ind20").addClass('active');
    $(".service-views").removeClass('active');
    $(".service-views20").addClass('active');

});
///////////////////////////

$(".box-ind1b").on("click", function() {
	  $(".service-viewsb").removeClass('active');
    $(".service-views1b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind1b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});

$(".box-ind2b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views2b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind2b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind3b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views3b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind3b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind4b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views4b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind4b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind5b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views5b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind5b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind6b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views6b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind6b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind7b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views7b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind7b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind8b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views8b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind8b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind9b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views9b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind9b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind10b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views10b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind10b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind11b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views11b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind11b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind12b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views12b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind12b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind13b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views13b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind13b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind14b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views14b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind14b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind15b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views15b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind15b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind16b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views16b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind16b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind17b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views17b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind17b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind18b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views18b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind18b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind19b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views19b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind19b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".box-ind20b").on("click", function() {
		  $(".service-viewsb").removeClass('active');
    $(".service-views20b").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind20b").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
///////////////////

$(".box-ind1c").on("click", function() {
	  $(".service-viewsc").removeClass('active');
    $(".service-views1c").addClass('active');
	  $(".box-indc").removeClass('active');
    $(".box-ind1c").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection3").addClass('active');

});

$(".box-ind2c").on("click", function() {
		  $(".service-viewsc").removeClass('active');
    $(".service-views2c").addClass('active');
	  $(".box-indc").removeClass('active');
    $(".box-ind2c").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection3").addClass('active');

});
$(".box-ind3c").on("click", function() {
		  $(".service-viewsc").removeClass('active');
    $(".service-views3c").addClass('active');
	  $(".box-indc").removeClass('active');
    $(".box-ind3c").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection3").addClass('active');

});
$(".box-ind4c").on("click", function() {
		  $(".service-viewsc").removeClass('active');
    $(".service-views4c").addClass('active');
	  $(".box-indc").removeClass('active');
    $(".box-ind4c").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection3").addClass('active');

});
$(".box-ind5c").on("click", function() {
		  $(".service-viewsc").removeClass('active');
    $(".service-views5c").addClass('active');
	  $(".box-indc").removeClass('active');
    $(".box-ind5c").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection3").addClass('active');

});
$(".box-ind6c").on("click", function() {
		  $(".service-viewsc").removeClass('active');
    $(".service-views6c").addClass('active');
	  $(".box-indc").removeClass('active');
    $(".box-ind6c").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection3").addClass('active');

});
$(".box-ind7c").on("click", function() {
		  $(".service-viewsc").removeClass('active');
    $(".service-views7c").addClass('active');
	  $(".box-indb").removeClass('active');
    $(".box-ind7c").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection3").addClass('active');

});



///////////////////

$(".box-ind1d").on("click", function() {
	  $(".service-viewsd").removeClass('active');
    $(".service-views1d").addClass('active');
	  $(".box-indd").removeClass('active');
    $(".box-ind1d").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection4").addClass('active');

});

$(".box-ind2d").on("click", function() {
		  $(".service-viewsd").removeClass('active');
    $(".service-views2d").addClass('active');
	  $(".box-indd").removeClass('active');
    $(".box-ind2d").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection4").addClass('active');

});
$(".box-ind3d").on("click", function() {
		  $(".service-viewsd").removeClass('active');
    $(".service-views3d").addClass('active');
	  $(".box-indd").removeClass('active');
    $(".box-ind3d").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection4").addClass('active');

});
$(".box-ind4d").on("click", function() {
		  $(".service-viewsd").removeClass('active');
    $(".service-views4d").addClass('active');
	  $(".box-indd").removeClass('active');
    $(".box-ind4d").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection4").addClass('active');

});
$(".box-ind5d").on("click", function() {
		  $(".service-viewsd").removeClass('active');
    $(".service-views5d").addClass('active');
	  $(".box-indd").removeClass('active');
    $(".box-ind5d").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection4").addClass('active');

});
$(".box-ind6d").on("click", function() {
		  $(".service-viewsd").removeClass('active');
    $(".service-views6d").addClass('active');
	  $(".box-indd").removeClass('active');
    $(".box-ind6d").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection4").addClass('active');

});
$(".box-ind7d").on("click", function() {
		  $(".service-viewsd").removeClass('active');
    $(".service-views7d").addClass('active');
	  $(".box-indd").removeClass('active');
    $(".box-ind7d").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection4").addClass('active');

});
///////////////////

$(".box-ind1e").on("click", function() {
	  $(".service-viewse").removeClass('active');
    $(".service-views1e").addClass('active');
	  $(".box-inde").removeClass('active');
    $(".box-ind1e").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection5").addClass('active');

});

$(".box-ind2e").on("click", function() {
		  $(".service-viewse").removeClass('active');
    $(".service-views2e").addClass('active');
	  $(".box-inde").removeClass('active');
    $(".box-ind2e").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection5").addClass('active');

});
$(".box-ind3e").on("click", function() {
		  $(".service-viewse").removeClass('active');
    $(".service-views3e").addClass('active');
	  $(".box-inde").removeClass('active');
    $(".box-ind3e").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection5").addClass('active');

});
$(".box-ind4e").on("click", function() {
		  $(".service-viewse").removeClass('active');
    $(".service-views4e").addClass('active');
	  $(".box-inde").removeClass('active');
    $(".box-ind4e").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection5").addClass('active');

});
$(".box-ind5e").on("click", function() {
		  $(".service-viewse").removeClass('active');
    $(".service-views5e").addClass('active');
	  $(".box-inde").removeClass('active');
    $(".box-ind5e").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection5").addClass('active');

});
$(".box-ind6e").on("click", function() {
		  $(".service-viewse").removeClass('active');
    $(".service-views6e").addClass('active');
	  $(".box-inde").removeClass('active');
    $(".box-ind6e").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection5").addClass('active');

});
$(".box-ind7e").on("click", function() {
		  $(".service-viewse").removeClass('active');
    $(".service-views7e").addClass('active');
	  $(".box-inde").removeClass('active');
    $(".box-ind7e").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection5").addClass('active');

});

///////////////////

$(".box-ind1f").on("click", function() {
	  $(".service-viewsf").removeClass('active');
    $(".service-views1f").addClass('active');
	  $(".box-indf").removeClass('active');
    $(".box-ind1f").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection6").addClass('active');

});

$(".box-ind2f").on("click", function() {
		  $(".service-viewsf").removeClass('active');
    $(".service-views2f").addClass('active');
	  $(".box-indf").removeClass('active');
    $(".box-ind2f").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection6").addClass('active');

});
$(".box-ind3f").on("click", function() {
		  $(".service-viewsf").removeClass('active');
    $(".service-views3f").addClass('active');
	  $(".box-indf").removeClass('active');
    $(".box-ind3f").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection6").addClass('active');

});
$(".box-ind4f").on("click", function() {
		  $(".service-viewsf").removeClass('active');
    $(".service-views4f").addClass('active');
	  $(".box-indf").removeClass('active');
    $(".box-ind4f").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection6").addClass('active');

});
$(".box-ind5f").on("click", function() {
		  $(".service-viewsf").removeClass('active');
    $(".service-views5f").addClass('active');
	  $(".box-indf").removeClass('active');
    $(".box-ind5f").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection6").addClass('active');

});
$(".box-ind6f").on("click", function() {
		  $(".service-viewsf").removeClass('active');
    $(".service-views6f").addClass('active');
	  $(".box-indf").removeClass('active');
    $(".box-ind6f").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection6").addClass('active');

});
$(".box-ind7f").on("click", function() {
		  $(".service-viewsf").removeClass('active');
    $(".service-views7f").addClass('active');
	  $(".box-indf").removeClass('active');
    $(".box-ind7f").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection6").addClass('active');

});
///////////////////

$(".box-ind1g").on("click", function() {
	  $(".service-viewsg").removeClass('active');
    $(".service-views1g").addClass('active');
	  $(".box-indg").removeClass('active');
    $(".box-ind1g").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection7").addClass('active');

});

$(".box-ind2g").on("click", function() {
		  $(".service-viewsg").removeClass('active');
    $(".service-views2g").addClass('active');
	  $(".box-indg").removeClass('active');
    $(".box-ind2g").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection7").addClass('active');

});
$(".box-ind3g").on("click", function() {
		  $(".service-viewsg").removeClass('active');
    $(".service-views3g").addClass('active');
	  $(".box-indg").removeClass('active');
    $(".box-ind3g").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection7").addClass('active');

});
$(".box-ind4g").on("click", function() {
		  $(".service-viewsg").removeClass('active');
    $(".service-views4g").addClass('active');
	  $(".box-indg").removeClass('active');
    $(".box-ind4g").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection7").addClass('active');

});
$(".box-ind5g").on("click", function() {
		  $(".service-viewsg").removeClass('active');
    $(".service-views5g").addClass('active');
	  $(".box-indg").removeClass('active');
    $(".box-ind5g").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection7").addClass('active');

});
$(".box-ind6g").on("click", function() {
		  $(".service-viewsg").removeClass('active');
    $(".service-views6g").addClass('active');
	  $(".box-indg").removeClass('active');
    $(".box-ind6g").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection7").addClass('active');

});
$(".box-ind7g").on("click", function() {
		  $(".service-viewsg").removeClass('active');
    $(".service-views7g").addClass('active');
	  $(".box-indg").removeClass('active');
    $(".box-ind7g").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection7").addClass('active');

});

///////////////////

$(".box-ind1h").on("click", function() {
	  $(".service-viewsh").removeClass('active');
    $(".service-views1h").addClass('active');
	  $(".box-indh").removeClass('active');
    $(".box-ind1h").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection8").addClass('active');

});

$(".box-ind2h").on("click", function() {
		  $(".service-viewsh").removeClass('active');
    $(".service-views2h").addClass('active');
	  $(".box-indh").removeClass('active');
    $(".box-ind2h").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection8").addClass('active');

});
$(".box-ind3h").on("click", function() {
		  $(".service-viewsh").removeClass('active');
    $(".service-views3h").addClass('active');
	  $(".box-indh").removeClass('active');
    $(".box-ind3h").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection8").addClass('active');

});
$(".box-ind4h").on("click", function() {
		  $(".service-viewsh").removeClass('active');
    $(".service-views4h").addClass('active');
	  $(".box-indh").removeClass('active');
    $(".box-ind4h").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection8").addClass('active');

});
$(".box-ind5h").on("click", function() {
		  $(".service-viewsh").removeClass('active');
    $(".service-views5h").addClass('active');
	  $(".box-indh").removeClass('active');
    $(".box-ind5h").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection8").addClass('active');

});
$(".box-ind6h").on("click", function() {
		  $(".service-viewsh").removeClass('active');
    $(".service-views6h").addClass('active');
	  $(".box-indh").removeClass('active');
    $(".box-ind6h").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection8").addClass('active');

});
$(".box-ind7h").on("click", function() {
		  $(".service-viewsh").removeClass('active');
    $(".service-views7h").addClass('active');
	  $(".box-indh").removeClass('active');
    $(".box-ind7h").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection8").addClass('active');

});
///////////////////

$(".box-ind1i").on("click", function() {
	  $(".service-viewsi").removeClass('active');
    $(".service-views1i").addClass('active');
	  $(".box-indi").removeClass('active');
    $(".box-ind1i").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection9").addClass('active');

});

$(".box-ind2i").on("click", function() {
		  $(".service-viewsi").removeClass('active');
    $(".service-views2i").addClass('active');
	  $(".box-indi").removeClass('active');
    $(".box-ind2i").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection9").addClass('active');

});
$(".box-ind3i").on("click", function() {
		  $(".service-viewsi").removeClass('active');
    $(".service-views3i").addClass('active');
	  $(".box-indi").removeClass('active');
    $(".box-ind3i").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection9").addClass('active');

});
$(".box-ind4i").on("click", function() {
		  $(".service-viewsi").removeClass('active');
    $(".service-views4i").addClass('active');
	  $(".box-indi").removeClass('active');
    $(".box-ind4i").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection9").addClass('active');

});
$(".box-ind5i").on("click", function() {
		  $(".service-viewsi").removeClass('active');
    $(".service-views5i").addClass('active');
	  $(".box-indi").removeClass('active');
    $(".box-ind5i").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection9").addClass('active');

});
$(".box-ind6i").on("click", function() {
		  $(".service-viewsi").removeClass('active');
    $(".service-views6i").addClass('active');
	  $(".box-indi").removeClass('active');
    $(".box-ind6i").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection9").addClass('active');

});
$(".box-ind7i").on("click", function() {
		  $(".service-viewsi").removeClass('active');
    $(".service-views7i").addClass('active');
	  $(".box-indi").removeClass('active');
    $(".box-ind7i").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection9").addClass('active');

});
///////////////////

$(".box-ind1j").on("click", function() {
	  $(".service-viewsj").removeClass('active');
    $(".service-views1j").addClass('active');
	  $(".box-indj").removeClass('active');
    $(".box-ind1j").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection10").addClass('active');

});

$(".box-ind2j").on("click", function() {
		  $(".service-viewsj").removeClass('active');
    $(".service-views2j").addClass('active');
	  $(".box-indj").removeClass('active');
    $(".box-ind2j").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection10").addClass('active');

});
$(".box-ind3j").on("click", function() {
		  $(".service-viewsj").removeClass('active');
    $(".service-views3j").addClass('active');
	  $(".box-indj").removeClass('active');
    $(".box-ind3j").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection10").addClass('active');

});
$(".box-ind4j").on("click", function() {
		  $(".service-viewsj").removeClass('active');
    $(".service-views4j").addClass('active');
	  $(".box-indj").removeClass('active');
    $(".box-ind4j").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection10").addClass('active');

});
$(".box-ind5j").on("click", function() {
		  $(".service-viewsj").removeClass('active');
    $(".service-views5j").addClass('active');
	  $(".box-indj").removeClass('active');
    $(".box-ind5j").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection10").addClass('active');

});
$(".box-ind6j").on("click", function() {
		  $(".service-viewsj").removeClass('active');
    $(".service-views6j").addClass('active');
	  $(".box-indj").removeClass('active');
    $(".box-ind6j").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection10").addClass('active');

});
$(".box-ind7j").on("click", function() {
		  $(".service-viewsj").removeClass('active');
    $(".service-views7j").addClass('active');
	  $(".box-indj").removeClass('active');
    $(".box-ind7j").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection10").addClass('active');

});
///////////////////

$(".box-ind1k").on("click", function() {
	  $(".service-viewsk").removeClass('active');
    $(".service-views1k").addClass('active');
	  $(".box-indk").removeClass('active');
    $(".box-ind1k").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection11").addClass('active');

});

$(".box-ind2k").on("click", function() {
		  $(".service-viewsk").removeClass('active');
    $(".service-views2k").addClass('active');
	  $(".box-indk").removeClass('active');
    $(".box-ind2k").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection11").addClass('active');

});
$(".box-ind3k").on("click", function() {
		  $(".service-viewsk").removeClass('active');
    $(".service-views3k").addClass('active');
	  $(".box-indk").removeClass('active');
    $(".box-ind3k").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection11").addClass('active');

});
$(".box-ind4k").on("click", function() {
		  $(".service-viewsk").removeClass('active');
    $(".service-views4k").addClass('active');
	  $(".box-indk").removeClass('active');
    $(".box-ind4k").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection11").addClass('active');

});
$(".box-ind5k").on("click", function() {
		  $(".service-viewsk").removeClass('active');
    $(".service-views5k").addClass('active');
	  $(".box-indk").removeClass('active');
    $(".box-ind5k").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection11").addClass('active');

});
$(".box-ind6k").on("click", function() {
		  $(".service-viewsk").removeClass('active');
    $(".service-views6k").addClass('active');
	  $(".box-indk").removeClass('active');
    $(".box-ind6k").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection11").addClass('active');

});
$(".box-ind7k").on("click", function() {
		  $(".service-viewsk").removeClass('active');
    $(".service-views7k").addClass('active');
	  $(".box-indk").removeClass('active');
    $(".box-ind7k").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection11").addClass('active');

});///////////////////

$(".box-ind1l").on("click", function() {
	  $(".service-viewsl").removeClass('active');
    $(".service-views1l").addClass('active');
	  $(".box-indl").removeClass('active');
    $(".box-ind1l").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection12").addClass('active');

});

$(".box-ind2l").on("click", function() {
		  $(".service-viewsl").removeClass('active');
    $(".service-views2l").addClass('active');
	  $(".box-indl").removeClass('active');
    $(".box-ind2l").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection12").addClass('active');

});
$(".box-ind3l").on("click", function() {
		  $(".service-viewsl").removeClass('active');
    $(".service-views3l").addClass('active');
	  $(".box-indl").removeClass('active');
    $(".box-ind3l").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection12").addClass('active');

});
$(".box-ind4l").on("click", function() {
		  $(".service-viewsl").removeClass('active');
    $(".service-views4l").addClass('active');
	  $(".box-indl").removeClass('active');
    $(".box-ind4l").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection12").addClass('active');

});
$(".box-ind5l").on("click", function() {
		  $(".service-viewsl").removeClass('active');
    $(".service-views5l").addClass('active');
	  $(".box-indl").removeClass('active');
    $(".box-ind5l").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection12").addClass('active');

});
$(".box-ind6l").on("click", function() {
		  $(".service-viewsl").removeClass('active');
    $(".service-views6l").addClass('active');
	  $(".box-indl").removeClass('active');
    $(".box-ind6l").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection12").addClass('active');

});
$(".box-ind7l").on("click", function() {
		  $(".service-viewsl").removeClass('active');
    $(".service-views7l").addClass('active');
	  $(".box-indl").removeClass('active');
    $(".box-ind7l").addClass('active');
    $(".partssection").removeClass('active');
    $(".partssection12").addClass('active');

});













$(".serments1").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments1").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd1").addClass('active');
	 $(".partssection").removeClass('active');
    $(".partssection1").addClass('active');

});
$(".serments2").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments2").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd2").addClass('active');
	 $(".partssection").removeClass('active');
    $(".partssection2").addClass('active');

});
$(".serments3").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments3").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd3").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection3").addClass('active');

});
 
 $(".serments4").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments4").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd4").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection4").addClass('active');

});

$(".serments5").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments5").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd5").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection5").addClass('active');

});

$(".serments6").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments6").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd6").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection6").addClass('active');

});

$(".serments7").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments7").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd7").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection7").addClass('active');

});
$(".serments8").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments8").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd8").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection8").addClass('active');

});
$(".serments9").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments9").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd9").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection9").addClass('active');

});
$(".serments10").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments10").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd10").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection10").addClass('active');

});

$(".serments11").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments11").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd11").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection11").addClass('active');

});

$(".serments12").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments12").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd12").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection12").addClass('active');

});
$(".serments13").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments13").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd13").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection13").addClass('active');

});
$(".serments14").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments14").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd14").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection14").addClass('active');

});
$(".serments15").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments15").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd15").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection15").addClass('active');

});
$(".serments16").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments16").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd16").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection16").addClass('active');

});
$(".serments17").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments17").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd17").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection17").addClass('active');

});
$(".serments18").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments18").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd18").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection18").addClass('active');

});
$(".serments19").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments19").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd19").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection19").addClass('active');

});
$(".serments20").on("click", function() {
	  $(".serments").removeClass('active');
    $(".serments20").addClass('active');
    $(".beralsd").removeClass('active');
    $(".beralsd20").addClass('active');
		 $(".partssection").removeClass('active');
    $(".partssection20").addClass('active');

});



