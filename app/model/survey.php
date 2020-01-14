<?php

namespace App\model;

use App\model\Questionare;
use App\model\surveyResponse;
use Illuminate\Database\Eloquent\Model;

class survey extends Model
{
    protected $fillable = [
        'name', 'email',
    ];

    public function questionares(){
        return $this->belongsTo(Questionare::class);
    }

    public function surveyResponses(){
        return $this->hasMany(surveyResponse::class);
    }
}
