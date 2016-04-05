<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $dates = ['deleted_at'];

    protected $guarded  = array('id');

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
    						'name',
    						'email',
    						'password',
    						'remember_token'
    					  ];

	/**
     * Upload images.
     *
     * @parram Images
     * @return Image name
     */
	public function changePassword($request, $user_id)
	{
		$new_password = bcrypt($request->input('password'));
		$user = User::find($user_id);
		$user -> password = $new_password;
		$user -> save();
		return $user_id;
	}

}
