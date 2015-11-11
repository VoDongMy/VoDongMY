<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/8/2014
 * Time: 9:47 AM
 */
class TagController extends BaseController{
   public function __construct(){}

   /**
    * @return mixed
    */
   public function doNewTag(){
      Tag::addNew(Input::all());
      Session::flash('success','thêm mới thành công !');
      return Redirect::to('/admin/dashboard');
   }

   /**
    * @return mixed
    */
   public function doEdit(){
      Tag::doEdit(Input::all());
      Session::flash('success','Edit thành công !');
      return Redirect::to('/admin/dashboard');
   }
   /**
    * @return mixed
    */
   public function doActive(){
      $active = Tag::whereSlug(Input::get('tag_id'))->update(array('block'=>1));
      Session::flash('success','Active thanh cong !');
      return Redirect::back();
   }

   /**
    * @return mixed
    */
   public function doDisable(){
      $active = Tag::whereSlug(Input::get('tag_id'))->update(array('block'=>0));
      Session::flash('success','Disable thanh cong !');
      return Redirect::back();
   }

   /**
    * @return mixed
    */
   public function getAjaxTag(){
      $value = Tag::whereSlug($_GET['tag_id'])->first()->toJson();
      return $value;
   }
}