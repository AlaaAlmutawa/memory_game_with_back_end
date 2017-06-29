<?php

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

Route::get('/','MainController@index');
Route::get('congratulations','MainController@congratulations');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('index', 'MainController@register');
Route::get('dashboard', 'AdminController@dashboard');
Route::get('edit-easy', 'GameDifficultyController@editEasy');
Route::get('edit-medium', 'GameDifficultyController@editMedium');
Route::get('edit-hard', 'GameDifficultyController@editHard');
Route::post('edit-options', 'GameDifficultyController@saveGameEdits');
Route::get('display_info', 'AdminController@players');
Route::post('share', 'MainController@fbshare');
Route::get('display_easy', 'DisplayController@easy');
Route::get('display_medium', 'DisplayController@medium');
Route::get('display_hard', 'DisplayController@hard');
Route::get('get_top_10', 'DisplayController@top_10');
Route::post('start-game','AdminController@track_clicks');










