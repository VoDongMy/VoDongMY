<?php

namespace app\Admin;

use Illuminate\Database\Eloquent\Model;

class CategoryData extends Model
{
    //
    protected $dates = ['deleted_at'];

    protected $guarded = array('id');

    protected $table = 'category_blogs_data';

    protected $fillable = [
                            'category_blogs_id',
                            'language_code',
                            'category_alias',
                            'category_name',
                            'category_content',
                            ];

    /**
     * Get the category id.
     *
     * @return category id
     */
    public function category()
    {
        return $this->belongsTo('App\Admin\Category');
    }

    /**
     * Get the category's language.
     *
     * @return Language
     */
    public function language()
    {
        return $this->belongsTo('App\Admin\AppLanguage');
    }

    /**
     * Get the option select category.
     *
     * @return String option format for select box
     */
    public function selectBoxCategory($parent_id = 0, $split = '', $select_id = '')
    {
        $str_return = '';
        $list_category = Category::with(['CategoryData' => function ($query) {
            $query->where('language_code', '=', AppLanguage::getDefaultLanguage());
        }])->where('parent_id', '=', $parent_id)->get();
        if ($list_category) {
            foreach ($list_category as $category) {
                foreach ($category->categoryData as $cate) {
                    $category_id = $category->id;
                    if ($category_id == $select_id) {
                        $attribute_option = 'selected';
                    } else {
                        $attribute_option = '';
                    }
                    $str_return .= "<option value='".$cate->category_blogs_id."' ".$attribute_option.'>'.$split.$cate->category_name.'</option>';
                }
                $str_return .= self::selectBoxCategory($category_id, '|---', $select_id);
            }
        }

        return $str_return;
    }
}
