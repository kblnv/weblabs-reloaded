<?php

use App\Http\Controllers\AlbumPageController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\InterestsPageController;
use App\Http\Controllers\TestPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/

Route::inertia('/', 'MainPage')->name('main');

Route::inertia('/about', 'AboutPage')->name('about');

Route::get('/interests', [InterestsPageController::class, 'index'])->name('interests');

Route::inertia('/study', 'StudyPage')->name('study');

Route::controller(AlbumPageController::class)->group(function() {
    Route::get('/album', 'index')->name('album.index');
    Route::post('/album', 'store')->name('album.store');
});

Route::controller(ContactPageController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact.index');
    Route::post('/contact', 'store')->name('contact.store');
});

Route::controller(TestPageController::class)->group(function () {
    Route::get('/test', 'index')->name('test.index');
    Route::post('/test', 'store')->name('test.store');
});

Route::inertia('/history', 'HistoryPage')->name('history');
