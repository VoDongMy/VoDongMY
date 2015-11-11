<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/5/2014
 * Time: 8:22 AM
 */
class Manufacture extends Eloquent{
   protected $table = "manufactures";
   protected $guarded = array('id');
   protected $fillable = array('name','logo','slug','block');

   /**
    * @return mixed
    */
   public function products(){
      return $this->hasMany('Product');
   }
}