<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Models\MeetingModel;
use App\Models\Models\RacesModel;

class MeetingController extends Controller
{
    public function country(){
        return response()->json(MeetingModel::get(),200);
    }

    public function show($id){
        $country = MeetingModel::find($id);
        if($country){
            return response()->json(MeetingModel::find($id), 200);
        }
        else{
            return response()->json('message', 404);
        }
    }

    public function index(){
        $data = MeetingModel::join('tbm_meetings', 'tbm_races.meeting.id', '=', 'tbm_meetings.id')
                                ->join('tbm_races', 'tbm_runners.race_id', '=', 'tbm_races.id')
                                ->get(['tbm_meetings.name', 'tbm_races.name', 'tbm_runners.name']);


        $data = MeetingModel::all();
        return response()->json($data);
    }

    public function getRacesByMeetingId($id){
        $races = MeetingModel::find($id)->races;
        return $races;
    }

    //Create getRunnersById function to get Runner Details
    public function getRunnersById($id){
        $country = MeetingModel::find($id);
        if($country){
            return response()->json(MeetingModel::find($id), 200);
        }
        else{
            return response()->json('message', 404);
        }
    }
    
}
