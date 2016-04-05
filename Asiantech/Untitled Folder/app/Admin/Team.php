<?php

namespace app\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $dates = ['deleted_at'];

    protected $guarded = array('id');

    protected $table = 'teams';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'team_name',
                            'images',
                            'properties',
                          ];

    /**
     * Upload images.
     *
     * @parram Images
     *
     * @return Image name
     */
    public function uploadMultiImages($files, $upload_to)
    {
        $array_name_files = array();
        $str_files = '';
        if ($files) {
            foreach ($files as $file) {
                if ($file) {
                    $original_name = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $upload_name = sha1($original_name.time()).'.'.$extension;
                    $file->move($upload_to, $upload_name);
                    $array_name_files[] = $upload_name;
                }
            }
            $str_files = implode(',', $array_name_files);
        }

        return $str_files;
    }

    /**
     * Save data.
     *
     * @parram Request
     *
     * @return ID
     */
    public function saveData($request, $team_id = '')
    {
        if ($team_id) {
            $teams = self::find($team_id);
        } else {
            $teams = new self();
        }
        $list_old_images = '';
        //Check list old image
        $array_old_images = $request->input('old_feauture_images', '');
        if ($array_old_images) {
            $list_old_images = ','.implode(',', $array_old_images);
        }
        $teams->team_name = $request->input('team_name', '');
        $teams->description = $request->input('description', '');
        $list_images = '';
        // Start process upload images to server
        $images_upload = Input::file('images');
        if ($images_upload) {
            $destinationPath = config('custom.path_upload_team');
            $list_images = self::uploadMultiImages($images_upload, $destinationPath);
        }
        $images = $list_images.$list_old_images;
        $teams->images = $images;
        $teams->save();

        return $teams->id;
    }

    /**
     * Save data.
     *
     * @parram Request
     *
     * @return ID
     */
    public function getAvatar($team_id)
    {
        if ($team_id) {
            $info_team = self::find($team_id);
            if ($info_team) {
                $images = $info_team->images;
                $array_image = explode(',', $images);
                if ($array_image) {
                    foreach ($array_image as $key_avatar => $value_avatar) {
                        if ($value_avatar) {
                            return config('custom.path_view_team').$value_avatar;
                        }
                    }
                } else {
                    return ''; //No avatar
                }
            } else {
                return ''; //No avatar
            }
        } else {
            return ''; //No avatar
        }
    }

    public function getListImage($team_id)
    {
        $list_image = '';
        $array_return = array();
        if ($team_id) {
            $info_team = self::find($team_id);
            $list_image = $info_team->images;
            $path = config('custom.path_view_team');
        }
        if ($list_image) {
            $array_image = explode(',', $list_image);
            foreach ($array_image as $key => $value) {
                if ($value) {
                    $array_return[] = array('name' => $value, 'size' => '', 'type' => 'image/jpg', 'file' => $path.$value);
                }
            }

            return json_encode($array_return);
        }

        return $list_image;
    }

    public static function selectTeam($team_id)
    {
        $list_team = self::all();
        $str_return = '';
        if ($list_team) {
            foreach ($list_team as $team) {
                $team_id = $team->id;
                if ($team_id == $team_id) {
                    $attributeOption = 'selected';
                } else {
                    $attributeOption = '';
                }
                $str_return .= "<option value='".$team_id."' ".$attributeOption.'>'.$team->team_name.'</option>';
            }
        }

        return $str_return;
    }
}
