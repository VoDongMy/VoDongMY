<div class="brand">
    <ul>
        <li><a href="<?=base_url()?>" class="home"><?=lang('m.trangchu')?></a></li>
        <li><a href="<?=site_url('khach-hang')?>"><?=lang('khachhang')?></a></li>
        <li><a href="javascript:;"><?=$rs->name?></a></li>
    </ul>
</div>
<h1 class="title"><?=$rs->name?></h1>
<div class="customer_con TourCon" style="overflow: hidden;">
     <div class="logo">
        <img src="<?=base_url()?>data/logo/250/<?=$rs->images?>" width="200px">
     </div>   
     <p><?=htmlspecialchars_decode($rs->gioithieu)?></p>
     <div class="clearfix"></div>
    <script type="text/javascript">
    $(document).ready(function() { 

        Galleria.loadTheme(base_url_+'templates/js/galleria.classic.js');
        Galleria.run('#galleria');
    });
    </script>
    <div id="galleria" style="height: 400px; margin-bottom: 10px;">
        <?foreach($img as $val):?>
        <a href="<?=base_url().'data/khachhang/500/'.$val->path?>">
            <img src="<?=base_url().'data/khachhang/150/'.$val->path?>">
        </a>
        <?endforeach;?>
    </div>
    <h5><?=lang('khachhang_khac')?></h5>
    <ul class="khachhangkhac">
        <?foreach($ds as $val):?>
        <li><a href="<?=site_url('khach-hang/'.$val->slug.'-'.$val->id)?>"><?=$val->name?></a></li>
        <?endforeach;?>
    </ul>
</div>
<link type="text/css" rel="stylesheet" href="<?=base_url()?>/templates/css/galleria.classic.css?v=2.0" media="screen" />
<script type="text/javascript" src="<?=base_url()?>templates/js/galleria.js"></script>
