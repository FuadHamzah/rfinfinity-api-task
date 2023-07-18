<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Genre\showRequest;

class GenreController extends Controller
{
    public function show(showRequest $request)
    {
        $user = Auth::user();

        // Check if the user has the 'user' role
        if (!$user->hasRole('user')) {
            // Abort the request or redirect the user
            abort(Response::HTTP_FORBIDDEN, 'Unauthorized access');
        }

        $genre_list = DB::table('movies as a')
            ->select('a.Id as Movie_ID', 'a.Title', 'a.Description', 'b.Genre')
            ->joinSub(function ($query) use ($request) {
                $query->select('subA.Genre', 'subB.Movie_ID', 'subB.Genre_ID')
                    ->from('genres as subA')
                    ->join('movie_genres as subB', 'subA.Id', '=', 'subB.Genre_ID')
                    ->where('subA.Genre', '=', $request->genre);
            }, 'b', function ($join) {
                $join->on('a.Id', '=', 'b.Movie_ID');
            })
            ->get();

        if ($genre_list->count()  == 0 ) {
            return response()->json(
                [
                    'message' => 'Sorry, we dont have movie for this genre'
                ], 500);
        }else{
            return response()->json(
                [
                    'message' => 'Successfull. Here the list of movie for '.$request->genre,
                    'data' => $genre_list
                ], 200);
        }
    }
}
