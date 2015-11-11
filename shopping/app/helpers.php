<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/5/2014
 * Time: 1:10 PM
 */
HTML::macro('active_menu', function($route){
   if(Request::is($route . '/*') OR Request::is($route)) {
      $active = "active";
   } else{
      $active = '';
   }
   return $active;
});

if ( ! function_exists('__')){
	/**
	 * Convert a value to camel case.
	 *
	 * @param  string  $value
	 * @return string
	 */
	function __($value)
	{
		return Lang::get('trans.'.$value);
	}
}
/**
 * [renderProduct description]
 * @param  [type] $products    [description]
 * @param  [type] $item_number [description]
 * @return [type]              [description]
 */
function renderProduct($products,$item_number,$parent_class,$chill_class){
	$html = "";
	$length = $products->count();
	$newDays = 86400 * 3;
	foreach($products as $key => $item) {
		if($key%$item_number==0){ $html .= '<div class="'.$parent_class.'">'; }
			$html .= '<div class="no-margin product-item-holder hover '.$chill_class.'">';
			$html .= '<div class="product-item">';
				if( (time() - strtotime($item->created_at)) <= $newDays){
					$html .= '<div class="ribbon blue"><span>new!</span></div>';
				}
				if($item->price_bestsaller != 0){
					$html .= '<div class="ribbon green"><span>bestseller</span></div>';
				}else{
					$html .= '<div class="ribbon red"><span>sale</span></div>';
				}
			$html .= '<div class="image">';
			$html .= HTML::image("lib/images/blank.gif",null,array('data-echo'=>asset($item->image)));
			$html .= '</div>';
			$html .= '<div class="body">';
			if($item->price_bestsaller != 0){
				$html .= '<div class="label-discount green">-'.$item->price_bestsaller.'% sale</div>';
			}elseif($item->price_sale != 0){
				$html .= '<div class="label-discount green">-'.$item->price_sale.'% sale</div>';
			}
			$html .= '<div class="title">';
			$html .= HTML::link('/product/details/'.$item->slug,$item->name,array('alt'=>$item->slug));
			$html .= '</div>';
			// $html .= '<div class="brand">acer</div>';
			$html .= '</div>';
			$html .= '<div class="prices">';
				if($item->price_bestsaller != 0){
					if($item_number == 3){
						$html .= '<div class="price-current text-right">'.adddotstring( round( $item->price - (($item->price*$item->price_bestsaller)/100) ) ).'<sup>VND</sup></div>';
						$price = round( $item->price - (($item->price*$item->price_bestsaller)/100) );
					}else{
						$html .= '<div class="price-prev">'.adddotstring($item->price).'<sup>VND</sup></div>';
						$html .= '<div class="price-current pull-right">'.adddotstring( round($item->price - (($item->price*$item->price_bestsaller)/100)) ).'<sup>VND</sup></div>';
						$price = round($item->price - (($item->price*$item->price_bestsaller)/100));
					}
				}elseif($item->price_sale != 0){
					$html .= '<div class="price-prev">'.adddotstring($item->price).'<sup>VND</sup></div>';
					$html .= '<div class="price-current pull-right">'.adddotstring( round($item->price - (($item->price*$item->price_sale)/100)) ).'<sup>VND</sup></div>';
					$price = round($item->price - (($item->price*$item->price_sale)/100));
				}else{
					$html .= '<div class="price-current pull-right">'.adddotstring($item->price).'<sup>VND</sup></div>';
					$price = $item->price;
				}
			$html .= '</div>';
			$html .= '<div class="hover-area">';
			$html .= '<div class="add-cart-button">';
			$html .= '<a href="javascript: addtocart( '."'".$item->slug."'".','.$price.' )" class="le-button">add to cart</a>';
			$html .= '</div>';
			$html .= '<div class="wish-compare">';
			$html .= '<a class="btn-add-to-wishlist" href="javascript: wishlist()">add to wishlist</a>';
			$html .= '<a class="btn-add-to-compare" href="javascript: compare()">compare</a>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';
		if( $key%$item_number == $item_number-1 || $key == $length-1){
			$html .= '</div>';
		}
	}
	$html .= '<div class="clearfix"></div>';
	return $html;
}
/**
 * [renderProductCart description]
 * @param  [type] $product [description]
 * @return [type]          [description]
 */
