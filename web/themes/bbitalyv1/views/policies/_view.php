<?php
/* @var $this PoliciesController */
/* @var $data Policies */
?>

<tr>
    <td class="first">
        <h5><?php echo ucfirst($data->name) ?></h5>
    </td>
    <td><p><?php echo substr($data->description, 1,100) ?>...</p></td>
    <td class="last">
        <a href="/policies/update/<?php echo $data->id ?>">Update</a>
    </td>
</tr>