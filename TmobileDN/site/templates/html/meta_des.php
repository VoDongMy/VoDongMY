<?
if(!isset($title)){
    $title = $this->config->item('site_name_'.$this->session->data['lang']);
}
if(!isset($des)){
    $des = $this->config->item('site_des_'.$this->session->data['lang']);
}
if(!isset($keyword)){
    $keyword = $this->config->item('site_keyword_'.$this->session->data['lang']);
}
?>
<title><?=$title?></title>
<link href="<?= base_url() ?>templates/images/favicon.ico" rel="icon" type="image/x-icon">
<meta name="description" content="<?=$des?>">
<meta name="keywords" content="<?=$keyword?>">
<?if($this->config->item('cf_yahoo') != ''){?>
<meta name="msvalidate.01" content="<?=$this->config->item('cf_yahoo')?>" />
<?}?>
<?if($this->config->item('cf_google_webmaster') != ''){?>
<meta name="google-site-verification" content="<?=$this->config->item('cf_google_webmaster')?>" />
<?}?>
<?if($this->config->item('cf_alexa') != ''){?>
<meta name="alexaVerifyID" content="<?=$this->config->item('cf_alexa')?>" /> 
<?}?>
<?if($this->config->item('cf_google_analytics') != ''){?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?=$this->config->item('cf_google_analytics')?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?}?>
<link rel="canonical" href="<?=base_url().uri_string();?>" />
<?if(isset($images)){?>
<link href="<?=base_url()?>data/product/200/<?=$images?>" rel="image_src" />
<meta property="og:image" content="<?=base_url()?>data/product/200/<?=$images?>" /> 
<?}?>