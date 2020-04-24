<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('questions', 'QuestionsController')->except('show');
Route::resource('questions.answers', 'AnswersController')->except('index', 'create', 'show');
Route::get('questions/{slug}', 'QuestionsController@show')->name('questions.show');

Route::post('/answers/{answer}/accept', 'AcceptAnswerController')->name('answers.accept');