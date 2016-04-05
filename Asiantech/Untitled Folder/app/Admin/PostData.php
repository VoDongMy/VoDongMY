<?php

namespace app\Admin;

use Illuminate\Database\Eloquent\Model;

class PostData extends Model
{
    //
    protected $dates = ['deleted_at'];

    protected $guarded = array('id');

    protected $table = 'post_datas';

    protected $fillable = [
                            'post_id',
                            'language_code',
                            'post_alias',
                            'post_title',
                            'post_descriptions',
                            'post_contents',
                            ];

    /**
     * Get the post id.
     *
     * @return post id
     */
    public function post()
    {
        return $this->belongsTo('App\Admin\Post');
    }
}
