<?php

class HomeController extends BaseController {

    /**
     *
     */
    public function __construct(){

    }

    /**
     * Display Home Page
     * @return mixed
     */
    public function getIndex(){
        // Session::flush();
        $data['sales'] = Product::where('price_sale','<>',0)->get();
        $data['bestsaller'] = Product::where('price_bestsaller','<>',0)->get();
        return View::make('index',$data);
    }
    /**
     * Display About Page
     * @return mixed
     */
    public function getAbout(){
        return View::make('general.about');
    }

    /**
     * Display Terms And Conditions Page
     * @return mixed
     */
    public function getTermsConditions(){
        return View::make('general.terms_conditions');
    }
}
