<?php
use Illuminate\Support\Facades\Route;

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




//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
// Route::get('/login', 'Controllers\UsersController@login')->name('login');


Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index')->middleware('auth');

Route::get('/profile','UsersController@profile')->middleware('auth');                                                                                                                                                                               

Route::get('/search','UsersController@search')->middleware('auth');

Route::get('/follow-list','FollowsController@followList')->middleware('auth');
Route::get('/follower-list','FollowsController@followerList')->middleware('auth');

Route::post('/follow/{followingId}', [FollowsController::class, 'follow'])->middleware('auth');
Route::post('/unfollow/{followedId}', [FollowsController::class, 'unfollow'])->middleware('auth');

Route::post('/create','PostsController@store');

// Route::get('/logout','Auth\LoginController@login')->middleware('auth');
// Route::post('/logout','Auth\LoginController@login')->middleware('auth');

//ログアウト機能
Route::get('/logout','Auth\LoginController@logout');
