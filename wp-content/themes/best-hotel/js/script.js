( function( $ ) {

	$(document).ready(function($) {

		// Fixed header.
	    if ( $( 'body' ).hasClass( 'enabled-sticky-primary-menu' ) ) {
			$(window).scroll(function () {
				if( $(window).scrollTop() > $('#main-nav,.site-header').offset().top && !($('.site-header').hasClass('fixed'))){
					$('.site-header').addClass('fixed');
				} else if ( 0 === $(window).scrollTop() ){
					$('.site-header').removeClass('fixed');
				}
			});
	    }

		// Go to top.
		var $scroll_obj = $( '#btn-scrollup' );
		$( window ).scroll(function(){
			if ( $( this ).scrollTop() > 100 ) {
				$scroll_obj.fadeIn();
			} else {
				$scroll_obj.fadeOut();
			}
		});

		$scroll_obj.click(function(){
			$( 'html, body' ).animate( { scrollTop: 0 }, 600 );
			return false;
		});
	});

} )( jQuery );
