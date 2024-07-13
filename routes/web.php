<?php

Route::get('/places/filter', [App\Http\Controllers\Frontend\PlaceController::class, 'filter'])->name('austroinfo.places.filter');



Route::group(['as' => 'austroinfo.', 'namespace' => 'Frontend'], function () {


    // Rakusko
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/shopping', 'MallController@index')->name('shopping.index');
    Route::get('/places', 'PlaceController@index')->name('places.index');
    Route::get('/zoo', 'PlaceController@kupon')->name('kupon.kupon'); 

    Route::get('/vylety-po-okoli', 'PlaceController@index')->name('vylety-po-okoli.index');
    Route::get('/navsteva-vieden', 'PlaceController@index')->name('navsteva-vieden.index');
    Route::get('/activity', 'ActivityController@index')->name('aktivity.index');
    Route::get('/info', 'InfoController@index')->name('info.index');


    Route::get('places/{slug}', ['as' => 'places.show', 'uses' => 'PlaceController@show']);
    Route::get('activity/{slug}', ['as' => 'activity.show', 'uses' => 'ActivityController@show']);
    Route::get('info/{slug}', ['as' => 'info.show', 'uses' => 'InfoController@show']);
    Route::get('shopping/{slug}', ['as' => 'mall.show', 'uses' => 'MallController@show']);
    Route::get('shopping/{slugMall}/{slugShop}', ['as' => 'mall.shop', 'uses' => 'MallController@shop']);
    Route::get('activity/{slugActivity}/{slugPost}', ['as' => 'activity.post', 'uses' => 'ActivityController@post']);
});
