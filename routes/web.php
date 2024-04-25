<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Bookmark\BookmarkController;
use App\Http\Controllers\Administrator\Book\BookController;
use App\Http\Controllers\Administrator\User\UserController;

use App\Http\Controllers\Administrator\Genre\GenreController;
use App\Http\Controllers\Administrator\Author\AuthorController;
use App\Http\Controllers\Administrator\Activity\ActivityController;

use App\Http\Controllers\Administrator\Dashboard\DashboardController;
use App\Http\Controllers\Administrator\Publisher\PublisherController;
use App\Http\Controllers\Book\BookController as CollectionController;


Route::get('/',[HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group( function() {
    Route::get('login',[AuthController::class, 'index'])->name('auth');
    Route::post('login',[AuthController::class, 'login'])->name('login');
    Route::get('register',[AuthController::class, 'signup'])->name('signup');
    Route::post('register',[AuthController::class, 'register'])->name('register');
    // Route::get('login/{provider}',[SocialiteController::class, 'redirectToProvider']);
    // Route::get('login/{provider}/callback',[SocialiteController::class, 'handleProvideCallback']);
});

Route::prefix('apps')->middleware('auth')->group( function() {
    Route::get('dashboard',[DashboardController::class, 'index'])->name('apps.dashboard');

    Route::prefix('collections')->group( function() {
        Route::get('',[CollectionController::class, 'index'])->name('guest.books');
        Route::get('search',[CollectionController::class, 'search'])->name('guest.books.search');
        Route::get('add-to-bookmark/{bookId}', [CollectionController::class, 'addToBookmark']);
        Route::get('{slug}',[CollectionController::class, 'detail'])->name('guest.books.details');
        Route::post('store/{book}/comments',[CollectionController::class, 'store'])->name('guest.books.store');
        Route::get('{comment}/delete',[CollectionController::class, 'delete'])->name('guest.books.delete-comment');
    });

    Route::prefix('profile')->group( function() {
        Route::get('',[ProfileController::class, 'index'])->name('guest.profile');
    });

    Route::prefix('bookmarks')->group( function() {
        Route::get('',[BookmarkController::class, 'index'])->name('guest.bookmarks');
        Route::delete('{bookmark}/delete',[BookmarkController::class, 'delete'])->name('guest.bookmarks.delete');
    });

    Route::prefix('books')->group( function() {
        Route::get('',[BookController::class, 'index'])->name('apps.books');
        Route::get('create',[BookController::class, 'create'])->name('apps.books.create');
        Route::post('store',[BookController::class, 'store'])->name('apps.books.store');
        Route::get('{book}/edit',[BookController::class, 'edit'])->name('apps.books.edit');
        Route::post('{book}/update',[BookController::class, 'update'])->name('apps.books.update');
        Route::delete('{book}/delete',[BookController::class, 'delete'])->name('apps.books.delete');
    });

    Route::prefix('genre')->group( function() {
        Route::get('',[GenreController::class, 'index'])->name('apps.genre');
        Route::get('create',[GenreController::class, 'create'])->name('apps.genre.create');
        Route::post('store',[GenreController::class, 'store'])->name('apps.genre.store');
        Route::get('{genre}/edit',[GenreController::class, 'edit'])->name('apps.genre.edit');
        Route::post('{genre}/update',[GenreController::class, 'update'])->name('apps.genre.update');
        Route::delete('{genre}/delete',[GenreController::class, 'delete'])->name('apps.genre.delete');
    });

    Route::prefix('authors')->group( function() {
        Route::get('',[AuthorController::class, 'index'])->name('apps.authors');
        Route::get('create',[AuthorController::class, 'create'])->name('apps.authors.create');
        Route::post('store',[AuthorController::class, 'store'])->name('apps.authors.store');
        Route::get('{author}/edit',[AuthorController::class, 'edit'])->name('apps.authors.edit');
        Route::post('{author}/update',[AuthorController::class, 'update'])->name('apps.authors.update');
        Route::delete('{author}/delete',[AuthorController::class, 'delete'])->name('apps.authors.delete');
    });

    Route::prefix('publishers')->group( function() {
        Route::get('',[PublisherController::class, 'index'])->name('apps.publishers');
        Route::get('create',[PublisherController::class, 'create'])->name('apps.publishers.create');
        Route::post('store',[PublisherController::class, 'store'])->name('apps.publishers.store');
        Route::get('{publisher}/edit',[PublisherController::class, 'edit'])->name('apps.publishers.edit');
        Route::post('{publisher}/update',[PublisherController::class, 'update'])->name('apps.publishers.update');
        Route::delete('{publisher}/delete',[PublisherController::class, 'delete'])->name('apps.publishers.delete');
    });

    Route::prefix('activities')->group( function() {
        Route::get('',[ActivityController::class, 'index'])->name('apps.activity');
    });

    Route::prefix('users')->group( function() {
        Route::get('',[UserController::class, 'index'])->name('apps.users');
        Route::get('create',[UserController::class, 'create'])->name('apps.users.create');
        Route::post('store',[UserController::class, 'store'])->name('apps.users.store');
        Route::get('{user}/edit',[UserController::class, 'edit'])->name('apps.users.edit');
        Route::post('{user}/update',[UserController::class, 'update'])->name('apps.users.update');
        // Route::delete('{user}/delete',[UserController::class, 'delete'])->name('apps.users.delete');
    });

    Route::get('logout',[AuthController::class,'logout'])->name('apps.logout');
});