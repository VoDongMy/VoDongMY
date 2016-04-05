<?php

namespace app\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\StaticPage;
use App\Admin\AppLanguage;

class StaticPageData extends Model
{
    protected $dates = ['deleted_at'];

    protected $guarded = array('id');

    protected $table = 'static_page_datas';

    protected $fillable = [
                            'static_page_id',
                            'language_code',
                            'page_alias',
                            'page_title',
                            'page_contents',
                            ];

    /**
     * Get the post id.
     *
     * @return post id
     */
    public function staticPage()
    {
        return $this->belongsTo('App\Admin\StaticPage');
    }

    /**
     * Save data of form submit.
     *
     * @return staticpage id
     */
    public function saveData($request, $page_id = '')
    {
        //Get data from form
        $page_titles = $request->input('page_title');
        $page_contents = $request->input('page_contents');
        $languages = AppLanguage::orderBy('language_name')->get();
        foreach ($languages as $language) {
            $page_detail = self::where('static_page_id', '=', $page_id)
                                               ->where('language_code', '=', $language->code)
                                               ->first();
            if (!$page_detail) {
                $page_detail = new self();
            }
            $page_detail->static_page_id = $page_id;
            $page_detail->language_code = $language->code;
            $page_detail->page_title = $page_titles[$language->code];
            $page_detail->page_contents = $page_contents[$language->code];
            $page_alias = str_slug($page_titles[$language->code].'-'.$page_id, '-');
            $page_detail->page_alias = $page_alias;
            $results = $page_detail->save();
            if (!$results) {
                return $results;
            }
        }

        return $results;
    }

    /**
     * Get the option select static page.
     *
     * @return String option format for select box
     */
    public function selectBoxPage($select_id = '')
    {
        $str_return = '';
        $list_page = StaticPage::with(['PageData' => function ($query) {
            $query->where('language_code', '=', AppLanguage::getDefaultLanguage());
        }])->where('is_active', '=', '1')->get();
        if ($list_page) {
            foreach ($list_page as $page) {
                foreach ($page->PageData as $info_page) {
                    $page_id = $page->id;
                    if ($page_id == $select_id) {
                        $attribute_option = 'selected';
                    } else {
                        $attribute_option = '';
                    }
                    $str_return .= "<option value='".$page_id."' ".$attribute_option.'>'.$info_page->page_title.'</option>';
                }
            }
        }

        return $str_return;
    }
}
