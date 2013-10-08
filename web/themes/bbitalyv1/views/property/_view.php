<?php
/* @var $this PropertyController */
/* @var $data Property */


?>
<tr>
    <td class="first">
        <h5><?php echo $data->title ?></h5>
        <p><?php echo $data->address.', '. $data->zip_code ?> / <?php echo $data->city ?></p>
    </td>
        <td><p><?php echo Statics::getEstablishments($data->type) ?></p></td>
        <td><p><?php echo Room::model()->countByAttributes(array('property_id' => $data->id)) ?></p></td>
        <td><p><?php echo $data->people_min ?></p></td>
        <td><p><?php echo $data->people_max ?></p></td>
        <td><p class="bb-price">&euro;<?php echo $data->base_price ?></p></td>
        <td class="last">
            <a href="/property/update/<?php echo $data->id ?>">Update</a>
        </td>
</tr>