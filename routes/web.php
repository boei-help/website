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

Route::group(['middleware' => ['web', 'statistics']], function () {
    Route::get('/', function () {
        return view('homepage', [
            'page_title' => 'Convert by chatting on visitors\' favorite channels',
            'website_visitors' => 'website visitors',
            'visitors' => 'visitors',
            'converting' => 'converting',
            'websites' => 'websites',
            'website' => 'website',
        ]);
    });

    Route::get('/shopify', function () {
        return view('homepage', [
            'page_title' => 'Sell by chatting on visitors\' favorite channels',
            'website_visitors' => 'Shopify visitors',
            'visitors' => 'visitors',
            'converting' => 'buying',
            'websites' => 'stores',
            'website' => 'store',
        ]);
    });

    Route::get('/terms', function () {
        return view('terms');
    });

    Route::get('/privacy', function () {
        return view('privacy-policy');
    });
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/track', ['as' => 'track_activity', 'uses' => 'ActivityController@create']);
});
