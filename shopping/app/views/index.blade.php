@extends('layouts.master')
@section('main')
    <div id="top-banner-and-menu" class="homepage2">
        <div class="container">
            <div class="col-xs-12">
                <!-- ============== SECTION – HERO =========== -->
                <div id="hero">
                    <div id="owl-main" class="owl-carousel height-lg owl-inner-nav owl-ui-lg">
                        <div class="item" style='background-image: url("{{asset('lib/images/sliders/slider02.jpg')}}");'>
                            <div class="container-fluid">
                                <div class="caption vertical-center text-left right" style="padding-right:0;">
                                    <div class="big-text fadeInDown-1">
                                        Save up to a<span class="big"><span class="sign">$</span>400</span>
                                    </div>
                                    <div class="excerpt fadeInDown-2">
                                        on selected laptops<br>
                                        &amp; desktop pcs or<br>
                                        smartphones
                                    </div>
                                    <div class="small fadeInDown-2">
                                        terms and conditions apply
                                    </div>
                                    <div class="button-holder fadeInDown-3">
                                        <a href="single-product.html" class="big le-button ">shop now</a>
                                    </div>
                                </div><!-- /.caption -->
                            </div><!-- /.container-fluid -->
                        </div><!-- /.item -->
                        <div class="item" style='background-image: url("{{asset('lib/images/sliders/slider04.jpg')}}");'>
                            <div class="container-fluid">
                                <div class="caption vertical-center text-left left" style="padding-left:7%;">
                                    <div class="big-text fadeInDown-1">
                                        Want a<span class="big"><span class="sign">$</span>200</span>Discount?
                                    </div>
                                    <div class="excerpt fadeInDown-2">
                                        on desktop pcs
                                    </div>
                                    <div class="small fadeInDown-2">
                                        terms and conditions apply
                                    </div>
                                    <div class="button-holder fadeInDown-3">
                                        <a href="single-product.html" class="big le-button ">shop now</a>
                                    </div>
                                </div><!-- /.caption -->
                            </div><!-- /.container-fluid -->
                        </div><!-- /.item -->
                    </div><!-- /.owl-carousel -->
                </div>
                <!-- ============== SECTION – HERO : END ================= -->
            </div>
        </div>
    </div><!-- /.homepage2 -->
    <!-- ======= HOME BANNERS ============= -->
    <section id="banner-holder" class="wow fadeInUp">
        <div class="container">
            <div class="col-xs-12 col-lg-6 no-margin banner">
                <a href="category-grid-2.html">
                    <div class="banner-text theblue">
                        <h1>New Life</h1>
                        <span class="tagline">Introducing New Category</span>
                    </div>
                    {{HTML::image("lib/images/blank.gif",null,array('data-echo'=>asset('lib/images/banners/banner-narrow-01.jpg')))}}
                </a>
            </div>
            <div class="col-xs-12 col-lg-6 no-margin text-right banner">
                <a href="category-grid-2.html">
                    <div class="banner-text right">
                        <h1>Time &amp; Style</h1>
                        <span class="tagline">Checkout new arrivals</span>
                    </div>
                    {{HTML::image("lib/images/blank.gif",null,array('data-echo'=>asset('lib/images/banners/banner-narrow-02.jpg')))}}
                </a>
            </div>
        </div><!-- /.container -->
    </section><!-- /#banner-holder -->
    <!-- ========== HOME BANNERS : END ============ -->
    <div id="products-tab" class="wow fadeInUp">
        <div class="container">
            <div class="tab-holder">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" >
                    <li class="active"><a href="#featured" data-toggle="tab">featured</a></li>
                    <li><a href="#new-arrivals" data-toggle="tab">new arrivals</a></li>
                    <li><a href="#top-sales" data-toggle="tab">top sales</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="featured">
                        <div class="product-grid-holder">
                            @for($i=0; $i<4; $i++)
                            <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                                <div class="product-item">

                                    <div class="ribbon blue"><span>new!</span></div>
                                    <div class="ribbon red"><span>sale</span></div>
                                    <div class="ribbon green"><span>bestseller</span></div>

                                    <div class="image">
                                        {{HTML::image("lib/images/blank.gif",null,array('data-echo'=>asset('lib/images/products/product-01.jpg')))}}
                                    </div>

                                    <div class="body">
                                        <div class="label-discount green">-50% sale</div>
                                        <div class="title">
                                            <a href="single-product.html">VAIO Fit Laptop - Windows 8 SVF14322CXW</a>
                                        </div>
                                        <div class="brand">sony</div>
                                    </div>

                                    <div class="prices">
                                        <div class="price-prev">$1399.00</div>
                                        <div class="price-current pull-right">$1199.00</div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="single-product.html" class="le-button">add to cart</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                            <a class="btn-add-to-compare" href="#">compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                        <div class="loadmore-holder text-center">
                            <a class="btn-loadmore" href="#">
                                <i class="fa fa-plus"></i>
                                load more products</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="new-arrivals">
                        <div class="product-grid-holder">
                            @for($i=0; $i<4; $i++)
                            <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                                <div class="product-item">
                                    <div class="ribbon blue"><span>new!</span></div>
                                    <div class="image">
                                        {{HTML::image("lib/images/blank.gif",null,array('data-echo'=>asset('lib/images/products/product-02.jpg')))}}
                                    </div>
                                    <div class="body">
                                        <div class="label-discount clear"></div>
                                        <div class="title">
                                            <a href="single-product.html">White lumia 9001</a>
                                        </div>
                                        <div class="brand">nokia</div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev">$1399.00</div>
                                        <div class="price-current pull-right">$1199.00</div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="single-product.html" class="le-button">add to cart</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                            <a class="btn-add-to-compare" href="#">compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                        <div class="loadmore-holder text-center">
                            <a class="btn-loadmore" href="#">
                                <i class="fa fa-plus"></i>
                                load more products</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="top-sales">
                        {{renderProduct($sales,4,'product-grid-holder sales_hide','col-sm-4 col-md-3')}}
                        <div class="loadmore-holder text-center">
                            <a class="btn-loadmore button_sales" href="#">
                                <i class="fa fa-plus"></i>
                                load more products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========= BEST SELLERS ========= -->
    <section id="bestsellers" class="color-bg wow fadeInUp">
        <div class="container">
            <h1 class="section-title">Best Sellers</h1>
            <div class="product-grid-holder medium">
                <div class="col-xs-12 col-md-7 no-margin">
                    {{renderProduct($bestsaller,3,'row no-margin','col-xs-12 col-sm-4 size-medium')}}
                </div><!-- /.col -->
                <div class="col-xs-12 col-md-5 no-margin">
                    <div class="product-item-holder size-big single-product-gallery small-gallery">
                        <div id="best-seller-single-product-slider" class="single-product-slider owl-carousel">
                            <div class="single-product-gallery-item" id="slide1">
                                <a data-rel="prettyphoto" href="images/products/product-gallery-01.jpg">
                                    {{HTML::image("lib/images/blank.gif",null,array('data-echo'=>asset('lib/images/products/product-gallery-01.jpg')))}}
                                </a>
                            </div><!-- /.single-product-gallery-item -->
                            <div class="single-product-gallery-item" id="slide2">
                                <a data-rel="prettyphoto" href="images/products/product-gallery-01.jpg">
                                    {{HTML::image("lib/images/blank.gif",null,array('data-echo'=>asset('lib/images/products/product-gallery-01.jpg')))}}
                                </a>
                            </div><!-- /.single-product-gallery-item -->
                            <div class="single-product-gallery-item" id="slide3">
                                <a data-rel="prettyphoto" href="images/products/product-gallery-01.jpg">
                                    {{HTML::image("lib/images/blank.gif",null,array('data-echo'=>asset('lib/images/products/product-gallery-01.jpg')))}}
                                </a>
                            </div><!-- /.single-product-gallery-item -->
                        </div><!-- /.single-product-slider -->
                        <div class="gallery-thumbs clearfix">
                            <ul>
                                <li>
                                    <a class="horizontal-thumb active" data-target="#best-seller-single-product-slider" data-slide="0" href="#slide1">
                                        {{HTML::image("lib/images/blank.gif",null,array('data-echo'=>asset('lib/images/products/gallery-thumb-01.jpg')))}}
                                    </a>
                                </li>
                                <li>
                                    <a class="horizontal-thumb" data-target="#best-seller-single-product-slider" data-slide="1" href="#slide2">
                                        {{HTML::image("lib/images/blank.gif",null,array('data-echo'=>asset('lib/images/products/gallery-thumb-01.jpg')))}}
                                    </a>
                                </li>
                                <li>
                                    <a class="horizontal-thumb" data-target="#best-seller-single-product-slider" data-slide="2" href="#slide3">
                                        {{HTML::image("lib/images/blank.gif",null,array('data-echo'=>asset('lib/images/products/gallery-thumb-01.jpg')))}}
                                    </a>
                                </li>
                            </ul>
                        </div><!-- /.gallery-thumbs -->
                        <div class="body">
                            <div class="label-discount clear"></div>
                            <div class="title">
                                <a href="single-product.html">CPU intel core i5-4670k 3.4GHz BOX B82-12-122-41</a>
                            </div>
                            <div class="brand">sony</div>
                        </div>
                        <div class="prices text-right">
                            <div class="price-current inline">$1199.00</div>
                            <a href="cart.html" class="le-button big inline">add to cart</a>
                        </div>
                    </div><!-- /.product-item-holder -->
                </div><!-- /.col -->
            </div><!-- /.product-grid-holder -->
        </div><!-- /.container -->
    </section><!-- /#bestsellers -->
    <!-- ============ BEST SELLERS : END ============== -->
    <!-- ============ RECENTLY VIEWED ============== -->
    <section id="recently-reviewd" class="wow fadeInUp">
        <div class="container">
            <div class="carousel-holder hover">
                <div class="title-nav">
                    <h2 class="h1">Recently Viewed</h2>
                    <div class="nav-holder">
                        <a href="#prev" data-target="#owl-recently-viewed" class="slider-prev btn-prev fa fa-angle-left"></a>
                        <a href="#next" data-target="#owl-recently-viewed" class="slider-next btn-next fa fa-angle-right"></a>
                    </div>
                </div><!-- /.title-nav -->
                <div id="owl-recently-viewed" class="owl-carousel product-grid-holder">
                    @for($i=0; $i<9; $i++)
                        <div class="no-margin carousel-item product-item-holder size-small hover">
                        <div class="product-item">
                            <div class="ribbon red"><span>sale</span></div>
                            <div class="ribbon blue"><span>new!</span></div>
                            <div class="ribbon green"><span>bestseller</span></div>
                            <div class="image">
                                {{HTML::image("lib/images/blank.gif",null,array('data-echo'=>asset('lib/images/products/product-11.jpg')))}}
                            </div>
                            <div class="body">
                                    <div class="title">
                                        <a href="single-product.html">LC-70UD1U 70" class aquos 4K ultra HD</a>
                                    </div>
                                    <div class="brand">Sharp</div>
                                </div>
                            <div class="prices">
                                    <div class="price-current text-right">$1199.00</div>
                                </div>
                            <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="single-product.html" class="le-button">Add to Cart</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
                                        <a class="btn-add-to-compare" href="#">Compare</a>
                                    </div>
                                </div>
                        </div><!-- /.product-item -->
                    </div><!-- /.product-item-holder -->
                    @endfor
                </div><!-- /#recently-carousel -->
            </div><!-- /.carousel-holder -->
        </div><!-- /.container -->
    </section><!-- /#recently-reviewd -->
    <!-- =========== RECENTLY VIEWED : END ================== -->
    <!-- ============ TOP BRANDS ============ -->
    <section id="top-brands" class="wow fadeInUp">
        <div class="container">
            <div class="carousel-holder" >
                <div class="title-nav">
                    <h1>Top Brands</h1>
                    <div class="nav-holder">
                        <a href="#prev" data-target="#owl-brands" class="slider-prev btn-prev fa fa-angle-left"></a>
                        <a href="#next" data-target="#owl-brands" class="slider-next btn-next fa fa-angle-right"></a>
                    </div>
                </div><!-- /.title-nav -->
                <div id="owl-brands" class="owl-carousel brands-carousel">
                    @for($i=0; $i<9; $i++)
                        <div class="carousel-item">
                        <a href="#">
                            {{HTML::image('lib/images/brands/brand-01.jpg')}}
                        </a>
                    </div><!-- /.carousel-item -->
                    @endfor
                </div><!-- /.brands-caresoul -->
            </div><!-- /.carousel-holder -->
        </div><!-- /.container -->
    </section><!-- /#top-brands -->
    <!-- =========== TOP BRANDS : END ============ -->
@stop
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            var sales = $(".sales_hide");
            $(sales[0]).addClass('show');
            var index = 1;
            $('.button_sales').on('click',function(e){
                e.preventDefault();
                $(sales[index]).slideDown('400',function(){
                    index++;
                });
            })
        });
    </script>
@stop