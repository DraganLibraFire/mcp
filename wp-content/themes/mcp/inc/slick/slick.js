jQuery( document ).ready(function($) {

    //$('.slick-slider-init').on( 'init', function(){
    //    $(".gallery-wrapper").animate({
    //        opacity: 1
    //    });
    //});
    //$('.slick-slider-init-2').on( 'init', function(){
    //    $(".gallery-wrapper").animate({
    //        opacity: 1
    //    });
    //});


    $('.single-product-slider-small').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        fade: false,
        arrows: false,
        asNavFor: '.single-product-slider-big',
        adaptiveHeight: false,
        vertical: true,
        verticalSwiping: true,
        focusOnSelect: true
    });
    $('.single-product-slider-big').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        fade: true,
        arrows: false,
        adaptiveHeight: true,
        asNavFor: '.single-product-slider-small',
    });

    /* Home slick profiles slider */
    $('.profiles-slider').slick({
        infinite: true,
        slidesToShow: 4,
        centerMode: true,
        slidesToScroll: 1,
        dots: false,
        adaptiveHeight: false,
        prevArrow: "<span class='slick-prev-lf'><img src='" + mcp.theme_url + "/images/slick-left.jpg'></span>",
        nextArrow: "<span class='slick-next-lf'><img src='" + mcp.theme_url + "/images/slick-right.jpg'></span>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.section-collection-inner .nav-tabs').slick({
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        adaptiveHeight: false,
        prevArrow: "<span class='slick-prev-lf'><img src='" + mcp.theme_url + "/images/slick-left.jpg'></span>",
        nextArrow: "<span class='slick-next-lf'><img src='" + mcp.theme_url + "/images/slick-right.jpg'></span>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.profiles-slider').show();

    /* Home slick bloggers choice slider */
    $('.bloggers-products-home-slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        adaptiveHeight: false,
        prevArrow: "<span class='slick-prev-lf'><img src='" + mcp.theme_url + "/images/slick-left.jpg'></span>",
        nextArrow: "<span class='slick-next-lf'><img src='" + mcp.theme_url + "/images/slick-right.jpg'></span>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]

    });
    $('.products-profile-slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        adaptiveHeight: true,
        prevArrow: "<span class='slick-prev-lf'><img src='" + mcp.theme_url + "/images/slick-left.jpg'></span>",
        nextArrow: "<span class='slick-next-lf'><img src='" + mcp.theme_url + "/images/slick-right.jpg'></span>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.recent-articles-wrapper-inner-list .row').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        adaptiveHeight: true,
        prevArrow: "<span class='slick-prev-lf'><img src='" + mcp.theme_url + "/images/slick-left.png'></span>",
        nextArrow: "<span class='slick-next-lf'><img src='" + mcp.theme_url + "/images/slick-right.png'></span>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    $('.bloggers-products-home-slider').show();

    /* Home look of the day slider  */
    $('.products-home-slider').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false,
        adaptiveHeight: false,
        prevArrow: "<span class='slick-prev-lf'><img src='" + mcp.theme_url + "/images/slick-left.png'></span>",
        nextArrow: "<span class='slick-next-lf'><img src='" + mcp.theme_url + "/images/slick-right.jpg'></span>",
        responsive: [
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    $('.products-home-slider').show();

});