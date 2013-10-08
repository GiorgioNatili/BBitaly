<?php
/* @var $this FavoritesController */
/* @var $dataProvider CActiveDataProvider */



$this->menu=array(
	array('label'=>'Create Favorites', 'url'=>array('create')),
	array('label'=>'Manage Favorites', 'url'=>array('admin')),
);
?>

<section>
<!-- InstanceBeginEditable name="EditRegionSection" -->
	<div class="container">
	    <ul class="list-view">
        	<?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$dataProvider,
                    'itemView'=>'_view',
                )); ?>
            </ul><!-- LISIT VIEW - END -->
        <div class="row browseBar">
        	<div class="span12">
            	<a class="more" href="#">Sfoglia altri contenuti... <br><i class="icon-arrow-down"></i></a>
            </div>
        </div><!-- BROWSE MORE - END -->
	</div>
<!-- InstanceEndEditable -->
    
</section><!-- SECTION - END -->