<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/5/2014
 * Time: 8:52 AM
 */
class ProductInfomation extends Eloquent{
   protected $table = 'product_infomations';
   protected $guarded = array('id','product_id');
   protected $fillable = array('name','value','parent_id');

   /**
    * @return mixed
    */
   public function product(){
      return $this->belongsTo('Product')->withTrashed();
   }

   /**
    * [saveNewInfoProduct description]
    * @param  [type] $content      [description]
    * @param  [type] $product_name [description]
    * @param  [type] $id           [description]
    * @return [type]               [description]
    */
   public static function saveNewInfoProduct($content,$product_name,$id){
   	$value = new ProductInfomation();
   	$value->name_product = $product_name;
   	$value->value = $content;
   	$value->product_id = $id;
   	$value->save();
   	return true;
   }

   /**
    * [saveEditInfomation description]
    * @param  [type] $product_id   [description]
    * @param  [type] $content      [description]
    * @param  [type] $product_name [description]
    * @return [type]               [description]
    */
   public static function saveEditInfomation($product_id,$content,$product_name){
    $update = ProductInfomation::whereProduct_id($product_id)
              ->update(
                array(
                  'value' => $content,
                  'name_product' => $product_name
                )
              );
    return;
   }
}