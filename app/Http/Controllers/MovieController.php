<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Performer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Movie\storeRequest;

class MovieController extends Controller
{
    public function store(storeRequest $request)
    {
        $user = Auth::user();

        // Check if the user has the 'user' role
        if (!$user->hasRole('user')) {
            // Abort the request or redirect the user
            abort(Response::HTTP_FORBIDDEN, 'Unauthorized access');
        }

        //supposedly in reality will save genre id and performer id
        //try to get id for this both input

        $inputGenres = $request->input('genre', []);
        $genres = Genre::select('Id','Genre')->whereIn('Genre', $inputGenres)->get();
        $genre_ids = $genres->pluck('Id')->toArray();
        $genre_names = $genres->pluck('Genre')->toArray();
        $notFoundGenreIds = array_diff($inputGenres,$genre_names);

        $inputPerformers = $request->input('performer', []);
        $performers = Performer::select('Id','Name')->whereIn('Name',$inputPerformers)->get();
        $performer_id = $performers->pluck('Id')->toArray();
        $performer_names = $performers->pluck('Name')->toArray();
        $notFoundPerformerIds = array_diff($inputPerformers, $performer_names);

        // dd($request->input('genre', []),$genre_names,$request->input('performer', []),$performer_names,$notFoundGenreIds,$notFoundPerformerIds);

        $movie = new Movie();
        $movie->title = $request->title;
        $movie->release = $request->release;
        $movie->length = $request->length;
        $movie->description = $request->description;
        $movie->mpaa_rating = $request->mpaa_rating;
        $movie->director = $request->director;
        $movie->language = $request->language;
        $movie->save();
        $movie->performers()->attach($performer_id);
        $movie->genres()->attach($genre_ids);

        $message1=$message2="";
        if(!empty($notFoundGenreIds)){
            $message1 = 'Few genre cant be refer to this movie because not registered yet.';
        }
        if(!empty($notFoundPerformerIds)){
            $message2 = 'Few performer cant be refer to this movie because not registered yet.';
        }
        if ($movie->save()) {
            return response()->json(
                [
                    'message' => 'Successfull add new movie into database.'.$message1.$message2,
                ], 200);
        }else{
            return response()->json(
                [
                    'message' => 'Failed to upload to database',
                ], 500);
        }
    }
}
