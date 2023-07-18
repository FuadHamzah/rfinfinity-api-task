<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Rating;
use App\Models\Timeslot;
use App\Models\Performer;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['Title', 'Description'];

    //many to many relationship
    public function genres(){
        return $this->belongsToMany(Genre::class, 'movie_genres');
    }

    //many to many relationship
    public function performers(){
        return $this->belongsToMany(Performer::class, 'movie_performers');
    }

    //one to many relationship
    public function timeslot(){
        return $this->hasMany(Timeslot::class);
    }

    //one to many relationship
    public function ratings(){
        return $this->hasMany(Rating::class);
    }
}
