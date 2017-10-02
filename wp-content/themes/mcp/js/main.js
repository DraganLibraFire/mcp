jQuery(function($){
    var slim_scroll_height = 260;

    var ajax_in_progress = false;

    $('select').select2({
        minimumResultsForSearch: Infinity
    });

    $(".dropdown-menu").on('change', function(){
        window.location.href = this.value;
    });
    $('.gallery').featherlightGallery({
        gallery: {
            fadeIn: 300,
            fadeOut: 300
        },
        openSpeed:    300,
        closeSpeed:   300
    });

    //if( $('.searchandfilter > ul > li > ul').length > 0 ){
    //
    //
    //    $('.searchandfilter > ul > li:not(.sf-field-taxonomy-product-color, .sf-field-taxonomy-product-sex) > ul').each(function(){
    //        if( $(this).outerHeight() > slim_scroll_height ){
    //            $(this).slimScroll({
    //                height: slim_scroll_height,
    //                size: '6px',
    //                position: 'right',
    //                railVisible: true,
    //                alwaysVisible: true,
    //                color: '#000',
    //                railColor: '#eaeaeb',
    //                railOpacity: 1,
    //                wheelStep: 10
    //            });
    //        }
    //    })
    //}
    //
    //if( $('.profiles-radio-wrapper.my-color-profile > ul').length > 0 ) {
    //
    //    $('.profiles-radio-wrapper.my-color-profile > ul').each(function(){
    //        if( $(this).outerHeight() > slim_scroll_height ){
    //            $(this).slimScroll({
    //                height: slim_scroll_height,
    //                size: '6px',
    //                position: 'right',
    //                railVisible: true,
    //                alwaysVisible: true,
    //                color: '#000',
    //                railColor: '#eaeaeb',
    //                railOpacity: 1,
    //                wheelStep: 10
    //            });
    //        }
    //    })
    //
    //}

    $(".nav-tabs li").on('click', function(e){
        e.preventDefault();
        $(this).siblings().removeClass('active');
        $(this).addClass('active').show();

        $(this).parents('.tabs-main-wrapper').find('.tabs-content-wrapper-inner > li').hide().removeClass('active');
        $(this).parents('.tabs-main-wrapper').find('.tabs-content-wrapper-inner > li').eq( $(this).index() ).show();
        $(this).parents('.tabs-main-wrapper').find('.tabs-content-wrapper-inner > li').eq( $(this).index()).find('.slick-initialized').slick('refresh');

        $(document).trigger('map_tab_changed');
    })

    function convert_radion_to_color(){
        $('.sf-field-taxonomy-product-color ul li[class*="sf-item-"]').each(function(){
            var $list_item_wrapper = $(this);

            var $list_item_text = $list_item_wrapper.text();
            $list_item_text = $list_item_text.replace('-', '');
            $list_item_text = $list_item_text.replace(/ /g, '');

            $list_item_wrapper.find('label').css({
                'background-color'  : $list_item_text
            });

            $($list_item_wrapper).animate({
                opacity: 1
            });
        });
    }
    var selected_shit = {};

    convert_radion_to_color();

    selected_shit = {}
    $(document).on("sf:ajaxfinish", ".searchandfilter", function(e,a,s){
        convert_radion_to_color();
        update_breadcumb_data();
        update_breadcrumbs();
    });

    $(document).on("sf:init", ".searchandfilter", function(e,a){
        update_breadcumb_data();
        update_breadcrumbs();
    });

    $(".searchandfilter ul li input").on('change', function(){

        if( $(this).parents(".hidden-filters .sf-field-taxonomy-product-profile").length > 0 ){
            $(".sf-field-taxonomy-product-profile input").prop( 'checked', false );
            $(this).prop( 'checked', true );
        }


        $(".searchandfilter ul li input").each(function(){
            if( $(this).is(":checked") ){
                $(this).parents('li').eq(0).find(' > .children').slideDown();
            }
        })
        update_breadcumb_data();
    })

    $(".searchandfilter ul li input").each(function(){
        if( $(this).is(":checked") ){
            $(this).parents('li').eq(0).find(' > .children').slideDown();
        }
    })

    $(".share-buttons a").on('click', function(e){
        e.preventDefault();
        PopupCenter( $(this).attr('href'), $(this).attr('title'), 500, 300 );
    })

    function update_breadcrumbs(){
        var $parent;
        $('.bc-wrapper').remove();
        $parent = $("<div />");
        $parent.addClass('bc-wrapper');

        for( var crumb in selected_shit ){
            var $crumb = $("<span />");

            var $remove_crumb = $("<b><i class='fa fa-remove'></i></b>");
            $remove_crumb.attr('data-remove', crumb);


            $crumb.addClass('single-crumb');
            $crumb.html( selected_shit[ crumb ] );
            $parent.append($crumb);
            $crumb.append( $remove_crumb );

            (function(crumb) {
                $remove_crumb.on( 'click', function(){
                    bind_remove( crumb );
                });
            }(crumb));
        }

        $parent.prependTo(".search-filter-results");
    }

    function bind_remove( crumb ){
        console.log("[data-sf-cr='"+ crumb +"']");
        $("[data-sf-cr='"+ crumb +"']").eq(0).prop('checked', false);
        $("[data-sf-cr='"+ crumb +"']").eq(1).prop('checked', false);
        $("[data-sf-cr='"+ crumb +"']").eq(0).attr('checked', false);
        $("[data-sf-cr='"+ crumb +"']").eq(1).attr('checked', false);
        var timeout = setTimeout( function(){
            $(".hidden-filters form.searchandfilter").submit();
        }, 100);

    }

    function update_breadcumb_data(){
        selected_shit = {};
        $(".searchandfilter ul li input").each(function(){
            if( $(this).attr('type') == 'number' ){
                //console.log($(this).val());
            }
            
            if( this.checked ){
                if( $(this).attr('data-sf-cr') != undefined ){
                    selected_shit[ $(this).attr('data-sf-cr') ] = $(this).val().replace(/\-/g, " ");
                }
            }
        })
    }

    function PopupCenter(url, title, w, h) {
        // Fixes dual-screen position                         Most browsers      Firefox
        var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

        var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 2) - (h / 2)) + dualScreenTop;
        var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

        // Puts focus on the newWindow
        if (window.focus) {
            newWindow.focus();
        }
    }

    (function($){

        function isValidEmailAddress(emailAddress) {
            var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
            // alert( pattern.test(emailAddress) );
            return pattern.test(emailAddress);
        };

        function validate_comment_form(e, form){
            var $elements = $(form).find('input, textarea');
            var errors = false;

            $elements.each(function(){

                var type = $(this).attr('type');
                var name = $(this).attr('name');
                var tagName = this.tagName;
                var valid;
                if( type == 'text' && name != 'email'){
                    valid = $(this).val().trim() == '' ? false : true;
                } else if( name == 'email' ){

                    if( isValidEmailAddress( $(this).val() ) && $(this).val().trim() != ''){
                        valid = true;
                    } else{
                        valid = false;
                    }
                } else if( tagName == 'TEXTAREA' ){
                    valid = $(this).val().trim() == '' ? false : true;
                }
                else{
                    return true;
                }

                if( !valid ){
                    $(this).css({ 'background-color': '#ffd6d6' });
                    errors = true;
                } else{
                    $(this).css({ 'background-color': 'transparent' });
                }

            });

            if( errors )
                e.preventDefault();
        }

        $("#commentform").on('submit', function(e){
            validate_comment_form( e, this );
        });
    })(jQuery)

    $(".accordion-opener a").on('click', function(e){
        e.preventDefault();
        var $parent = $(this).parents(".accordion-opener");
        $(".accordion-opener .opener-image i").not( $($parent).find(".opener-image i") ).removeClass('fa-chevron-up').addClass('fa-chevron-down')
        $($parent).find(".opener-image i").toggleClass('fa-chevron-up fa-chevron-down');
        $(".accordion-content").not( $parent.next() ).slideUp();
        $parent.next().slideToggle();
    });

    $(".wishlist-button-wrapper").on('click', function(){
        if( ajax_in_progress ) return false;

        ajax_in_progress = true;
        var $btn = this;
        $($btn).find(".wishlist-response-wrapper i").addClass('fa-spinner fa-pulse');
        $.ajax({
          method: "POST",
          url: mcp.ajax_url,
          data: {
              action        : 'add_to_wishlist',
              product_id    : $("#product_id").val(),
          }
        })
        .success(function( response ) {
            $($btn).html( response );

            ajax_in_progress = false;
        });
    })

    $(window).on("resize load", function () {
        if( $(window).width() >= 767 ) {
            var biggest_height = 0;
            jQuery(".nav.nav-tabs > li .list-tab-relative").each(function(){
                var this_height = jQuery(this).outerHeight();
                if( this_height > biggest_height ){
                    biggest_height = this_height;
                }
            });
            jQuery(".nav.nav-tabs > li .list-tab-relative").css('height', biggest_height );
        } else {
            jQuery(".nav.nav-tabs > li .list-tab-relative").css('height', 'auto' );
        }
        if( $(window).width() >= 767 ) {
            var biggest_height = 0;
            jQuery("body:not(.home) .discover-section > div").each(function(){
                var this_height = jQuery(this).outerHeight();
                if( this_height > biggest_height ){
                    biggest_height = this_height;
                }
            });
            jQuery("body:not(.home) .discover-section > div").css('height', biggest_height );
        } else {
            jQuery("body:not(.home) .discover-section > div").css('height', 'auto' );
        }
    });

    $("[data-get-height-of]").each(function(){
        var $parent = $(this).attr('data-get-height-of');
        var _this = this;

        $(window).on('resize', function(){
            $(_this).css('height', $(_this).parent().find($parent).outerHeight() );
        })
        $(this).css('height', $(this).parent().find($parent).outerHeight() );
    });

    $('a[href*=#]:not([href=#]):not(.location-name-link)').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);

            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                var menu_height = $('.navbar.navbar-default.navbar-fixed-top').height();
                $('html,body').animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
                return false;
            }
        }
    });

    function autoHeightAnimate(element, time){
        var curHeight = element.height(), // Get Default Height
            autoHeight = element.css('height', 'auto').height(); // Get Auto Height
        element.height(curHeight); // Reset to Default Height
        element.stop().animate({ height: autoHeight }, parseInt(time)); // Animate to Auto Height
    }

    $('.show-filters-button').on('click',function(){

        if( $('.hidden-filters').hasClass('expanded') ){
            $('.hidden-filters').removeClass('expanded');
            $(this).removeClass('expanded');
            $('.hidden-filters').animate({
                height: 0
            });
        } else{
            $('.hidden-filters').addClass('expanded');
            $(this).addClass('expanded');
            autoHeightAnimate($('.hidden-filters'), 1500);
        }
    } );

    $(window).on('resize load', function(){

        var heights = {
            'full' : {}
        };

        $("[data-equal]").css('height', 'auto');
        $("[class*='data-equal-']").css('height', 'auto');

        $("[data-equal], [class*='data-equal-']").each(function(){

            var data_type = $(this).is("[class*='data-equal-']") ? 'class' : 'data';

            if( data_type == 'data' ){
                var $elem = $(this).attr('data-equal');
                var size = $(this).attr('data-equal-width');
            } else{
                var classes = this.className.split(/\s+/);

                for( var i = 0; i < classes.length; i++ ){
                    
                    var class_name = classes[ i ];

                    if( class_name.indexOf( 'data-equal-') > -1 ){
                        $elem = class_name.replace('data-equal-', '');
                    }
                    if( class_name.indexOf( 'data-equal-width-') > -1 ){
                        size = class_name.replace('data-equal-width-', '');
                    }
                }
            }

            if( size == undefined )
                size = 'full';

            if( heights[ size ] == undefined ){
                heights[ size ] = {}
            }

            if( heights[ size ][ $elem ] == undefined ){
                heights[ size ][ $elem ] = 0;
            }

            var this_height = jQuery(this).outerHeight();

            if( this_height > heights[ size ][ $elem ] ){
                heights[ size ][ $elem ] = this_height;
            }
        });

        var $window_width = $(window).outerWidth();

        for( var breakpoint in heights){
            var element_data_value = heights[ breakpoint ];

            for( var element in element_data_value ){

                if( $window_width > parseInt(breakpoint) || breakpoint == 'full' ){
                    $("[data-equal='"+element+"'], [class*='data-equal-"+element+"']").css('height', element_data_value[ element ]);
                }
            }
        }
    })

    //$(".hidden-filters .searchandfilter").mmenu();

});