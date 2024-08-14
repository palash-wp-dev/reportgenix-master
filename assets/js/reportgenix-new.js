;(function($){
  "use strict";
  // $(document).ready(function(){
  //   $('.reportgenix-brand-logo-slick').slick({
  //     dots: false,
  //     arrows:false,
  //     infinite: true,
  //     speed: 100,
  //     slidesToShow: 7,
  //     slidesToScroll: 1,
  //     autoplay:true,
  //     autoplaySpeed: 100,
  //     responsive: [
  //       {
  //         breakpoint: 1441,
  //         settings: {
  //           slidesToShow: 6,
  //           slidesToScroll: 1,
  //           infinite: true,
  //         }
  //       },
  //       {
  //         breakpoint: 770,
  //         settings: {
  //           slidesToShow: 5,
  //           slidesToScroll: 1,
  //           infinite: true,
  //         }
  //       },
  //       {
  //         breakpoint: 578,
  //         settings: {
  //           slidesToShow: 4,
  //           slidesToScroll: 1,
  //           infinite: true,
  //         }
  //       },
  //       {
  //         breakpoint: 426,
  //         settings: {
  //           slidesToShow: 3,
  //           slidesToScroll: 1,
  //           infinite: true,
  //         }
  //       },
  //       {
  //         breakpoint: 376,
  //         settings: {
  //           slidesToShow: 2,
  //           slidesToScroll: 1,
  //           infinite: true,
  //         }
  //       }
  //     ]
  //   });
  // });
  $(document).on('click', '.report-third-heading', function(e){
    let el = $(this);
    let parentWrap = el.closest('.accordian-items');
    parentWrap.toggleClass('active');
    parentWrap.siblings().removeClass('active');
  });
  $(document).ready(function(){
    $('.blog-buttons').slick({
      dots: false,
      appendArrows:".blog-slider-btn",
      prevArrow:'<span class="arrow-icon-prev"><i class="fa-solid fa-angle-left"></i></span>',
      nextArrow:'<span class="arrow-icon-next"><i class="fa-solid fa-angle-right"></i></span>',
      infinite: true,
      slidesToShow: 6,
      slidesToScroll: 3,
      responsive: [
        {
          breakpoint: 1401,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 3,
            infinite: true,
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 3,
            infinite: true,
          }
        },
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
          }
        },
        {
          breakpoint: 483,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: true,
          }
        },
        {
          breakpoint: 350,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
          }
        }
      ]
    });
  });
  // blog-filter-btn 
  $(".blog-filter").on('click', function(){
    $(".blog-filter").removeClass('active');
    $(this).addClass('active');
  });
  $(document).ready(function(){
    $(".click-nav-right-icon").on('click', function(){
      $(".nav-right-content-main-wraper").toggleClass("show-content")
    })
  })


  $('.imagesLoaded-blog').imagesLoaded( function() {
    var $grid = $('.grid-blog').isotope({
      itemSelector: '.grid-item',
    });
    // filter items on button click
    $('.blog-buttons').on( 'click', '.blog-filter', function() {
      var filterValue = $(this).attr('data-filter');
      $grid.isotope({ filter: filterValue });
    });
  });
})(jQuery);