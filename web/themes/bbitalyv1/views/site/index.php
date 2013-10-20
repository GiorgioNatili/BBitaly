<script type="text/javascript">
    jQuery(document).ready(function() {
        // Load Itineraries
        loadSuggestedItinerary(0);
        
        // Load Popular BBs
        loadPopularBB(0);
        
        // Load Featured BBs
        loadFeaturedBB(0);
        
        // Load Most Popular BBs
    });
    
    function loadSuggestedItinerary(offset) {
        offset = (typeof offset === 'undefined' ? loadSuggestedItinerary.loaded : offset);
        $.ajax({
            url: "/itinerary/ajaxSuggested?offset="+offset,
            success: function(data) {
                // Append here.
                data = JSON.parse(data);
                loadSuggestedItinerary.total = data.total;
                delete data.total;
                if ( typeof loadSuggestedItinerary.loaded === 'undefined')
                    loadSuggestedItinerary.loaded = 0;
                loadSuggestedItinerary.loaded += $.getLength(data);
                $.map(data,function(row) {
                    var html = '<li class="item accordion-group">'
                         +       '<div class="itinerary-block col2-set" data-toggle="collapse" data-parent="#itinerary_accordion" href="#itinerary_'+row.id+'">'
                         +           '<div class="col1">'
                         +               '<div class="img"><img alt="" src="'+(row.cover.img_name)+'"></div>'
                         +           '</div>'
                         +           '<div class="col2">'
                         +              '<div class="info">'
                         +                  '<h2>'+row.name +'</h2>'
                         +                   '<p>dal:<strong>'+cleanDate(row.date_from * 1000)+'</strong> al:<strong>'+cleanDate(row.date_to * 1000) +'</strong></p>'
                         +                   '<p><strong>999</strong> strutture prenotate/ 99 citta</p>'
                         +               '</div>'
                         +           '</div>'
                         +       '</div>'
                         +       '<div class="collapse" id="itinerary_'+row.id+'">'
                         +           '<div class="itinerary-content">'
                         +               '<div class="description">'
                         +                   '<p>'+row.description +'</p>'
                         +               '</div>'
                         +               '<div class="map">'
                         +                   'Map'
                         +               '</div>';
                        if (row.location.length > 0) {
                            html += ''
                                +               '<div class="itinerary-stages">'
                                +                   '<ul class="outcome-list">';
                            for (var x in row.location) {
                                html += '<li>'
                                    +        '<div class="count">1</div>'
                                    +           '<div class="outcome">'
                                    +              '<div class="name">'+row.location[x].name +'</div>'
                                    +              '<div class="date"><i class="icon-flag"></i> '+cleanDate(row.location[x].date_from * 1000)+'</div>'
                                    +              '<div class="date"><i class="icon-flag"></i> '+cleanDate(row.location[x].date_to * 1000)+'</div>'
                                    +              '<div class="day"><i class="icon-flag"></i> '+row.location[x].persons+'</div>'
                                    +           '</div>'
                                    +   '</li>';
                            }
                            html +=                   '</ul>'
                                +               '</div>';
                        }
                 
                      html +=   '</div>';
                      html +=       '</div>'
                      html +=   '</li>';
                     $('#suggested_itinerary .itinerary-list').append(html);
                     $('.map').gmap3();
                });
                if ( loadSuggestedItinerary.loaded >= loadSuggestedItinerary.total) {
                    $('#suggested_itinerary_Bar').remove();
                }
            }
        });
    }
    
    function loadPopularBB(offset) {
        offset = (typeof offset === 'undefined' ? loadPopularBB.loaded : offset);
        $.ajax({
            url: "/property/ajaxPopular?offset="+offset,
            success: function(data) {
                // Append here.
                data = JSON.parse(data);
                loadPopularBB.total = data.total;
                delete data.total;
                if ( typeof loadPopularBB.loaded === 'undefined')
                    loadPopularBB.loaded = 0;
                loadPopularBB.loaded += $.getLength(data);
                $.map(data,function(row) {
                     $('#most_popular .quick-list').append(
                         '<li class="span6 box" onclick="window.location = \'property/'+row.id +'\'">'
                        +        '<div class="bb-like-heart">'
                        +            '<i class="icon-favourite-big"></i>'
                        +            '<span>'+row.favorites+'</span>'
                        +        '</div>'
                        +       '<div class="img b20-4s">'
                        +           '<img src="'+(row.img_name === null ? '/themes/bbitalyv1/assets/img/bb_list-img-1.jpg' : row.img_name)+'" alt="" />'
                        +        '</div>'
                        +        '<div class="info b15-4s">'
                        +            '<div class="text bb-price"><i class="icon-price"></i> '+row.base_price +' &euro;</div>'
                        +        '</div>'
                        +        '<div class="desc b15-4s">'
                        +            row.title
                        +        '</div>'
                        +        '<p><i class="icon-location"></i> '+row.address+ ', '+row.zip_code+' / '+ row.city+'</p>'
                        +    '</li>'
                     );
                });
                if ( loadPopularBB.loaded >= loadPopularBB.total) {
                    $('#most_popular_Bar').remove();
                }
            }
        });
    }
    
    function loadFeaturedBB(offset) {
        offset = (typeof offset === 'undefined' ? loadFeaturedBB.loaded : offset);
        $.ajax({
            url: "/property/ajaxFeatured?offset="+offset,
            success: function(data) {
                // Append here.
                data = JSON.parse(data);
                loadFeaturedBB.total = data.total;
                delete data.total;
                if ( typeof loadFeaturedBB.loaded === 'undefined')
                    loadFeaturedBB.loaded = 0;
                loadFeaturedBB.loaded += $.getLength(data);
                $.map(data,function(row) {
                     $('#featured_bb .quick-list').append(
                         '<li class="span6 box" onclick="window.location = \'property/'+row.id +'\'">'
                        +            '<div class="img b20-4s">'
                        +                 '<img src="'+(typeof row.cover.img_name === 'undefined' ? '/themes/bbitalyv1/assets/img/bb_list-img-1.jpg' : row.cover.img_name)+'" alt="" />'
                        +            '</div>'
                        +            '<div class="info b15-4s">'
                        +                '<div class="text bb-price"><i class="icon-price"></i> '+row.base_price+' &euro; </div>'
                        +                 '<div class="text bb-like"><i class="icon-favourite"></i> '+row.favorites+'</div>'
                        +             '</div>'
                        +             '<div class="desc b15-4s">'
                        +                 row.title
                        +             '</div>'
                        +             '<p><i class="icon-location"></i> '+row.address+ ', '+row.zip_code+' / '+ row.city+'</p>'
                        +         '</li>'
                     );
                });
                if ( loadFeaturedBB.loaded >= loadFeaturedBB.total) {
                    $('#featured_bb_Bar').remove();
                }
            }
        });
    }
