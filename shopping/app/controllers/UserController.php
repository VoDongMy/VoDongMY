<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/6/2014
 * Time: 9:39 AM
 */
class UserController extends BaseController{
   /**
    *
    */
   public function __construct(){}


   /**
    * @return mixed
    */
   public function handlerLoginAdmin(){
      $email = Input::get('email');
      $pass = Input::get('password');
      if(Auth::attempt(array('email'=>$email,'password'=>$pass,'rule'=>2))){
         return Redirect::to('admin/dashboard');
      }else{
         Session::flash('error','Tài khoản không có quyền truy cập');
         return Redirect::back();
      }
   }

   public function handlerLogoutAdmin(){
      Auth::logout();
      return Redirect::to('/admin');
   }
}