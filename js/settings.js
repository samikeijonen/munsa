/**
 * Monsa JavaScript file.
 *
 * Set up the navigation and sidebar toggles.
 */
( function( $ ) {
	
	var body, page, scrollUp, scrollToContent, mainNav, primarySidebar, menuToggle, sidebarToggle;
	
	// Set up vars.
	page            = $( '#site-wrapper' );
	scrollUp        = page.find( '#scroll-up' );
	scrollToContent = page.find( '#scroll-to-content' );
	mainNav         = page.find( '#menu-primary' );
	primarySidebar  = page.find( '#sidebar-primary' );
	menuToggle      = page.find( '.main-navigation-toggle' );
	sidebarToggle   = page.find( '.sidebar-primary-toggle' );
	
	// Preload page and fade the content.
	$( window ).load( function() { // makes sure the whole site is loaded
		$( '#status' ).fadeOut(); // will first fade out the loading animation
		$( '#preloader' ).delay( 350 ).fadeOut( 'slow' ); // will fade out the white DIV that covers the website.
	});
	
	// Back to top.
	if ( scrollUp.length ) {
		smoothScroll.init({
			speed: 800,
			updateURL: false,
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
			
			// If aria-expanded is false, set it to true. And vica versa.
			$( menuToggle ).attr( 'aria-expanded', $( menuToggle ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
		
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
			
			// If aria-expanded is false, set it to true. And vica versa.
			$( sidebarToggle ).attr( 'aria-expanded', $( sidebarToggle ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
		
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
				mainNav.removeClass( 'open' );
			} else if ( $( 'body' ).hasClass( 'sidebar-primary-open' ) ) {
				$( 'html' ).removeClass( 'disable-scroll' );
				$( 'body' ).removeClass( 'sidebar-primary-open' );
				primarySidebar.removeClass( 'open' );
			}
		}
	});
} )( jQuery );