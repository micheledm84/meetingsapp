<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('meetings', 'Api\MeetingController@index')->name('meetings');

Route::get('users', 'Api\UserController@index')->name('users');

Route::get('rooms', 'Api\RoomController@index')->name('rooms');

Route::get('get_report', 'Api\MeetingController@get_report')->name('get_report');

Route::post('store_meeting', 'Api\MeetingController@store')->name('store_meeting');

Route::post('store_room', 'Api\RoomController@store')->name('store_room');

Route::delete('delete_room', 'Api\RoomController@delete')->name('delete_room');

Route::put('edit_room', 'Api\RoomController@edit')->name('edit_room');

Route::delete('delete_employee', 'Api\UserController@delete')->name('delete_employee');

Route::post('store_employee', 'Api\UserController@store')->name('store_employee');