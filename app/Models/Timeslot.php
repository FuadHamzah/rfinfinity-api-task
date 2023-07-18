<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Timeslot extends Model
{
    use HasFactory, HasRoles, HasApiTokens;

    protected $fillable = ['Theater_name','Start_time','End_time','Theater_room_no'];

    //one to many relationship
    public function movies(){
        return $this->belongsTo(Movie::class);
    }
}
