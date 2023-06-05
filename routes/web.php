<?php

use App\Http\Controllers\userController;
use App\Http\Controllers\dataController;
use App\Http\Controllers\HymnController;
use App\Http\Controllers\viewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    return view('home');
});
Route::get('/hymnal', function () {
    return view('hymnal');
});
Route::post('/createhymnal',[HymnController::class, 'createHymnal']);
Route::get('/NZK', function () {
    return view('NZK');
});
Route::post('/createNZK',[HymnController::class, 'createNZK']);
Route::get('/Kikuyu', function () {
    return view('Kikuyu');
});
Route::post('/createKikuyu',[HymnController::class, 'createKikuyu']);
Route::get('/Kalenjin', function () {
    return view('Kalenjin');
});
Route::post('/createKalenjin',[HymnController::class, 'createKalenjin']);
Route::get('/Dholuo', function () {
    return view('Dholuo');
});
Route::post('/createDholuo',[HymnController::class, 'createDholuo']);
Route::get('/Kisii', function () {
    return view('Kisii');
});
Route::post('/createKisii',[HymnController::class, 'createKisii']);




Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
Route::post('/songs', [dataController::class, 'songs']);
Route::get('/speakinghearts', [viewsController::class, 'blog']);
Route::get('/poetry', [viewsController::class, 'poetry']);
Route::get('/speakinghearts/{title}', [viewsController::class, 'post']);
Route::get('/song/{title}', [viewsController::class, 'song']);
Route::get('/like/{id}', [dataController::class, 'like']);
Route::post('/comment/{id}', [dataController::class, 'comment']);
Route::post('/mcomment/{id}', [dataController::class, 'mcomment']);
Route::middleware('sessionCheck')->group(function () {
    Route::get('/create', function () {
        return view('createpost');
    });
    Route::get('/music', function () {
        return view('createmusic');
    });
    Route::get('/deleteComment/{id}', [dataController::class, 'deleteComment'])->middleware('checkAdmin');
    Route::get('/editpost/{title}', [dataController::class, 'editpost']);
    Route::post('/postedit/{id}', [dataController::class, 'postedit']);
    Route::get('/deletePost/{id}', [dataController::class, 'deletePost']);
    Route::get('/view/{title}', [dataController::class, 'viewPost']);
    Route::post('/savediary', [dataController::class, 'savediary'])->middleware('checkAdmin');
    Route::get('/diary', [viewsController::class, 'diary'])->middleware('checkAdmin');
    Route::post('/post', [dataController::class, 'createPost']);
    Route::post('/createmusic', [dataController::class, 'createmusic']);
    Route::get('/dashboard', [viewsController::class, 'dashboard']);
    Route::get('/togglePost/{id}', [dataController::class, 'publish']);
    Route::post('/sendsms', [dataController::class, 'sendsms']);
    Route::get('/make/{role}/{id}', [dataController::class, 'role']);
    Route::get('/deleteUser/{id}', [dataController::class, 'deleteUser']);
});
Auth::routes();
