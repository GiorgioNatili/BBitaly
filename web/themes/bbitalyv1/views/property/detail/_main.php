<?php 
/**
 * @var Property $data
 */
?>

<script>
    $(document).ready(function() {
        $('.header-banner').gmap3({
            map: {
                options: {
                    zoom:13,
                    mapTypeId: google.maps.MapTypeId.ROAD_MAP,
                    streetViewControl: true
                }
            }
        });
    });
</script>
<section>
	<div class="detail-container">
		<div class="header-banner">
            <div class="header-img header-map">
            </div>
        </div>
        <div class="container detail-view">
            <div class="detail-description">
            	<div class="top-desc">
                	<div class="text"><span>9999</span></div>
                        <div class="text"><?php echo str_pad($data->available_rooms, 4, 0, STR_PAD_LEFT) ?></div>
                </div>
                <div class="social-widget">
                	<div class="favorite-tag"><strong>178</strong><br><br>Preferito</div>
                    <div class="share-widgeet">widhet</div>
                </div>
                <div class="information">
                	<h2><?php echo $data->title ?></h2>
                    <p class="lead">Nome della struttura ricettiva, consectetur adipis</p>
                    <p class="location">
                        <i class="icon-location"></i> 
                        <?php echo $data->address . ',' . $data->zip_code ?> / <strong><?php echo $data->city ?></strong>
					</p>
                </div>
                <div class="col2-set">
                	<div class="col1">
                        <div id="property_gallery" class="modal modal-gallery hide fade" tabindex="-1">
                            <div class="modal-header">
                                <a class="close" data-dismiss="modal">&times;</a>
                            </div>
                            <div class="modal-body"><div class="modal-image"></div></div>
                            <div class="modal-footer">
                                <a class="btn btn-primary modal-next">Next <i class="icon-arrow-right icon-white"></i></a>
                                <a class="btn btn-info modal-prev"><i class="icon-arrow-left icon-white"></i> Previous</a>
                            </div>
                        </div><!-- GALLERY MODAL - END -->
                        <div id="gallery" data-toggle="modal-gallery" data-target="#property_gallery" data-selector="div.gallery-item" class="property-gallery">
                        	<li>
                            	<div class="gallery-item hover" data-href="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-1-large.jpg" ><span>&nbsp;</span></div>
                               	<img src="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-1.jpg" alt="" />
                            </li>
                            <li>
                            	<div class="gallery-item hover" data-href="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-2-large.jpg" ><span>&nbsp;</span></div>
                               	<img src="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-2.jpg" alt="" />
                            </li>
                            <li>
                            	<div class="gallery-item hover" data-href="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-1-large.jpg" ><span>&nbsp;</span></div>
                               	<img src="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-1.jpg" alt="" />
                            </li>
                            <li>
                            	<div class="gallery-item hover" data-href="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-2-large.jpg" ><span>&nbsp;</span></div>
                               	<img src="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-2.jpg" alt="" />
                            </li>
                            <li>
                            	<div class="gallery-item hover" data-href="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-1-large.jpg" ><span>&nbsp;</span></div>
                               	<img src="<?php echo $this->getAssetsUrl() ?>img/bb_property-img-1.jpg" alt="" />
                            </li>
                        </div>
                    </div>
                    <div class="col2">
                    	<div class="desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate.</div>
                    </div>
                </div>
            </div>
            <div class="detail-accordion" id="detail_accordion">
            	<?php
                    $j = 0;
                    foreach ($rooms as $room):
                        $this->renderPartial('detail/_room', array(
                            'data' => $room,
                            'index' => $j
                        )); $j++;
                    endforeach;

                    $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
                        'contentSelector' => '#detail_accordion',
                        'itemSelector' => 'div.item',
                        'loadingText' => 'Loading...',
                        'donetext' => 'This is the end... my only friend, the end',
                        'pages' => $roomPages
                    ));
                    ?>
            </div>
        </div>
        <div class="container facebook-comments-widget">
            <div class="facebook-comments" id="facebook_comments">
            	<?php  $this->widget('ext.yii-facebook-opengraph.plugins.Comments', array(
                    'href' => Yii::app()->request->url,
                    'width' => 780
                )) ?>
            </div>
        </div>
        <div class="container prop-area">
        	<ul class="prop-listing">
            	<li class="item">
                	<div class="price-tag a-center">
                    	<span>prezzo a partire da</span>
                        <br>
                        <div class="bb-price">9999,00 &euro;</div>
                    </div>
                    <div class="desc">
	                    <p><a href="#">Nome della struttura ricettiva<br>consectetur adipis</a></p>
                    </div>
                </li>
                <li class="item">
                	<div class="price-tag a-center">
                    	<span>prezzo a partire da</span>
                        <br>
                        <div class="bb-price">9999,00 &euro;</div>
                    </div>
                    <div class="desc">
	                    <p><a href="#">Nome della struttura ricettiva<br>consectetur adipis</a></p>
                    </div>
                </li>
                <li class="item">
                	<div class="price-tag a-center">
                    	<span>prezzo a partire da</span>
                        <br>
                        <div class="bb-price">9999,00 &euro;</div>
                    </div>
                    <div class="desc">
	                    <p><a href="#">Nome della struttura ricettiva<br>consectetur adipis</a></p>
                    </div>
                </li>
                <li class="item">
                	<div class="price-tag a-center">
                    	<span>prezzo a partire da</span>
                        <br>
                        <div class="bb-price">9999,00 &euro;</div>
                    </div>
                    <div class="desc">
	                    <p><a href="#">Nome della struttura ricettiva<br>consectetur adipis</a></p>
                    </div>
                </li>
                <li class="item">
                	<div class="price-tag a-center">
                    	<span>prezzo a partire da</span>
                        <br>
                        <div class="bb-price">9999,00 &euro;</div>
                    </div>
                    <div class="desc">
	                    <p><a href="#">Nome della struttura ricettiva<br>consectetur adipis</a></p>
                    </div>
                </li>
                <li class="item">
                	<div class="price-tag a-center">
                    	<span>prezzo a partire da</span>
                        <br>
                        <div class="bb-price">9999,00 &euro;</div>
                    </div>
                    <div class="desc">
	                    <p><a href="#">Nome della struttura ricettiva<br>consectetur adipis</a></p>
                    </div>
                </li>
            </ul>
            <div class="actions">
            	<a href="#">Altri risultati</a>
            </div>
        </div>
        <div class="search-container">
        	<div class="container">
            	<h2>effettua una nuova ricerca</h2>
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
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">persone <i class="icon-users"></i></a>
                                        <ul class="dropdown-menu">
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
        </div>
    </div>
</section><!-- SECTION - END -->