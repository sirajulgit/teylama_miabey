jQuery(document).ready(function ($) {
    // Hamburgers
    var forEach = function (t, o, r) { if ("[object Object]" === Object.prototype.toString.call(t)) for (var c in t) Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t); else for (var e = 0, l = t.length; l > e; e++)o.call(r, t[e], e, t) };
    var hamburgers = document.querySelectorAll(".hamburger");
    if (hamburgers.length > 0) {
        forEach(hamburgers, function (hamburger) {
            hamburger.addEventListener("click", function () {
                this.classList.toggle("is-active");
            }, false);
        });
    }
    // Hamburgers

    //Nav fixed top
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 100) {
            jQuery("header").addClass("topmines");
        } else {
            jQuery("header").removeClass("topmines");
        }
        if (jQuery(this).scrollTop() > 250) {
            jQuery("header").addClass("nav-active");
        } else {
            jQuery("header").removeClass("nav-active");
        }

    });

    // Side Menu 

    $('#pull').click(function () {
        $('.nav').toggleClass("menutogg");
    });

    $('.nav ul li').find(".sub-menu").parent().addClass("drop");
    $(".drop").append('<span class="arrow-icon"> <i class="fa fa-angle-down"></i> </span>');
    if ($(window).width() < 991.98) {
        $(".arrow-icon").addClass("mobile-toggle");
        $(".sub-menu").addClass("mobile-hide");
    }
    $('.mobile-hide').hide();
    $(".mobile-toggle").click(function () {
        $('.sub-menu').slideUp();
        $(this).siblings('.sub-menu').slideToggle();
    });

    //scroll top
    jQuery(window).scroll(function () {

        if (jQuery(this).scrollTop() > 100) {
            jQuery(".scrollup").addClass("active");
        } else {
            jQuery(".scrollup").removeClass("active");
        }
    });
    jQuery(".scrollup").click(function () {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    //scroll top
     
    
    //   Slider

    $('.banner-slide').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true, 
    autoplay: true, 
     fade: true,
     arrows: true,
      
    });

     

    AOS.init();
    
    //machheight
    jQuery(".matchHeight").matchHeight();
    
});
//GALLERY
baguetteBox.run('.tz-gallery');



