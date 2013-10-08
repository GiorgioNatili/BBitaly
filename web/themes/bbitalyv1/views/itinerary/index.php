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

<<<<<<< HEAD
<h1>Itineraries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
=======
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
                    <?php 
                    $this->widget('zii.widgets.CListView', array(
                            'dataProvider'=>$dataProvider,
                            'itemView'=>'_view'
                    )); ?>
                    
                </ul>
            </div>
        </div>    
    </div>
</section><!-- SECTION - END -->
>>>>>>> def2c902e2605700237265c6ff0100057658fafc
