<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
<body>
    <div class="wrapper">
        <!-- ===== TOP NAVIGATION ======== -->
            @include('layouts.top_navigation')
        <!-- ========= TOP NAVIGATION : END ============ -->
        <!-- ========= HEADER ============== -->
            @include('layouts.header')
        <!-- ======== HEADER : END ========= -->
            @yield('main')
        <!-- ================ Alert ================= -->
            <div class="modal fade index-alert">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title index-alert-title">Modal title</h4>
                  </div>
                  <div class="modal-body">
                    <p class="index-alert-body">One fine body&hellip;</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        <!-- ================ End Alert ============= -->
        <!-- ========= FOOTER ====== -->
            @include('layouts.footer')
        <!-- ========= FOOTER : END =========== -->
    </div><!-- /.wrapper -->
	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	{{HTML::script("lib/js/jquery-1.10.2.min.js",array('type'=>'text/javascript'))}}
	{{HTML::script("lib/js/bootstrap.min.js",array('type'=>'text/javascript'))}}
	{{HTML::script("lib/js/bootstrap-hover-dropdown.min.js",array('type'=>'text/javascript'))}}
	{{HTML::script("lib/js/owl.carousel.min.js",array('type'=>'text/javascript'))}}
	{{HTML::script("lib/js/css_browser_selector.min.js",array('type'=>'text/javascript'))}}
	{{HTML::script("lib/js/echo.min.js",array('type'=>'text/javascript'))}}
	{{HTML::script("lib/js/jquery.easing-1.3.min.js",array('type'=>'text/javascript'))}}
	{{HTML::script("lib/js/bootstrap-slider.min.js",array('type'=>'text/javascript'))}}
	{{HTML::script("lib/js/jquery.raty.min.js",array('type'=>'text/javascript'))}}
	{{HTML::script("lib/js/jquery.prettyPhoto.min.js",array('type'=>'text/javascript'))}}
	{{HTML::script("lib/js/jquery.customSelect.min.js",array('type'=>'text/javascript'))}}
	{{HTML::script("lib/js/wow.min.js",array('type'=>'text/javascript'))}}
	{{HTML::script("lib/js/scripts.js",array('type'=>'text/javascript'))}}
    <script type='text/javascript'>
        $(document).ready(function() {
            $('#addproductcart').remove();
            addproductcart();
            $('#viewCart').html('');
            addViewcart();
        });
    </script>
    <script type="text/javascript">
        function addproductcart(){
            $.ajax({
                url: "<?php echo URL::to('/product/addcart'); ?>",
                dataType: 'html',
                type: 'get',
                success: function(data){
                    $('.basket').append(data);
                }
            });
        };
        function addViewcart(){
            $.ajax({
                url: "<?php echo URL::to('/cart/view-cart'); ?>",
                dataType: 'html',
                type: 'get',
                success: function(data){
                    $('#viewCart').html(data);
                }
            });
        }
        function addtocart(slug,price){
            var count = $('span.count').text();
            var old_price = $('#price_cart').text();
            $.ajax({
                url: "<?php echo URL::to('/product/ajaxaddtocart'); ?>",
                data: {slug:slug,count:count,price:price,old_price:old_price},
                dataType: 'json',
                type: 'get',
                success: function(data){
                    $('#addproductcart').remove();
                    addproductcart();
                    $('span.count').text(data.count);
                    $('#price_cart').text(data.price);
                    $('.index-alert-title').text(data.title);
                    $('.index-alert-body').text(data.body);
                    $('.index-alert').modal('show');
                    $('#bestsellers').load();
                    $('#products-tab').load();
                    $('#recently-reviewd').load();
                }
            });
        };
        function removecart(slug,price){
            var count = $('span.count').text();
            var old_price = $('#price_cart').text();
            $.ajax({
                url: "<?php echo URL::to('/product/removecart'); ?>",
                data: {slug:slug,count:count,price:price,old_price:old_price},
                dataType: 'json',
                type: 'get',
                success: function(data){
                    $('#addproductcart').remove();
                    addproductcart();
                    $('span.count').text(data.count);
                    $('#price_cart').text(data.price);
                    $('span.price_total').text(data.price);
                    $('.index-alert-title').text(data.title);
                    $('.index-alert-body').text(data.body);
                    addViewcart();
                    if(data.count == 0){
                        window.setTimeout('location.reload()', 200);
                        // $('.index-alert').modal('show');
                    }else{
                        $('.index-alert').modal('show');
                    }
                }
            });
        }
    </script>
	@section('js')
	@show
</body>
</html>