<?php

namespace app\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $dates = ['deleted_at'];

    protected $guarded = array('id');

    protected $table = 'members';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'fullname',
                            'team',
                            'avatar',
                            'properties',
                          ];
    /**
     * Describle relationship of this model with Member Details.
     */
    public function memberDetails()
    {
        return $this->hasMany('App\Admin\MemberDetail', 'member_id', 'id');
    }

    public function saveData($request, $member_id = '')
    {
        // Upload
        $file_upload = Input::file('avatar');
        $avatar = '';
        if ($file_upload) {
            $filename = $file_upload->getClientOriginalName();
            $extension = $file_upload->getClientOriginalExtension();
            $avatar = sha1($filename.time()).'.'.$extension;
            $destinationPath = config('custom.path_upload_member');
            $file_upload->move($destinationPath, $avatar);
        }
        if ($member_id) {
            $member = self::find($member_id);
        } else {
            $member = new self();
        }
        $member->avatar = $avatar ? $avatar : $member->avatar;
        $member->fullname = $request->input('fullname', '');
        $member->team = $request->input('item_id', '');
        $results = $member->save();
        if ($results) {
            return $member->id;
        } else {
            return $results;
        }
    }
}
