jQuery( document ).ready( function( $ ) {

	/**
	 * Close the menu if the user clicks next to the the menu.
	 */
	function init_tap_content_to_close_menu() {
		/**
		 * Simulate a click on the hamburger button to close the menu if the user clicks next to the menu for mobile users.
		 */
		$( window ).click( function() {
			if ( $( 'body' ).attr( 'data-show-mobile-nav' ) ) { // if the mobile menu is showing
				$( '#mobile-show-nav' ).trigger( 'click' );
			}
		} );

		/**
		 * Don't close the menu if any elements in the header are clicked.
		 */
		$( 'header' ).click( function( event ) {
			if ( $( 'body' ).attr( 'data-show-mobile-nav' ) ) { // if the mobile menu is showing
				event.stopPropagation();
			}
		} );
	}

	/**
	 * Sets jQuery event listeners to improve the visual flow of 'current menu item parents'.
	 */
	function init_active_item_flow() {
		var parent_class = 'current-menu-parent';
		var active_item = $( '.' + parent_class );
		var all_items = $( '#yoast-main-menu .menu-item' );
		var non_active_items = all_items.not( '.' + parent_class );

		non_active_items.bind( 'hover',
			function() {
				if ( !$( 'body' ).attr( 'data-show-mobile-nav' ) ) { // if the mobile menu is not showing
					active_item.removeClass( parent_class );
				}
			},
			function() {
				if ( !$( 'body' ).attr( 'data-show-mobile-nav' ) ) { // if the mobile menu is not showing
					active_item.addClass( parent_class );
				}
			}
		);

		/**
		 * Set the clicked menu item as the new parent, unbind current event listeners and reinitialise the event listeners for the new 'current parent'.
		 */
		non_active_items.bind( 'click', function( evt ) {
			// Cleanup.
			all_items.unbind( 'hover' );
			all_items.unbind( 'click' );
			all_items.removeClass( parent_class );

			var clicked_menu_item = $( evt.target ).closest( '.menu-item' );
			clicked_menu_item.addClass( parent_class );

			init_active_item_flow();
		} );
	}

	init_active_item_flow();
	init_tap_content_to_close_menu();
} );
