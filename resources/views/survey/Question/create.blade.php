@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Question</div>
                    <div class="card-body">
                        <form action="/questionare/{{$questionare->id}}/questions" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="Question">Question</label>
                                <input type="text" class="form-control" placeholder="Enter Question" name="question[question]" id="question" value="{{old('question.question')}}">
                                <small id="questionhelp" class="form-text text-muted">Ask Question relevant to your Survey</small>
                                @error('question.question')
                                 <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <fieldset>
                                <legend>Choices</legend>
                                <small class="form-text text-muted">Provide multiple choices for your survey or questions</small>
                                <div class="form-group">
                                    <label for="choice1">Choice 1</label>
                                    <input type="text" class="form-control" placeholder="Enter choice 1" name="answers[][answer]" id="answer1" value="{{old('answers.0.answer')}}">
                                    @error('answers.0.answer')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="choice2">Choice 2</label>
                                    <input type="text" class="form-control" placeholder="Enter choice 2" name="answers[][answer]" id="answer2" value="{{old('answers.1.answer')}}">
                                    @error('answers.1.answer')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="choice3">Choice 3</label>
                                    <input type="text" class="form-control" placeholder="Enter choice 3" name="answers[][answer]" id="answer3" value="{{old('answers.2.answer')}}">
                                    @error('answers.2.answer')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="choice4">Choice 4</label>
                                    <input type="text" class="form-control" placeholder="Enter choice 4" name="answers[][answer]" id="answer4" value="{{old('answers.3.answer')}}">
                                    @error('answers.3.answer')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </fieldset>
                            <input type="submit" class="btn btn-primary" value="Add Question" id="create_questions">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

