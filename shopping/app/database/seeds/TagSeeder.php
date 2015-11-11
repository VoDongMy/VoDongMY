<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/5/2014
 * Time: 8:33 AM
 */
class TagSeeder extends Seeder{
   public function run(){
      Tag::truncate();
      $template = 'app/views/admin/template.blade.php';
      $info = file_get_contents($template);
      $values = array('Phone','Tablet','Laptop','Accessories');
      foreach($values as $value){
         Tag::create(
            array(
               'name' => $value,
               'slug' => Str::slug($value),
               'template' => $info,
               'block' => 0
            )
         );
      }
   }
}