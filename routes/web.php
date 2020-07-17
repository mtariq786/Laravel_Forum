<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();




//questions
Route::get('/questions/create', 'QuestionsController@create')->name('questions.create');
Route::get('/questions', 'QuestionsController@index')->name('questions.index');
Route::get('/questions/{question}', 'QuestionsController@show')->name('questions.show');
Route::get('/questions/{question}/edit', 'QuestionsController@edit')->name('questions.edit')->middleware('can:update,question');
Route::patch('/questions/{question}', 'QuestionsController@update')->name('questions.update');
Route::post('/questions', 'QuestionsController@store')->name('questions.store');
Route::delete('/questions/{question}', 'QuestionsController@destroy')->name('questions.update');

//answers


Route::post('/questions/{question}', 'AnswersController@store')->name('answers.store');
Route::get('/questions/{question}/answer/{answer}', 'AnswersController@show')->name('answers.show');
Route::get('/questions/{question}/answer/{answer}/edit', 'AnswersController@edit')->name('answers.edit')->middleware('can:update,answer');
Route::patch('/questions/{question}/answer/{answer}', 'AnswersController@update')->name('answers.update');
Route::delete('/questions/{question}/answer/{answer}', 'AnswersController@destroy')->name('answers.delete');


//profiles
Route::get('/profile/questions', 'ProfilesController@questions')->name('questions.showquestion');
Route::get('/profile/{user}', 'ProfilesController@show')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
