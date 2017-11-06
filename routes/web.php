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
        Route::get('/portfolio/{category}/{portfolio}.html', 'PortfolioController@show')->name('client.portfolio.show');

        Route::get('/services.html', 'ServiceController@index')->name('client.services.index');

        Route::get('/blog/{category?}', 'BlogController@index')->name('client.blog.index');
        Route::get('/blog/author/{user}.html', 'BlogController@author')->name('client.blog.author');
        Route::get('/blog/{category}/{post}.html', 'BlogController@show')->name('client.blog.show');

        Route::get('/contacts.html', 'ContactsController')->name('client.contacts');
        Route::get('/company.html', 'CompanyController')->name('client.company');

        Route::get('/search', 'SearchController')->name('client.search');



        Route::get('/{service}.html', 'ServiceController@show')->name('client.services.show');
    });


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



