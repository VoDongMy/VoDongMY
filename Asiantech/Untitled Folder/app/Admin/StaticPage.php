<?php

namespace app\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    protected $dates = ['deleted_at'];

    protected $guarded = array('id');

    protected $table = 'static_pages';

    protected $fillable = [
                            'is_active',
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
    public function pageDetails()
    {
        return $this->hasMany('App\Admin\StaticPageData', 'static_page_id', 'id');
    }

    /**
     * Save data of form submit.
     *
     * @return staticpage id
     */
    public function saveData($request, $page_id = '')
    {
        if ($page_id) {
            $static_page = self::find($page_id);
        } else {
            $static_page = new self();
        }
        $static_page->is_active = 1;
        $static_page->properties = $request->input('properties');
        $static_page->author_id = Auth::id();
        $static_page->save();

        return $static_page->id;
    }
}
