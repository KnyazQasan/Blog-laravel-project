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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/s-c-f-n','Api\SendController@sendComment')->name('sendComment');
Route::post('/s-m-f-c','Api\SendController@sendMessage')->name('sendMessage');
Route::post('/e-s-f-s','Api\SendController@sendAndAddSubs')->name('sendAndAddSubs');
Route::post('/a-s-f-s','Api\SendController@activeSubs')->name('activeSubs');

 

