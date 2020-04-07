$(document).ready(function () {

    $('.home_slider_container').slick({
        prevArrow: ('.prev-arrow'),
        nextArrow: ('.next-arrow'),
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
    });

    $('.about_us_slider_container').slick({
        prevArrow: ('.prev-arrow'),
        nextArrow: ('.next-arrow'),
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
    });

    $('.product-slider').slick({
        arrows: false,
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });

    $(document).find('.slick-dots li').each(function (i, e) {
        var bgImage = $(document).find('.slick-track .slick-slide').eq(i).find('i').first().css('background-image');
        $(e).css('background-image', bgImage);
    });

    var dots = $(document).find('.slick-dots');
    $('.dots').append(dots);
});