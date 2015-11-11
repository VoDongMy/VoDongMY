<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/5/2014
 * Time: 8:20 AM
 */
class ManufactureSeeder extends Seeder{

   public function run(){
      Manufacture::truncate();
      $trademarks = array('Apple','Dell','Acer','Asus','HP-Compaq','Lenovo');
      foreach($trademarks as $trademark){
         Manufacture::create(array(
            'name' => $trademark,
            'slug' => Str::slug($trademark),
            'block' => 1
         ));
      }
   }
}