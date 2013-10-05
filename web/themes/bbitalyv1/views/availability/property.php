<section>
<!-- InstanceBeginEditable name="EditRegionSection" -->
    
	<div class="availability-container container">
    	<div class="row">
        	<div class="span12">
            	<ul class="availability-list" id="availability_accordion">
                    <?php $this->widget('zii.widgets.CListView', array(
                            'dataProvider'=>$dataProvider,
                            'itemView'=>'_calendar',
                    )); ?>
                    
                </ul>
            </div>
        </div>
    </div>
</section><!-- SECTION - END -->