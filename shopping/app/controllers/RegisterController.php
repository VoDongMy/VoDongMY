<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/4/2014
 * Time: 11:37 AM
 */
class RegisterController extends BaseController{
    /**
     *
     */
    public function __construct(){

    }

    /**
     * Display Register Page
     * @return mixed
     */
    public function getIndex(){
        return View::make('general.register');
    }
}