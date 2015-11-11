<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?=$this->_templates('html/meta_des')?>
<?=$this->_templates('html/meta')?>
</head>
<body>
	<!-- Begin Wrapper -->
	<div id="wrapper">
		<!-- Begin Search -->
<!--		<div id="search">
			<div class="shell">
				<form action="#" method="get" accept-charset="utf-8">
					<div class="container">
						<input type="text" value="Keywords..." title="Keywords..." class="blink" />
					</div>
					<input class="search-button" type="submit" value="Submit" />
				</form>
				<div class="cl">&nbsp;</div>
			</div>
		</div>-->
		<!-- End Search -->
		<!-- Begin Header -->
		<?=$this->_templates('html/header')?>
		<!-- End Header -->
		<!-- Begin Navigation -->
		<?=$this->_templates('html/menu')?>
		<!-- End Navigation -->
		<!-- Begin Slider -->
		<?=$this->_templates('html/slide')?>
		<!-- End Slider -->
		<!-- Begin Main -->
		<div id="main">
			<!-- Begin Inner -->
			<div class="inner">
				<div class="shell">
					<!-- Begin Left Sidebar -->
					<?=$this->_templates('html/colleft')?>
					<!-- End Sidebar -->
					<!-- Begin Content -->
					<?=$this->view($page,$data);?>
					<!-- End Content -->
					<!-- Begin Right Sidebar -->
					<?=$this->_templates('html/right')?>
					<!-- End Sidebar -->
					<div class="cl">&nbsp;</div>
				</div>
			</div>
			<!-- End Inner -->
		</div>
		<!-- End Main -->
		<!-- Begin Footer -->
		<?=$this->_templates('html/footer')?>
		<!-- End Footer -->
	</div>
	<!-- End Wrapper -->
</body>
</html>