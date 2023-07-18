<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Performer extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['Name'];

    //many to many relationship
    public function movies(){
        return $this->belongsToMany(Movie::class, 'movie_performers');
    }
}
