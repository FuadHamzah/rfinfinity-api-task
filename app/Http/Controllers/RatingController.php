<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rating\showRequest;
use App\Http\Requests\Rating\storeRequest;
use App\Models\User;
use App\Models\Movie;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function Store(storeRequest $request)
    {
        $user = Auth::user();

        // Check if the user has the 'user' role
        if (!$user->hasRole('user')) {
            // Abort the request or redirect the user
            abort(Response::HTTP_FORBIDDEN, 'Unauthorized access');
        }

        $user= User::where('username','=',$request->username)->first();
        $movie = Movie::where('title','=',$request->movie_title)->first();

        if ($user  === null ) {
            return response()->json(['message' => 'Username not found'], 500);
        }else if($movie === null ){
            return response()->json(['message' => 'Movie title not found'], 500);
        }

        $rating = new Rating();
        $rating->Rating = $request->rating;
        $rating->Description = $request->r_description;
        $rating->Movie_ID = $user->id;
        $rating->User_ID = $movie->Id;

        if ($rating->save()) {
            return response()->json(['message' => 'Review saved successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to save the review'], 500);
        }

    }

    public function show(showRequest $request)
    {
        $user = Auth::user();

        // Check if the user has the 'user' role
        if (!$user->hasRole('user')) {
            // Abort the request or redirect the user
            abort(Response::HTTP_FORBIDDEN, 'Unauthorized access');
        }

        $ratingPercentage = DB::table('movies as a')
            ->join('ratings as b', 'a.Id', '=', 'b.Movie_ID')
            ->select(
                'a.Id as Movie_ID',
                DB::raw('ROUND((SUM(b.Rating) / COUNT(*)), 2) AS Overall_rating'),
                'a.Title',
                'a.Description'
            )
            ->whereDate('a.created_at', '2023-07-17')
            ->groupBy('a.Id', 'a.Title', 'a.Description')
            ->get();

        if ($ratingPercentage->count()  == 0 ) {
            return response()->json(
                [
                    'message' => 'Sorry, we dont found new movie for this date'
                ], 500);
        }else{
            return response()->json(
                [
                    'message' => 'Successfull. Here the list of new movie for date '.$request->r_date,
                    'data' => $ratingPercentage
                ], 200);
        }

    }
}
