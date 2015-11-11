<?php echo form_open('office/dels', array('id' => 'admindata')); ?> 
<input type="hidden" name="page" value="<?php echo set_post_page() ?>">
<table class="admindata">
    <thead>
        <tr>
            <th class="id">ID</th>
            <th class="checked"><input type="checkbox" name="sa" id="sa" onclick="check_chose('sa', 'id[]', 'admindata')"></th>
            <th>Tên cơ quan tổ chức</th>
            <th>Website/Email</th>
            <th>SĐT</th>
            <th>Fax</th>
            <th style="width: 100px;">Sắp xếp <?php echo action_order() ?></th>
            <th class="fc">Chức năng</th>

        </tr>        
    </thead>
    <?
    $k = 1;
    foreach($list as $rs):
    $main1 = $this->office->get_all_office($rs->id);
    //var_dump($rs);
    ?>
    <tr class="row<?php echo $k ?>">
        <td><?php echo $rs->id ?></td>
        <td align="center"><input type="checkbox" name="id[]" value="<?php echo$rs->id ?>"></td>
        <td><a href="<?php echo site_url('office/edit/' . $rs->id) ?>"><?php echo $rs->title ?></a></td>
        <td><a href="<?php echo site_url('office/edit/' . $rs->id) ?>"><?php echo $rs->website;
if ($rs->website == null) echo $rs->email; ?></a></td>
        <td><a href="<?php echo site_url('office/edit/' . $rs->id) ?>"><?php echo $rs->phone_1;
if ($rs->phone_2 != 0) echo$rs->phone_2; ?></a></td>
        <td><a href="<?php echo site_url('office/edit/' . $rs->id) ?>"><?php echo $rs->fax ?></a></td>
        <td align="center">

            <input type="text" class="order" name="order_<?php echo $rs->id ?>" value="<?php echo $rs->ordering ?>">
            <input type="hidden" name="id[]" value="<?php echo $rs->id ?>">
        </td>
        <td align="center">
            <?php echo icon_edit('office/edit/' . $rs->id) ?>
            <span id="publish<?php echo $rs->id ?>"><?php echo icon_active("'category'", "'id'", $rs->id, $rs->published) ?></span>
            <?php echo icon_del('office/del/' . $rs->id ) ?>
        </td>
    </tr>
    <?
    foreach($main1 as $rs1):
    $main2 = $this->office->get_all_office($rs1->id);
    ?>
    <tr class="row<?php echo $k ?>">
        <td><?php echo $rs1->id ?></td>
        <td align="center"><input type="checkbox" name="id[]" value="<?php echo $rs1->id ?>"></td>
        <td>|___<a href="<?php echo site_url('office/edit/' . $rs1->id) ?>"><?php echo $rs1->title ?></a></td>
        <td><a href="<?php echo site_url('office/edit/' . $rs->id) ?>"><?php echo $rs1->website;
if ($rs1->website == null) echo $rs1->email; ?></a></td>
        <td><a href="<?php echo site_url('office/edit/' . $rs->id) ?>"><?php echo $rs1->phone_1;
if ($rs1->phone_2 != 0) echo$rs1->phone_2; ?></a></td>
        <td><a href="<?php echo site_url('office/edit/' . $rs->id) ?>"><?php echo $rs1->fax ?></a></td>
        <td align="center">
            <input type="text" class="order" name="order_<?php echo $rs1->id ?>" value="<?php echo $rs1->ordering ?>">
            <input type="hidden" name="id[]" value="<?php echo $rs1->id ?>">
        </td>
        <td align="center">
            <? echo icon_edit('office/edit/'.$rs1->id)?>
            <span id="publish<?php echo $rs1->id ?>"><? echo icon_active("'category'","'id'",$rs1->id,$rs1->published)?></span>
            <?php echo icon_del('office/del/' . $rs1->id ) ?>
        </td>
    </tr>
    <?
    foreach($main2 as $rs2):
    ?>
    <tr class="row<?= $k ?>">
        <td><?= $rs2->id ?></td>
        <td align="center"><input type="checkbox" name="id[]" value="<?= $rs2->id ?>"></td>
        <td>|___|___<a href="<?= site_url('office/edit/' . $rs2->id) ?>"><?php echo $rs2->title ?></a></td>
        <td><a href="<?php echo site_url('office/edit/' . $rs->id) ?>"><?php echo $rs2->website;
if ($rs2->website == null) echo $rs2->email; ?></a></td>
        <td><a href="<?php echo site_url('office/edit/' . $rs->id) ?>"><?php echo $rs2->phone_1;
if ($rs2->phone_2 != 0) echo$rs2->phone_2; ?></a></td>
        <td><a href="<?php echo site_url('office/edit/' . $rs->id) ?>"><?php echo $rs2->fax ?></a></td>
        <td align="center">
            <input type="text" class="order" name="order_<?= $rs2->id ?>" value="<?= $rs2->cat_order ?>">
            <input type="hidden" name="id[]" value="<?= $rs2->id ?>">
        </td>
        <td align="center">
<?php echo icon_edit('office/edit/' . $rs2->id) ?>
            <span id="publish<?= $rs2->id ?>"><?php echo icon_active("'category'", "'id'", $rs2->id, $rs2->published) ?></span>
            <?php echo icon_del('office/del/' . $rs2->id ) ?>
        </td>
    </tr>
    <?endforeach;?>
    <?endforeach;?>

    <?
    $k = 1 - $k;
    endforeach;?>
</table>
<?php echo form_close() ?>
<script type="text/javascript">
    function save_order() {
        //load_show();
        var fields = $("#admindata :input").serializeArray();
        $.post(base_url + "office/save_order", fields, function(data) {
            //load_hide();
            location.reload();
        });
    }
</script>
