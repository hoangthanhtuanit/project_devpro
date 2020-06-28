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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login','UserController@getLoginAdmin');

Route::post('admin/login','UserController@postLoginAdmin');

Route::get('admin/logout','UserController@logoutAdmin');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function (){
    Route::group(['prefix'=>'category'], function(){

        Route::get('index','CategoryController@index');

        Route::get('detail/{id}','CategoryController@detail');

        Route::get('update/{id}','CategoryController@getUpdate');

        Route::post('update/{id}','CategoryController@postUpdate');

        Route::get('create','CategoryController@getCreate');

        Route::post('create','CategoryController@postCreate');

        Route::any('delete/{id}','CategoryController@delete');
    });

    Route::group(['prefix'=>'color'], function(){

        Route::get('index','ColorController@index');

        Route::get('create','ColorController@getCreate');

        Route::post('create','ColorController@postCreate');

        Route::get('detail/{id}','ColorController@detail');

        Route::get('update/{id}','ColorController@getUpdate');

        Route::post('update/{id}','ColorController@postUpdate');

        Route::any('delete/{id}','ColorController@delete');
    });

    Route::group(['prefix'=>'size'], function(){

        Route::get('index','SizeController@index');

        Route::get('create','SizeController@getCreate');

        Route::post('create','SizeController@postCreate');

        Route::get('detail/{id}','SizeController@detail');

        Route::get('update/{id}','SizeController@getUpdate');

        Route::post('update/{id}','SizeController@postUpdate');

        Route::any('delete/{id}','SizeController@delete');
    });

    Route::group(['prefix'=>'contact'], function(){

        Route::get('index','ContactController@index');

        Route::get('detail/{id}','ContactController@detail');

        Route::any('delete/{id}','ContactController@delete');
    });

    Route::group(['prefix'=>'feedback'], function(){

        Route::get('index','FeedbackController@index');

        Route::get('detail/{id}','FeedbackController@detail');

        Route::any('delete/{id}','FeedbackController@delete');
    });

    Route::group(['prefix'=>'slide'], function(){

        Route::get('index','SlideController@index');

        Route::get('create','SlideController@getCreate');

        Route::post('create','SlideController@postCreate');

        Route::get('detail/{id}','SlideController@detail');

        Route::get('update/{id}','SlideController@getUpdate');

        Route::post('update/{id}','SlideController@postUpdate');

        Route::any('delete/{id}','SlideController@delete');
    });

    Route::group(['prefix'=>'product'], function(){

        Route::get('index','ProductController@index');

        Route::get('create','ProductController@getCreate');

        Route::post('create','ProductController@postCreate');

        Route::get('detail/{id}','ProductController@detail');

        Route::get('update/{id}','ProductController@getUpdate');

        Route::post('update/{id}','ProductController@postUpdate');

        Route::any('delete/{id}','ProductController@delete');
    });

    Route::group(['prefix'=>'new'], function(){

        Route::get('index','NewController@index');

        Route::get('create','NewController@getCreate');

        Route::post('create','NewController@postCreate');

        Route::get('detail/{id}','NewController@detail');

        Route::get('update/{id}','NewController@getUpdate');

        Route::post('update/{id}','NewController@postUpdate');

        Route::any('delete/{id}','NewController@delete');
    });

    Route::group(['prefix'=>'user'], function(){

        Route::get('index','UserController@index');

        Route::get('create','UserController@getCreate');

        Route::post('create','UserController@postCreate');

        Route::get('detail/{id}','UserController@detail');

        Route::get('update/{id}','UserController@getUpdate');

        Route::post('update/{id}','UserController@postUpdate');

        Route::any('delete/{id}','UserController@delete');
    });

    Route::group(['prefix'=>'order'], function(){

        Route::get('index','OrderController@index');

        Route::get('detail/{id}','OrderController@detail');

        Route::get('handling/{id}','OrderController@getHandling');

        Route::post('handling/{id}','OrderController@postHandling');

        Route::any('delete/{id}','OrderController@delete');
    });

    Route::get('dashboard', 'DashboardController@index');
});

Route::get('home', 'PageController@home');

Route::get('category/{id}', 'PageController@category');

Route::get('single-product/{id}', 'PageController@singleProduct');

Route::get('add-cart/{id}', 'PageController@addCart');

Route::get('update-cart', 'PageController@updateCart');

Route::get('remove-cart/{id}', 'PageController@removeCart');

Route::get('cart', 'PageController@cart');

Route::get('payment', 'PageController@getPayment');

Route::post('payment', ['as' => 'payment', 'uses' => 'PageController@postPayment']);

Route::get('register', 'PageController@getRegister');

Route::post('register', 'PageController@postRegister');

Route::get('login', 'PageController@getLogin');

Route::post('login', 'PageController@postLogin');

Route::get('logout', 'PageController@logout');