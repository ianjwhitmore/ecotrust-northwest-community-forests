"use strict";


function googleMap () {
  if (jQuery('.google-map-three').length) {
    jQuery('.google-map-three').each(function () {
      // getting options from html 
      var $Self = jQuery(this);
      var mapName = $Self.attr('id');
      var mapLat = $Self.data('map-lat');
      var mapLng = $Self.data('map-lng');
      var iconPath = $Self.data('icon-path');
      var mapZoom = $Self.data('map-zoom');
      var mapTitle = $Self.data('map-title');


	  var styles = [
	    {
	        "featureType": "landscape",
	        "elementType": "labels",
	        "stylers": [
	            {
	                "visibility": "off"
	            }
	        ]
	    },
	    {
	        "featureType": "transit",
	        "elementType": "labels",
	        "stylers": [
	            {
	                "visibility": "off"
	            }
	        ]
	    },
	    {
	        "featureType": "poi",
	        "elementType": "labels",
	        "stylers": [
	            {
	                "visibility": "off"
	            }
	        ]
	    },
	    {
	        "featureType": "water",
	        "elementType": "labels",
	        "stylers": [
	            {
	                "visibility": "off"
	            }
	        ]
	    },
	    {
	        "featureType": "road",
	        "elementType": "labels.icon",
	        "stylers": [
	            {
	                "visibility": "off"
	            }
	        ]
	    },
	    {
	        "stylers": [
	            {
	                "hue": "#00aaff"
	            },
	            {
	                "saturation": -100
	            },
	            {
	                "gamma": 2.15
	            },
	            {
	                "lightness": 12
	            }
	        ]
	    },
	    {
	        "featureType": "road",
	        "elementType": "labels.text.fill",
	        "stylers": [
	            {
	                "visibility": "on"
	            },
	            {
	                "lightness": 24
	            }
	        ]
	    },
	    {
	        "featureType": "road",
	        "elementType": "geometry",
	        "stylers": [
	            {
	                "lightness": 57
	            }
	        ]
	    }
	]


      // if zoom not defined the zoom value will be 15;
      if (!mapZoom) {
        var mapZoom = 12;
      };
      // init map
      var map;
      map = new GMaps({
          div: '#'+mapName,
          scrollwheel: false,
          lat: mapLat,
          lng: mapLng,
          styles: styles,
          zoom: mapZoom
      });
      // if icon path setted then show marker
      if(iconPath) {
        
        map.addMarker({
            icon: iconPath,
            lat: mapLat,
              lng: mapLng,
              title: mapTitle,
        });
      }
    });  
  };
}


// Dom Ready Function
jQuery(document).on('ready', function () {
	(function ($) {
		// add your functions
		googleMap();
	})(jQuery);
});