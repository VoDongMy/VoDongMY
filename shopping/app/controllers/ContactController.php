<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/4/2014
 * Time: 11:40 AM
 */
class ContactController extends BaseController{

    /**
     *
     */
    public  function  __construct(){

    }

    /**
     * Display Contact Page
     * @return mixed
     */
    public function getIndex(){
        return View::make('general.contact');
    }
}