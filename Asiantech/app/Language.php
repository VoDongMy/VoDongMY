<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_languages';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'language_name', 'is_default'];

    public function getDefaultLanguage(){
        $language = Language::where('is_default', '=', '1')->first();
        return $language->code;
    }
}
