<?php

namespace app\Admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';

    /*
    |--------------------------------------------------------------------------
    | Relationship Methods
    |--------------------------------------------------------------------------
    */

    /**
     * many-to-many relationship method.
     *
     * @return QueryBuilder
     */
    public function roles()
    {
        return $this->belongsToMany('App\Admin\Role');
    }

    /**
     * Save data.
     *
     * @parram Request
     *
     * @return ID
     */
    public function saveData($request, $role_id)
    {
        $roles = new Role();
        $role = $roles->find($role_id);
        $array_permission_id = array();
        $array_permission = $request->input('permission');
        foreach ($array_permission as $key => $value) {
            $permission = new self();
            $permission->permission_title = $value;
            $permission->permission_slug = $value;
            $results = $permission->save();
            if (!$results) {
                return $results;
            } else {
                $results_return = $role->permissions()->attach($permission->id);
            }
        }

        return $results;
    }
}
