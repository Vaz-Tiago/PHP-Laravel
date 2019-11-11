<?php

Route::get('/', ['as' => 'Site.Index', 'uses' => 'Site\SiteController@Index']);

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
