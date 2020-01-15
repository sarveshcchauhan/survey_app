@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Start creating your new survey </div>
                <div class="card-body">
                    <a href="/questionare/create" class="btn btn-dark">Create New Survey</a>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                   My Surveys
                </div>
                <div class="card-body">
                    @foreach($questionares as $questionare)
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{$questionare->path()}}"> {{$questionare->title}}</a>
                                <div class="mt-2">
                                    <small class="font-weight-bold">Share URL</small>
                                    <p>
                                        <a href="{{$questionare->publicPath()}}">{{$questionare->publicPath()}}</a>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


