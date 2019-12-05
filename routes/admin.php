<?php
/**
 * Created by PhpStorm.
 * User: PhiTam
 * Date: 11/22/18
 * Time: 10:45 PM
 */

Route::get('admin', function () {
    return redirect()->route('admin.dashboard');
});
Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'login'], function () {
        Route::get('/', 'AdminsLoginController@getLogin')->name('login.get');
        Route::get('logout', 'AdminsLoginController@logout')->name('login.logout');
        Route::post('/', 'AdminsLoginController@login')->name('login.post');
    });
});
Route::group(['prefix' => 'admin', 'middleware' => 'admins'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    //Route::get('settings', 'DashboardController@index')->name('admin.settings');
    //
    Route::group(['prefix' => 'post'], function () {
        Route::group(['prefix' => 'cate'], function () {
            Route::get('/', 'PostCateController@index')->name('post.cate.index');
            Route::get('add', 'PostCateController@create')->name('post.cate.create');
            Route::post('add', 'PostCateController@store')->name('post.cate.store');
            Route::get('edit/{id}', 'PostCateController@show')->name('post.cate.show');
            Route::post('edit', 'PostCateController@update')->name('post.cate.update');
            Route::get('delete/{id}', 'PostCateController@destroy')->name('post.cate.destroy');
        });
        Route::get('/', 'PostController@index')->name('post.index');
        Route::get('add', 'PostController@create')->name('post.create');
        Route::post('add', 'PostController@store')->name('post.store');
        Route::get('edit/{id}', 'PostController@show')->name('post.show');
        Route::post('edit', 'PostController@update')->name('post.update');
        Route::get('delete/{id}', 'PostController@destroy')->name('post.destroy');
    });
    //Page
    Route::group(['prefix' => 'page'], function () {
        Route::get('/', 'PageController@index')->name('page.index');
        Route::get('add', 'PageController@create')->name('page.create');
        Route::post('add', 'PageController@store')->name('page.store');
        Route::get('edit/{id}', 'PageController@show')->name('page.show');
        Route::post('edit', 'PageController@update')->name('page.update');
        Route::get('delete/{id}', 'PageController@destroy')->name('page.destroy');
    });
    //slider
    Route::group(['prefix' => 'slider'], function () {
        Route::get('/', 'SliderController@index')->name('slider.index');
        Route::get('add', 'SliderController@create')->name('slider.create');
        Route::post('add', 'SliderController@store')->name('slider.store');
        Route::get('edit/{id}', 'SliderController@show')->name('slider.show');
        Route::post('edit', 'SliderController@update')->name('slider.update');
        Route::get('delete/{id}', 'SliderController@destroy')->name('slider.destroy');
    });
    //settings
    Route::group(['prefix' => 'settings'], function () {
        Route::get('overview', 'SettingsController@index')->name('settings.overview');
        Route::post('overview', 'SettingsController@update')->name('settings.overview');
        Route::get('translation', 'SettingsController@translation')->name('settings.translation');
        Route::get('custom', 'SettingsController@custom')->name('settings.custom');
        Route::post('custom', 'SettingsController@updateCustom')->name('settings.custom');

    });
    //Products
    Route::group(['prefix' => 'products'], function () {
        Route::group(['prefix' => 'cate'], function () {
            Route::get('/', 'ProductsCateController@index')->name('products.cate.index');
            Route::get('add', 'ProductsCateController@create')->name('products.cate.create');
            Route::post('add', 'ProductsCateController@store')->name('products.cate.store');
            Route::get('edit/{id}', 'ProductsCateController@show')->name('products.cate.show');
            Route::post('edit', 'ProductsCateController@update')->name('products.cate.update');
            Route::get('delete/{id}', 'ProductsCateController@destroy')->name('products.cate.destroy');
        });
        Route::get('/', 'ProductsController@index')->name('products.index');
        Route::get('add', 'ProductsController@create')->name('products.create');
        Route::post('add', 'ProductsController@store')->name('products.store');
        Route::get('edit/{id}', 'ProductsController@show')->name('products.show');
        Route::post('edit', 'ProductsController@update')->name('products.update');
        Route::get('delete/{id}', 'ProductsController@destroy')->name('products.destroy');
    });


    Route::resource('tags', 'TagsController');
    //Member
    Route::group(['prefix' => 'member'], function () {
        Route::get('/', 'MemberController@index')->name('member.index');
        Route::get('add', 'MemberController@create')->name('member.create');
        Route::post('add', 'MemberController@store')->name('member.store');
        Route::get('edit/{id}', 'MemberController@show')->name('member.show');
        Route::post('edit', 'MemberController@update')->name('member.update');
        Route::post('checkEmail', 'MemberController@checkEmail')->name('member.checkEmail');
        Route::get('delete/{id}', 'MemberController@destroy')->name('member.destroy');
    });
});


