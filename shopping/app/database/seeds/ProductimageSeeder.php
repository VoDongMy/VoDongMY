<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/5/2014
 * Time: 9:35 AM
 */
class ProductimageSeeder extends Seeder{
   public function run(){
      ProductImage::truncate();
      $image = array(
                  'lib/images/products/product-gallery-01.jpg',
                  'lib/images/products/product-gallery-02.png',
                  'lib/images/products/product-gallery-03.jpg',
                  'lib/images/products/product-gallery-04.jpg'
               );
      $image_thumb = array(
                  'lib/images/products/gallery-thumb-01.jpg',
                  'lib/images/products/gallery-thumb-02.jpg',
                  'lib/images/products/gallery-thumb-03.jpg',
                  'lib/images/products/gallery-thumb-04.jpg'
               );
      for($i=1; $i<=30; $i++){
         for($j=0; $j<4; $j++){
            ProductImage::create(
               array(
                  'image' => $image[$j],
                  'image_small' => $image_thumb[$j],
                  'product_id' => $i
               )
            );
         }
      }
   }
}