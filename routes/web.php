<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('/channels/{channel}', 'FrontendController@showChannel')->name('frontend.channel');
Route::get('/slides/{slide}', 'FrontendController@showSlide')->name('frontend.slide');


// Authentication Routes...
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');


// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/backend/account', 'Backend\UserAccount@index')->name('backend.account');
Route::post('/backend/account', 'Backend\UserAccount@update')->name('backend.account.update');

Route::get('/backend', 'Backend\DashboardController@index')->name('backend.dashboard');

Route::get('/backend/settings', 'Backend\SettingsController@index')->name('backend.settings');
Route::post('/backend/settings', 'Backend\SettingsController@update')->name('backend.settings.update');

Route::get('/backend/channels', 'Backend\ChannelsController@index')->name('backend.channels');
Route::get('/backend/channels/create', 'Backend\ChannelsController@create')->name('backend.channels.create');
Route::post('/backend/channels', 'Backend\ChannelsController@store')->name('backend.channels.store');
Route::get('/backend/channels/edit/{channel}', 'Backend\ChannelsController@edit')->name('backend.channels.edit');
Route::put('/backend/channels/edit/{channel}', 'Backend\ChannelsController@update')->name('backend.channels.update');
Route::delete('/backend/channels/destroy/{channel}', 'Backend\ChannelsController@destroy')->name('backend.channels.destroy');

Route::get('/backend/slides', 'Backend\SlidesController@index')->name('backend.slides');
Route::get('/backend/slides/create', 'Backend\SlidesController@create')->name('backend.slides.create');
Route::post('/backend/slides', 'Backend\SlidesController@store')->name('backend.slides.store');
Route::get('/backend/slides/edit/{slide}', 'Backend\SlidesController@edit')->name('backend.slides.edit');
Route::put('/backend/slides/edit/{slide}', 'Backend\SlidesController@update')->name('backend.slides.update');
Route::put('/backend/slides/publish/{slide}', 'Backend\SlidesController@publish')->name('backend.slides.publish');
Route::put('/backend/slides/unpublish/{slide}', 'Backend\SlidesController@unpublish')->name('backend.slides.unpublish');
Route::delete('/backend/slides/destroy/{slide}', 'Backend\SlidesController@destroy')->name('backend.slides.destroy');
