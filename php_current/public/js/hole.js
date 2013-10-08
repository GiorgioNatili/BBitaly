(function($)
{
    $.fn.hole = function(){
        var tmp=arguments;
        return this.each( function(i,val)
        {
            var defaults = {
                next_button_selector : ".arrow.right",
                previous_button_selector : ".arrow.left",
                markers:[],
                onBeforeSlide : function(current_index,current_element,target_index,target_element){
                    return true;
                },
                onSlide : function(current_index,current_element){},
                init:function(current_index,current_element,current_count){},
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                zoom: 15,
                fit_bounds:false,
                circular:true,
                marker_icons:{
                    "hotel":{
                        active:new google.maps.MarkerImage('/images/placeholder.png',new google.maps.Size(70, 81),new google.maps.Point(0,0),new google.maps.Point(35, 40)),
                        normal:new google.maps.MarkerImage('/images/placeholder.png',new google.maps.Size(32, 50),new google.maps.Point(0,0),new google.maps.Point(16, 50))
                    },
                    "bedandbreakfast":{
                        active:new google.maps.MarkerImage('/images/placeholder.png',new google.maps.Size(70, 80),new google.maps.Point(0,0),new google.maps.Point(35, 50)),
                        normal:new google.maps.MarkerImage('/images/placeholder.png',new google.maps.Size(70, 80),new google.maps.Point(0,0),new google.maps.Point(35, 50))
                    }
                },
                marker_shadow:new google.maps.MarkerImage('/images/shadow.png',new google.maps.Size(36, 10),new google.maps.Point(0,0),new google.maps.Point(5, 9)),
                active_marker_shadow:new google.maps.MarkerImage('/images/shadow.png',new google.maps.Size(36, 10),new google.maps.Point(0,0),new google.maps.Point(0, 0))
            };
            var current_count = 0;
            var current_index = 0;
            var element = $(this);
            var instance = this;
            var options;
            var map;
            var markers = [];

            var instanceMethods = { 
                jumpToIndex :function(index)
                {
                    if ( options.onBeforeSlide(current_index,options.markers[current_index],index*1+1,options.markers[index]))
                    {
                        markers[current_index].setIcon(options.marker_icons[options.markers[current_index].type].normal);
                        current_index = index;
                        element.data('hole-index',current_index);
                        markers[current_index].setIcon(options.marker_icons[options.markers[current_index].type].active);
                        map.panTo(markers[current_index].getPosition());
                        //l'evento "idle" non si scatena se non c'Ã¨ un effettivo spostamento del centro della mappa
                        google.maps.event.addListenerOnce(map, 'idle', function(){
                            options.onSlide( current_index,options.markers[current_index] );
                        });
                    }
                },
                goToNext:function(event)
                {
                    element.hole('jumpToIndex',current_index < current_count - 1 ? current_index*1 + 1 : ( options.circular ? 0 : current_count - 1) );
                },
                goToPrevious:function( event )
                {
                    element.hole('jumpToIndex',current_index > 0 ? current_index - 1 : (options.circular ? current_count - 1 : 0 ));
                }
            };
            if (element.data('hole-defined')) {
                var args = Array.prototype.slice.apply(tmp);
                options = element.data('hole-options');
                current_count = element.data('hole-count');
                current_index = element.data('hole-index');
                map = element.data('hole-map');
                markers = element.data('hole-markers');
                if (args.length > 0)
                {
                    instanceMethods[args[0]].apply(this,args.slice(1,args.length));
                }
            }
            else
            {
                element.data('hole-defined', true);
                setOptions();
                initialize();
            }
            
            function setOptions()
            {
                options = Array.prototype.slice.apply(tmp);
                options = $.extend({}, defaults, element.data('hole-options'), options[0]);
                element.data('hole-options', options);
            }
            
            function initialize()
            {
                current_count = options.markers.length;
                element.data('hole-count', current_count);
                element.data('hole-index',current_index);
                setUpMap();
                setUpMarkers();
                $(window).bind('resize',resizeMap);
                options.init( current_index*1+1,options.markers[current_index],current_count);
            }
            
            function resizeMap()
            {
                map.setCenter(markers[element.data('hole-index')].getPosition());
            }
            
            function setUpMap()
            {
                map = new google.maps.Map(instance, {
                    zoom:options.zoom,
                    mapTypeId:options.mapTypeId,
                    disableDefaultUI: false,
                    center: new google.maps.LatLng(42.33, 12.85),
                    scrollwheel: false,
                    draggable: false
                });
                google.maps.event.addListener(map, 'zoom_changed', resizeMap );
                element.data('hole-map',map);
            }
            
            function setUpMarkers()
            {
                if ( current_count )
                {
                    //var latlngbounds = new google.maps.LatLngBounds ();
                    for(var index in options.markers)
                    {
                        var marker = getMarker(index,options.markers[index]);
                        //latlngbounds.extend( marker.getPosition() );
                        markers.push(marker);
                        //map.fitBounds(latlngbounds);
                    }
                    element.data('hole-markers',markers);
                    element.hole('jumpToIndex',current_index);
                }
            }
            
            function getMarker(index,marker_data)
            {
                var latlng = new google.maps.LatLng(marker_data.lat, marker_data.lng)
                //latlngbounds.extend( latlng );
                var marker = new google.maps.Marker({
                    map: map,
                    position: latlng,
                    title:marker_data.name,
                    icon: index == 0 ? options.marker_icons[options.markers[index].type].active : options.marker_icons[options.markers[index].type].normal,
                    shadow : options.marker_shadow
                });
                marker.index = index;
                google.maps.event.addListener(marker, 'click', function(){
                    element.hole('jumpToIndex',this.index);
                });
                return marker;
            }
        });
    }
})(jQuery);