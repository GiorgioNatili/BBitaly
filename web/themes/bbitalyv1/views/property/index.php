
<?php
/* @var $this BookingController */
/* @var $dataProvider CActiveDataProvider */
?>



<section>
<!-- InstanceBeginEditable name="EditRegionSection" -->
    <div class="container">
        <div class="button-sets">
            <button class="button" onclick="window.location = '/property/create';">
            <span>
                <span>
                    Create Property
                </span>
                </span>
            </button>
        </div>
    	<table class="data-table" cellpadding="0" cellspacing="0" width="100%">
        	<colgroup>
            	<col />
                <col />
                <col width="1" />
                <col width="1" />
                <col width="1" />
                <col width="1" />
                <col />
            </colgroup>
            <thead>
            	<tr>
                    <th class="first">Location</th>
                    <th>Camera</th>
                    <th class="pull-center"><i class="icon-checkin"></i></th>
                    <th class="pull-center"><i class="icon-user"></i></th>
                    <th class="pull-center"><i class="icon-user"></i></th>
                    <th class="pull-center">Prezzo</th>
                    <th class="last pull-center">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$dataProvider,
                        'itemView'=>'_view',
                )); ?>
            </tbody>
        </table>
    </div>
<!-- InstanceEndEditable -->
</section><!-- SECTION - END -->

