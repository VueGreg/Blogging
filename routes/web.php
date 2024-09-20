<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
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

Route::get('/', [PostsController::class, 'index']);
Route::post('/search', [PostsController::class, 'search']);
Route::post('/comment', [CommentsController::class, 'store']);
Route::delete('/comment/{id}', [CommentsController::class, 'destroy']);
Route::put('/comment/{id}', [CommentsController::class, 'update']);
