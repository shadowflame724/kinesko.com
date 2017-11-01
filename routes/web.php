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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', 'MainController@index')->name('client.index');

        Route::get('/portfolio/{category?}', 'PortfolioController@index')->name('client.portfolio.index');
        Route::get('/portfolio/{category}/{portfolio}', 'PortfolioController@show')->name('client.portfolio.show');

        Route::get('/services', 'ServiceController@index')->name('client.services.index');
        Route::get('/services/{service}', 'ServiceController@show')->name('client.services.show');

        Route::get('/blog/{category?}', 'BlogController@index')->name('client.blog.index');
        Route::get('/blog/{category}/{post}', 'BlogController@show')->name('client.blog.show');
        Route::get('/blog/author/{user}', 'BlogController@author')->name('client.blog.author');

        Route::get('/contacts', 'ContactsController')->name('client.contacts');
        Route::get('/company', 'CompanyController')->name('client.company');

        Route::get('/search', 'SearchController')->name('client.search');
    });


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



