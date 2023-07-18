<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Rating extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['Rating','Description','Movie_ID','User_ID'];

    //one to many relationship
    public function movies(){
        return $this->belongsTo(Movie::class);
    }
}
