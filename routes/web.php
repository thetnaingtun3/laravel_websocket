<?php

use App\Events\WebsocketDemoEvent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    broadcast(new WebsocketDemoEvent('some data'));
    return view('welcome');
});
Route::get('/chats', "ChatsController@index");
Route::get('/test', "ChatsController@test");
Route::get('messages', "ChatsController@fetchMessage");
Route::post('messages', "ChatsController@sendmessage");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
