<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/5/2014
 * Time: 10:55 AM
 */
class AdminController extends BaseController{
   /**
    *
    */
   public function __construct(){}

   /**
    * @return mixed
    */
   public function getIndex(){
      if(!Auth::guest() && Auth::user()->rule == 2){
         return $this->getDashboard();
      }else{
         return View::make('admin.login');
      }
   }

   /**
    * @return mixed
    */
   public function getDashboard(){
      $template = 'app/views/admin/template.blade.php';
      $data['template'] = file_get_contents($template);
      $data['content_header'] = "Dashboard";
      $data['tags'] = Tag::paginate(10);
      return View::make('admin_index',$data);
   }
}