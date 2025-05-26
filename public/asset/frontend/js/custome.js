jQuery(document).ready(function ($) {

 
     
    //   Slider
   $('.banner-slider').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  adaptiveHeight: true
});

    //   Slider
   $('.product-slider').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  adaptiveHeight: true,
  autoplay:true,
  nav: false,
});


});
 



