<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;

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

Route::get('/', [ApiController::class, 'index'])->name('index');

Route::prefix('content')->name('content.')->group(function () {
    Route::get('/', [ContentController::class, 'fetch'])->name('fetch');
    Route::post('/', [ContentController::class, 'store'])->name('store');
    Route::get('/{id}', [ContentController::class, 'show'])->name('show');
    Route::put('/{id}', [ContentController::class, 'update'])->name('update');
    Route::delete('/{id}', [ContentController::class, 'destroy'])->name('destroy');
});


// Path: routes/api.php
