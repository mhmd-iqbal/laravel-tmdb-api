<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::middleware(['auth'])->group(function () {
  Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/master', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
    Route::resource('category', CategoryController::class);
  });
});

Auth::routes();
Route::get('/', [HomeController::class, 'index']);
Route::get('/{category_slug}', [HomeController::class, 'show']);
Route::get('/detail/{id}', [HomeController::class, 'detail']);
