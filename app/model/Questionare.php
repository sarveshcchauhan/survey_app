<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Questionare extends Model
{
//    2nd Approach
//      disable mass assignment
//        protected $guarded = [];

    public  function path(){
        return url('/questionare/'.$this->id);
    }

    public function publicPath(){
        return url('/takeSurvey/'.$this->id.'-'.Str::slug($this->title));
    }

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
