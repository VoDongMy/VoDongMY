<?php

namespace app\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

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
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * many-to-many relationship method.
     *
     * @return QueryBuilder
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Admin\Permission');
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
        if ($role_id) {
            $roles = self::find($role_id);
        } else {
            $roles = new self();
        }
        $roles->role_title = $request->input('role_title');
        $roles->role_slug = $request->input('role_title') ? str_slug($request->input('role_title')) : '';
        $roles->description = $request->input('description');
        $results = $roles->save();
        if (!$results) {
            return $results;
        } else {
            return $roles->id;
        }
    }

    public function selectBoxRole($select_id = array())
    {
        $list_role = self::all();
        $str_return = '';
        if ($list_role) {
            foreach ($list_role as $role) {
                $role_id = $role->id;
                if (in_array($role_id, $select_id)) {
                    $attributeOption = 'selected';
                } else {
                    $attributeOption = '';
                }
                $str_return .= "<option value='".$role_id."' ".$attributeOption.'>'.$role->role_title.'</option>';
            }
        }

        return $str_return;
    }
}
