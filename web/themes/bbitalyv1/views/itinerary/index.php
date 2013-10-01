<?php
/* @var $this ItineraryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Itineraries',
);

$this->menu=array(
	array('label'=>'Create Itinerary', 'url'=>array('create')),
	array('label'=>'Manage Itinerary', 'url'=>array('admin')),
);
?>

<section><!-- MENU TRAVELOR - END -->
    <div class="itinerary-container container">
    	<div class="row">
        	<div class="span12">
            	<div class="banner">
                    <a href="/itinerary/create">
                        <img src="<?php echo $this->getAssetsUrl() ?>img/bb_create-itinerary-banner.png" alt="" />
                    </a>
                </div>
                <ul class="itinerary-list" id="itinerary_accordion">
                    <!--
                    <li class="item accordion-group">
                        <div class="itinerary-block col2-set" data-toggle="collapse" data-parent="#itinerary_accordion" href="#itinerary_one">
                        	<div class="edit-link passed"><a href="#"><i class="icon-flag"></i> </a></div>
                            <div class="col1">
                                <div class="img"><img alt="" src="img/suggested-itinerary-img1.jpg"></div>
                            </div>
                            <div class="col2">
                                <div class="info">
                                    <h4>Nome dell'itinerario 001</h4>
                                    <div class="input-box">
                                    	<input type="text" class="inut-field medium" value="" />
                                    </div>
                                    <p>dal:<strong>02/02/0202</strong> al:<strong>02/02/0202</strong></p>
                                    <p><strong>999</strong> strutture prenotate/ 99 citta</p>
                                </div>
                            </div>
                        </div>
                        <div class="collapse in" id="itinerary_one">
                            <div class="itinerary-content">
                                <div class="description">
                                    <div class="edit-link passed"><a href="#"><i class="icon-flag"></i> </a></div>
                                    <h4>Aggiungi una descrizione al tuo itinerario (max 000 caratteri)</h4>
                                    <div class="input-box">
                                        <textarea class="textarea large">&nbsp;</textarea>
                                    </div>
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
                    -->
                    <li class="item accordion-group">
                        <div class="itinerary-block col2-set" data-toggle="collapse" data-parent="#itinerary_accordion" href="#itinerary_two">
                        	<div class="edit-link"><a href="#"><i class="icon-flag"></i> </a></div>
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
                                    <div class="edit-link"><a href="#"><i class="icon-flag"></i> </a></div>
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
        </div>    
    </div>
</section><!-- SECTION - END -->

<?php 
/*
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
 */
