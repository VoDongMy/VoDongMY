<div class="col-xs-12 col-sm-3 no-margin sidebar narrow">
    <!-- ========================================= PRODUCT FILTER ========================================= -->
    <div class="widget">
        <h1>Product Filters</h1>
        <div class="body bordered">
            <div class="category-filter">
                <h2>Brands</h2>
                <hr>
                <ul>
                    <li><input checked="checked" class="le-checkbox" type="checkbox"  /> <label>Samsung</label> <span class="pull-right">(2)</span></li>
                    <li><input  class="le-checkbox" type="checkbox" /> <label>Dell</label> <span class="pull-right">(8)</span></li>
                    <li><input  class="le-checkbox" type="checkbox" /> <label>Toshiba</label> <span class="pull-right">(1)</span></li>
                    <li><input  class="le-checkbox" type="checkbox" /> <label>Apple</label> <span class="pull-right">(5)</span></li>
                </ul>
            </div><!-- /.category-filter -->
            <div class="price-filter">
                <h2>Price</h2>
                <hr>
                <div class="price-range-holder">
                    <input type="text" class="price-slider" value="" >
                    <span class="min-max">
                        Price: $89 - $2899
                    </span>
                    <span class="filter-button">
                        <a href="#">Filter</a>
                    </span>
                </div>
            </div><!-- /.price-filter -->
        </div><!-- /.body -->
    </div><!-- /.widget -->
    <!-- ========================================= PRODUCT FILTER : END ========================================= -->
    <!-- ========================================= CATEGORY TREE ========================================= -->
    <div class="widget accordion-widget category-accordions">
        <h1 class="border">Category Tree</h1>
        <div class="accordion">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" href="#collapseOne">
                        laptops &amp; computers
                    </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse in">
                    <div class="accordion-inner">
                        <ul>
                            <li>
                                <div class="accordion-heading">
                                    <a href="#collapseSub1" data-toggle="collapse">laptop</a>
                                </div>
                                <div id="collapseSub1" class="accordion-body collapse in">
                                    <ul>
                                        <li><a href="#">Two Level Accordion</a></li>
                                    </ul>
                                </div><!-- /.accordion-body -->
                            </li>
                            <li>
                                <div class="accordion-heading">
                                    <a href="#collapseSub2" data-toggle="collapse">tablet</a>
                                </div>
                                <div id="collapseSub2" class="accordion-body collapse in">
                                    <ul>
                                        <li>
                                            <div class="accordion-heading">
                                                <a href="#collapseSub3" data-toggle="collapse">Three Level Accordion</a>
                                            </div>
                                            <div id="collapseSub3" class="accordion-body collapse in">
                                                <ul>
                                                    <li><a href="#">PDA</a></li>
                                                    <li><a href="#">notebook</a></li>
                                                    <li><a href="#">mini notebook</a></li>
                                                </ul>
                                            </div><!-- /.accordion-body -->
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="#">PDA</a></li>
                            <li><a href="#">notebook</a></li>
                            <li><a href="#">mini notebook</a></li>
                        </ul>
                    </div><!-- /.accordion-inner -->
                </div>
            </div><!-- /.accordion-group -->
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapseTwo">
                        desktop PC
                    </a>
                </div>
                <div id="collapseTwo" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <ul>
                            <li><a href="#">gaming</a></li>
                            <li><a href="#">office</a></li>
                            <li><a href="#">kids</a></li>
                            <li><a href="#">for women</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.accordion-group -->
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapse3">
                        laptops
                    </a>
                </div>
                <div id="collapse3" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <ul>
                            <li><a href="#">light weight</a></li>
                            <li><a href="#">wide monitor</a></li>
                            <li><a href="#">ultra laptop</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.accordion-group -->
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapse4">
                        notebooks
                    </a>
                </div>
                <div id="collapse4" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <ul>
                            <li><a href="#">light weight</a></li>
                            <li><a href="#">wide monitor</a></li>
                            <li><a href="#">ultra laptop</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.accordion-group -->
        </div><!-- /.accordion -->
    </div><!-- /.category-accordions -->
    <!-- ========================================= CATEGORY TREE : END ========================================= -->
    <!-- ========================================= LINKS ========================================= -->
    <div class="widget">
        <h1 class="border">information</h1>
        <div class="body">
            <ul class="le-links">
                <li><a href="#">delivery</a></li>
                <li><a href="#">secure payment</a></li>
                <li><a href="#">our stores</a></li>
                <li><a href="#">contact</a></li>
            </ul><!-- /.le-links -->
        </div><!-- /.body -->
    </div><!-- /.widget -->
    <!-- ========================================= LINKS : END ========================================= -->
    <div class="widget">
        <div class="simple-banner">
            <a href="#">
                {{HTML::image('lib/images/blank.gif',null,array('data-echo'=>asset('lib/images/banners/banner-simple.jpg')))}}
            </a>
        </div>
    </div>
    <!-- ========================================= FEATURED PRODUCTS ========================================= -->
    <div class="widget">
        <h1 class="border">Featured Products</h1>
        <ul class="product-list">
            <li class="sidebar-product-list-item">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 no-margin">
                        <a href="#" class="thumb-holder">
                            {{HTML::image('lib/images/blank.gif',null,array('data-echo'=>asset("lib/images/products/product-small-01.jpg")))}}
                        </a>
                    </div>
                    <div class="col-xs-8 col-sm-8 no-margin">
                        <a href="#">Netbook Acer </a>
                        <div class="price">
                            <div class="price-prev">$2000</div>
                            <div class="price-current">$1873</div>
                        </div>
                    </div>
                </div>
            </li><!-- /.sidebar-product-list-item -->
            <li class="sidebar-product-list-item">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 no-margin">
                        <a href="#" class="thumb-holder">
                            {{HTML::image('lib/images/blank.gif',null,array('data-echo'=>asset("lib/images/products/product-small-02.jpg")))}}
                        </a>
                    </div>
                    <div class="col-xs-8 col-sm-8 no-margin">
                        <a href="#">PowerShot Elph 115 16MP Digital Camera</a>
                        <div class="price">
                            <div class="price-prev">$2000</div>
                            <div class="price-current">$1873</div>
                        </div>
                    </div>
                </div>
            </li><!-- /.sidebar-product-list-item -->
            <li class="sidebar-product-list-item">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 no-margin">
                        <a href="#" class="thumb-holder">
                            {{HTML::image('lib/images/blank.gif',null,array('data-echo'=>asset("lib/images/products/product-small-03.jpg")))}}
                        </a>
                    </div>
                    <div class="col-xs-8 col-sm-8 no-margin">
                        <a href="#">PowerShot Elph 115 16MP Digital Camera</a>
                        <div class="price">
                            <div class="price-prev">$2000</div>
                            <div class="price-current">$1873</div>
                        </div>
                    </div>
                </div>
            </li><!-- /.sidebar-product-list-item -->
            <li class="sidebar-product-list-item">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 no-margin">
                        <a href="#" class="thumb-holder">
                            {{HTML::image('lib/images/blank.gif',null,array('data-echo'=>asset("lib/images/products/product-small-01.jpg")))}}
                        </a>
                    </div>
                    <div class="col-xs-8 col-sm-8 no-margin">
                        <a href="#">Netbook Acer </a>
                        <div class="price">
                            <div class="price-prev">$2000</div>
                            <div class="price-current">$1873</div>
                        </div>
                    </div>
                </div>
            </li><!-- /.sidebar-product-list-item -->
            <li class="sidebar-product-list-item">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 no-margin">
                        <a href="#" class="thumb-holder">
                            {{HTML::image('lib/images/blank.gif',null,array('data-echo'=>asset("lib/images/products/product-small-02.jpg")))}}
                        </a>
                    </div>
                    <div class="col-xs-8 col-sm-8 no-margin">
                        <a href="#">PowerShot Elph 115 16MP Digital Camera</a>
                        <div class="price">
                            <div class="price-prev">$2000</div>
                            <div class="price-current">$1873</div>
                        </div>
                    </div>
                </div>
            </li><!-- /.sidebar-product-list-item -->
        </ul><!-- /.product-list -->
    </div><!-- /.widget -->
    <!-- ========================================= FEATURED PRODUCTS : END ========================================= -->
</div>