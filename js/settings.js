/**
 * Monsa JavaScript file.
 *
 * Set up the navigation and sidebar toggles.
 */
( function( $ ) {
	
	var body, page, scrollUp, scrollToContent, mainNav, primarySidebar, menuToggle, menuButton, sidebarToggle, sidebarButton;
	
	// Set up vars.
	page            = $( '#site-wrapper' );
	scrollUp        = page.find( '#scroll-up' );
	scrollToContent = page.find( '#scroll-to-content' );
	mainNav         = page.find( '#menu-primary' );
	primarySidebar  = page.find( '#sidebar-primary' );
	menuToggle      = page.find( '.main-navigation-toggle' );
	menuButton      = page.find( '#main-navigation-button' );
	sidebarToggle   = page.find( '.sidebar-primary-toggle' );
	sidebarButton   = page.find( '#sidebar-primary-button' );
	
	// Preload page and fade the content.
	$( window ).load( function() { // makes sure the whole site is loaded
		$( '#status' ).fadeOut(); // will first fade out the loading animation
		$( '#preloader' ).delay( 350 ).fadeOut( 'slow' ); // will fade out the white DIV that covers the website.
		//$( '#status' ).velocity( 'fadeOut', { delay: 0 });
		//$( '#preloader' ).velocity( 'fadeOut', { delay: 350 });
	});
	
	// Back to top.
	if ( scrollUp.length ) {
		$( scrollUp ).click(function() {
			$( 'html,body' ).animate( { scrollTop: 0 }, 600 );
			return false;
		});
	}
	
	// Scroll to content on Front Page Template.
	if ( scrollToContent.length ) {
		smoothScroll.init({
			speed: 800,
			updateURL: false,
		});
	}

	/**
	 * Set up the main navigation toggle. This sets
	 * up a toggle for navigation to overlay the window.
	 */
	( function() {
		
		// Return early if menuToggle is missing.
		if ( ! menuToggle.length ) {
			return;
		}
		
		// Add styles.
		$( mainNav ).css( 'display', 'block' );
		
		// Add an initial values for the attribute.
		menuToggle.attr( 'aria-expanded', 'false' );
	
		menuToggle.on( 'click', function( event ) {
			
			// Toggle classes.
			$( 'html' ).toggleClass( 'disable-scroll' );
			$( 'body' ).toggleClass( 'main-navigation-open' );
			mainNav.toggleClass( 'open' );
			
			// Add or remove class from button span element.
			if ( menuButton.hasClass( 'genericon-menu' ) ) {
				menuButton.removeClass( 'genericon-menu' );
				menuButton.addClass( 'genericon-close' );
			} else {
				menuButton.removeClass( 'genericon-close' );
				menuButton.addClass( 'genericon-menu' );			
			}
			
			// If aria-expanded is false, set it to true. And vica versa.
			$( this ).attr( 'aria-expanded', $( this ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
		
		});
		
	} )();

	/**
	 * Set up the primary sidebar toggle. This sets
	 * up a toggle for sidebar to overlay the window.
	 */
	( function() {
		
		// Return early if sidebarToggle is missing.
		if ( ! sidebarToggle.length ) {
			return;
		}
		
		// Add styles.
		$( primarySidebar ).css( 'display', 'block' );
		
		// Add an initial values for the attribute.
		sidebarToggle.attr( 'aria-expanded', 'false' );
	
		sidebarToggle.on( 'click', function( event ) {
			
			// Toggle classes.
			$( 'html' ).toggleClass( 'disable-scroll' );
			$( 'body' ).toggleClass( 'sidebar-primary-open' );
			primarySidebar.toggleClass( 'open' );
			
			// Add or remove class from button span element.
			if ( sidebarButton.hasClass( 'genericon-menu' ) ) {
				sidebarButton.removeClass( 'genericon-menu' );
				sidebarButton.addClass( 'genericon-close' );
			} else {
				sidebarButton.removeClass( 'genericon-close' );
				sidebarButton.addClass( 'genericon-menu' );			
			}
			
			// If aria-expanded is false, set it to true. And vica versa.
			$( this ).attr( 'aria-expanded', $( this ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
		
		});
		
	} )();

	/**
	 * Closes the main navigation or sidebar when
	 * the esc key is pressed.
	*/
	$( document ).keyup( function( event ) {
		if ( event.keyCode == 27 ) {
			if ( $( 'body' ).hasClass( 'main-navigation-open' ) ) {
				$( 'html' ).removeClass( 'disable-scroll' );
				$( 'body' ).removeClass( 'main-navigation-open' );
				menuButton.addClass( 'genericon-menu' );
				menuButton.removeClass( 'genericon-close' );
			} else if ( $( 'body' ).hasClass( 'sidebar-primary-open' ) ) {
				$( 'html' ).removeClass( 'disable-scroll' );
				$( 'body' ).removeClass( 'sidebar-primary-open' );
				sidebarButton.addClass( 'genericon-menu' );
				sidebarButton.removeClass( 'genericon-close' );
			}
		}
	});
} )( jQuery );