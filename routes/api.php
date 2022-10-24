<?php

use App\Http\Controllers\api\categorycontroler;
use App\Http\Controllers\api\postcontroler;
use App\Http\Controllers\api\tagcontroller;
use App\Http\Controllers\api\usercontroler;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//tags
 Route::get('tags', [tagcontroller::class,'index']);
 route::post('tag/insert',[tagcontroller::class,'insert']);

 //categories

 Route::get('category', [categorycontroler::class,'index']);

 //posts
 Route::get('post', [postcontroler::class,'index']);

 //user
 Route::get('user', [usercontroler::class,'index']);
 route::post('user/insert',[usercontroler::class,'insert']);
