<?php

namespace App\Http\Controllers;


use App\Models\Performer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Performer\showRequest;
use Illuminate\Support\Facades\Auth;

class PerformerController extends Controller
{
    public function show(showRequest $request)
    {
        $user = Auth::user();

        // Check if the user has the 'user' role
        if (!$user->hasRole('user')) {
            // Abort the request or redirect the user
            abort(Response::HTTP_FORBIDDEN, 'Unauthorized access');
        }

        $performer = Performer::where('Name','=',$request->performer_name)->first();

        $movie_list = DB::table('movies as a')
        ->join('movie_performers as b', 'a.Id', '=', 'b.Movie_ID')
        ->select('a.Id as Movie_ID', 'b.Overall_rating', 'a.Title' , 'a.Description')
        ->where('b.Performer_ID','=',$performer->Id)
        ->get();

        if ($movie_list->count()  == 0 ) {
            return response()->json(
                [
                    'message' => 'Sorry, we dont found movie under this performer'
                ], 500);
        }else{
            return response()->json(
                [
                    'message' => 'Successfull. Here the list of movie perform by '.$request->performer_name,
                    'data' => $movie_list
                ], 200);
        }
    }
}
