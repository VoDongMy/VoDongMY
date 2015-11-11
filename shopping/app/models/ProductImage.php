<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/5/2014
 * Time: 9:02 AM
 */
class ProductImage extends Eloquent{
   protected $table = "product_images";
   protected $guarded = array('id','product_id');
   protected $fillable = array('image','image_small');

   public function product(){
      return $this->belongsToMany('Product');
   }
   public static function saveImagePrduct($array,$product_id){
   	foreach($array as $item){
   		$value = new ProductImage();
   		$value->image = $item['image'];
   		$value->image_small = $item['image_small'];
   		$value->product_id = $product_id;
   		$value->save();
   	}
   	return;
   }
}