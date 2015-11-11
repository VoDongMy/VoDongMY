<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<?=$this->_templates('html/meta_des')?>
<?=$this->_templates('html/meta_home')?>
</head>
<body>
<div id="wrapper">
    <?=$this->_templates('html/header')?>
    <div class="khung_body">
        <?=$this->view($page,$data);?>
    </div>
    <?=$this->_templates('html/footer')?>
</div>
</body>
</html>
<?=$this->session->unset_flashdata(array('message','error','alert'))?> 