;(function( $ ) {
	var currentStep;

	function init() {
		currentStep = parseInt( $( '#steps-progress' ).data( 'step' ), 10 );
		$( '#yst-to-step-3' ).on( 'click', toStep.bind( window, 3 ) );
		$( '#yst-to-step-4' ).on( 'click', toStep.bind( window, 4 ) );
	}

	/**
	 * Tries to go to the clicked step
	 *
	 * @param {int} step
	 * @param {jQuery.Event} e
	 */
	function toStep( step, e ) {
		if ( step > currentStep ) {
			nextStep();
			e.preventDefault();
		}
	}

	/**
	 *
	 */
	function nextStep() {
		switch ( currentStep ) {
			case 2:
				$( '#edd_next_button' ).click();
				break;

			case 3:
				$( '#edd-purchase-button' ).click();
				break;
		}
	}

	$( init );
}( jQuery ));
