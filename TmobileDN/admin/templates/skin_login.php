<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html>
<head>
<title><?=$title?></title> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="">
<meta name="keywords" content=""> 
<script type="text/javascript">var base_url = '<?=base_url()?>';</script>
<script type="text/javascript" src="<?=base_url()?>templates/js/core/jquery.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?=base_url()?>templates/js/core/alert.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?=base_url()?>templates/js/core/login.js" charset="UTF-8"></script>
<link type="text/css" rel="stylesheet" href="<?=base_url()?>templates/css/login.css" media="screen" />
<link type="text/css" rel="stylesheet" href="<?=base_url()?>templates/css/alert.css" media="screen" />
</head>
<body>
<?
if($_SESSION['user_id'] && $_SESSION['group_id'] > 11){
    redirect('cpanel');
}
?>
<div id="loginWrap">
    <div id="loginMain">
        <?=$this->view($page,$data)?>
    </div>
</div>
<?=$this->session->unset_flashdata(array('message','error','alert'))?>    
</body>
</html>