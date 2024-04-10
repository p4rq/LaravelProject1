<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/',  [App\Http\Controllers\HomeController::class, 'index'])->name("home");

Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');
});
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware'=>'admin'], function () {
    Route::group(['namespace' => 'post'], function () {
        Route::get('/post', 'IndexController')->name('admin.post.index');
        Route::get('/post/create', 'CreateController')->name('admin.post.create');
        Route::post('/posts', 'StoreController')->name('admin.post.store');
        Route::get('/post/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/posts/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/posts/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/posts/{post}', 'DestroyController')->name('admin.post.delete');
    });
});


Route::get('/posts/update', [App\Http\Controllers\PostController::class, 'update']);
Route::get('/posts/delete', [App\Http\Controllers\PostController::class, 'delete']);
Route::get('/posts/first_or_create', [App\Http\Controllers\PostController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [App\Http\Controllers\PostController::class, 'updateOrCreate']);


Route::get('/main', [App\Http\Controllers\MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
