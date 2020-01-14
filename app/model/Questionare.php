<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Questionare extends Model
{
//    2nd Approach
//      disable mass assignment
//        protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function surveys(){
        return $this->hasMany(survey::class);
    }
}
