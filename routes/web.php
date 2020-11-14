<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CharityController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;

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

// Route::resource('books', BookController::class);

Route::get('/', function () {
    return view('home');
    // return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('profile')->group(function () {
    
    Route::get('profile', [ProfileController::class, 'edit'])->name('pro.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('pro.update');
    Route::delete('profile', [ProfileController::class, 'delete'])->name('pro.delete');

    Route::get('password', [ProfileController::class, 'passwordEdit'])->name('pro.password.edit');
    Route::put('password', [ProfileController::class, 'passwordUpdate'])->name('pro.password.update');

    Route::get('home/{user}', [ProfileController::class, 'home'])->name('pro.home');
    Route::get('article/{user}', [ProfileController::class, 'article'])->name('pro.article');
    Route::get('book/{user}', [ProfileController::class, 'book'])->name('pro.book');
    Route::get('skill/{user}', [ProfileController::class, 'skill'])->name('pro.skill');
    Route::get('charity/{user}', [ProfileController::class, 'charity'])->name('pro.charity');

    Route::prefix('join')->group(function () {
        Route::get('book/{user}', [ProfileController::class, 'bookJoin'])->name('pro.join.book');
        Route::get('skill/{user}', [ProfileController::class, 'skillJoin'])->name('pro.join.skill');
        Route::get('charity/{user}', [ProfileController::class, 'charityJoin'])->name('pro.join.charity');
    });

    Route::prefix('save')->group(function () {
        Route::get('book/{user}', [ProfileController::class, 'bookSave'])->name('pro.save.book');
        Route::get('skill/{user}', [ProfileController::class, 'skillSave'])->name('pro.save.skill');
        Route::get('charity/{user}', [ProfileController::class, 'charitySave'])->name('pro.save.charity');
        Route::get('article/{user}', [ProfileController::class, 'articleSave'])->name('pro.save.article');
    });
});

Route::prefix('save')->group(function () {
    Route::post('book/{id}', [SaveController::class, 'bookSave'])->name('save.book');
    Route::post('skill/{id}', [SaveController::class, 'skillSave'])->name('save.skill');
    Route::post('charity/{id}', [SaveController::class, 'charitySave'])->name('save.charity');
    Route::post('article/{id}', [SaveController::class, 'articleSave'])->name('save.article');

    Route::delete('book/{id}', [SaveController::class, 'bookSaveDelete'])->name('save.delete.book');
    Route::delete('skill/{id}', [SaveController::class, 'skillSaveDelete'])->name('save.delete.skill');
    Route::delete('charity/{id}', [SaveController::class, 'charitySaveDelete'])->name('save.delete.charity');
    Route::delete('article/{id}', [SaveController::class, 'articleSaveDelete'])->name('save.delete.article');
});

Route::prefix('join')->group(function () {
    Route::post('book/{id}', [JoinController::class, 'bookJoin'])->name('join.book');
    Route::post('skill/{id}', [JoinController::class, 'skillJoin'])->name('join.skill');
    Route::post('charity/{id}', [JoinController::class, 'charityJoin'])->name('join.charity');

    Route::delete('book/{id}', [JoinController::class, 'bookJoinDelete'])->name('join.delete.book');
    Route::delete('skill/{id}', [JoinController::class, 'skillJoinDelete'])->name('join.delete.skill');
    Route::delete('charity/{id}', [JoinController::class, 'charityJoinDelete'])->name('join.delete.charity');
});

Route::prefix('search')->group(function () {
    Route::get('book', [SearchController::class, 'bookSearch'])->name('search.book');
    Route::get('skill', [SearchController::class, 'skillSearch'])->name('search.skill');
    Route::get('charity', [SearchController::class, 'charitySearch'])->name('search.charity');
    Route::get('article', [SearchController::class, 'articleSearch'])->name('search.article');
});

Route::resources([
    'books' => BookController::class,
    'skills' => SkillController::class,
    'charities' => CharityController::class,
    'articles' => ArticleController::class,
]);
