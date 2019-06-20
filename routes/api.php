<?php

use Illuminate\Http\Request;
use App\User;

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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::get('/users', function () {
	$users = User::all();
	$headers = array('Content-Type' => 'application/json; charset=utf-8');	
	return response()->json($users, 200, $headers, JSON_UNESCAPED_UNICODE);
});

Route::get('/users/{user}', function ($id) {
	$user = User::findOrFail($id);
	$headers = array('Content-Type' => 'application/json; charset=utf-8');	
	return response()->json($user, 200, $headers, JSON_UNESCAPED_UNICODE);
});
