<?php

namespace app\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['deleted_at'];

    protected $guarded = array('id');

    protected $table = 'posts';

    protected $fillable = [
                            'category_id',
                            'is_active',
                            'order',
                            'feauture_image',
                            'author_id',
                            'properties',
                            ];

    /**
     * Get the post's author.
     *
     * @return User
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'id');
    }

    /**
     * Get the data of post via language.
     *
     * @return User
     */
    public function postData()
    {
        return $this->hasMany('App\Admin\PostData', 'post_id', 'id');
    }
}
