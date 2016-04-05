<?php 
namespace App\Http\Controllers;
use App\Articles;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WelcomeController extends Controller {

	//
	public function index(){
		//echo "Simple";
		echo trans('test.register');
	}
}