<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\RegisterController;

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

Route::prefix('posts')->group(function(){
    Route::get('/', [PostController::class, 'index'])->name('post-index');
    Route::get('/{id}', [PostController::class, 'show'])->name('post-by-id');
    Route::post('/create', [PostController::class, 'create'])->name('post-create');
    Route::post('/update/{id}', [PostController::class, 'update'])->name('post-update');
    Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('post-delete');

});
