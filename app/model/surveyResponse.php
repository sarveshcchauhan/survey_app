<?php

namespace App\model;

use App\model\survey;
use Illuminate\Database\Eloquent\Model;

class surveyResponse extends Model
{

    protected $fillable = [
        'question_id', 'answer_id',
    ];

    public function surveys(){
        return $this->belongsTo(survey::class);
    }
}
