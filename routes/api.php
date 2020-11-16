<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\LanguageController;
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

Route::get('/languages', [LanguageController::class, 'index']);

Route::prefix('contents')->group(function () {
    Route::get('/', [ContentController::class, 'index']);
    Route::post('/', [ContentController::class, 'store']);
    Route::put('/', [ContentController::class, 'update']);
});
