//jQuery(function ($) {
//    google.maps.event.addDomListener(window, 'load', function () {
//
//        $('.sppb-addon-gmap-canvas').each(function (index) {
//            var mapId = 'sppb-addon-gmap' + (index + 1);
//            var self = this;
//
//            $(this).attr('id', mapId);
//
//            var zoom = $(self).data('mapzoom');
//            var mousescroll = $(self).data('mousescroll');
//
//            var latlng = new google.maps.LatLng($(self).data('lat'), $(self).data('lng'));
//            var mapOptions = {
//                zoom: zoom,
//                center: latlng,
//                disableDefaultUI: true,
//                scrollwheel: mousescroll
//            };
//            var map = new google.maps.Map(document.getElementById(mapId), mapOptions);
//            var marker = new google.maps.Marker({position: latlng, map: map});
//            map.setMapTypeId(google.maps.MapTypeId[$(self).data('maptype')]);
//
//
//            var styles = [
//                {
//                    "featureType": "all",
//                    "elementType": "labels.text.fill",
//                    "stylers": [
//                        {
//                            "saturation": 10
//                        },
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 40
//                        }
//                    ]
//                },
//                {
//                    "featureType": "all",
//                    "elementType": "labels.text.stroke",
//                    "stylers": [
//                        {
//                            "visibility": "on"
//                        },
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 5
//                        }
//                    ]
//                },
//                {
//                    "featureType": "all",
//                    "elementType": "labels.icon",
//                    "stylers": [
//                        {
//                            "visibility": "off"
//                        }
//                    ]
//                },
//                {
//                    "featureType": "administrative",
//                    "elementType": "geometry.fill",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 8
//                        }
//                    ]
//                },
//                {
//                    "featureType": "administrative",
//                    "elementType": "geometry.stroke",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 8
//                        },
//                        {
//                            "weight": 1.2
//                        }
//                    ]
//                },
//                {
//                    "featureType": "landscape",
//                    "elementType": "geometry",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 8
//                        }
//                    ]
//                },
//                {
//                    "featureType": "poi",
//                    "elementType": "geometry",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 8
//                        }
//                    ]
//                },
//                {
//                    "featureType": "road.highway",
//                    "elementType": "geometry.fill",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 2
//                        }
//                    ]
//                },
//                {
//                    "featureType": "road.highway",
//                    "elementType": "geometry.stroke",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 2
//                        },
//                        {
//                            "weight": 0.2
//                        }
//                    ]
//                },
//                {
//                    "featureType": "road.arterial",
//                    "elementType": "geometry",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 2
//                        }
//                    ]
//                },
//                {
//                    "featureType": "road.local",
//                    "elementType": "geometry",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 2
//                        }
//                    ]
//                },
//                {
//                    "featureType": "transit",
//                    "elementType": "geometry",
//                    "stylers": [
//                        {
//                            "color": "#000000"
//                        },
//                        {
//                            "lightness": 10
//                        }
//                    ]
//                },
//                {
//                    "featureType": "water",
//                    "elementType": "geometry",
//                    "stylers": [
//                        {
//                            "color": "#92B9FD"
//                        },
//                        {
//                            "lightness": 10
//                        }
//                    ]
//                }
//            ]; // END gmap styles
//
//            // Set styles to map
//            map.setOptions({styles: styles});
//
//
//        });
//
//    });
//
//});

function initSPPageBuilderGMap() {
    jQuery('.sppb-addon-gmap-canvas').each(function (index) {
        var mapId = jQuery(this).attr('id'),
                //self = this,
                zoom = Number(jQuery(this).attr('data-mapzoom')),
                mousescroll = jQuery(this).attr('data-mousescroll'),
                mousescroll = (mousescroll === 'true') ? true : false,
                maptype = jQuery(this).attr('data-maptype'),
                latlng = {lat: Number(jQuery(this).attr('data-lat')), lng: Number(jQuery(this).attr('data-lng'))};

        var map = new google.maps.Map(document.getElementById(mapId), {
            center: latlng,
            zoom: zoom,
            scrollwheel: mousescroll
        });

        var marker = new google.maps.Marker({
            position: latlng,
            map: map
        });

        map.setMapTypeId(google.maps.MapTypeId[maptype]);

        var styles = [
            {
                "featureType": "all",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "saturation": 10
                    },
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 40
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 5
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 8
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 8
                    },
                    {
                        "weight": 1.2
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 8
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 8
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 2
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 2
                    },
                    {
                        "weight": 0.2
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 2
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 2
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 10
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#92B9FD"
                    },
                    {
                        "lightness": 10
                    }
                ]
            }
        ]; // END gmap styles

        // Set styles to map
        map.setOptions({styles: styles});

    });
}

jQuery(window).load(function () {
    initSPPageBuilderGMap();
});
