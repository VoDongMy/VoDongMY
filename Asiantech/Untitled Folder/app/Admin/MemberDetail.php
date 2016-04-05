<?php

namespace app\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;

class MemberDetail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $dates = ['deleted_at'];

    protected $guarded = array('id');

    protected $table = 'member_details';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'member_id',
                            'language_code',
                            'question',
                            'answer',
                          ];
    /**
     * Describle relationship of this model with Member Details.
     */
    public function members()
    {
        return $this->belongsTo('App\Admin\Member');
    }
    /**
     * Save data.
     *
     * @parram Request
     *
     * @return ID
     */
    public function saveDetails($member_id, $request)
    {
        // Delete all old data
           // $remove_old_data = MemberDetail::where("member_id", "=", $member_id)->delete();
        $listLanguage = AppLanguage::orderBy('language_name')->get();
        $questions = $request->input('question');
        $answers = $request->input('answer');
        foreach ($listLanguage as $language) {
            $items_for_question = config('custom.items_for_question');
            for ($i = 1; $i <= $items_for_question; ++$i) {
                $member_details = new self();
                $member_details->member_id = $member_id;
                $member_details->language_code = $language->code;
                $member_details->question = $questions[$language->code][$i] ? $questions[$language->code][$i] : '';
                $member_details->answer = $answers[$language->code][$i] ? $answers[$language->code][$i] : '';
                $results = $member_details->save();
                if (!$results) {
                    return false;
                }
            }
        }

        return $results;
    }

    /**
     * Save update.
     *
     * @parram Request
     *
     * @return ID
     */
    public function saveUpdate($request)
    {
        // Delete all old data
        $listLanguage = AppLanguage::orderBy('language_name')->get();
        $questions = $request->input('question');
        $answers = $request->input('answer');
        foreach ($listLanguage as $language) {
            $array_questions = $questions[$language->code];
            foreach ($array_questions as $id_member_data => $question) {
                $member_details = self::find($id_member_data);
                $member_details->question = $question ? $question : '';
                $member_details->answer = $answers[$language->code][$id_member_data] ? $answers[$language->code][$id_member_data] : '';
                $results = $member_details->save();
                if (!$results) {
                    return false;
                }
            }
        }

        return true;
    }
}
