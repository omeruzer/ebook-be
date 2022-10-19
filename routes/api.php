<?php

use App\Http\Controllers\Author\AuthorController;
use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Publisher\PublisherController;
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

Route::prefix('author')->group(function () {
    Route::get('/', [AuthorController::class, 'index']);
    Route::get('/{id}', [AuthorController::class, 'detail']);
    Route::post('/', [AuthorController::class, 'add']);
    Route::patch('/{id}', [AuthorController::class, 'edit']);
    Route::delete('/{id}', [AuthorController::class, 'remove']);
});

Route::prefix('publisher')->group(function () {
    Route::get('/', [PublisherController::class, 'index']);
    Route::get('/{id}', [PublisherController::class, 'detail']);
    Route::post('/', [PublisherController::class, 'add']);
    Route::patch('/{id}', [PublisherController::class, 'edit']);
    Route::delete('/{id}', [PublisherController::class, 'remove']);
});

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'detail']);
    Route::post('/', [CategoryController::class, 'add']);
    Route::patch('/{id}', [CategoryController::class, 'edit']);
    Route::delete('/{id}', [CategoryController::class, 'remove']);
});

Route::prefix('book')->group(function () {
    Route::get('/', [BookController::class, 'index']);
    Route::get('/{id}', [BookController::class, 'detail']);
    Route::post('/', [BookController::class, 'add']);
    Route::patch('/{id}', [BookController::class, 'edit']);
    Route::delete('/{id}', [BookController::class, 'remove']);
});
