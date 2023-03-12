<?php
use App\Http\Controllers\userController;
use App\Http\Controllers\dataController;
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
    return view('index');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/create', function () {
    return view('createpost');
});
Route::get('/logout', function () {
    Session::forget('user');
    return view('login');
});
Route::get('/music', function () {
    return view('createmusic');
});

Route::post('/reg_user', [userController::class,'register']);
Route::post('/log_user', [userController::class,'log_user']);

Route::post('/post',[dataController::class, 'createPost']);
Route::post('/createmusic',[dataController::class, 'createmusic']);
Route::post('/songs',[dataController::class, 'songs']);
Route::get('/blog', [dataController::class, 'blog']);
Route::get('/blog/{title}', [dataController::class, 'post']);
Route::get('/song/{title}', [dataController::class, 'song']);
Route::get('/dashboard', [dataController::class, 'dashboard'])->middleware('sessionCheck');
Route::get('/publish/{id}', [dataController::class, 'publish']);
Route::get('/unpublish/{id}', [dataController::class, 'unpublish']);
Route::get('/like/{id}', [dataController::class, 'like']);
Route::post('/comment/{id}', [dataController::class, 'comment']);
Route::post('/mcomment/{id}', [dataController::class, 'mcomment']);
Route::get('/deleteComment/{id}', [dataController::class, 'deleteComment']);
Route::get('/editpost/{title}', [dataController::class, 'editpost']);
Route::post('/postedit/{id}', [dataController::class, 'postedit']);
Route::get('/deletePost/{id}', [dataController::class, 'deletePost']);
Route::get('/view/{title}', [dataController::class, 'viewPost'])->middleware('sessionCheck');
Route::post('/savediary', [dataController::class, 'savediary'])->middleware('sessionCheck');
Route::get('/diary', [dataController::class, 'diary'])->middleware('sessionCheck');
Route::post('/sendsms',[dataController::class,'sendsms']);