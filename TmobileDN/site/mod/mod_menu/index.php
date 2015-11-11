<?
$uri1 = $this->uri->segment(1);
$langdb = lang_db();
$this->db->where('parent_id',40);
$this->db->order_by('ordering','asc');
$list = $this->db->get('category'.$langdb)->result();
if($uri1 != 'tin-tuc'){
    $dm_id = 0;
}
if($dm_id == '40'){
    $select = 'class="select"';
}else{
    $select = '';
}

?>

<ul id="menu">
    <li <?=($uri1 =='trang-chu')?'class="select"':''?>><a href="<?=site_url('trang-chu')?>"><?=lang('site.home')?></a></li>
    <li <?=($uri1 =='gioi-thieu')?'class="select"':''?>><a href="<?=site_url('gioi-thieu')?>"><?=lang('menu.gioithieu')?></a></li>
    <li <?=$select?>>
        <a href="<?=site_url('tin-tuc/chuyen-muc/chia-se-kinh-nghiem-40')?>"><?=lang('menu.kinhnghiem')?></a>
        <ul>
            <?foreach($list as $val):?>
                <li><a href="<?=site_url('tin-tuc/chuyen-muc/'.$val->cat_alias.'-'.$val->cat_id)?>"><?=$val->cat_title?></a></li>
            <?endforeach;?>
        </ul>
    </li>
    <li <?=($uri1 =='doi-tac')?'class="select"':''?>><a href="<?=site_url('doi-tac')?>"><?=lang('menu.doitac')?></a></li>
    <li <?=($uri1 =='video')?'class="select"':''?>><a href="<?=site_url('video')?>"><?=lang('menu.kinhvideo')?></a></li>
    <li <?=($uri1 =='lien-he')?'class="select"':''?>><a href="<?=site_url('lien-he')?>"><?=lang('menu.lienhe')?></a></li>
</ul>



