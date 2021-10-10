<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('country', 'MeetingController@country');
Route::get('v1/runner/{id}/form-data', 'MeetingController@show');
Route::get('test', 'MeetingController@index');
Route::get('get-races/{id}', 'MeetingController@getRacesByMeetingId');

//api for get runners table along with form data
Route::get('v1/runner/{id}/form-data', 'RunnerController@getRunnersById');

//api for get all runners
Route::get('index', 'RunnerController@index');
