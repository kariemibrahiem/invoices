<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionsController;
use Illuminate\Support\Facades\Auth;





Route::get('/', function () {
    return view("1_login");
});



Auth::routes();
Route::resource("/invoices" , InvoicesController::class);
Route::resource("/sections" , SectionsController::class)->middleware("auth");
Route::resource("/products" , ProductController::class);
Route::get("/sections" , [SectionsController::class , "index"])->name("sections");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/{page}', [AdminController::class , "index"]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
