@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$survey->title}}</div>
                    <div class="card-body">
                        <a class="btn btn-dark" href="/questionare/{{$survey->id}}/questions/create">Add New Questions</a>
                        <a class="btn btn-primary ml-2" href="/takeSurvey/{{ $survey->id }}-{{Str::slug($survey->title)}}">Take Survey</a>
                    </div>
                </div>

                @foreach($survey->questions as $question)
                    <div class="card mt-3">
                        <div class="card-header">{{$question->question}}</div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                    <li  class="list-group-item d-flex justify-content-between">
                                        <div>{{$answer->answer}}</div>
                                        @if($question->surveyResponses->count())
                                            <div class="text-right">{{intval(($answer->surveyResponses->count() *100) / $question->surveyResponses->count())}}%</div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer">
                            <form action="/questionare/{{$survey->id}}/questions/{{$question->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Remove Question</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection

