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


Auth::routes(['verify' => true]);
Route::get('/','HomeController@index');
Route::get('campaign/{slug}','CampaignController@detail');
Route::get('/campaigns','CampaignController@campaigns');

Route::group(['middleware' => 'auth'], function () {
    Route::get('campaign/{slug}/contribute','ContributeController@contribute');
    Route::post('campaign/{slug}/contribute','ContributeController@store')->name('contribute.store');
    Route::get('contribute/{id}','ContributeController@contributeSucess')->name('transaction.sucess');


});
