<?php

use Illuminate\Support\Facades\Route;


Route::get('/check', function () {
    echo "admin route";
});

Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');


//Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');

Route::group(['namespace' =>'App\Http\Controllers\Admin','middleware' => 'is_admin'], function(){


 Route::get('/admin/home','AdminController@admin')->name('admin.home');
    Route::get('/admin/logout','AdminController@logout')->name('admin.logout');
    Route::get('/admin/password/change','AdminController@PasswordChange')->name('admin.password.change');
    Route::post('/admin/password/update','AdminController@PasswordUpdate')->name('admin.password.update');

    //Category
    Route::group(['prefix'=> 'category'], function(){
        Route::get('/','CategoryController@index')->name('category.index');
        Route::post('/store','CategoryController@store')->name('category.store');
        Route::get('/delete/{id}','CategoryController@destroy')->name('category.delete');
        Route::get('/edit/{id}','CategoryController@edit')->name('category.edit');
        Route::post('/update/{id}','CategoryController@update')->name('category.update');

    });


//Sub Category
    Route::group(['prefix'=> 'district'], function(){
        Route::get('/','DistrictController@index')->name('district.index');
        Route::post('/store','DistrictController@store')->name('district.store');
        Route::get('/delete/{id}','DistrictController@destroy')->name('district.delete');
        Route::get('/edit/{id}','DistrictController@edit')->name('district.edit');
        Route::post('/update/{id}','DistrictController@update')->name('district.update');

    });

    //Sub sub Category
    Route::group(['prefix'=> 'subdistrict'], function(){
        Route::get('/','SubdistrictController@index')->name('subdistrict.index');
        Route::post('/store','SubdistrictController@store')->name('subdistrict.store');
        Route::get('/delete/{id}','SubdistrictController@destroy')->name('subdistrict.delete');
        Route::get('/edit/{id}','SubdistrictController@edit')->name('subdistrict.edit');
        Route::post('/update/{id}','SubdistrictController@update')->name('subdistrict.update');

    });

    //Sub Category
    Route::group(['prefix'=> 'subcategory'], function(){
        Route::get('/','SubcategoryController@index')->name('subcategory.index');
        Route::post('/store','SubcategoryController@store')->name('subcategory.store');
        Route::get('/delete/{id}','SubcategoryController@destroy')->name('subcategory.delete');
        Route::get('/edit/{id}','SubcategoryController@edit')->name('subcategory.edit');
        Route::post('/update/{id}','SubcategoryController@update')->name('subcategory.update');

    });

    //Post
    Route::group(['prefix'=> 'post'], function(){
        Route::get('/','PostController@index')->name('post.index');
        Route::get('/create','PostController@create')->name('post.create');
        Route::post('/store','PostController@store')->name('post.store');
        Route::get('/delete/{id}','PostController@destroy')->name('post.delete');
        Route::get('/edit/{id}','PostController@edit')->name('post.edit');
        Route::post('/update/{id}','PostController@update')->name('post.update');
    });

     //settings

     //Social
     Route::group(['prefix'=> 'social'], function(){
        Route::get('/','SocialController@index')->name('social.index');
        Route::post('/update/{id}','SocialController@update')->name('social.update');

    });

    //seo
    Route::group(['prefix'=> 'seo'], function(){
        Route::get('/','SeoController@index')->name('seo.index');
        Route::post('/update/{id}','SeoController@update')->name('seo.update');
    });
     //Namz
     Route::group(['prefix'=> 'namaz'], function(){
        Route::get('/','NamazController@index')->name('namaz.index');
        Route::post('/update/{id}','NamazController@update')->name('namaz.update');
    });
 //website
        Route::group(['prefix'=> 'website'], function(){
            Route::get('/','WebsiteController@index')->name('website.index');
            Route::get('/create','WebsiteController@create')->name('website.create');
            Route::post('/store','WebsiteController@store')->name('website.store');
            Route::get('/delete/{id}','WebsiteController@destroy')->name('website.delete');
            Route::get('/edit/{id}','WebsiteController@edit')->name('website.edit');
            Route::post('/update/{id}','WebsiteController@update')->name('website.update');
        });

        //json data multiple dependency
        Route::get('get/subcat/{cat_id}','PostController@GetSubcat');
        Route::get('get/subdist/{dist_id}','PostController@GetSubDist');



        //Photo
        Route::group(['prefix'=> 'photo'], function(){
            Route::get('/','PhotoController@index')->name('photo.index');
            Route::get('/create','PhotoController@create')->name('photo.create');
            Route::post('/store','PhotoController@store')->name('photo.store');
            Route::get('/delete/{id}','PhotoController@destroy')->name('photo.delete');
            Route::get('/edit/{id}','PhotoController@edit')->name('photo.edit');
            Route::post('/update/{id}','PhotoController@update')->name('photo.update');
        });

           //ads
           Route::group(['prefix'=> 'horizontal'], function(){
            Route::get('/','AdsController@index')->name('horizontal.index');
            Route::get('/create','AdsController@create')->name('horizontal.create');
            Route::post('/store','AdsController@store')->name('horizontal.store');
            Route::get('/delete/{id}','AdsController@destroy')->name('horizontal.delete');
            Route::get('/edit/{id}','AdsController@edit')->name('horizontal.edit');
            Route::post('/update/{id}','AdsController@update')->name('horizontal.update');
        });


  //Vedio
  Route::group(['prefix'=> 'vedio'], function(){
    Route::get('/','VedioController@index')->name('vedio.index');
    Route::get('/create','VedioController@create')->name('vedio.create');
    Route::post('/store','VedioController@store')->name('vedio.store');
    Route::get('/delete/{id}','VedioController@destroy')->name('vedio.delete');
    Route::get('/edit/{id}','VedioController@edit')->name('vedio.edit');
    Route::post('/update/{id}','VedioController@update')->name('vedio.update');
});

     //Live Tv
     Route::group(['prefix'=> 'livetv'], function(){
        Route::get('/','LivetvController@index')->name('livetv.index');
        Route::post('/update/{id}','LivetvController@update')->name('livetv.update');

        Route::get('/active/livetv/{id}', 'LivetvController@ActiveLivetv')->name('active.livetv');
        Route::get('/deactive/livetv/{id}', 'LivetvController@DeactiveLivetv')->name('deactive.livetv');
    });

     //Live Tv
     Route::group(['prefix'=> 'setting'], function(){
        Route::get('/','SettingController@index')->name('setting.index');
        Route::post('/update/{id}','SettingController@update')->name('setting.update');

    });



     //Notice
     Route::group(['prefix'=> 'notice'], function(){
        Route::get('/','NoticeController@index')->name('notice.index');
        Route::post('/update/{id}','NoticeController@update')->name('notice.update');

        Route::get('/active/notice/{id}', 'NoticeController@ActiveNotice')->name('active.notice');
        Route::get('/deactive/notice/{id}', 'NoticeController@DeactiveNotice')->name('deactive.notice');
    });


    //child Category
    Route::group(['prefix'=> 'childcategory'], function(){
        Route::get('/','childcategoryController@index')->name('childcategory.index');
        Route::post('/store','childcategoryController@store')->name('childcategory.store');
        Route::get('/delete/{id}','childcategoryController@destroy')->name('childcategory.delete');
        Route::get('/edit/{id}','childcategoryController@edit');
        Route::post('/update','childcategoryController@update')->name('childcategory.update');

    });

    //Brand
    Route::group(['prefix'=> 'brand'], function(){
        Route::get('/','brandController@index')->name('brand.index');
        Route::post('/store','brandController@store')->name('brand.store');
        Route::get('/delete/{id}','brandController@destroy')->name('brand.delete');
        Route::get('/edit/{id}','brandController@edit');
        Route::post('/update','brandController@update')->name('brand.update');

    });

    //user Controller

    Route::group(['prefix'=> 'user'], function(){
        Route::get('/','UserController@index')->name('user.index');
        Route::post('/store','UserController@store')->name('user.store');
        Route::get('/delete/{id}','UserController@destroy')->name('user.delete');
        Route::get('/edit/{id}','UserController@edit');
        Route::post('/update','UserController@update')->name('user.update');

    });

    //Role
    Route::group(['prefix'=> 'role'], function(){
        Route::get('/','RoleController@index')->name('role.index');
        Route::get('/create','RoleController@create')->name('role.create');
        Route::get('/store','RoleController@store')->name('role.store');
        Route::get('/delete/{id}','RoleController@destroy')->name('role.delete');
        Route::get('/edit/{id}','RoleController@edit')->name('role.edit');
        Route::post('/update','RoleController@update')->name('role.update');

    });





});
