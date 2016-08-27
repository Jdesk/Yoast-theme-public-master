(function( $ ) {
	'use strict';

	function init() {
		// Hide all lessons by default
		$( '.syllabus-section' ).addClass( 'closed' );
		$( '.syllabus-section.current-section' )
			.removeClass( 'closed' )
			.addClass( 'open' );
		$( '.syllabus-section .toggle' ).on( 'click', function( e ) {
			$( e.currentTarget )
				.closest( '.syllabus-section' )
				.toggleClass( 'open' )
				.toggleClass( 'closed' );
		});
	}

	$( init );
}( jQuery ));
