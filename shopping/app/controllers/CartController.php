<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/4/2014
 * Time: 11:22 AM
 */
class CartController extends BaseController{

    /**
     *
     */
    public function __construct(){

    }

    /**
     * Display Cart Page
     * @return mixed
     */
    public function getIndex(){
        if(Session::has('array_slug')){
            return View::make('product.cart');
        }else{
            Session::flash('not_cart','Hiện không có sản phẩm nào để xem ! <br> Vui lòng chọn sản phẩm !');
            return Redirect::to('/product');
        }
    }

    /**
     * [getViewcart description]
     * @return [type] [description]
     */
    public function getViewCart(){
        $data = $this->cart();
        return renderViewCart($data['products']);
    }

    /**
     * Display Checkout Page
     * @return mixed
     */
    public function getCheckout(){
        if(Session::has('array_slug')){
            $data = $this->cart();
            Session::put('payment',$data['products']);
            return View::make('product.checkout',$data);
        }else{
            Session::flash('not_cart','Hiện không có sản phẩm nào để xem ! <br> Vui lòng chọn sản phẩm !');
            return Redirect::to('/product');
        }
    }

    /**
     * [cart description]
     * @return [type] [description]
     */
    private function cart(){
        foreach(Session::get('array_slug') as $key => $slug){
            $value = Product::select('id','name','image_small','price','price_sale','price_bestsaller','slug')->whereSlug($slug)->first();
            $product[$key]['id'] = $value['id'];
            $product[$key]['name'] = $value['name'];
            $product[$key]['image_small'] = $value['image_small'];
            $product[$key]['slug'] = $value['slug'];
            if($value['price_bestsaller'] != 0){
                $price = round( $value['price'] - (($value['price']*$value['price_bestsaller'])/100) );
            }elseif($value['price_sale'] != 0){
                $price = round( $value['price'] - (($value['price']*$value['price_sale'])/100) );
            }else{
                $price = $value['price'];
            }
            $product[$key]['price'] = $price;
        }
        $total = 0;
        foreach($product as $item){
            $total += (int)$item['price'];
        }
        $data['products'] = $product;
        $data['total'] = $total;
        return $data;
    }
}