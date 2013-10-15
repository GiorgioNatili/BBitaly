<?php
/* @var $this FavoritesController */
/* @var $data Favorites */
?>


<li class="item" id="itin-row-<?php echo $index ?>">
    <div class="row">
        <div class="span3">
            <div class="img">
                <img src="<?php echo $this->getAssetsUrl() ?>img/bb_list-img-1.jpg" alt="" />
            </div>
        </div>
        <div class="span7">
            <div class="description">
                    <h3><a href="/property/<?php echo $data->property->id  ?>"><?php echo $data->property->title ?></a></h3>
                <p class="lead">Nome della struttura ricettiva, consectetur adipis</p>
                <p>Descrizione breve della struttura lorem ipsum dolor sit amet, consectetur adipis</p>
                <p class="location">
                    <i class="icon-location"></i> 
                    <?php echo $data->property->address.', '. $data->property->zip_code ?> / <strong><?php echo $data->property->city ?></strong>
                </p>
            </div>
        </div>
        <div class="span2">
            <div class="info text-center">
                    <div class="price-tag text-center">
                    prezzo a partire da
                    <p class="bb-price">
                        &euro; <?php echo money_format('%.2n', $data->property->base_price) ?>
                    </p>
                </div>
                <div class="favorite-tag text-left">
                    <span class="count text-center"><?php echo count($data->property->favorites) ?></span>
                    <a data-pid="<?php echo $data->property->id ?>" onclick="removeFromFavorites(this, function() { $('#itin-row-<?php echo $index ?>').remove(); });">preferito</a>
                </div>
            </div>
        </div>
    </div>
</li><!-- LIST ITEM - END -->
