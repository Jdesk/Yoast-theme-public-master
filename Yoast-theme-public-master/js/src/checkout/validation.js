;(function ( $ ) {
	var validBtwNr = false;
	var $body;

	var VATStatistics = function () {
		this.startTime = 0;
		this.endTime = 0;
		this.duration = 0;

		if ( typeof __gaTracker !== "undefined" ) {
			this.tracker = __gaTracker;
		} else {
			this.tracker = function () {
			};
		}
	};

	VATStatistics.prototype.start = function () {
		this.startTime = new Date().getTime();
		this.endTime = 0;
		this.duration = 0;

		this.tracker( 'send', 'event', 'checkout', 'vat-check', 'start' );
	};

	VATStatistics.prototype.end = function () {
		this.endTime = new Date().getTime();
		this.duration = this.endTime - this.startTime;
	};

	VATStatistics.prototype.notVerified = function () {
		this.end();

		this.tracker( 'send', 'event', 'checkout', 'vat-check', 'cannot verify', this.duration );
	};

	VATStatistics.prototype.failed = function () {
		this.end();

		this.tracker( 'send', 'event', 'checkout', 'vat-check', 'failed', this.duration );
	};

	VATStatistics.prototype.success = function () {
		this.end();

		this.tracker( 'send', 'event', 'checkout', 'vat-check', 'ok', this.duration );
	};

	var vatStatistics = new VATStatistics();

	/**
	 * Checks the BTW NR with the VIES API
	 */
	function checkBtwNr( country, btw_nr ) {
		$( '#yst-edd-btw-wrap .fa-spinner' ).addClass( 'show' );
		vatStatistics.start();

		var xhr = jQuery.post( yoast_com_checkout_vars.ajaxurl, {
			action: 'yst_check_vat',
			country: country,
			vat_nr: btw_nr
		}, function ( response ) {
			$( '#yst-edd-btw-wrap .fa-spinner' ).removeClass( 'show' );
			$( '#vaterror' ).remove();
			if ( '1' == response ) {
				$( '#yst_btw' ).removeClass( 'error' ).addClass( 'valid' );
				EDD_Checkout.recalculate_taxes();

				validBtwNr = true;
				vatStatistics.success();
			} else if ( '2' == response ) {
				// Show error, the service is down
				$( '#yst_btw' ).removeClass( 'valid' ).addClass( 'error' );
				EDD_Checkout.recalculate_taxes();
				jQuery( "#yst-edd-btw-wrap" ).append( '<span id="vaterror" class="error">We cannot check if your VAT number is correct because the VAT checking system for the EU is currently down. We\'re sorry for the inconvenience. Please send us an email on <a href="mailto:support@yoast.com">support@yoast.com</a> or try again later.</span>' );

				validBtwNr = false;
				vatStatistics.failed();
			} else {
				$( '#yst_btw' ).removeClass( 'valid' ).addClass( 'error' );
				EDD_Checkout.recalculate_taxes();
				jQuery( "#yst-edd-btw-wrap" ).append( '<span id="vaterror" class="error">We cannot verify this VAT number, this means you will have to pay VAT. Please make sure you\'ve entered the number correctly.</span>' );

				validBtwNr = false;
				vatStatistics.notVerified();
			}
		} );

		// If we fail, try again in a second.
		xhr.fail( function () {
			setTimeout( checkBtwNr, 1000 );
		} );
	}

	/**
	 * Rounds a price to two decimal places
	 *
	 * @param {int} price
	 * @returns {int}
	 */
	function roundPrice( price ) {
		return Math.round( price * 100 ) / 100;
	}

	/**
	 * Fixes the tax in the UI after everything has been recalculated by EDD
	 *
	 * @param {jQuery.Event} e
	 * @param {Object} data Data returned by the EDD AJAX.
	 */
	function fixTaxAfterRecalculation( e, data ) {
		var taxData = data.response;

		if ( validBtwNr && 0 !== taxData.tax_rate_raw ) {
			taxData.total_raw = taxData.total_raw - parseFloat( taxData.tax_raw );

			taxData.tax_raw = 0;
			taxData.tax_rate_raw = 0;
			taxData.tax_rate = '0%';

			// Format fancy prices
			taxData.total = '$ ' + roundPrice( taxData.total_raw );
			taxData.tax = '$' + roundPrice( taxData.tax_raw );

			$( '.edd_cart_amount' ).html( taxData.total );
			$( '.yst-tax-rate' ).html( taxData.tax_rate.replace( '%', '' ) );
			$( '.edd_cart_tax_amount' ).html( taxData.tax );
		}
		else {
			hideOrShowVATNumber( taxData );
		}
		$( '#yst_secondary_tax_rate' ).html( taxData.tax_rate.replace( '%', '' ) );
		$( '#yst_secondary_tax' ).html( taxData.tax );

	}

	/**
	 * Hides or shows the state field based on the selected country
	 */
	function hideOrShowStateField() {
		var $billingCountry = $( '#billing_country' );
		var billingCountry = $billingCountry.val();
		if ( '' === billingCountry ) {
			$( '#edd-card-state-wrap' ).hide();
		}
		else {
			// Trigger a 'change' in the billing country so EDD can 'fix' the state field.
			$billingCountry.trigger( 'change' );
		}
	}

	/**
	 * Hides or shows the VAT Number field based on the selected country
	 */
	function hideOrShowVATNumber( taxData ) {
		var billingCountry = $( '#billing_country' ).val();
		var btw_wrap = $( '#yst-edd-btw-wrap' );

		// No special BTW rule for The Netherlands
		if ( 'NL' == billingCountry ) {
			btw_wrap
				.hide()
				.after( '<p id="yst-dutch-vat-notice"><strong>Please note:</strong> VAT will be added to the invoice. Since Yoast is based in the Netherlands we cannot reverse charge the VAT.</p>' );
			$( '.edd_cart_tax_row' ).css( 'display', 'table-row' );
			return;
		} else {
			$( '#yst-dutch-vat-notice' ).remove();
		}

		// Check if the country is in our special tax list
		if ( taxData && taxData.tax_rate_raw === 0 ) {
			btw_wrap.hide();
			$( '.edd_cart_tax_row' ).css( 'display', 'none' );
			return;
		} else {
			$( '.edd_cart_tax_row' ).css( 'display', 'table-row' );
		}

		btw_wrap.show();
	}

	function initChosen() {
		$( ".chosen-select" ).chosen();
		$body.on( 'edd_cart_billing_address_updated', function () {
			// Remove the old chosen select box.
			$( '#edd-card-state-wrap .chosen-container' ).remove();

			// Chosenfy the new select box.
			$( 'select[name="card_state"]' ).chosen();
		} );
	}

	jQuery( document ).ready( function ( $ ) {
		$body = $( 'body' );

		hideOrShowStateField();
		initChosen();

		$body.on( 'edd_taxes_recalculated', fixTaxAfterRecalculation );

		$( '#card_number' ).payment( 'formatCardNumber' );
		$( '#card-cvc' ).payment( 'formatCardCVC' );

		var card_type = undefined;
		$( '#card_number' ).on( "input", function () {
			if ( $.payment.validateCardNumber( $( this ).val() ) ) {
				$( this ).removeClass( 'error' ).addClass( 'valid' );
			}
			else {
				$( this ).removeClass( 'valid' ).addClass( 'error' );
			}

			if ( $( "#card_cvc" ).val() != '' ) {
				if ( $.payment.validateCardCVC( $( "#card_cvc" ).val(), $.payment.cardType( $( this ).val() ) ) ) {
					$( "#card_cvc" ).removeClass( 'error' ).addClass( 'valid' );
				}
				else {
					$( "#card_cvc" ).removeClass( 'valid' ).addClass( 'error' );
				}
			}
		} );

		$( '#card_cvc' ).on( "input", function () {
			if ( $.payment.validateCardCVC( $( this ).val(), $.payment.cardType( $( '#card_number' ).val() ) ) ) {
				$( this ).removeClass( 'error' ).addClass( 'valid' );
			}
			else {
				$( this ).removeClass( 'valid' ).addClass( 'error' );
			}
		} );

		$( '#card_exp_year' ).on( "input", function () {
			var month = $( '#card_exp_month' ).val();
			var year = $( this ).val();

			if ( 4 === year.length ) {
				year = year.slice( -2 );
				$( this ).val( year );
				return;
			}

			if ( month != '' ) {
				if ( $.payment.validateCardExpiry( month, year ) ) {
					$( 'edd-input-cvc' ).removeClass( 'error' ).addClass( 'valid' );
				} else {
					$( 'edd-input-cvc' ).removeClass( 'valid' ).addClass( 'error' );
				}
			}
		} );

		// validate signup form on keyup and submit
		$( "#edd_purchase_form" ).validate( {
			unhighlight: function ( el, error, valid, _orig ) {
				if ( el.type === "radio" ) {
					this.findByName( el.name ).removeClass( error ).addClass( valid );
				} else if ( !$( el ).hasClass( 'ignore' ) ) {
					$( el ).removeClass( error ).addClass( valid );
				} else {
					$( el ).removeClass( error ).removeClass( valid );
				}
			},
			errorClass: 'error error-message',
			rules: {
				edd_email: {
					required: true,
					email: true
				},
				edd_first: "required",
				card_name: "required",
				card_address: {
					required: true,
					minlength: 2
				},
				card_city: {
					required: true,
					minlength: 2
				},
				card_zip: {
					required: true,
					minlength: 2
				},
				billing_country: "required",
				card_state: "required",

				edd_agree_to_terms: "required",
			},
			messages: {
				edd_first: "Please enter your first name",
				edd_email: "Please enter a valid email address",
				edd_agree_to_terms: "<strong>Error</strong> - Please accept our terms: ",
				card_name: "Please enter the name on your credit card",
				card_address: "Please enter your billing address",
				card_zip: "Please enter your zip / postal code",
				card_state: "Please enter your state",
				card_city: "Please enter your city",
				billing_country: "Please enter your country"
			}
		} );

		$body.on( "change", "#yst_btw", function () {
			var btw_nr = $( '#yst_btw' ).val();
			var billingCountry = $( '#billing_country' ).val();
			// VAT nr given, check it
			if ( '' != btw_nr ) {
				checkBtwNr( billingCountry, btw_nr );
			}
		} );
	} );
}( jQuery ));
