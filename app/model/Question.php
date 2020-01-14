<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\Answer;

class Question extends Model
{
    protected $fillable = [
        'question', 'answers',
    ];

    public function questionare(){
        return $this->belongsTo(Questionare::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
