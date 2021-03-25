<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    /**
     * List Activities with query params to filter the results, if no query params it will list all activities.
     *
     * @param  \Illuminate\Http\Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        
        // If this has activity_date query param it will filter the results by date
        if($request->has('activityDate')){
            $date = date_create_from_format("Y-m-d", $request->get('activityDate'))->format("Y-m-d");
            return Activity::where('start_date','<=',$date)->where('end_date','>=',$date)
                        ->orderByDesc('popularity')
                        ->get()
                        ;
        }
        return Activity::orderByDesc('popularity')->get();
    }

    /**
     * Show a single activity from given Id 
     *
     * @param  integer $id
     * @return mixed
     */
    public function show($id)
    {
        $activity = Activity::where('id',$id)
            ->with('relatedActivities')
            ->first()
            ;
        // If cant't find the activity, return 404
        if (!$activity){
            return response(['Activity not found'],404);
        }
        return $activity;
    }

}