</script>
<section>
<!-- InstanceBeginEditable name="EditRegionSection" -->
	<div class="container home-searchbar">
    	<div class="searchbar">
        	<h1>Il tuo bed and breakfast in Italia! </h1>
            <p class="lead">Il tuo bed and breakfast in Italia!</p>
            <form method="GET" action="search">
                <div class="search">
            	<div class="row">
                    <div class="span5">
                        <input type="text" name="kw" placeholder="Search a place" class="search-query">
                    </div>
                    <div class="span7">
                    	<div class="search-option pull-right">
                        	<button class="btn btn-search" type="submit"><i class="icon-search icon-white"></i></button>
                        </div>
                        <div class="search-option pull-right">
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">persone <i class="icon-users"></i></a>
                                <input type="hidden" name="people" id="hidden_people" value="1" />
                                <ul class="dropdown-menu" id="sq-peopel-selector">
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">6+</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="search-option pull-right">
                            <input type="text" class="inut-field medium datepicker" name="checkout" value="" id="checkout" />
                            <i class="icon-checkout"></i>
                        </div>
                    	<div class="search-option pull-right">
                            <input type="text" class="inut-field medium datepicker" name="checkin" value="" id="checkin" />
                            <i class="icon-checkin"></i>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
	<div class="carousel bb-carousel" id="myCarousel">
        <!-- Carousel items -->  
        <div class="carousel-inner">  
	        <div class="active item">
            	<div class="img"><img src="<?php echo $this->getAssetsUrl() ?>img/bb_slide-1.jpg" alt="" /></div>
                <div class="container">
                	<div class="description">
                        <div class="row">
                            <div class="span6">
                                <div class="box">
                                	<img src="<?php echo $this->getAssetsUrl() ?>img/bb_slide-box-1.png" alt="" />
                                </div>
                                <div class="box">
                                	<img src="<?php echo $this->getAssetsUrl() ?>img/bb_slide-box-2.png" alt="" />
                                </div>
                            </div>
                            <div class="span6">
                                <div class="row">
                                	<div class="text bb-like pull-right"><i class="icon-favourite"></i> 69</div>
                                    <div class="text bb-price pull-right"><i class="icon-price"></i> 999,00 &euro;</div>
                                </div>
                                <div class="row">
                                    <div class="text note pull-right">
                                    	<p><strong>Nome della struttura ricettiva molto lungo lunghissimo</strong></p>
                                        <p>Frattamaggiore localita molto lunga / Napoli</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
            	<div class="img"><img src="<?php echo $this->getAssetsUrl() ?>img/bb_slide-2.jpg" alt="" /></div>
                <div class="container">
                	<div class="description">
                        <div class="row">
                            <div class="span6">
                                <div class="box">
                                	<img src="<?php echo $this->getAssetsUrl() ?>img/bb_slide-box-2.png" alt="" />
                                </div>
                                <div class="box">
                                	<img src="<?php echo $this->getAssetsUrl() ?>img/bb_slide-box-1.png" alt="" />
                                </div>
                            </div>
                            <div class="span6">
                                <div class="row">
                                	<div class="text bb-like pull-right"><i class="icon-favourite"></i> 115</div>
                                    <div class="text bb-price pull-right"><i class="icon-price"></i> 12,00 &euro;</div>
                                </div>
                                <div class="row">
                                    <div class="text note pull-right">
                                    	<p><strong>Nome della struttura ricettiva molto lungo lunghissimo</strong></p>
                                        <p>Frattamaggiore localita molto lunga / Napoli</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <!-- Carousel shadow -->
        <span class="carousel-shadow left">&nbsp;</span>
        <span class="carousel-shadow right">&nbsp;</span>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&nbsp;</a>  
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&nbsp;</a>  
    </div>

	<div class="container">
		<div class="home-tab">
            <ul class="nav nav-tabs" id="bbTab">
                <li class="active"><a href="#suggested_itinerary"><i class="icon-tab-itinerary"></i> Suggested Itinerary</a></li>
                <li><a href="#featured_bb"><i class="icon-tab-featured"></i> Featured B&amp;B</a></li>
                <li><a href="#most_popular"><i class="icon-tab-popular"></i> Most Popular</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="suggested_itinerary">
                	<div class="container">
                        <ul class="itinerary-list" id="itinerary_accordion">
                            
                        </ul>
                    </div>
                    <div class="row browseBar" id="suggested_itinerary_Bar">
                        <div class="span12">
                            <a href="javascript:void(0);" class="more bg-blue">Browse other content <br><i class="icon-arrow-down"></i></a>
                        </div>
                    </div><!-- BROWSE MORE -->
                </div>
                <div class="tab-pane" id="featured_bb">
                	<div class="container">
                    	<ul class="quick-list green-list row">
                        </ul>
                    </div>
                    <div class="row browseBar" id="featured_bb_Bar" onclick="loadFeaturedBB();">
                        <div class="span12">
                            <a href="javascript:void(0);" class="more bg-green">Browse other content <br><i class="icon-arrow-down"></i></a>
                        </div>
                    </div><!-- BROWSE MORE -->
                </div>
                <div class="tab-pane" id="most_popular">
                	<div class="container">
                    	<ul class="quick-list red-list row">
                            
                        </ul>
                    </div>
                    <div class="row browseBar" id="most_popular_Bar" onclick="loadPopularBB();">
                        <div class="span12">
                            <a href="javascript:void(0);" class="more bg-red">Browse other content <br><i class="icon-arrow-down"></i></a>
                        </div>
                    </div><!-- BROWSE MORE -->
                </div>
            </div>
		</div><!-- HOME TAB - END -->
    </div>
</section><!-- SECTION - END -->