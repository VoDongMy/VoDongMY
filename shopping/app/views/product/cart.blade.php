@extends('layouts.master')
@section('main')
    <section id="cart-page">
        <div class="container">
            <!-- ========================================= CONTENT ========================================= -->
            <div id="viewCart" class="col-xs-12 col-md-9 items-holder no-margin"></div>
            <!-- ========================================= CONTENT : END ========================================= -->
            <!-- ========================================= SIDEBAR ========================================= -->
            <div class="col-xs-12 col-md-3 no-margin sidebar ">
                <div class="widget cart-summary">
                    <h1 class="border">shopping cart</h1>
                    <div class="body">
                        <ul class="tabled-data no-border inverse-bold">
                            <li>
                                <label>cart subtotal</label>
                                <div class="value pull-right"><span class="price_total">{{ (Session::has('price_cart')) ? Session::get('price_cart') : 0 }}</span></div>
                            </li>
                            <li>
                                <label>shipping</label>
                                <div class="value pull-right">free shipping</div>
                            </li>
                        </ul>
                        <ul id="total-price" class="tabled-data inverse-bold no-border">
                            <li>
                                <label>order total</label>
                                <div class="value pull-right"><span class="price_total">{{ (Session::has('price_cart')) ? Session::get('price_cart') : 0 }}</span></div>
                            </li>
                        </ul>
                        <div class="buttons-holder">
                            <a class="le-button big" href="{{URL::to('/cart/checkout')}}" >checkout</a>
                            <a class="simple-link block" href="{{URL::to('/product')}}" >continue shopping</a>
                        </div>
                    </div>
                </div><!-- /.widget -->
            </div><!-- /.sidebar -->
            <!-- ========================================= SIDEBAR : END ========================================= -->
        </div>
    </section>
@stop
