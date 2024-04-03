
jQuery(document).ready(function($) {
  $(".slick-slider-wrapper").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    speed: 1500,
    autoplaySpeed: 3000,
    infinite: true,
    fade: true,
    asNavFor: '.slick-slider-navigation',

    responsive: [{  
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          infinite: true,
          dots: true,
        }
  
      }, {  
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          dots: true
        }
  
      }, {
        breakpoint: 300,
        slidesToShow: 1,
      }]
  });

  $('.slick-slider-navigation').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: false,
    speed: 1500,
    autoplaySpeed: 2000,
    asNavFor: '.slick-slider-wrapper',
    dots: true,
    centerMode: true,
    focusOnSelect: true,
    arrows: true,
  });
});