<?php

namespace app\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $dates = ['deleted_at'];

    protected $guarded = array('id');

    protected $table = 'category_blogs';

    protected $fillable = [
                            'parent_id',
                            'feauture_image',
                            'user_created',
                            'properties',
                            ];

    /**
     * Get the category's author.
     *
     * @return User
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function categoryData()
    {
        return $this->hasMany('App\Admin\CategoryData', 'category_blogs_id', 'id');
    }
}
