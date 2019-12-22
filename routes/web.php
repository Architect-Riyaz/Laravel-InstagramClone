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


Auth::routes();
#Route::GET_OR_POST_METHOD('URL', 'CONTROLLER_NAMEController@METHOD_NAME_IN_CONTROLLER');

Route::post('/follow/{user}','FollowsController@store')->name('follows.store');
// Route::post('/follow/{user}',function (){
    //     return $user;
    // });
Route::get('/','PostsController@index')->name('posts.index');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::post('/p', 'PostsController@store');
Route::get('/p/create', 'PostsController@create');
Route::get('/p/{post}', 'PostsController@show');