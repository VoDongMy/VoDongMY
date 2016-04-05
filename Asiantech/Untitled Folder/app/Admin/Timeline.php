<?php

namespace App\Admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Datatables;
use DB;

class Timeline extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $dates = ['deleted_at'];

    protected $guarded  = array('id');

    protected $table = 'timelines';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
                            'time_sheet',
    						'order',
    						'properties'
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
	 * Describle relationship of this model with Timeline Details
	 */
    public function timelineDetails()
    {
        return $this->hasMany('App\Admin\TimelineDetail', 'timeline_id', 'id');
    }

    public function saveData($request){
    	$timeline = new Timeline();
    	$timeline->time_sheet = $request->input('time_sheet');
    	$timeline->save();
    	return $timeline->id;
    }

    public function updateOrder($request){
        $order = $request->input('order');
        if($order){
            foreach($order as $key=>$value){
                $time_line = Timeline::find($key);
                $time_line->order = $value;
                $time_line->update();
            }
        }
        return "";
    }

}
