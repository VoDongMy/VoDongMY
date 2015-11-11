<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$list = $this->mod->get_position($position);
if(count($list) > 0){
    foreach($list as $rs):
    $title = $rs->title;
    $params = $rs->params;
    $data['title'] = $title; 
    $data['attr'] = $rs->attr;
?>
    <?if($params == ''){?>
    <div class="modi">
        <h3 class="title"><?php echo $title?></h3>           
        <div class="mod_m">
            <?php if($rs->html == 0){?>
                <?php echo $this->load->view_mod($rs->module,$data)?> 
            <?php }?>
            <?php if($rs->html == 1){?>
                <?php echo htmlspecialchars_decode($rs->content)?>
            <?php }?>            
        </div>
    </div>
    <?}else if($params == '_blank'){?>
         <div class="modules_<?php echo $params?> <?=$rs->module?>">
            <div class="mod_t">
                <?php if($rs->show_title == 1){?>
                    <h3 class="cufon"><?php echo $title?></h3>
                <?php  }?>            
            </div>
            <div class="mod_m">
                <?php if($rs->html == 0){?>
                    <?php echo $this->load->view_mod($rs->module,$data)?> 
                <?php }?>
                <?php if($rs->html == 1){?>
                    <?php echo htmlspecialchars_decode($rs->content)?>
                <?php }?>            
            </div>
        </div>                
    <?php }else{?>
         <div class="modi">
            <div class="mod_t">
                <?php if($rs->show_title == 1){?>
                    <h3 class="cufon"><span><?php echo $title?></span></h3>
                <?php  }?>            
            </div>
            <div class="mod_m">
                <?php if($rs->html == 0){?>
                    <?php echo $this->load->view_mod($rs->module,$data)?> 
                <?php }?>
                <?php if($rs->html == 1){?>
                    <?php echo htmlspecialchars_decode($rs->content)?>
                <?php }?>            
            </div>
        </div>
    <?php }?>
<?php 
    endforeach;
}
?>
