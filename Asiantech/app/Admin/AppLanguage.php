<?php

namespace app\Admin;

use Illuminate\Database\Eloquent\Model;

class AppLanguage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_languages';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'code',
                            'language_name',
                            'is_default',
                            'lack',
                            'total',
                            ];

    public static function getDefaultLanguage()
    {
        $language = self::where('is_default', '=', '1')->first();

        return $language->code;
    }
}
