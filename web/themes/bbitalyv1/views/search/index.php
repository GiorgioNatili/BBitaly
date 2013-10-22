<?php 
/** 
 * @var SearchController $this 
 * @var CActiveDataProvider $dataProvider */
$this->breadcrumbs = array(
    'search'    => '/search'
); ?>
<section>
    <div class="header-banner">
        <div class="header-img header-map" style="height: 400px;">
        </div>
    </div><!-- BANNER - END -->
    <form method="GET" action="">
    <div class="search-container">
        <div class="container">
            <div class="searchbar">
                <div class="search">
                    <div class="row">
                        <div class="span5">
                            <input type="text" name="kw" value="<?php echo !empty($_GET['kw']) ? $_GET['kw'] : '' ?>" placeholder="Aggiungi un'altra localita al tuo itinerario" class="search-query">
                        </div>
                        <div class="span7">
                            <div class="search-option pull-right">
                                <button class="btn btn-search" type="submit"><i class="icon-search icon-white"></i></button>
                            </div>
                            <div class="search-option pull-right">
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">persone <i class="icon-users"></i></a>
                                <input type="hidden" name="people" id="hidden_people" value="<?php echo isset($_GET['people']) ? $_GET['people'] : '*' ?>" />
                                <ul class="dropdown-menu" id="sq-peopel-selector">
                                    <?php for($i = 1; $i <= 20; $i++): ?>
                                        <li><a href="javascript:void(0);"><?php echo $i ?></a></li>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                        </div>
                            <div class="search-option pull-right">
                                <input type="text" class="inut-field medium datepicker" value="" name="checkout" id="checkout" />
                                <i class="icon-checkout"></i>
                            </div>
                            <div class="search-option pull-right">
                                <input type="text" class="inut-field medium datepicker" value="" name="checkin" id="checkin" />
                                <i class="icon-checkin"></i>
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
                <div class="span2 sort-dropdown">
                	<div class="label-text pull-left">Ordina per:</div>
                	<div class="sort-by pull-left">
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><strong>Prezzo piu basso</strong></a>
                            
                        </div>
                    </div>
                </div>
                <div class="span4 sort-dropdown">
                	<div class="label-text pull-left">Tipologia alloggio:</div>
                	<div class="sort-by pull-left">
	                	<div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);"><strong id="fil-estb-preview"><?php echo isset($_GET['establishment']) && $_GET['establishment'] != '*' ? Statics::getEstablishments($_GET['establishment']) : 'Bed and Breakfast' ?></strong></a>
                                    <ul class="dropdown-menu" id="fil-estb-dd">
                                        <input type="hidden" name="establishment" id="hidden_establishment" value="<?php echo isset($_GET['establishment']) ? $_GET['establishment'] : '*' ?>" />
                                <?php 
                                foreach (Statics::getEstablishments() as $key => $value): ?>
                                    <li data-value="<?php echo $key ?>"><a href="javascript:void(0);"><?php echo $value ?></a></li>
                                <?php endforeach;
                                ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="span3">
                	<div class="label-text pull-left">Fascia di prezzo:</div>
                	<div class="price-range pull-left">
                            <input type="text" id="sl2" data-slider-value="<?php echo isset($_GET['price_range']) ? sprintf('[%s]',$_GET['price_range']) : '[0,200]' ?>" data-slider-step="50" data-slider-max="1000" data-slider-min="0" name="price_range" value="<?php echo isset($_GET['price_range']) ? $_GET['price_range'] : '0,200' ?>" class="range-slider" style=" width:100px;">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- FILTER - END -->
    </form>
    <div class="container result-view">
        <ul class="list-view" id="dataset"> 
            <?php
            $j = 0;
            foreach ($records as $row):
                $this->renderPartial('_item', array(
                    'data' => $row,
                    'index' => $j
                )); $j++;
            endforeach;
            
            $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
                'contentSelector' => '#dataset',
                'itemSelector' => 'li.item',
                'loadingText' => 'Loading...',
                'donetext' => 'This is the end... my only friend, the end',
                'pages' => $pages
            ));
            /*
             *  $this->widget('application.components.widgets.CLazyListView', array(
                    'dataProvider'  =>  $dataProvider,
                    'itemView'=>'_item', //zii.widgets.CListView
                  ));
             */
            ?>
        </ul><!-- LISIT VIEW - END -->
        <!--
        <div class="row browseBar">
        	<div class="span12">
            	<a class="more" href="#">Sfoglia altri contenuti... <br><i class="icon-arrow-down"></i></a>
            </div>
        </div><!-- BROWSE MORE - END -->
        
    </div>
    <script type="text/javascript"> 
        $(document).ready(function() {
            $('.header-map').gmap3();
            window.searchMap = window.searchMap || [] || new Array();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    registerForSearchMap({
                        latLng: [position.coords.latitude, position.coords.longitude], 
                        data: "This is me!",
                        options: {
                            icon: "/themes/bbitalyv1/assets/img/bb_map-pointer-big.png"
                        }
                    });
                    searchMapBuild();
                });
                
            }
        });
    </script>
</section><!-- SECTION - END -->