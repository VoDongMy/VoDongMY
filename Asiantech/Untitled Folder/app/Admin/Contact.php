<?php

namespace App\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Datatables;
use DB;

class Contact extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $dates = ['deleted_at'];

    protected $guarded  = array('id');

    protected $table = 'contacts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
    						'company_name',
    						'name',
    						'email',
    						'attachment',
    						'comment',
    						'status',
    					  ];

	/**
     * Save data.
     *
     * @parram Request
     * @return ID
     */	
	public function saveData($request){
    	$contacts = new Contact();
    	$attachment = '';
    	// Upload
        $file_upload = Input::file('attachment');
        if($file_upload)
        {
            $filename = $file_upload->getClientOriginalName();
            $extension = $file_upload -> getClientOriginalExtension();
            $attachment = sha1($filename . time()) . '.' . $extension;
            $destinationPath = config('custom.path_upload_attach');
            $file_upload->move($destinationPath, $attachment);
        }
    	$contacts->attachment = $attachment;
    	$contacts->company_name = $request -> input('company_name', '');
    	$contacts->name = $request -> input('name', '');
    	$contacts->email = $request -> input('email', '');
    	$contacts->comment = $request -> input('comment', '');
    	$contacts->save();
    	return $contacts->id;
    } 
}
