<section>
<!-- InstanceBeginEditable name="EditRegionSection" -->
	<div class="header-banner">
            <div class="header-img header-map" style="width: 100%; height: 400px;">
        	
        </div>
            <script>
                jQuery(document).ready(function() {
                   $('#header-map').gmap3();
                });
            </script>
    </div><!-- BANNER - END -->

    <div class="search-container">
	    <div class="container">
            <div class="searchbar">
                <div class="search">
                    <div class="row">
                        <div class="span5">
                            <input type="text" placeholder="Aggiungi un'altra localita al tuo itinerario" class="search-query">
                        </div>
                        <div class="span7">
                            <div class="search-option pull-right">
                                <button class="btn btn-search" type="submit"><i class="icon-search icon-white"></i></button>
                            </div>
                            <div class="search-option pull-right">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">persone <i class="icon-home"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">date 1</a></li>
                                        <li><a href="#">date 2</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="search-option pull-right">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">check-out <i class="icon-home"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">date 1</a></li>
                                        <li><a href="#">date 2</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="search-option pull-right">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">check-in <i class="icon-home"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">date 1</a></li>
                                        <li><a href="#">date 2</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- SEARCH - END -->

    <div class="filter-container">
    	<div class="filter container">
        	<div class="row">
                <div class="span3">
                	<div class="label-text pull-left">Ordina per:</div>
                	<div class="sort-by  pull-left">
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Prezzo piu basso <i class="icon-home"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">value 1</a></li>
                                <li><a href="#">value 2</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="span3">
                	<div class="label-text pull-left">Tipologia alloggio:</div>
                	<div class="type-accommodation pull-left">
	                	<div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Prezzo piu basso <i class="icon-home"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">value 1</a></li>
                                <li><a href="#">value 2</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="span3">
                	<div class="label-text pull-left">Fascia di prezzo:</div>
                	<div class="price-range pull-left">
                    	<img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_range-sldie.png" alt="" />
                    </div>
                </div>
                <div class="span3">
                	<div class="label-text pull-left">Raggio di ricerca:</div>
                	<div class="search-radius pull-left">
                		<img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_range-sldie.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div><!-- FILTER - END -->
    
	<div class="container result-view">
    	<ul class="result-listing">
        	<li class="item">
            	<div class="row">
                    <div class="span3">
                        <div class="img">
                            <img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_list-img-1.jpg" alt="" />
                        </div>
                    </div>
                    <div class="span7">
                    	<div class="description">
                        	<h3><a href="#">Bed and Breakfast Santa Maria di Castellabate</a></h3>
                            <p class="lead">Nome della struttura ricettiva, consectetur adipis</p>
                            <p>Descrizione breve della struttura lorem ipsum dolor sit amet, consectetur adipis</p>
                            <p class="location">
                            	<i class="icon-arrow-down"></i> 
                                Frattamaggiore localita molto lunga / <strong>Napoli</strong>
                            </p>
                        </div>
                    </div>
                    <div class="span2">
                    	<div class="info text-center">
                        	<div class="price-tag text-center">
                                prezzo a partire da
                                <p class="bb-price">
                                    9999,00 &euro;
                                </p>
                            </div>
                            <div class="favorite-tag text-left">
                            	<span class="count text-center">19</span>
                                <a href="#">preferito</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li><!-- LIST ITEM - END -->
            <li class="item">
            	<div class="row">
                    <div class="span3">
                        <div class="img">
                            <img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_list-img-1.jpg" alt="" />
                        </div>
                    </div>
                    <div class="span7">
                    	<div class="description">
                        	<h3><a href="#">Bed and Breakfast Santa Maria di Castellabate</a></h3>
                            <p class="lead">Nome della struttura ricettiva, consectetur adipis</p>
                            <p>Descrizione breve della struttura lorem ipsum dolor sit amet, consectetur adipis</p>
                            <p class="location">
                            	<i class="icon-arrow-down"></i> 
                                Frattamaggiore localita molto lunga / <strong>Napoli</strong>
                            </p>
                        </div>
                    </div>
                    <div class="span2">
                    	<div class="info text-center">
                        	<div class="price-tag text-center">
                                prezzo a partire da
                                <p class="bb-price">
                                    9999,00 &euro;
                                </p>
                            </div>
                            <div class="favorite-tag text-left">
                            	<span class="count text-center">19</span>
                                <a href="#">preferito</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li><!-- LIST ITEM - END -->
            <li class="item">
            	<div class="row">
                    <div class="span3">
                        <div class="img">
                            <img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_list-img-1.jpg" alt="" />
                        </div>
                    </div>
                    <div class="span7">
                    	<div class="description">
                        	<h3><a href="#">Bed and Breakfast Santa Maria di Castellabate</a></h3>
                            <p class="lead">Nome della struttura ricettiva, consectetur adipis</p>
                            <p>Descrizione breve della struttura lorem ipsum dolor sit amet, consectetur adipis</p>
                            <p class="location">
                            	<i class="icon-arrow-down"></i> 
                                Frattamaggiore localita molto lunga / <strong>Napoli</strong>
                            </p>
                        </div>
                    </div>
                    <div class="span2">
                    	<div class="info text-center">
                        	<div class="price-tag text-center">
                                prezzo a partire da
                                <p class="bb-price">
                                    9999,00 &euro;
                                </p>
                            </div>
                            <div class="favorite-tag text-left">
                            	<span class="count text-center">19</span>
                                <a href="#">preferito</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li><!-- LIST ITEM - END -->
            <li class="item">
            	<div class="row">
                    <div class="span3">
                        <div class="img">
                            <img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_list-img-1.jpg" alt="" />
                        </div>
                    </div>
                    <div class="span7">
                    	<div class="description">
                        	<h3><a href="#">Bed and Breakfast Santa Maria di Castellabate</a></h3>
                            <p class="lead">Nome della struttura ricettiva, consectetur adipis</p>
                            <p>Descrizione breve della struttura lorem ipsum dolor sit amet, consectetur adipis</p>
                            <p class="location">
                            	<i class="icon-arrow-down"></i> 
                                Frattamaggiore localita molto lunga / <strong>Napoli</strong>
                            </p>
                        </div>
                    </div>
                    <div class="span2">
                    	<div class="info text-center">
                        	<div class="price-tag text-center">
                                prezzo a partire da
                                <p class="bb-price">
                                    9999,00 &euro;
                                </p>
                            </div>
                            <div class="favorite-tag text-left">
                            	<span class="count text-center">19</span>
                                <a href="#">preferito</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li><!-- LIST ITEM - END -->
            <li class="item">
            	<div class="row">
                    <div class="span3">
                        <div class="img">
                            <img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_list-img-1.jpg" alt="" />
                        </div>
                    </div>
                    <div class="span7">
                    	<div class="description">
                        	<h3><a href="#">Bed and Breakfast Santa Maria di Castellabate</a></h3>
                            <p class="lead">Nome della struttura ricettiva, consectetur adipis</p>
                            <p>Descrizione breve della struttura lorem ipsum dolor sit amet, consectetur adipis</p>
                            <p class="location">
                            	<i class="icon-arrow-down"></i> 
                                Frattamaggiore localita molto lunga / <strong>Napoli</strong>
                            </p>
                        </div>
                    </div>
                    <div class="span2">
                    	<div class="info text-center">
                        	<div class="price-tag text-center">
                                prezzo a partire da
                                <p class="bb-price">
                                    9999,00 &euro;
                                </p>
                            </div>
                            <div class="favorite-tag text-left">
                            	<span class="count text-center">19</span>
                                <a href="#">preferito</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li><!-- LIST ITEM - END -->
            <li class="item">
            	<div class="row">
                    <div class="span3">
                        <div class="img">
                            <img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/img/bb_list-img-1.jpg" alt="" />
                        </div>
                    </div>
                    <div class="span7">
                    	<div class="description">
                        	<h3><a href="#">Bed and Breakfast Santa Maria di Castellabate</a></h3>
                            <p class="lead">Nome della struttura ricettiva, consectetur adipis</p>
                            <p>Descrizione breve della struttura lorem ipsum dolor sit amet, consectetur adipis</p>
                            <p class="location">
                            	<i class="icon-arrow-down"></i> 
                                Frattamaggiore localita molto lunga / <strong>Napoli</strong>
                            </p>
                        </div>
                    </div>
                    <div class="span2">
                    	<div class="info text-center">
                        	<div class="price-tag text-center">
                                prezzo a partire da
                                <p class="bb-price">
                                    9999,00 &euro;
                                </p>
                            </div>
                            <div class="favorite-tag text-left">
                            	<span class="count text-center">19</span>
                                <a href="#">preferito</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li><!-- LIST ITEM - END -->
        </ul>
        <div class="row browseBar">
        	<div class="span12">
            	<a class="more" href="#">Sfoglia altri contenuti... <br><i class="icon-arrow-down"></i></a>
            </div>
        </div>
    </div>
<!-- InstanceEndEditable -->
    <div class="breadcrumbs">
	    <ul class="container">
		    <li>
            	<a href="#">Home</a>
                <span>/</span>
			</li>
		    <li>
            	<strong>Active</strong>
			</li>
	    </ul>
    </div>
</section><!-- SECTION - END -->