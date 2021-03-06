<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [ProductController::class, 'index']);


Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);

Auth::routes();

Route::get('/search/', [SearchController::class, 'search'])->name('search');
Route::get('/logout', [SearchController::class, 'logout'])->name('logout');