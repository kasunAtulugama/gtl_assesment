<?php

namespace App\Http\Controllers;

use App\Models\Models\RunnersModel;

use Illuminate\Http\Request;
use DB;

class RunnerController extends Controller
{
     //Create getRunnersById function to get Runner Details
     public function getRunnersById($id){
        $runner = RunnersModel::find($id);
        if($runner){
            return response()->json(RunnersModel::find($id), 200);
        }
        else{
            return response()->json('message', 404);
        }
    }

    public function index(){

        // $lastruns = RunnersModel::with('lastruns')->get();
        // return view('index', compact('lastruns'));
        $id=1;
        $data  = DB::table('tbm_runners')
                ->join('tbm_form_last_runrs','tbm_form_last_runrs.runner_id','=','tbm_runners.id')
                ->join('tbm_form_data','tbm_form_data.runner_id','=','tbm_runners.id')
                ->select('tbm_runners.runner_name','tbm_runners.age','tbm_runners.sex','tbm_runners.color','tbm_form_last_runrs.run_date','tbm_form_data.place')
                ->where('tbm_runners.id','=',$id)
                ->get()->toArray();

        echo "<pre>";
        print_r($data);
        return response()->json($data, 200);
    }
}