function renderProductCart($product){
	$html = "";
	$html .= '<ul class="dropdown-menu" id="addproductcart">';
	$html .= '<div class="fixHeightCart">';
	foreach($product as $item){
		$html .= "<li>";
		$html .= '<div class="basket-item">';
		$html .= '<div class="row">';
		$html .= '<div class="col-xs-4 col-sm-4 no-margin text-center">';
		$html .= '<div class="thumb">';
		$html .= HTML::image($item->image_small);
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<div class="col-xs-8 col-sm-8 no-margin">';
		$html .= '<div class="title">'.$item->name.'</div>';
		if($item->price_bestsaller != 0){
			$price = round($item->price - (($item->price*$item->price_bestsaller)/100));
		}elseif($item->price_sale != 0){
			$price = round($item->price - (($item->price*$item->price_sale)/100));
		}else{
			$price = $item->price;
		}
		$html .= '<div><span class="price">'.adddotstring($price).'</span><sup>VND</sup></div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<a class="close-btn" href="javascript: removecart('."'".$item->slug."'".','.$price.')"></a>';
		$html .= '</div>';
		$html .= "</li>";
	}
	$html .= '</div>';
	$html .= '<li class="checkout">';
	$html .= '<div class="basket-item">';
	$html .= '<div class="row">';
	$html .= '<div class="col-xs-12 col-sm-6">';
	$html .= HTML::link('/cart','View cart',array('class'=>'le-button inverse'));
	$html .= '</div>';
	$html .= '<div class="col-xs-12 col-sm-6">';
	$html .= HTML::link('/cart/checkout','Checkout',array('class'=>'le-button'));
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</li>';
	$html .= '</ul>';
	return $html;
}

function renderViewCart($product){
	$html = '';
	foreach($product as $product){
   	$html .= '<div class="row no-margin cart-item">';
      $html .= '<div class="col-xs-12 col-sm-2 no-margin">';
      $html .= '<a href="#" class="thumb-holder">';
      $html .= HTML::image($product["image_small"],null,array("class"=>"lazy"));
      $html .= '</a>';
      $html .= '</div>';
      $html .= '<div class="col-xs-12 col-sm-5 ">';
      $html .= '<div class="title">';
      $html .= '<a href="">'.$product["name"].'</a>';
      $html .= '</div>';
      $html .= '<div class="brand">sony</div>';
      $html .= '</div>';
      $html .= '<div class="col-xs-12 col-sm-3 no-margin">';
      $html .= '</div>';
      $html .=	'<div class="col-xs-12 col-sm-2 no-margin">';
      $html .=	'<div class="price">';
      $html .=	adddotstring($product["price"]).'<sup>VND</sup>';
      $html .=	'</div>';
      $html .= '<a class="close-btn" href="javascript: removecart('."'".$product['slug']."'".','.$product['price'].')"></a>';
      $html .= '</div>';
    	$html .= '</div>';
	}
	return $html;
}

/**
 * [adddotstring description]
 * @param  [type] $strNum [description]
 * @return [type]         [description]
 */
function adddotstring($strNum) {
  	$len = strlen($strNum);
  	$counter = 3;
  	$result = "";
  	while ($len - $counter >= 0){
      $con = substr($strNum, $len - $counter , 3);
      $result = '.'.$con.$result;
      $counter+= 3;
  	}
  	$con = substr($strNum, 0 , 3 - ($counter - $len) );
  	$result = $con.$result;
  	if(substr($result,0,1)=='.'){
      $result=substr($result,1,$len+1);
  	}
  	return $result;
}

function renderSlideProduct(){
	$html = "<div class='row'>";
	for($i = 0 ; $i < 3 ; $i++ ){
		$html .= "<div class='col-lg-4'>";
		$html .= "<div class='input-group'>";
		$html .= "<span class='input-group-btn'>";
		$html .= "<span class='btn btn-primary btn-file'>";
		$html .= "Browse&hellip; <input type='file' name='image_slide[]'>";
		$html .= '</span>';
		$html .= '</span>';
		$html .= "<input type='text' class='form-control' readonly>";
		$html .= '</div>';
		$html .= '</div>';
	}
	$html .= "</div>";
	$html .= "<br>";
	return $html;
}