
<div class="tab-pane" id="account_tab_pane4">
    <div class="account-content">
        <div class="services-detail">
            <h2 class="legend">servizi</h2>
            <div class="description">
                Seleziona tutti i servizi della tua struttura! Sono divisi per categoria.
            </div>
            <div class="services-pills" id="services-pills">
                <div  class="tab-pane">
                <ul class="nav nav-pills">
                    <?php $k = 0;
                    foreach ($data as $service): ?>
                        <li class="<?php echo ++$k == 1 ? 'active' : '' ?>"><a data-toggle="tab" href="#property-service<?php echo $service['id'] ?>"><img src="<?php echo Yii::app()->baseUrl.$service['icon'] ?>" alt="" /></a></li>
                    <?php endforeach; ?>
                </ul>
                    <div class="tab-content">
                    <?php  $j = 0; foreach ($data as $parent_id =>  $service): ?>
                        <div class="tab-pane <?php echo ++$j == 1 ? 'active' : '' ?>" id="property-service<?php echo $service['id'] ?>">
                            <h4><?php echo $service['name'] ?></h4>
                            <ul class="structure-list">
                                <?php 
                                foreach ($service['child'] as $child): ?>
                                    <li>
                                        <div class="input-box">
                                            <button type="button" onclick="addService(this);" value="0" data-rel="Services[Property][<?php echo $parent_id ?>][<?php echo $child['id'] ?>]" class="btn btn-checkbox" data-toggle="button" />
                                        </div>
                                        <label><?php echo $child['name'] ?></label>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>