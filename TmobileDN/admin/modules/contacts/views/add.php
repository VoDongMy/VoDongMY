
<?php echo form_open_multipart(uri_string(), array('id' => 'admindata')); ?>
<table class="table_" style="width: 100%;">
    <tr>
        <td valign="top" style="padding-right: 10px;">
            <table class="form">
                <tr>
                    <td class="label" style="width: 150px;">Tên cơ quan/ tổ chức/ VP làm việc</td>
                    <td>
                        <select name="vdata[id_office]" style="font-size: 12px;" class="w300">
                            <?foreach($listoffice as $val):
                            $list1 = $this->contacts->get_all_office($val->id);
                            ?>
                            <option value="<?php echo $val->id ?>" <?= ($val->id == $rs->id_office) ? 'selected="selected"' : '' ?>><?= $val->title ?></option>
                            <?foreach($list1 as $val1):
                            $list2 = $this->contacts->get_all_office($val1->id);
                            ?>
                            <option value="<?php echo $val1->id ?>" <?= ($val1->id == $rs->id_office) ? 'selected="selected"' : '' ?>>|____|<?= $val1->title ?></option>
                            <?endforeach;?>
                            <?endforeach;?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label">Hiển thị</td>
                    <td>
                        <input type="radio" name="vdata[published]" value="1" <?php echo ($rs->published == 1) ? 'checked="checked"' : 'checked="checked"'; ?>>Có
                        <input type="radio" name="vdata[published]" value="0" <?php echo ($rs->published == 0) ? 'checked="checked"' : ''; ?>> Không 
                    </td>
                </tr>
                <tr>
                    <td class="label">Sắp xếp</td>
                    <td><input type="text" name="vdata[ordering]" value="<?= $rs->ordering ?>"></td>
                </tr>
            </table>
            
            <div class="lang" id="language" style="display: 'block';">
                <table class="form">
                    <tr>
                        <td class="label" style="width: 150px;">Họ và Tên</td>
                        <td><input type="text" name="vdata[name]" value="" style="width: 98%;"></td>
                    </tr>
                    <tr>
                        <td class="label" style="width: 150px;">Chức vụ (Chức danh)</td>
                        <td><input type="text" name="vdata[title]" value="" style="width: 98%;"></td>
                    </tr>
                    <tr>
                        <td class="label" style="width: 150px;">Địa Chỉ</td>
                        <td><input type="text" name="vdata[address]" value="" style="width: 98%;"></td>
                    </tr>
                    <tr>
                        <td class="label" style="width: 150px;">Số điện thoại</td>
                        <td><input type="text" name="vdata[phone_1]" value="" style="width: 30%;"><span> - </span><input type="text" name="vdata[phone_2]" value="<?php echo $rs->phone_2 ?>" style="width: 30%;"></td>
                    </tr>
                    <tr>
                        <td class="label" style="width: 150px;">Email</td>
                        <td><input type="text" name="vdata[email]" value="" style="width: 98%;"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><textarea style="width:99%;" rows="5" name="vdata[note]"></textarea></td>
                    </tr>

                </table>
            </div>
            

        </td>
        <td style="width: 300px;" valign="top">
            <div class="content-right">
                <div class="img-news">
                    <?if($rs->images == ""){?>
                    <img src="<?= base_url() ?>templates/images/img_news_no.png" alt="">
                    <?}else{?>
                    <img src="<?= base_url_site() ?>data/contacts/200/<?= $rs->images ?>" alt="">
                    <?}?>
                </div>
                <div align="center"><input type="checkbox" value="1" name="del">Xóa hình</div>
                <div align="center"><input type="file" name="userfile"></div>
            </div>

            
            

        </td>
    </tr>
</table>

<?php echo form_close(); ?>
<script type="text/javascript">
    $(".panel h3.title").click(function() {
        div_id = $(this).attr('id');
        content = div_id + "_content";
        $(".panel h3").removeClass("vpanel_arrow_down");
        $(".panel h3").addClass("vpanel_arrow");

        $(".panel_content").slideUp();
        if ($("#" + content).css('display') == 'none') {
            $("#" + content).slideDown();
            $(this).removeClass("vpanel_arrow");
            $(this).addClass("vpanel_arrow_down");
        } else {
            $("#" + content).slideUp();
        }
    });

    $(document).ready(function() {
        $("#catid").change(function() {
            catid = $(this).val();
            $.getJSON(base_url + 'news/get_channel/?catid=' + catid, function(data) {
                $("#channel_id").html(data.ds);
            });
        })
    });
</script>
