<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/5/2014
 * Time: 9:35 AM
 */
class ProductInfoSeeder extends Seeder{
   public function run(){
      ProductInfomation::truncate();
      $template = 'app/views/admin/template.blade.php';
      $template = file_get_contents($template);
      for($i=1; $i<=30; $i++){
         ProductInfomation::create(
            array(
               'name_product' => 'Product_'.$i,
               'value' => $template,
               'product_id' => $i
            )
         );
      }
   }
}