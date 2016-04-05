<?php

namespace app\Admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Admin\Service;

class ServiceDetail extends Model
{
    protected $dates = ['deleted_at'];

    protected $guarded = array('id');

    protected $table = 'service_details';

    protected $fillable = [
                            'service_id',
                            'language_code',
                            'service_name',
                            'service_alias',
                            'description',
                            'content',
                        ];

    /**
     * Describle relationship of this model with Service.
     */
    public function service()
    {
        return $this->belongsTo('App\Admin\Service');
    }
    /**
     * Save data.
     *
     * @parram Request
     *
     * @return ID
     */
    public function saveDetails($service_id, $request)
    {
        $listLanguage = AppLanguage::orderBy('language_name')->get();
        $service_names = $request->input('service_name');
        $descriptions = $request->input('description');
        $contents = $request->input('content');
        foreach ($listLanguage as $language) {
            $service_details = self::where('service_id', '=', $service_id)
                                        ->where('language_code', '=', $language->code)
                                        ->first();
            if (!$service_details) {
                $service_details = new self();
            }
            $service_details->service_name = $service_names[$language->code] ? $service_names[$language->code] : '';
            $service_details->description = $descriptions[$language->code] ? $descriptions[$language->code] : '';
            $service_details->content = $contents[$language->code] ? $contents[$language->code] : '';
            $service_details->language_code = $language->code;
            $service_details->service_id = $service_id;
            $service_details->service_alias = $service_names[$language->code] ? str_slug($service_names[$language->code].'-'.$service_id, '-') : '';
            $results = $service_details->save();
            if (!$results) {
                return $results;
            }
        }

        return $results;
    }
    /**
     * Get the option select service.
     *
     * @return String option format for select box
     */
    public function selectBoxService($select_id = '')
    {
        $str_return = '';
        $list_services = Service::with(['serviceDetails' => function ($query) {
            $query->where('language_code', '=', AppLanguage::getDefaultLanguage());
        }])->where('is_active', '=', '1')->get();
        if ($list_services) {
            foreach ($list_services as $service) {
                foreach ($service->serviceDetails as $info_service) {
                    $service_id = $service->id;
                    if ($service_id == $select_id) {
                        $attribute_option = 'selected';
                    } else {
                        $attribute_option = '';
                    }
                    $str_return .= "<option value='".$service_id."' ".$attribute_option.'>'.$info_service->service_name.'</option>';
                }
            }
        }

        return $str_return;
    }
}
