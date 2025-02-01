/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	const siteNavigation = document.getElementById( 'masthead' );

	// Return early if the navigation don't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByClassName( 'menu-toggle' )[ 0 ];
	// Return early if the button don't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = document.getElementById( 'primary-menu' );
	//const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	const mobile_menu = siteNavigation.getElementsByClassName( 'mobile_menu' );
	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'toggled' );
		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			jQuery(mobile_menu).hide();
			jQuery('.fa-bars').show();
			button.setAttribute( 'aria-expanded', 'false' );
		} else {
			button.setAttribute( 'aria-expanded', 'true' );
			jQuery(mobile_menu).show();
			jQuery('.fa-close').show();
			jQuery('.fa-bars').hide();
		}

	} );
	

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener( 'click', function( event ) {
		const isClickInside = siteNavigation.contains( event.target );

		if ( ! isClickInside ) {
			siteNavigation.classList.remove( 'toggled' );
			button.setAttribute( 'aria-expanded', 'false' );
			jQuery(mobile_menu).hide();
		}
	} );

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName( 'a' );

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	// Toggle focus each time a menu link is focused or blurred.
	for ( const link of links ) {
		link.addEventListener( 'focus', toggleFocus, true );
		link.addEventListener( 'blur', toggleFocus, true );
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for ( const link of linksWithChildren ) {
		link.addEventListener( 'touchstart', toggleFocus, false );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( ! self.classList.contains( 'nav-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}

		if ( event.type === 'touchstart' ) {
			const menuItem = this.parentNode;
			event.preventDefault();
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem !== link ) {
					link.classList.remove( 'focus' );
				}
			}
			menuItem.classList.toggle( 'focus' );
		}
	}
	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( siteNavigation) {
		var touchStartFn, i,
			parentLink = siteNavigation.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode, i;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( siteNavigation ) );	
	

	var lastClick = null;
		jQuery("#searchlink").click(function(e) {
			jQuery('#cl_serch').toggleClass("open");
			jQuery('#cl_serch').removeClass("openlllll");
			return false;
		  lastClick = e.target;
		}).focus(function(e){
			if (e.target == lastClick) {
			 jQuery('#cl_serch').toggleClass("open");
	   			 return false;
			} else {
			  jQuery('#cl_serch').addClass("openlllll");
				jQuery('#cl_serch').removeClass("open");
				return false;
			}
			lastClick = null;

		});
	 	jQuery(".sbtn").focus(function(){
	       jQuery('#cl_serch').addClass("openlllll");
		  jQuery('#cl_serch').removeClass("open");
	  	}).blur(function(){
		   jQuery('#cl_serch').removeClass("openlllll");
	  	});


	//scroll button add js 
	 	jQuery(window).on('scroll', function () {
	        if (jQuery(this).scrollTop() > 200) {
	            jQuery('.scrollingUp').addClass('is-active');
	        } else {
	            jQuery('.scrollingUp').removeClass('is-active');
	        }
	    });
	    jQuery('.scrollingUp').on('click', function () {
	      	jQuery("html, body").animate({
		        scrollTop: 0
	        }, 600);
	      	return false;
	    });	
	    // Sticky Header
	    jQuery(window).on('scroll', function() {
            if (jQuery(window).scrollTop() >= 250) {
                jQuery('.main_site_header').addClass('is-sticky-menu');
            }
            else {
                jQuery('.main_site_header').removeClass('is-sticky-menu');
            }
            return false;
       });
}() );

( function( $ ) {
	var body, masthead, menuToggle, siteNavigation, socialNavigation, siteHeaderMenu, resizeTimer;

	function initMainNavigation( siteNavigation ) {

		// Add dropdown toggle that displays child menu items.
		var dropdownToggle = $( '<button />', {
			'class': 'dropdown-toggle',
			'aria-expanded': false
		} ).append( $( '<span />', {
			'class': 'screen-reader-text',
			text: 'expand child menu'
		} ) );
		siteNavigation.find( '.menu-item-has-children > a' ).after( dropdownToggle );

		// Toggle buttons and submenu items with active children menu items.
		siteNavigation.find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
		siteNavigation.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		// Add menu items with submenus to aria-haspopup="true".
		siteNavigation.find( '.menu-item-has-children' ).attr( 'aria-haspopup', 'true' );

		siteNavigation.find( '.dropdown-toggle' ).click( function( e ) {
			var _this            = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );

			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

			// jscs:disable
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
			screenReaderSpan.text( screenReaderSpan.text() === 'expand child menu' ? 'collapse child menu' : 'expand child menu' );
		} );
		
	}
	initMainNavigation( $( '.main-navigation' ) );


	const  focusableElements =
    'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
	const modal = document.querySelector('#mobile_primary'); // select the modal by it's id
	if (!modal) {
    	// console.error('Cannot find modal element');
    	return;
  	}
	const firstFocusableElement = modal.querySelectorAll(focusableElements)[0]; // get first element to be focused inside modal
	const focusableContent = modal.querySelectorAll(focusableElements);
	const lastFocusableElement = focusableContent[focusableContent.length - 1]; // get last element to be focused inside modal
	
	document.addEventListener('keydown', function(e) {
		//console.log("fff")
	  let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

	  if (!isTabPressed) {
	    return;
	  }

	  if (e.shiftKey) { // if shift key pressed for shift + tab combination
	    if (document.activeElement === firstFocusableElement) {
	      lastFocusableElement.focus(); // add focus for the last focusable element
	      e.preventDefault();
	    }
	  } else { // if tab key is pressed
	    if (document.activeElement === lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
	      firstFocusableElement.focus(); // add focus for the first focusable element
	      e.preventDefault();
	    }
	  }
	});

	firstFocusableElement.focus();

	jQuery("#mobilepop").click(function(e) {
		jQuery("#navbar-toggle").click();
		return false;
	});




} )( jQuery );


