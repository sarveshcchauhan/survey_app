<?php

namespace App\Http\Controllers;

use App\model\Questionare;
use Illuminate\Http\Request;

class TakeSurveyController extends Controller
{
    public function show(Questionare $questionare,$slug){
        $questionare->load('questions.answers');
        return view('takesurvey.show',compact('questionare'));
    }

    public function store(Questionare $questionare){
        $validate = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required|email'
        ]);

        $survey = $questionare->surveys()->create($validate['survey']);
        $survey->surveyResponses()->createMany($validate['responses']);
        return "Thank You";
    }
}
