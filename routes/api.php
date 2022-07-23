<?php

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

Route::get('books', [\App\Http\Controllers\API\BooksController::class, 'index']);
Route::get('books/{id}', [\App\Http\Controllers\API\BooksController::class, 'show']);

Route::post('books', [\App\Http\Controllers\API\BooksController::class, 'store']);

Route::match(['put', 'patch'], 'books/{id}', [\App\Http\Controllers\API\BooksController::class, 'update']);

Route::delete('books/{id}', [\App\Http\Controllers\API\BooksController::class, 'destroy']);
