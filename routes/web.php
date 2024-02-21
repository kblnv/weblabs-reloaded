<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function() {
    return inertia("MainPage");
});

Route::get("/about", function() {
    return inertia("AboutPage");
});

Route::get("/interests", function() {
    return inertia("InterestsPage");
});

Route::get("/study", function() {
    return inertia("StudyPage");
});

Route::get("/album", function() {
    return inertia("AlbumPage");
});

Route::get("/contact", function() {
    return inertia("ContactPage");
});

Route::get("/test", function() {
    return inertia("TestPage");
});

Route::get("/history", function() {
    return inertia("HistoryPage");
});    