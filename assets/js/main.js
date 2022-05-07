$(function(){

var x = $('.team-slider').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    dots: false,
    infinite: true,
    arrows:true,
    autoplay: true,
    responsive: [
      
      {
        breakpoint: 786,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },

    ]
  });

  var keya_home_slider = $('.keya-home-slider-item');
  if(keya_home_slider){
    keya_home_slider.each(function(){
        var slider_item = $(this);
        var slider_item_img = slider_item.attr('data-bg-img');
        slider_item.css('background-image','url('+slider_item_img+')');
    });
  }


  $(".slick-arrow").html("");
})

$('.medical-kits-container').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  dots: false,
  infinite: true,
  arrows:true,
  autoplay: true,
  responsive: [
    
    {
      breakpoint: 786,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },

  ]
});