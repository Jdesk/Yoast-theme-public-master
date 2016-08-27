jQuery( document ).ready( function( $ ) {
	$( '.socialbox a' ).click( function( e ) {
		e.preventDefault();
		if ( typeof __gaTracker !== "undefined" ) {
			__gaTracker( 'send', 'social', $( this ).data( 'name' ), $( this ).data( 'action' ), document.querySelector( "link[rel='canonical']" ).getAttribute( "href" ) );
		}
		if ( $( this ).data( 'popup' ) !== false ) {
			ystWindow = window.open( $( this ).attr( 'href' ), $( this ).data( 'name' ), 'height=550,width=500' );
			if ( window.focus ) {
				ystWindow.focus();
			}
		}
	});
	$( '.social.promoblock a' ).on( 'mousedown', function() {
		if ( typeof __gaTracker !== "undefined" ) {
			__gaTracker( 'send', 'social', $( this ).data( 'name' ), $( this ).data( 'action' ), $( this ).attr( 'href' ) );
		}
	});
	$( '.readmore a' ).on( 'mousedown', function() {
		if ( typeof __gaTracker !== "undefined" ) {
			__gaTracker( 'send', 'event', 'read-more', $( this ).attr( 'title' ), $( this ).data( 'prefix' ) );
		}
	});
	$( 'section.show-off button' ).on( 'mousedown', function() {
		if ( typeof __gaTracker !== "undefined" ) {
			__gaTracker( 'send', 'event', 'banner-buy-click', $( this ).data( 'download-id' ) );
		}
	});
	$( 'section.show-off a' ).on( 'mousedown', function() {
		if ( typeof __gaTracker !== "undefined" ) {
			__gaTracker( 'send', 'event', 'banner-read-more-click', $( this ).attr( 'href' ) );
		}
	});
});

