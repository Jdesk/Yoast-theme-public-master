(function( $ ) {
	$( function() {
		$( '.yoast_academy .extra' ).each( function( i, item ) {
			Stickyfill.add( item );

			// If Sticky is natively supported it will make these functions identical.
			if ( Stickyfill.add !== Stickyfill.remove ) {
				$( 'body' ).addClass( 'sticky-filled' );
			}
		});
	});
}( jQuery ));
