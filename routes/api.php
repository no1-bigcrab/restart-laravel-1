<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\ProductController;

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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::middleware('auth:api')->group( function () {
    Route::get('products', [ProductController::class, "index"])->name('index-product');
    Route::get('products/{id}', [ProductController::class, "show"])->name('show-product');
    Route::post('products/create', [ProductController::class, "create"])->name('create-product');
    Route::post('products/update/{id}', [ProductController::class, "update"])->name('update-product');
    Route::delete('products/delete/{id}', [ProductController::class, "delete"])->name('delete-product');
});

Route::prefix('posts')->group(function(){
    Route::get('/', [PostController::class, 'index'])->name('post-index');
    Route::get('/{id}', [PostController::class, 'show'])->name('post-by-id');
    Route::post('/create', [PostController::class, 'create'])->name('post-create');
    Route::post('/update/{id}', [PostController::class, 'update'])->name('post-update');
    Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('post-delete');

});
