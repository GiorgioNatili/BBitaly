<?php 
/** @var CActiveDataProvider $dataProvider */
$this->breadcrumbs = array(
    'search'
); ?>
<section>
<!-- InstanceBeginEditable name="EditRegionSection" -->
	<div class="header-banner">
    	<div class="header-img header-map">
        	<img src="<?php echo $this->getAssetsUrl() ?>img/bb_listing-map.jpg" alt="" />
        </div>
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
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">persone <i class="icon-users"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">date 1</a></li>
                                        <li><a href="#">date 2</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="search-option pull-right">
                                <input type="text" class="inut-field medium datepicker" value="" id="checkout" />
                                <i class="icon-checkout"></i>
                            </div>
                            <div class="search-option pull-right">
                                <input type="text" class="inut-field medium datepicker" value="" id="checkin" />
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
                            <ul class="dropdown-menu">
                                <li><a href="#">value 1</a></li>
                                <li><a href="#">value 2</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="span4 sort-dropdown">
                	<div class="label-text pull-left">Tipologia alloggio:</div>
                	<div class="sort-by pull-left">
	                	<div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><strong>Bed and Breakfast</strong></a>
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
                    	<input type="text" id="sl2" data-slider-value="[3,8]" data-slider-step="1" data-slider-max="10" data-slider-min="1" value="" class="range-slider" style=" width:100px;">
                    </div>
                </div>
                <div class="span3">
                	<div class="label-text pull-left">Raggio di ricerca:</div>
                	<div class="price-range pull-left">
                		<input type="text" id="sl2" data-slider-value="[3,8]" data-slider-step="1" data-slider-max="10" data-slider-min="1" value="" class="range-slider" style=" width:100px;">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- FILTER - END -->
    <div class="container result-view">
    	<ul class="list-view"> 
            <?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider'  =>  $dataProvider,
                    'itemView'=>'_item',
                  )); ?>
        </ul><!-- LISIT VIEW - END -->
        <div class="row browseBar">
        	<div class="span12">
            	<a class="more" href="#">Sfoglia altri contenuti... <br><i class="icon-arrow-down"></i></a>
            </div>
        </div><!-- BROWSE MORE - END -->
    </div>
</section><!-- SECTION - END -->