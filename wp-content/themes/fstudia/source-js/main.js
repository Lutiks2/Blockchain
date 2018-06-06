


jQuery(document).ready(function () {

  //main navigation in header

  jQuery(document).on('click', '.menu-bat', function(){
    var nav = jQuery('.site-list')
    jQuery('.menu-bat').toggleClass('active')
    if(nav.is(':visible')) {
      nav.slideUp()
    }else{
      nav.slideDown()
    }
  } )

  // jQuery("#primary-menu").on("click","a", function (event) {
  //     event.preventDefault()
  //     var id  = jQuery(this).attr('href')
  //       top = jQuery(id).offset().top
  //   jQuery('body,html').animate({scrollTop: top}, 3000)
  // })


    jQuery('.multiple-items').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
  });



})