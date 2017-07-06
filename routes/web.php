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

Route::get('/','Web_Controller\MainController@index');
Route::get('congratulations','Web_Controller\MainController@congratulations');
Auth::routes();
/*Route::group(['middleware' => 'auth'], function () {
    Route::get('admin/dashboard', 'Admin_Controller\AdminController@dashboard');
    Route::get('admin/edit', 'Admin_Controller\GameDifficultyController@edit');
    Route::post('admin/edit-options', 'Admin_Controller\GameDifficultyController@saveGameEdits');
    Route::get('admin/display_info', 'Admin_Controller\AdminController@players');
    Route::get('admin/logout', 'Admin_Controller\AdminController@logout');
});*/
Route::post('index', 'Web_Controller\MainController@register');
Route::post('share', 'Web_Controller\MainController@fbshare');
Route::get('display_easy', 'Web_Controller\DisplayController@easy');
Route::get('display_medium', 'Web_Controller\DisplayController@medium');
Route::get('display_hard', 'Web_Controller\DisplayController@hard');
Route::get('get_top_10', 'Web_Controller\DisplayController@top_10');
Route::post('start-game','Web_Controller\MainController@track_clicks');










