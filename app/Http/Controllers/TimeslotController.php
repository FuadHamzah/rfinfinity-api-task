<?php

namespace App\Http\Controllers;

use App\Models\Timeslot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Timeslot\showRequest;
use App\Http\Requests\Timeslot\SpecificTheaterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class TimeslotController extends Controller
{
    public function show(showRequest $request)
    {
        $user = Auth::user();

        // Check if the user has the 'user' role
        if (!$user->hasRole('user')) {
            // Abort the request or redirect the user
            abort(Response::HTTP_FORBIDDEN, 'Unauthorized access');
        }

        //make the request theater name become lowercase first
        $theater_name = strtolower($request->theater_name);
        $time_start = $request->time_start;
        $time_end = $request->time_end;

        $timeslots = DB::table('timeslots')
        ->join('movies', 'timeslots.Movie_ID', '=', 'movies.Id')
        ->select('timeslots.Movie_ID','movies.Title','timeslots.Theater_name','timeslots.Start_time','timeslots.End_time','movies.Description','timeslots.Theater_room_no')
        ->where('timeslots.Theater_name','like', '%' . $theater_name . '%')
        ->where('timeslots.Start_time','=',$time_start)
        ->where('timeslots.End_time','=',$time_end)
        ->get();

        if ($timeslots->count()  == 0 ) {
            return response()->json(
                [
                    'message' => 'Sorry, we dont have movie for this timeslot'
                ], 500);
        }else{
            return response()->json(
                [
                    'message' => 'Successfull. Here the list of movie for this timeslot',
                    'data' => $timeslots
                ], 200);
        }
    }

    public function specific_theater(SpecificTheaterRequest $request)
    {
        $user = Auth::user();

        // Check if the user has the 'user' role
        if (!$user->hasRole('user')) {
            // Abort the request or redirect the user
            abort(Response::HTTP_FORBIDDEN, 'Unauthorized access');
        }

        //make the request theater name become lowercase first
        $theater_name = strtolower($request->theater_name);
        $time_start = $request->d_date;

        $timeslots = DB::table('timeslots')
        ->join('movies', 'timeslots.Movie_ID', '=', 'movies.Id')
        ->select('timeslots.Movie_ID','movies.Title','timeslots.Theater_name','timeslots.Start_time','timeslots.End_time','movies.Description','timeslots.Theater_room_no')
        ->where('timeslots.Theater_name','like', '%' . $theater_name . '%')
        ->whereDate(DB::raw('DATE(Start_time)'), $time_start)
        ->get();

        if ($timeslots->count()  == 0 ) {
            return response()->json(
                [
                    'message' => 'Sorry, we dont have movie for this specific theater'
                ], 500);
        }else{
            return response()->json(
                [
                    'message' => 'Successfull. Here the list of movie for '.$request->theater_name.' theater',
                    'data' => $timeslots
                ], 200);
        }
    }
}
