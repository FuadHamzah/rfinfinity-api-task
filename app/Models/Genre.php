<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Genre extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['Genre'];

    //many to many relationship
    public function movies(){
        return $this->belongsToMany(Movie::class, 'movie_genres');
    }
}
