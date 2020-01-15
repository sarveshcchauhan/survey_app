<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
         'answer',
    ];


    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function surveyResponses(){
        return $this->hasMany(surveyResponse::class);
    }
}
