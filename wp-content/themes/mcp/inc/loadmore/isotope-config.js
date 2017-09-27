jQuery(function($){
    // quick search regex
    var qsRegex;
    var loading = false;
    var gridSelector = '.results';
    var itemSelector = '.single-blog-item';

    var $grid = $(gridSelector);

    if( $grid.length ){
        var window_width = $(window).width();
        var column_number = 3;
        if( window_width > 768 ){
            column_number = 3;
        }
        else if (window_width < 768 && window_width > 460 ){
            column_number = 2;
        }
        else if( window_width < 460 ){
            column_number = 1;
        }

        // init Isotope
        $grid.imagesLoaded( function(){
            $grid.isotope({
                itemSelector: itemSelector,
                layoutMode: 'packery',
                resizable: false,
                masonry: {
                    columnWidth: $grid.width() / column_number
                },
                percentPosition: true
            });

            var iso = $grid.data('isotope');
            $grid.isotope( 'reveal', iso.items );
        } );

        $(window).smartresize(function(){
            var window_width = $(window).width();
            var column_number = 3;
            if( window_width > 768 ){
                column_number = 3;
            }
            else if (window_width < 768 && window_width > 460 ){
                column_number = 2;
            }
            else if( window_width < 460 )
                column_number = 1;
            $grid.isotope({
                // update columnWidth to a percentage of container width
                masonry: { columnWidth: $grid.width() / column_number }
            });
        });
    }

});
