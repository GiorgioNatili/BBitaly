<?php 
/* @var $data Property */
?>
<script type="text/javascript">
    registerForSearchMap({
        address: "<?php echo $data->address.', '. $data->zip_code ?> / <?php echo $data->city ?>", 
        data: "This is me!",
        is_center: <?php echo $index === 0 ? 1 : 0 ?>,
        options: {
            icon: "/themes/bbitalyv1/assets/img/bb_map-pointer.png"
        }
    });
</script>
<li class="item">
    <div class="row">
        <div class="span3">
            <div class="img">
                <img src="<?php echo  $data->coverImage == null ? $this->getAssetsUrl().'img/bb_list-img-1.jpg' : Bucket::load($data->coverImage->img_name) ?>" alt="" />
            </div>
        </div>
        <div class="span7">
            <div class="description">
                    <h3><a href="/property/<?php echo $data->id ?>"><?php echo $data->title ?></a></h3>
                <!--<p class="lead">Nome della struttura ricettiva, consectetur adipis</p> -->
                <p><?php echo $data->descriptions->lang_italian ?></p>
                <p class="location">
                    <i class="icon-location"></i> 
                    <?php echo $data->address.', '. $data->zip_code ?> / <strong><?php echo $data->city ?></strong>
                </p>
            </div>
        </div>
        <div class="span2">
            <div class="info text-center">
                    <div class="price-tag text-center">
                    prezzo a partire da
                    <p class="bb-price">
                        &euro; <?php echo money_format('%.2n', $data->base_price) ?>
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