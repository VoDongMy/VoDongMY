<div class="htabs">
    <?foreach($this->language as $lang):?>
    <a href="javascript:;" data_key="language<?=$lang->lang_id?>" class="<?=($lang->lang_default == 1)?'selected':''?>"><img src="<?=base_url()?>templates/images/flags/<?=$lang->lang_icon?>.png" alt=""><?=$lang->lang_name?></a>
    <?endforeach;?>
</div>
<?php echo form_open(uri_string(), array('id'=>'admindata'));?>
<table class="table_" style="width: 100%;">
    <tr>
        <td valign="top" style="padding-right: 10px;">
            <input type="hidden" name="id" value="<?=$rs->id?>">
            <input type="hidden" name="vdata[module]" value="<?php echo $rs->module?>">
            <input type="hidden" name="vdata[html]" value="<?php echo ($rs->module =='mod_html' || $rs->module == 'mod_custom')?1:0?>">
            <table class="form">
                <tr>
                    <td class="label" style="width: 150px;">Module</td>
                    <td><?php echo $rs->module?></td>
                </tr>
                <tr>
                    <td class="label">Vị trí hiển thị</td>
                    <td>
                        <select name="vdata[position]" style="width: 200px;">
                        <?foreach($position->position[0] as $position){
                        ?>
                           <option value="<?php echo $position['name']?>" <?php echo ($position['name'] == $rs->position)?'selected="selected"':''?>><?php echo $position['label']?></option> 
                        <?}?>                                   
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label">Hiển thị tiêu đề</td>
                    <td>
                        <input type="radio" name="show_title" value="1" <?php echo ($rs->show_title == 1)?'checked="checked"':'';?>> Có hiển thị 
                        <input type="radio" name="show_title" value="0" <?php echo ($rs->show_title == 0)?'checked="checked"':'';?>>Không hiển thị
                    </td>
                </tr>
                <tr>
                    <td class="label">Bật Module</td>
                    <td>
                    <input type="radio" name="published" value="1" <?php echo ($rs->published == 1)?'checked="checked"':'';?>> Có bật
                    <input type="radio" name="published" value="0" <?php echo ($rs->published == 0)?'checked="checked"':'';?>>Không bật</td>
                </tr>

                <tr>
                    <td class="label">CSS Class</td>
                    <td>
                         <?php echo $css?>
                    </td>
                </tr>
            </table>
            <?foreach($list as $lang):?>
            <div class="lang" id="language<?=$lang->lang_id?>" style="display: <?=($lang->lang_default == 1)?'block':'none'?>;">
            <table class="form">
                <tr>
                    <td class="label" style="width: 150px;">Tên Modulesc</td>
                    <td><input type="text" name="vdata[title][<?=$lang->lang_id?>]" value="<?php echo $lang->title?>" class="w300"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        Nội dung <br />  
                        <textarea name="vdata[content][<?=$lang->lang_id?>]" id="full_<?=$lang->lang_id?>"><?php echo $lang->content?></textarea>
                    </td>
                </tr>
            </table>
            </div>
            <script type="text/javascript">
                CKEDITOR.replace('full_<?=$lang->lang_id?>',{
                    toolbar : 'full'
                });

            </script>
            <?endforeach;?>
        </td>
        <td valign="top" style="width: 400px;">
            <?
            $attr = explode('&',$rs->attr);
            if(count($xml->params[0]) > 0){
            ?>
            <div class="panel">
                <h3 id="infonews" class="title vpanel_arrow_down" ><span>Thông số Modules</span></h3>
                <div class="panel_content" id="infonews_content" style="display: block;">
                    <table style="width: 100%;" class="form">
                    <?php
                    $i = 0;                
                    foreach($xml->params[0] as $param) {
                        if(count($attr) > 1){
                            $attr_ = explode('=',$attr[$i]);
                            $value =  ($attr_[1] != '')?$attr_[1]:$param['default'];
                        }else{
                            $value = $param['default'];
                        }

                        echo '<tr>';
                        echo '<td class="label" style="width:150px">'.$param['label'];
                        if($param['description'] != ''){
                        echo '<a class="vtip" title="'.$param['description'].'"><img src="'.base_url().'templates/icon/help.png"></a>';
                        }
                        echo '</td>';
                        echo '<td class="_value">';
                        if($param['type'] == 'list'){
                            echo getParams_select($param->option,$param['name'],$value);
                        }else if($param['type'] == 'radio'){
                            echo getParams_radio($param->option,$param['name'],$value);
                        }else if($param['type'] == 'text'){
                            echo getParams_text($param['name'],$value);
                        }

                        echo '</td>';
                        echo '</tr>';

                    $i ++;
                    } 
                    ?>

                    </table>
                </div>
            </div>
            <?}?>
        </td>
    </tr>
</table>
<?php echo form_close();?>
