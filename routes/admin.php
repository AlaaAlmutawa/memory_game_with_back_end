<?php
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', 'Admin_Controller\AdminController@dashboard');
    Route::get('edit', 'Admin_Controller\GameDifficultyController@edit');
    Route::post('edit-options', 'Admin_Controller\GameDifficultyController@saveGameEdits');
    Route::get('players', 'Admin_Controller\AdminController@players');
    Route::get('logout', 'Admin_Controller\AdminController@logout');
});