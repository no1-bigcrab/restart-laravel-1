<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;


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

Route::prefix('products')->group(function(){
    Route::get('', [ProductController::class, "index"])->name('index-product');
    Route::get('/{id}', [ProductController::class, "show"])->name('show-product');
});

Route::prefix('posts')->group(function(){
    Route::get('/', [PostController::class, 'index'])->name('post-index');
    Route::get('/{id}', [PostController::class, 'show'])->name('post-by-id');
});

Route::middleware('auth:api')->group( function () {
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){

    //products    
        Route::prefix('products')->group(function(){
            Route::get('', [ProductController::class, "index"])->name('index-product');
            Route::get('/{id}', [ProductController::class, "show"])->name('show-product');
            Route::post('/create', [ProductController::class, "create"])->name('create-product');
            Route::post('/update/{id}', [ProductController::class, "update"])->name('update-product');
            Route::delete('/delete/{id}', [ProductController::class, "delete"])->name('delete-product');
        });

    //post
        Route::prefix('posts')->group(function(){
            Route::get('/', [PostController::class, 'index'])->name('post-index');
            Route::get('/{id}', [PostController::class, 'show'])->name('post-by-id');
            Route::post('/create', [PostController::class, 'create'])->name('post-create');
            Route::post('/update/{id}', [PostController::class, 'update'])->name('post-update');
            Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('post-delete');
        
        });

        //user
        Route::prefix('users')->group(function(){
            Route::get('/', [UserController::class, "index"])->name("index-users");
            Route::get('/{id}', [UserController::class, "show"])->name("details-users");
            Route::post('/create', [UserController::class, 'create'])->name('users-create');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('users-update');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('users-delete');
        });
    });
});




