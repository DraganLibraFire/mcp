/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */
( function($) {
	var container, button, menu, links, subMenus;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );

	// Set menu items with submenus to aria-haspopup="true".
	for ( var i = 0, len = subMenus.length; i < len; i++ ) {
		subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	//$( ".main-navigation .nav-menu > li.menu-item-has-children").each(function(){
	//	var parent = this;
	//	var arrow = $("<span class='arrow-toggle'><i class='fa fa-chevron-left' aria-hidden='true'></i></span>");
	//	$( parent ).prepend( arrow );
	//});
	//var nav = $('.menu-item-has-children ul'),
	//		animateTime = 750,
	//		navLink = $('.arrow-toggle');
	//navLink.click(function(){
	//	if(nav.height() === 0){
	//		autoHeightAnimate(nav, animateTime);
	//	} else {
	//		nav.stop().animate({ height: '0' }, animateTime);
	//	}
	//});

	/* Function to animate height: auto */
	function autoHeightAnimate(element, time){
		var curHeight = element.height(), // Get Default Height
				autoHeight = element.css('height', 'auto').height(); // Get Auto Height
		element.height(curHeight); // Reset to Default Height
		element.stop().animate({ height: autoHeight }, parseInt(time)); // Animate to Auto Height
	}

	/*Responsive navigation sub-menu handle*/
	var _window;

	_window = {
		is_mobile: false,
		is_tablet: false,
		width: $(window).outerWidth(),
		height: $(window).outerHeight(),
		is_portable: function(){
			if( this.width <= 1280 && this.width > 768 ){
				this.is_tablet = true;
				this.is_mobile = false;
			}
			else if( this.width >= 1280 ){
				this.is_tablet = false;
				this.is_mobile = false;
			}
			else if( this.width < 768 ){
				this.is_tablet = false;
				this.is_mobile = true;
			}
		}
	};

	$(window).on('resize load', function(){
		_window.width = $(window).outerWidth();
		_window.height = $(window).outerHeight();
		_window.is_portable();

		/* Menu tablet & mobile */
		if( _window.is_tablet || _window.is_mobile){

			$( ".site-header .nav-menu li.menu-item-has-children").each(function(){

				if( $(this).find('.arrow-toggle').length > 0 ) return;

				var $parent = this;

				var $arrow = $("<span class='arrow-toggle'><i class='fa fa-angle-down' aria-hidden='true'></i></span>");

				$(this).prepend( $arrow );

				$arrow.on('click', function(){

					$( $parent ).toggleClass( "expandeds" );
					$( $parent ).find('> .sub-menu').slideToggle(500);
					$(".merge-navigation-wrapper").css('height', $(window).height());
				});

			});
		}

	});

} )(jQuery);
