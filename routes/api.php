<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/client-login', 'api\ClientController@login')->name('api.client.loggedin');
Route::post('/client-register', 'api\ClientController@register')->name('api.client.register');
Route::post('/client-logout', 'api\ClientController@logout')->name('api.client.logout');

Route::get('/get-setting', 'api\SettingController@getSetting');
Route::get('/client-detail/{id}', 'api\ClientController@clientById')->name('api.client.detail');
Route::get('/client-profile/{id}', 'api\ClientController@clientProfileById');

Route::get('/get-OrderProduct/{id}', 'api\SettingController@getOrderProduct');
Route::get('/get-OrderOtherProduct/{id}', 'api\SettingController@getOrderOtherProduct');

// client api dashboard
Route::get('/get-mycomments/{id}', 'api\ClientController@myComments');
Route::get('/sellerMessage/{id}', 'api\ClientController@messageSeller');

//for navbar section
Route::get('/nav-section','api\SettingController@getNavdata');
Route::get('/client/{productslug}', 'api\SettingController@productDetail')->name('api.product.detail');

//for product by education
Route::get('/education/{id}','api\SettingController@educationById');
Route::post('/check-seller','api\SettingController@checkSeller');

Route::get('/education-list','api\SettingController@educationList');
Route::get('/material-list/{id}','api\SettingController@materialList');
Route::get('/level-list/{id}','api\SettingController@levelList');
Route::get('/semester-list/{id}','api\SettingController@semesterList');
Route::get('/product-list/{id}','api\SettingController@productList');

//landing controller
Route::post('/contact','api\LandingController@contactStore');
Route::post('/subscribe','api\LandingController@subscribeStore');

Route::get('/about','api\LandingController@about');
Route::get('/terms','api\LandingController@term');
Route::get('/faqs','api\LandingController@faqs');
Route::get('/notices','api\LandingController@notices');
Route::get('/setting','api\LandingController@setting');

Route::get('/event-list','api\LandingController@eventList');
Route::get('/event/{slug}','api\LandingController@eventDetail');

Route::get('/blog-list','api\LandingController@blogList');
Route::get('/blog/{slug}','api\LandingController@blogDetail');
Route::get('/blog-by-tag/{id}','api\LandingController@blogByTag');


// notices by eduction
Route::get('/notice-all/{educationslug}', 'api\SettingController@noticeAll');
Route::get('/notice-detail/{noticeslug}', 'api\SettingController@noticeDetail');


Route::get('/client/read-content/{slug}', 'api\SettingController@readProductClient');
Route::get('/client-courselist/{id}', 'api\SettingController@paidCourse');


