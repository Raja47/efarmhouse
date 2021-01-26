<?php

Route::group(['prefix'  =>  'admin'], function (){

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

        Route::group(['prefix'  =>   'categories'], function() {

            Route::get('/', 'Admin\CategoryController@index')->name('admin.categories.index');
            Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
            Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
            Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
            Route::post('/update', 'Admin\CategoryController@update')->name('admin.categories.update');
            Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.categories.delete');

            Route::post('banners/upload', 'Admin\CategoryBannerController@upload')->name('admin.categories.banners.upload');
            Route::get('banners/{id}/delete', 'Admin\CategoryBannerController@delete')->name('admin.categories.banners.delete');
        });

        Route::group(['prefix'  =>   'groups'], function() {

            Route::get('/', 'Admin\GroupController@index')->name('admin.groups.index');
            Route::get('/create', 'Admin\GroupController@create')->name('admin.groups.create');
            Route::post('/store', 'Admin\GroupController@store')->name('admin.groups.store');
            Route::get('/{id}/edit', 'Admin\GroupController@edit')->name('admin.groups.edit');
            Route::post('/update', 'Admin\GroupController@update')->name('admin.groups.update');
            Route::get('/{id}/delete', 'Admin\GroupController@delete')->name('admin.groups.delete');

            Route::post('banners/upload', 'Admin\CategoryBannerController@upload')->name('admin.groups.banners.upload');
            Route::get('banners/{id}/delete', 'Admin\CategoryBannerController@delete')->name('admin.groups.banners.delete');
        });


        Route::group(['prefix'  =>   'cities'], function() {

            Route::get('/', 'Admin\CityController@index')->name('admin.cities.index');
            Route::get('/create', 'Admin\CityController@create')->name('admin.cities.create');
            Route::post('/store', 'Admin\CityController@store')->name('admin.cities.store');
            Route::get('/{id}/edit', 'Admin\CityController@edit')->name('admin.cities.edit');
            Route::post('/update', 'Admin\CityController@update')->name('admin.cities.update');
            Route::get('/{id}/delete', 'Admin\CityController@delete')->name('admin.cities.delete');

            // Route::post('banners/upload', 'Admin\CategoryBannerController@upload')->name('admin.categories.banners.upload');
            // Route::get('banners/{id}/delete', 'Admin\CategoryBannerController@delete')->name('admin.categories.banners.delete');
        
        });

        Route::group(['prefix'  =>   'facilities'], function() {

            Route::get('/', 'Admin\FacilityController@index')->name('admin.facilities.index');
            Route::get('/create', 'Admin\FacilityController@create')->name('admin.facilities.create');
            Route::post('/store', 'Admin\FacilityController@store')->name('admin.facilities.store');
            Route::get('/{id}/edit', 'Admin\FacilityController@edit')->name('admin.facilities.edit');
            Route::post('/update', 'Admin\FacilityController@update')->name('admin.facilities.update');
            Route::get('/{id}/delete', 'Admin\FacilityController@delete')->name('admin.facilities.delete');

        });


        Route::group(['prefix'  =>   'attributes'], function() {

            Route::get('/', 'Admin\AttributeController@index')->name('admin.attributes.index');
            Route::get('/create', 'Admin\AttributeController@create')->name('admin.attributes.create');
            Route::post('/store', 'Admin\AttributeController@store')->name('admin.attributes.store');
            Route::get('/{id}/edit', 'Admin\AttributeController@edit')->name('admin.attributes.edit');
            Route::post('/update', 'Admin\AttributeController@update')->name('admin.attributes.update');
            Route::get('/{id}/delete', 'Admin\AttributeController@delete')->name('admin.attributes.delete');

            Route::post('/get-values', 'Admin\AttributeValueController@getValues');
            Route::post('/add-values', 'Admin\AttributeValueController@addValues');
            Route::post('/update-values', 'Admin\AttributeValueController@updateValues');
            Route::post('/delete-values', 'Admin\AttributeValueController@deleteValues');
        });

        Route::group(['prefix'  =>   'brands'], function() {

            Route::get('/', 'Admin\BrandController@index')->name('admin.brands.index');
            Route::get('/create', 'Admin\BrandController@create')->name('admin.brands.create');
            Route::post('/store', 'Admin\BrandController@store')->name('admin.brands.store');
            Route::get('/{id}/edit', 'Admin\BrandController@edit')->name('admin.brands.edit');
            Route::post('/update', 'Admin\BrandController@update')->name('admin.brands.update');
            Route::get('/{id}/delete', 'Admin\BrandController@delete')->name('admin.brands.delete');

        });

        Route::group(['prefix'  =>   'banners'], function() {

            Route::get('/', 'Admin\BannerController@index')->name('admin.banners.index');
            Route::get('/create', 'Admin\BannerController@create')->name('admin.banners.create');
            Route::post('/store', 'Admin\BannerController@store')->name('admin.banners.store');
            Route::get('/{id}/edit', 'Admin\BannerController@edit')->name('admin.banners.edit');
            Route::post('/update', 'Admin\BannerController@update')->name('admin.banners.update');
            Route::get('/{id}/delete', 'Admin\BannerController@delete')->name('admin.banners.delete');

        });


         Route::group(['prefix'  => 'category_banners'], function() {

            Route::get('/', 'Admin\CategoryBannerController@index')->name('admin.category.banners.index');
            Route::get('/create', 'Admin\CategoryBannerController@create')->name('admin.category.banners.create');
            Route::post('/store', 'Admin\CategoryBannerController@store')->name('admin.category.banners.store');
            Route::get('/{id}/edit', 'Admin\CategoryBannerController@edit')->name('admin.category.banners.edit');
            Route::post('/update', 'Admin\CategoryBannerController@update')->name('admin.category.banners.update');
            Route::get('/{id}/delete', 'Admin\CategoryBannerController@delete')->name('admin.category.banners.delete');

        });

        Route::group(['prefix' => 'farmhouses'], function () {

           Route::get('/', 'Admin\FarmhouseController@index')->name('admin.farmhouses.index');
           Route::get('/create', 'Admin\FarmhouseController@create')->name('admin.farmhouses.create');
           Route::post('/store', 'Admin\FarmhouseController@store')->name('admin.farmhouses.store');
           Route::get('/edit/{id}', 'Admin\FarmhouseController@edit')->name('admin.farmhouses.edit');
           Route::get('/{id}/delete', 'Admin\FarmhouseController@delete')->name('admin.farmhouses.delete');
           Route::post('/update', 'Admin\FarmhouseController@update')->name('admin.farmhouses.update');

           Route::post('images/upload', 'Admin\FarmhouseController@uploadGalleryImages')->name('admin.farmhouses.images.upload');
           Route::get('images/{id}/delete', 'Admin\FarmhouseController@deleteGalleryImage')->name('admin.farmhouses.images.delete');
           //Route::get('images/show', 'Admin\FarmhouseController@show')->name('admin.farmhouses.images.show');

           // Route::get('attributes/load', 'Admin\ProductAttributeController@loadAttributes');
           // Route::post('attributes', 'Admin\ProductAttributeController@productAttributes');
           // Route::post('attributes/values', 'Admin\ProductAttributeController@loadValues');
           // Route::post('attributes/add', 'Admin\ProductAttributeController@addAttribute');
           // Route::post('attributes/delete', 'Admin\ProductAttributeController@deleteAttribute');

        });


        Route::group(['prefix'  =>  'couponAndDeals'], function() {
            Route::get('/', 'Admin\CouponAndDealController@index')->name('admin.couponAndDeals.index');
            Route::get('/create', 'Admin\CouponAndDealController@create')   ->name('admin.couponAndDeals.create');
            Route::post('/store', 'Admin\CouponAndDealController@store')    ->name('admin.couponAndDeals.store');
            Route::get('/{id}/edit', 'Admin\CouponAndDealController@edit')  ->name('admin.couponAndDeals.edit');
            Route::post('/update', 'Admin\CouponAndDealController@update')  ->name('admin.couponAndDeals.update');
            Route::get('/{id}/delete','Admin\CouponAndDealController@delete')->name('admin.couponAndDeals.delete');
        });

        Route::group(['prefix' => 'orders'], function () {
           Route::get('/', 'Admin\OrderController@index')->name('admin.orders.index');
           Route::get('/{order}/show', 'Admin\OrderController@show')->name('admin.orders.show');
        });

        Route::group(['prefix' => 'videos'], function () {
            Route::get('/', 'Admin\VideoController@index')->name('admin.videos.index');
            Route::get('/create', 'Admin\VideoController@create')->name('admin.videos.create');
            Route::post('/store', 'Admin\VideoController@store')->name('admin.videos.store');          
            Route::get('/{id}/delete','Admin\VideoController@delete')->name('admin.videos.delete');
        });


        Route::group(['prefix' => 'users'], function () {
           Route::get('/', 'Admin\UserController@index')->name('admin.users.index');
           Route::get('/{userId}/show', 'Admin\UserController@show')->name('admin.users.show');
        });

    });
});
