<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Auth::routes();

Route::resource('posts', 'PostsController');

Route::get('messages/create', 'MessagesController@create')->name('messages.create');
Route::post('/messages', 'MessagesController@store')->name('messages.store');
Route::get('messages/{id}', 'MessagesController@show')->name('messages.show');

Route::get('/notificaciones', 'NotificationsController@index')->name('notifications.index');
Route::patch('notificaciones/{id}', 'NotificationsController@read')->name('notifications.read');
Route::delete('notificaciones/{id}', 'NotificationsController@destroy')->name('notifications.destroy');
