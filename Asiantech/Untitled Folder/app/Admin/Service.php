<?php

namespace app\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Service extends Model
{
    protected $dates = ['deleted_at'];

    protected $guarded = array('id');

    protected $table = 'services';

    protected $fillable = [
                        'order',
                        'feauture_image',
                        'service_url',
                        'app_url_ios',
                        'app_url_android',
                        'app_url_windows',
                        'gallery',
                        'author_id',
                        'properties',
                        ];

    /**
     * Get the service's author.
     *
     * @return User
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'id');
    }
    /**
     * Describle relationship of this model with Services Details.
     */
    public function serviceDetails()
    {
        return $this->hasMany('App\Admin\ServiceDetail', 'service_id', 'id');
    }

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
    public function saveData($request, $service_id = '')
    {
        if ($service_id) {
            $services = self::find($service_id);
        } else {
            $services = new self();
        }
        $list_old_feauture_images = '';
        $list_old_gallery_images = '';
        //Check list old image
        $array_old_feauture_images = $request->input('old_feauture_images', '');
        if ($array_old_feauture_images) {
            $list_old_feauture_images = ','.implode(',', $array_old_feauture_images);
        }

        $array_old_gallery_images = $request->input('old_gallery_images', '');
        if ($array_old_gallery_images) {
            $list_old_gallery_images = ','.implode(',', $array_old_gallery_images);
        }

        $services->is_active = 1;
        $services->service_url = $request->input('service_url', '');
        $services->app_url_ios = $request->input('app_url_ios', '');
        $services->app_url_android = $request->input('app_url_android', '');
        $services->app_url_windows = $request->input('app_url_windows', '');
        $services->author_id = Auth::id();
        $list_feauture_image = '';
        $list_gallery_image = '';
        // Start process upload images to server
        $image_feautures = Input::file('feauture_image');
        if ($image_feautures) {
            $destinationPath = config('custom.path_upload_service');
            $list_feauture_image = self::uploadMultiImages($image_feautures, $destinationPath);
        }

        $image_gallery = Input::file('gallery');
        if ($image_gallery) {
            $destinationPath = config('custom.path_upload_gallery_service');
            $list_gallery_image = self::uploadMultiImages($image_gallery, $destinationPath);
        }
        $feauture_image = $list_feauture_image.$list_old_feauture_images;
        $gallery = $list_gallery_image.$list_old_gallery_images;

        $services->feauture_image = $feauture_image;
        $services->gallery = $gallery;
        $services->properties = $request->input('service_type', '');
        $services->save();

        return $services->id;
    }

    /**
     * Get list feauture image.
     *
     * @parram id
     *
     * @return json list image for javascỉpt update
     */
    public function getListImage($service_id, $type_image)
    {
        $list_image = '';
        $array_return = array();
        if ($service_id && $type_image) {
            $info_service = self::find($service_id);
            // Check if not avalable image of service it will show image of gallery for feauture image service
            if ($info_service && $type_image == 'feauture_image') {
                $list_image = $info_service->feauture_image;
                $path = config('custom.path_view_service');
            } elseif ($info_service && $type_image == 'gallery') {
                $list_image = $info_service->gallery;
                $path = config('custom.path_view_gallery_service');
            }
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

    public function getURL($service_id, $language_code)
    {
        $service_data = ServiceDetail::where('service_id', '=', $service_id)
                                     ->where('language_code', '=', 'en')
                                     ->first();
        $web_smartphone = self::with(['serviceDetails' => function ($query) {
            $query->where('language_code', '=', 'en');
        }])->where('properties', '=', '1')->find($service_id);
        $url = '/'.$language_code.'/service-detail/'.$service_data->service_alias;

        return $url;
    }
}
