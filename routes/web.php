<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/questionare','QuestionareController');

Route::resource('/questionare/{questionare}/questions','QuestionController');


Route::get('/takeSurvey/{questionare}-{slug}','TakeSurveyController@show');
Route::post('/takeSurvey/{questionare}-{slug}','TakeSurveyController@store');
