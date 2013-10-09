<section>
<!-- InstanceBeginEditable name="EditRegionSection" -->
	<div class="container home-searchbar">
    	<div class="searchbar">
        	<h1>Il tuo bed and breakfast in Italia! </h1>
            <p class="lead">Il tuo bed and breakfast in Italia!</p>
            <div class="search">
                <form method="GET" action="/search">
                    <div class="row">
                        <div class="span4">
                            <input type="text" placeholder="Search a place" class="search-query">
                        </div>
                        <div class="span8">
                            <div class="search-option pull-right">
                                    <button class="btn btn-search" type="submit"><i class="icon-search icon-white"></i></button>
                            </div>
                            <div class="search-option pull-right">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">number of people <i class="icon-users"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">date 1</a></li>
                                        <li><a href="#">date 2</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="search-option pull-right">
                                <input type="text" name="checkout" placeholder="checkout" class="datepicker input-field x-small" />
                                
                            </div>
                            <div class="search-option pull-right">
                                <input type="text" name="checkout" placeholder="checkout" class="datepicker input-field x-small" />
                               
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
                            <li class="item accordion-group">
                                <div class="itinerary-block col2-set" data-toggle="collapse" data-parent="#itinerary_accordion" href="#itinerary_one">
                                    <div class="col1">
                                        <div class="img"><img alt="" src="<?php echo $this->getAssetsUrl() ?>img/suggested-itinerary-img1.jpg"></div>
                                    </div>
                                    <div class="col2">
                                        <div class="info">
                                            <h2>Nome dell'itinerario 001</h2>
                                            <p>dal:<strong>02/02/0202</strong> al:<strong>02/02/0202</strong></p>
                                            <p><strong>999</strong> strutture prenotate/ 99 citta</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="itinerary_one">
                                    <div class="itinerary-content">
                                        <div class="description">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac libero nisi. Phasellus elit neque, euismod eu tempus ac, molestie et justo. Phasellus aliquam sagittis massa, nec ultricies risus faucibus at. Sed quis magna purus, ut vulputate nunc. Integer fermentum luctus bibendum. Nunc non dui sed leo luctus consequat. Duis aliquet leo massa. Nulla rutrum orci sed tortor molestie cursus.</p>
                                        </div>
                                        <div class="map">
                                            Map
                                        </div>
                                        <div class="itinerary-stages">
                                            <ul class="outcome-list">
                                                <li>
                                                    <div class="count">1</div>
                                                    <div class="outcome">
                                                        <div class="name">Nome della localit' molto lunga 001</div>
                                                        <div class="date"><i class="icon-flag"></i> 10/01/2013</div>
                                                        <div class="date"><i class="icon-flag"></i> 10/01/2013</div>
                                                        <div class="day"><i class="icon-flag"></i> 10</div>
                                                        <div class="delete"><a href="#"><i class="icon-flag"></i> D</a></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="count">2</div>
                                                    <div class="outcome">
                                                        <div class="name">Nome della localit' molto lunga 001</div>
                                                        <div class="date"><i class="icon-flag"></i> 10/01/2013</div>
                                                        <div class="date"><i class="icon-flag"></i> 10/01/2013</div>
                                                        <div class="day"><i class="icon-flag"></i> 10</div>
                                                        <div class="delete"><a href="#"><i class="icon-flag"></i> D</a></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="count">3</div>
                                                    <div class="outcome">
                                                        <div class="name">Nome della localit' molto lunga 001</div>
                                                        <div class="date"><i class="icon-flag"></i> 10/01/2013</div>
                                                        <div class="date"><i class="icon-flag"></i> 10/01/2013</div>
                                                        <div class="day"><i class="icon-flag"></i> 10</div>
                                                        <div class="delete"><a href="#"><i class="icon-flag"></i> D</a></div>
                                                    </div>
                                                </li>
                                                <li class="add-outcome">
                                                    <div class="count">+</div>
                                                    <div class="outcome">
                                                        <div class="name"><a href="#">Nome della localit' molto lunga 001</a></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="button-sets a-center">
                                            <button class="button booking-btn">
                                                <span>
                                                    <span><i class="icon-flag"> </i>prenota itinerario</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item accordion-group">
                                <div class="itinerary-block col2-set" data-toggle="collapse" data-parent="#itinerary_accordion" href="#itinerary_two">
                                    <div class="col1">
                                        <div class="img"><img alt="" src="<?php echo $this->getAssetsUrl() ?>img/suggested-itinerary-img1.jpg"></div>
                                    </div>
                                    <div class="col2">
                                        <div class="info">
                                            <h2>Nome dell'itinerario 001</h2>
                                            <p>dal:<strong>02/02/0202</strong> al:<strong>02/02/0202</strong></p>
                                            <p><strong>999</strong> strutture prenotate/ 99 citta</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="itinerary_two">
                                    <div class="itinerary-content">
                                        <div class="description">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac libero nisi. Phasellus elit neque, euismod eu tempus ac, molestie et justo. Phasellus aliquam sagittis massa, nec ultricies risus faucibus at. Sed quis magna purus, ut vulputate nunc. Integer fermentum luctus bibendum. Nunc non dui sed leo luctus consequat. Duis aliquet leo massa. Nulla rutrum orci sed tortor molestie cursus.</p>
                                        </div>
                                        <div class="map">
                                            Map
                                        </div>
                                        <div class="itinerary-stages">
                                            <ul class="outcome-list">
                                                <li>
                                                    <div class="count">1</div>
                                                    <div class="outcome">
                                                        <div class="name">Nome della localit' molto lunga 001</div>
                                                        <div class="date"><i class="icon-flag"></i> 10/01/2013</div>
                                                        <div class="date"><i class="icon-flag"></i> 10/01/2013</div>
                                                        <div class="day"><i class="icon-flag"></i> 10</div>
                                                        <div class="delete"><a href="#"><i class="icon-flag"></i> D</a></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="count">2</div>
                                                    <div class="outcome">
                                                        <div class="name">Nome della localit' molto lunga 001</div>
                                                        <div class="date"><i class="icon-flag"></i> 10/01/2013</div>
                                                        <div class="date"><i class="icon-flag"></i> 10/01/2013</div>
                                                        <div class="day"><i class="icon-flag"></i> 10</div>
                                                        <div class="delete"><a href="#"><i class="icon-flag"></i> D</a></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="count">3</div>
                                                    <div class="outcome">
                                                        <div class="name">Nome della localit' molto lunga 001</div>
                                                        <div class="date"><i class="icon-flag"></i> 10/01/2013</div>
                                                        <div class="date"><i class="icon-flag"></i> 10/01/2013</div>
                                                        <div class="day"><i class="icon-flag"></i> 10</div>
                                                        <div class="delete"><a href="#"><i class="icon-flag"></i> D</a></div>
                                                    </div>
                                                </li>
                                                <li class="add-outcome">
                                                    <div class="count">+</div>
                                                    <div class="outcome">
                                                        <div class="name"><a href="#">Nome della localit' molto lunga 001</a></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="button-sets a-center">
                                            <button class="button booking-btn">
                                                <span>
                                                    <span><i class="icon-flag"> </i>prenota itinerario</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="row browseBar">
                        <div class="span12">
                            <a href="#" class="more bg-blue">Browse other content <br><i class="icon-arrow-down"></i></a>
                        </div>
                    </div><!-- BROWSE MORE -->
                </div>
                <div class="tab-pane" id="featured_bb">
                	<div class="container">
                    	<ul class="quick-list green-list row">
                            <li class="span6 box">
                                <div class="img b20-4s">
                                    <img src="<?php echo $this->getAssetsUrl() ?>img/bb_list-img-1.jpg" alt="" />
                                </div>
                                <div class="info b15-4s">
                                    <div class="text bb-price"><i class="icon-price"></i> 999,00 ?</div>
                                    <div class="text bb-like"><i class="icon-favourite"></i> 69</div>
                                </div>
                                <div class="desc b15-4s">
                                    Nome della struttura ricettiva molto lungo lunghissimo
                                </div>
                                <p><i class="icon-location"></i> Frattamaggiore localita molto lunga / Napoli</p>
                            </li>
                            <li class="span6 box">
                                <div class="img b20-4s">
                                    <img src="<?php echo $this->getAssetsUrl() ?>img/bb_list-img-1.jpg" alt="" />
                                </div>
                                <div class="info b15-4s">
                                    <div class="text bb-price"><i class="icon-price"></i> 999,00 ?</div>
                                    <div class="text bb-like"><i class="icon-favourite"></i> 69</div>
                                </div>
                                <div class="desc b15-4s">
                                    Nome della struttura ricettiva molto lungo lunghissimo
                                </div>
                                <p><i class="icon-location"></i> Frattamaggiore localita molto lunga / Napoli</p>
                            </li>
                            <li class="span6 box">
                                <div class="img b20-4s">
                                    <img src="<?php echo $this->getAssetsUrl() ?>img/bb_list-img-1.jpg" alt="" />
                                </div>
                                <div class="info b15-4s">
                                    <div class="text bb-price"><i class="icon-price"></i> 999,00 ?</div>
                                    <div class="text bb-like"><i class="icon-favourite"></i> 69</div>
                                </div>
                                <div class="desc b15-4s">
                                    Nome della struttura ricettiva molto lungo lunghissimo
                                </div>
                                <p><i class="icon-location"></i> Frattamaggiore localita molto lunga / Napoli</p>
                            </li>
                            <li class="span6 box">
                                <div class="img b20-4s">
                                    <img src="<?php echo $this->getAssetsUrl() ?>img/bb_list-img-1.jpg" alt="" />
                                </div>
                                <div class="info b15-4s">
                                    <div class="text bb-price"><i class="icon-price"></i> 999,00 ?</div>
                                    <div class="text bb-like"><i class="icon-favourite"></i> 69</div>
                                </div>
                                <div class="desc b15-4s">
                                    Nome della struttura ricettiva molto lungo lunghissimo
                                </div>
                                <p><i class="icon-location"></i> Frattamaggiore localita molto lunga / Napoli</p>
                            </li>
                        </ul>
                    </div>
                    <div class="row browseBar">
                        <div class="span12">
                            <a href="#" class="more bg-green">Browse other content <br><i class="icon-arrow-down"></i></a>
                        </div>
                    </div><!-- BROWSE MORE -->
                </div>
                <div class="tab-pane" id="most_popular">
                	<div class="container">
                    	<ul class="quick-list red-list row">
                            <li class="span6 box">
                                <div class="bb-like-heart">
                                    <i class="icon-favourite-big"></i>
                                    <span>185</span>
                                </div>
                                <div class="img b20-4s">
                                    <img src="<?php echo $this->getAssetsUrl() ?>img/bb_list-img-1.jpg" alt="" />
                                </div>
                                <div class="info b15-4s">
                                    <div class="text bb-price"><i class="icon-price"></i> 999,00 ?</div>
                                </div>
                                <div class="desc b15-4s">
                                    Nome della struttura ricettiva molto lungo lunghissimo
                                </div>
                                <p><i class="icon-location"></i> Frattamaggiore localita molto lunga / Napoli</p>
                            </li>
                            <li class="span6 box">
                                <div class="bb-like-heart">
                                    <i class="icon-favourite-big"></i>
                                    <span>185</span>
                                </div>
                                <div class="img b20-4s">
                                    <img src="<?php echo $this->getAssetsUrl() ?>img/bb_list-img-1.jpg" alt="" />
                                </div>
                                <div class="info b15-4s">
                                    <div class="text bb-price"><i class="icon-price"></i> 999,00 ?</div>
                                </div>
                                <div class="desc b15-4s">
                                    Nome della struttura ricettiva molto lungo lunghissimo
                                </div>
                                <p><i class="icon-location"></i> Frattamaggiore localita molto lunga / Napoli</p>
            
                            </li>
                            <li class="span6 box">
                                <div class="bb-like-heart">
                                    <i class="icon-favourite-big"></i>
                                    <span>185</span>
                                </div>
                                <div class="img b20-4s">
                                    <img src="<?php echo $this->getAssetsUrl() ?>img/bb_list-img-1.jpg" alt="" />
                                </div>
                                <div class="info b15-4s">
                                    <div class="text bb-price"><i class="icon-price"></i> 999,00 ?</div>
                                </div>
                                <div class="desc b15-4s">
                                    Nome della struttura ricettiva molto lungo lunghissimo
                                </div>
                                <p><i class="icon-location"></i> Frattamaggiore localita molto lunga / Napoli</p>
                            </li>
                            <li class="span6 box">
                                <div class="bb-like-heart">
                                    <i class="icon-favourite-big"></i>
                                    <span>185</span>
                                </div>
                                <div class="img b20-4s">
                                    <img src="<?php echo $this->getAssetsUrl() ?>img/bb_list-img-1.jpg" alt="" />
                                </div>
                                <div class="info b15-4s">
                                    <div class="text bb-price"><i class="icon-price"></i> 999,00 ?</div>
                                </div>
                                <div class="desc b15-4s">
                                    Nome della struttura ricettiva molto lungo lunghissimo
                                </div>
                                <p><i class="icon-location"></i> Frattamaggiore localita molto lunga / Napoli</p>
                            </li>
                        </ul>
                    </div>
                    <div class="row browseBar">
                        <div class="span12">
                            <a href="#" class="more bg-red">Browse other content <br><i class="icon-arrow-down"></i></a>
                        </div>
                    </div><!-- BROWSE MORE -->
                </div>
            </div>
		</div><!-- HOME TAB - END -->
    </div>
</section><!-- SECTION - END -->