// YouTube tracking
(function( document, window, config ) {
	'use strict';
	window.onYouTubeIframeAPIReady = (function() {
		var cached = window.onYouTubeIframeAPIReady;
		return function() {
			if ( cached ) {
				cached.apply( this, arguments );
			}
			if ( !navigator.userAgent.match( /MSIE [67]\./gi ) ) {
				digestPotentialVideos( iframes );
				console.log( 'init' );
			}
		};
	})();

	var _config = config || {};
	var forceSyntax = _config.forceSyntax || 0;
	var dataLayerName = _config.dataLayerName || 'dataLayer';
	var eventsFired = {
		'Play': true,
		'Pause': true,
		'Watch to End': true
	};

	var key;
	for ( key in _config.events ) {
		if ( _config.events.hasOwnProperty( key ) ) {
			eventsFired[ key ] = _config.events[ key ];
		}
	}

	var loadYoutube = false;
	var iframes = document.getElementsByTagName( 'iframe' );
	[].forEach.call( iframes, function( iframe ) {
		if ( checkIfYouTubeVideo( iframe ) ) {
			loadYoutube = true;
		}
	});

	if ( loadYoutube ) {
		var tag = document.createElement( 'script' );
		tag.src = '//www.youtube.com/iframe_api';
		var firstScriptTag = document.getElementsByTagName( 'script' )[ 0 ];
		firstScriptTag.parentNode.insertBefore( tag, firstScriptTag );
	}

	function digestPotentialVideos( potentialVideos ) {
		var i;
		for ( i = 0; i < potentialVideos.length; i++ ) {
			var isYouTubeVideo = checkIfYouTubeVideo( potentialVideos[ i ] );
			if ( isYouTubeVideo ) {
				var normalizedYouTubeIframe = normalizeYouTubeIframe( potentialVideos[ i ] );
				addYouTubeEvents( normalizedYouTubeIframe );
			}
		}
	}

	function checkIfYouTubeVideo( potentialYouTubeVideo ) {

		var potentialYouTubeVideoSrc = potentialYouTubeVideo.src || '';
		if ( potentialYouTubeVideoSrc.indexOf( 'youtube.com/embed/' ) > -1 ||
			 potentialYouTubeVideoSrc.indexOf( 'youtube.com/v/' ) > -1 ) {
			return true;
		}
		return false;
	}

	function normalizeYouTubeIframe( youTubeVideo ) {

		var a = document.createElement( 'a' );
		a.href = youTubeVideo.src;
		a.hostname = 'www.youtube.com';
		a.protocol = document.location.protocol;
		var tmpPathname = a.pathname.charAt( 0 ) === '/' ? a.pathname : '/' + a.pathname;  // IE10 shim

		var origin = window.location.protocol + '%2F%2F' + window.location.hostname + ( window.location.port ? ':' + window.location.port : '' );
		if ( a.search.indexOf( 'enablejsapi' ) === -1 ) {
			a.search = ( a.search.length > 0 ? a.search + '&' : '' ) + 'enablejsapi=1';
		}
		if ( a.search.indexOf( 'origin' ) === -1 && window.location.hostname.indexOf( 'localhost' ) === -1 ) {
			a.search = a.search + '&origin=' + origin;
		}
		if ( youTubeVideo.type === 'application/x-shockwave-flash' ) {
			var newIframe = document.createElement( 'iframe' );
			newIframe.height = youTubeVideo.height;
			newIframe.width = youTubeVideo.width;
			tmpPathname = tmpPathname.replace( '/v/', '/embed/' );
			youTubeVideo.parentNode.parentNode.replaceChild( newIframe, youTubeVideo.parentNode );
			youTubeVideo = newIframe;
		}
		a.pathname = tmpPathname;
		if ( youTubeVideo.src !== a.href + a.hash ) {
			youTubeVideo.src = a.href + a.hash;
		}
		return youTubeVideo;
	}

	function addYouTubeEvents( youTubeIframe ) {
		youTubeIframe.pauseFlag = false;
		new YT.Player( youTubeIframe, {
				events: {
					onStateChange: function( evt ) {
						onStateChangeHandler( evt, youTubeIframe );
					}
				}
			}
		);
	}

	function getMarks( duration ) {
		var marks = {};
		if ( _config.events[ 'Watch to End' ] ) {
			marks[ 'Watch to End' ] = duration * 99 / 100;
		}
		if ( _config.percentageTracking ) {
			var points = [];
			var i;
			if ( _config.percentageTracking.each ) {
				points = points.concat( _config.percentageTracking.each );
			}
			if ( _config.percentageTracking.every ) {
				var every = parseInt( _config.percentageTracking.every, 10 );
				var num = 100 / every;

				for ( i = 1; i < num; i++ ) {
					points.push( i * every );
				}
			}
			for ( i = 0; i < points.length; i++ ) {
				var _point = points[ i ];
				var _mark = _point + '%';
				var _time = duration * _point / 100;

				marks[ _mark ] = Math.floor( _time );
			}
		}
		return marks;
	}

	function checkCompletion( player, marks, videoId ) {
		var duration = player.getDuration();
		var currentTime = player.getCurrentTime();
		var playbackRate = player.getPlaybackRate();
		player[ videoId ] = player[ videoId ] || {};
		var key;
		for ( key in marks ) {
			if ( marks[ key ] <= currentTime && !player[ videoId ][ key ] ) {
				player[ videoId ][ key ] = true;
				fireAnalyticsEvent( videoId, key );
			}
		}
	}

	function onStateChangeHandler( evt, youTubeIframe ) {

		var stateIndex = evt.data;
		var player = evt.target;
		var targetVideoUrl = player.getVideoUrl();
		var targetVideoId = targetVideoUrl.match( /[?&]v=([^&#]*)/ )[ 1 ];  // Extract the ID
		var playerState = player.getPlayerState();
		var duration = player.getDuration();
		var marks = getMarks( duration );
		var playerStatesIndex = {
			'1': 'Play',
			'2': 'Pause'
		};
		var state = playerStatesIndex[ stateIndex ];
		youTubeIframe.playTracker = youTubeIframe.playTracker || {};
		if ( playerState === 1 && !youTubeIframe.timer ) {
			clearInterval( youTubeIframe.timer );
			youTubeIframe.timer = setInterval( function() {
					checkCompletion( player, marks, youTubeIframe.videoId );
				}, 1000
			);
		}
		else {
			clearInterval( youTubeIframe.timer );
			youTubeIframe.timer = false;
		}
		if ( stateIndex === 1 ) {
			youTubeIframe.playTracker[ targetVideoId ] = true;
			youTubeIframe.videoId = targetVideoId;
			youTubeIframe.pauseFlag = false;
		}
		if ( !youTubeIframe.playTracker[ youTubeIframe.videoId ] ) {
			return false;
		}
		if ( stateIndex === 2 ) {
			if ( !youTubeIframe.pauseFlag ) {
				youTubeIframe.pauseFlag = true;
			}
			else {
				return false;
			}
		}
		if ( eventsFired[ state ] ) {
			fireAnalyticsEvent( youTubeIframe.videoId, state );
		}
	}

	function fireAnalyticsEvent( videoId, state ) {
		var videoUrl = 'https://www.youtube.com/watch?v=' + videoId;
		__gaTracker( 'send', 'event', 'Video', state, videoUrl );
	}

})( document, window, {
		'events': {
			'Play': true,
			'Pause': true,
			'Watch to End': true
		},
		'percentageTracking': {
			'every': 25,
			'each': [ 10, 90 ]
		}
	}
);