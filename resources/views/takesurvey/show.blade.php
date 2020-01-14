@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{$questionare->title}}</h1>

                <form action="/takeSurvey/{{$questionare->id}}-{{Str::slug($questionare->title)}}" method="POST">
                    @csrf
                    @foreach($questionare->questions as  $key => $question)
                    <div class="card mt-4">
                        <div class="card-header">
                            {{$key+1 }} {{$question->question}}
                        </div>
                        <div class="card-body">
                            @error('responses.'.$key.'.answer_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                    <label for="answer{{$answer->id}}">
                                        <li class="list-group-item">
                                            <input type="radio"  name="responses[{{$key}}][answer_id]" id="answer{{$answer->id}}" class="mr-2" value="{{$answer->id}}" {{old('responses.'.$key.'.answer_id') == $answer->id ? 'checked' : null }}> {{ucfirst($answer->answer)}}
                                            <input type="hidden" name="responses[{{$key}}][question_id]" value="{{$question->id}}">
                                        </li>
                                    </label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                     @endforeach

                <div class="card mt-5">
                    <div class="card-header">Your details</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="survey[name]" id="name" value="">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" placeholder="Enter Email" name="survey[email]" id="email" value="">
                                @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
