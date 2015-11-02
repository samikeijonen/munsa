/**
 * Monsa JavaScript file.
 *
 * Set up the navigation and sidebar toggles.
 */
( function( $ ) {
	
	var body, page, scrollUp, scrollToContent, mainNav, mainNavWrap, primarySidebar, primarySidebarWrap, menuToggle, sidebarToggle;
	
	// Set up vars.
	page                = $( '#site-wrapper' );
	scrollUp            = page.find( '#scroll-up' );
	scrollToContent     = page.find( '#scroll-to-content' );
	mainNav             = page.find( '#menu-primary' );
	mainNavWrap         = page.find( '#menu-primary .wrap' );
	primarySidebar      = page.find( '#sidebar-primary' );
	primarySidebarWrap  = page.find( '#sidebar-primary .wrap' );
	menuToggle          = page.find( '.main-navigation-toggle' );
	sidebarToggle       = page.find( '.sidebar-primary-toggle' );
	
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
		
		// Add an initial values for the attribute.
		menuToggle.attr( 'aria-expanded', 'false' );
	
		menuToggle.on( 'click', function( event ) {
			
			// Toggle classes.
			$( 'html' ).toggleClass( 'disable-scroll' );
			$( 'body' ).toggleClass( 'main-navigation-open' );
			mainNav.toggleClass( 'open' );
			
			// Hide or show element after animation.
			if ( mainNav.hasClass( 'open' ) ) {
				
				$( mainNav ).css( 'display', 'block' );
				
				$( mainNav ).addClass( 'fadeIn' );
				$( mainNav ).removeClass( 'fadeOut' );
				$( mainNavWrap ).addClass( 'fadeInDown' );
				//$( mainNavWrap ).removeClass( 'fadeOutUp' );
				
			} else {
				
				setTimeout( function() {
					$( mainNav ).css( 'display', 'none' );
				}, 550 );
				
				$( mainNav ).addClass( 'fadeOut' );
				$( mainNav ).removeClass( 'fadeIn' );
				//$( mainNavWrap ).addClass( 'fadeOutUp' );
				$( mainNavWrap ).removeClass( 'fadeInDown' );
				
			}
			
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
		
		// Add an initial values for the attribute.
		sidebarToggle.attr( 'aria-expanded', 'false' );
	
		sidebarToggle.on( 'click', function( event ) {
			
			// Toggle classes.
			$( 'html' ).toggleClass( 'disable-scroll' );
			$( 'body' ).toggleClass( 'sidebar-primary-open' );
			primarySidebar.toggleClass( 'open' );
			
			// Hide or show element after animation.
			if ( primarySidebar.hasClass( 'open' ) ) {
				
				$( primarySidebar ).css( 'display', 'block' );
				
				$( primarySidebar ).addClass( 'fadeIn' );
				$( primarySidebar ).removeClass( 'fadeOut' );
				$( primarySidebarWrap ).addClass( 'fadeInDown' );
				$( primarySidebarWrap ).removeClass( 'fadeOutUp' );
				
			} else {
				
				setTimeout( function() {
					$( primarySidebar ).css( 'display', 'none' );
				}, 550 );
				
				$( primarySidebar ).addClass( 'fadeOut' );
				$( primarySidebar ).removeClass( 'fadeIn' );
				$( primarySidebarWrap ).addClass( 'fadeOutUp' );
				$( primarySidebarWrap ).removeClass( 'fadeInDown' );
				
			}
			
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
				
				setTimeout( function() {
					$( mainNav ).css( 'display', 'none' );
				}, 550 );
				
				$( mainNav ).addClass( 'fadeOut' );
				$( mainNav ).removeClass( 'fadeIn' );
				//$( mainNavWrap ).addClass( 'fadeOutUp' );
				$( mainNavWrap ).removeClass( 'fadeInDown' );
				
			} else if ( $( 'body' ).hasClass( 'sidebar-primary-open' ) ) {
				$( 'html' ).removeClass( 'disable-scroll' );
				$( 'body' ).removeClass( 'sidebar-primary-open' );
				primarySidebar.removeClass( 'open' );
				
				setTimeout( function() {
					$( primarySidebar ).css( 'display', 'none' );
				}, 550 );
				
				$( primarySidebar ).addClass( 'fadeOut' );
				$( primarySidebar ).removeClass( 'fadeIn' );
				$( primarySidebarWrap ).addClass( 'fadeOutUp' );
				$( primarySidebarWrap ).removeClass( 'fadeInDown' );
				
			}
		}
	});
} )( jQuery );