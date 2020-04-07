$(document).ready(function () {
  $(".dropdown-menu").on('click', function (e) {
    e.stopPropagation();
  });

  $(".burger_menu_container").on('click', function () {
    $('.mobile_menu').slideToggle();
  });

  $(window).click(function (e) {
    $('.mobile_menu').slideUp();
  });

  $('.mobile_menu,.burger_menu_container').on('click', function (e) {
    e.stopPropagation();
  });


  // let header_price = 0;
  // $('.header_price').html(header_price);
  //
  // $('.order_online').on('click', function () {
  //   let quantity = $('.quantity').val();
  //   let currentPrice = Number($('.product_price').html());
  //
  //   if (quantity && (currentPrice >= 1)) {
  //     $('.header_price').html(quantity * currentPrice);
  //   } else $('.header_price').html(0)
  // });


  $('.sign_up a').on('click', function () {
    let current = $(this).data('for');
    let currentActive = $(this).closest('li');


    $('.sign_up_form').fadeOut(0);
    $('.sign_up_form.' + current).fadeIn(300);

    $('.sign_up li').not(currentActive).removeClass('active');
    currentActive.addClass('active');
  });


//  Scroll to (production-single)

  $(".production_single_text > a").click(function(e) {
    e.preventDefault();

    var position = $($(this).attr("href")).offset().top;

    $("body, html").animate({
      scrollTop: position
    } /* speed */ );
  });

});