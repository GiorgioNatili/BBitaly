<?php
/* @var $this PoliciesController */
/* @var $dataProvider CActiveDataProvider */

?>

<section>
<!-- InstanceBeginEditable name="EditRegionSection" -->
    <div class="container">
    	<table class="data-table" cellpadding="0" cellspacing="0" width="100%">
        	<colgroup>
            	<col />
                <col />
                <col />
            </colgroup>
            <thead>
            	<tr>
                    <th class="first">Name</th>
                    <th>Description</th>
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
</section><!-- SECTION - END --