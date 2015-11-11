<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/5/2014
 * Time: 8:36 AM
 */
class Product extends Eloquent{
   protected $table = "products";
   protected $guarded = array('id');
   protected $fillable = array('name','image','description','quantity','price','price_sale','price_bestsaller','rate','tag_id','manufacture_id','block');

   /**
    * @return mixed
    */
   public function tag(){
      return $this->belongsToMany('Tag');
   }

   /**
    * @return mixed
    */
   public function manufacture(){
      return $this->belongsToMany('Manufacture');
   }

   /**
    * @return mixed
    */
   public function product_infomations(){
      return $this->hasOne('ProductInfomation');
   }

   /**
    * @return mixed
    */
   public function product_images(){
      return $this->hasMany('ProductImage');
   }

   /**
    * @param $slug
    * @return mixed
    */
   public static function getProduct($slug){
        $value = Tag::whereSlug($slug)->first();
        return Product::whereTag_id($value['id'])->get();
   }

   /**
    * [saveNewProduct description]
    * @param  [type] $array [description]
    * @return [type]        [description]
    */
   public static function saveNewProduct($array){
      $newPr = array(
                  'name' => $array['name'],
                  'description' => $array['description'],
                  'quantity' => $array['quantity'],
                  'price' => $array['price'],
                  'price_sale' => $array['sale'],
                  'price_bestsaller' => $array['bestsaller'],
                  'rate' => $array['rate'],
                  'tag_id' => $array['tag_id'],
                  'manufacture_id' => $array['manufacture'],
                  'slug' => Str::slug($array['name']),
                  'block' => $array['block']
               );
      if(isset($array['image'])){
         $newPr['image'] = $array['image'];
         $newPr['image_small'] = $array['image_small'];
      }
      $id = Product::insertGetId($newPr);
      return $id;
   }

   /**
    * [saveProduct description]
    * @param  [type] $array [description]
    * @param  [type] $img   [description]
    * @return [type]        [description]
    */
   public static function saveProduct($array,$img,$img_small){
      $value = array(
                  'name' => $array['name'],
                  'description' => $array['description'],
                  'quantity' => $array['quantity'],
                  'price' => $array['price'],
                  'price_sale' => $array['sale'],
                  'price_bestsaller' => $array['bestsaller'],
                  'rate' => $array['rate'],
                  'slug' => Str::slug($array['name']),
                  'block' => $array['block']
               );
      if($img != null){
         $value['image'] = $img;
         $value['image_small'] = $img_small;
      }
      $update = Product::whereId($array['hidden_product_id'])->update($value);
      return;
   }
}