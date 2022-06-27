<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('frontend.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::group(['namespace' =>'App\Http\Controllers\Frontend'], function(){

    Route::get('/lang/english','ExtraController@English')->name('lang.english');
    Route::get('/lang/bangla','ExtraController@Bangla')->name('lang.bangla');

    //single post
    Route::get('view-post/{id}/{slug}','ExtraController@SinglePost');
    Route::get('posts/{id}/{subcategory_bn}','ExtraController@AllPost');
    Route::get('post/{id}/{category_bn}','ExtraController@AllPostscat');
    Route::get('get/subdist/frontend/{dist_id}','ExtraController@GetSubDist');
    Route::get('saradesh','ExtraController@Saradesh')->name('saradesh.news');








   });
