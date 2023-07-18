<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class MoviePerformer extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['Movie_ID', 'Performer_ID','Overall_rating'];

}
