<?php 
/* @var $data Property */
?>
<li class="item">
    <div class="row">
        <div class="span3">
            <div class="img">
                <img src="<?php echo $this->getAssetsUrl() ?>img/bb_list-img-1.jpg" alt="" />
            </div>
        </div>
        <div class="span7">
            <div class="description">
                    <h3><a href="#"><?php echo $data->title ?></a></h3>
                <p class="lead">Nome della struttura ricettiva, consectetur adipis</p>
                <p>Descrizione breve della struttura lorem ipsum dolor sit amet, consectetur adipis</p>
                <p class="location">
                    <i class="icon-location"></i> 
                    Frattamaggiore localita molto lunga / <strong>Napoli</strong>
                </p>
            </div>
        </div>
        <div class="span2">
            <div class="info text-center">
                    <div class="price-tag text-center">
                    prezzo a partire da
                    <p class="bb-price">
                        9999,00 &euro;
                    </p>
                </div>
                <div class="favorite-tag text-left">
                    <span class="count text-center"><?php echo count($data->favorites) ?></span>
                    <?php 
                    if ($data->inUserFavorites(Yii::app()->user->id, 1, $data->favorites)): ?>
                        <a href="javascript:void(0);" data-pid="<?php echo $data->id ?>" onclick="removeFromFavorites(this);">- Favorite</a>
                    <?php else: ?>
                        <a href="javascript:void(0);" data-pid="<?php echo $data->id ?>" onclick="addToFavorites(this);">+ Favorite</a>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</li><!-- LIST ITEM - END -->