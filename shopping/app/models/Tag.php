<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/5/2014
 * Time: 8:36 AM
 */
class Tag extends Eloquent{
   protected $table = "tags";
   protected $guarded = array('id');
   protected $fillable = array('name','slug','block');

   /**
    * @return mixed
    */
   public function products(){
      return $this->hasMany('Product');
   }

   public static function addNew($array){
      $value = new Tag();
      $value->name = $array['name'];
      $value->slug = Str::slug($array['name']);
      $value->template = $array['template'];
      $value->save();
      return;
   }
   public static function doEdit($array){
      $update = Tag::whereSlug($array['tag_edit_slug'])
         ->update(
            array(
               'name'=>$array['name'],
               'template' => $array['template'],
               'slug' => Str::slug($array['name'])
            )
         );
      return;
   }
}