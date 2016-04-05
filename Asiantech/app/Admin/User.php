<?php

namespace app\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $dates = ['deleted_at'];

    protected $guarded = array('id');

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
                            'remember_token',
                          ];

    /**
     * Upload images.
     *
     * @parram Images
     *
     * @return Image name
     */
    public function changePassword($request, $user_id)
    {
        $new_password = bcrypt($request->input('password'));
        $user = self::find($user_id);
        $user->password = $new_password;
        $user->save();

        return $user_id;
    }

    public function saveData($request, $user_id = '')
    {
        $password = '';
        $role_id = $request->input('role_id');
        if ($user_id) {
            $user = self::find($user_id);
            //Dectach
            $detact = $user->roles()->detach();
            $password = $user->password;
        } else {
            // Check duplicate
            $email = $request->input('email');
            $check_user = self::where('email', '=', $email)->first();
            if ($check_user) {
                return false;
            } else {
                $user = new self();
            }
        }
        $new_password = bcrypt($request->input('password'));
        if (!$new_password) {
            $new_password = $password;
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $new_password;
        $results = $user->save();
        if ($results) {
            $results_return = $user->roles()->attach($role_id);

            return $user->id;
        } else {
            return $results;
        }
    }
    /**
     * Get all access module from all permissions of all roles.
     *
     * @return Array of permission slugs
     */
    public function hasAccess()
    {
        $permissionsArray = [];
        $permissions = $this->roles->load('permissions')->fetch('permissions')->toArray();

        return array_map('strtolower', array_unique(array_flatten(array_map(function ($permission) {

            return array_fetch($permission, 'permission_slug');

        }, $permissions))));
    }
    /**
     * Many-To-Many Relationship Method for accessing the User->roles.
     *
     * @return QueryBuilder Object
     */
    public function roles()
    {
        return $this->belongsToMany('App\Admin\Role');
    }
}
