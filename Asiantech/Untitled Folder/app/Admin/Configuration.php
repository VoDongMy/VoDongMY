<?php

namespace app\Admin;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $dates = ['deleted_at'];

    protected $guarded = array('id');

    protected $table = 'configurations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'properties',
                          ];

    public function saveData($request, $config_id = '')
    {
        if ($config_id) {
            $config = self::find($config_id);
        } else {
            $config = new self();
        }
        $properties = $request->all();
        $config->properties = serialize($properties);
        $config->save();

        return $config->id;
    }
}
