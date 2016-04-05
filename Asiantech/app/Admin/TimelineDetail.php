<?php

namespace app\Admin;

use Illuminate\Database\Eloquent\Model;

class TimelineDetail extends Model
{
    protected $dates = ['deleted_at'];

    protected $guarded = array('id');

    protected $table = 'timeline_details';

    protected $fillable = [
                            'timeline_id',
                            'language_code',
                            'content',
                          ];

    /**
     * Describle relationship of this model with Timeline.
     */
    public function timeline()
    {
        return $this->belongsTo('App\Admin\Timeline');
    }

    public function saveData($timeline_id, $request)
    {
        $listLanguage = AppLanguage::orderBy('language_name')->get();
        $contents = $request->input('content');
        foreach ($listLanguage as $language) {
            $timeline_details = new self();
            $timeline_details->timeline_id = $timeline_id;
            $timeline_details->language_code = $language->code;
            $timeline_details->content = $contents[$language->code] ? $contents[$language->code] : ' ';
            $timeline_details->save();
        }

        return $timeline_id;
    }
}
