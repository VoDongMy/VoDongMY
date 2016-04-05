<?php

namespace app\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
                            'name',
                            'description',
                            ];

    public function users()
    {
        return $this->hasMany('App\User', 'role_id', 'id');
    }

    public function selectBoxRole($select_id = '')
    {
        $list_role = self::all();
        $str_return = '';
        if ($list_role) {
            foreach ($list_role as $role) {
                $role_id = $role->id;
                if ($role_id == $select_id) {
                    $attributeOption = 'selected';
                } else {
                    $attributeOption = '';
                }
                $str_return .= "<option value='".$role_id."' ".$attributeOption.'>'.$role->name.'</option>';
            }
        }

        return $str_return;
    }
}
