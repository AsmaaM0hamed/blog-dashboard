<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\usercontroller;

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
    return view('dashboard.dashbord');
});

// admin

route::resource('tags',TagController::class);

Route::resource('categories', CategorieController::class);

route::resource('post',PostController::class);
route::post('post.tag',[PostController::class,'add_tags'])->name('add_tags');

route::resource('users',usercontroller::class);





