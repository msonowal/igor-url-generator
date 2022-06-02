<?php

use App\Http\Controllers\URLHandlerController;
use App\Http\Controllers\URLShortenerController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [URLShortenerController::class, 'create']);
Route::post('/', [URLShortenerController::class, 'store'])->name('generate');

Route::get('/{code}', [URLHandlerController::class, 'handle'])->name('visit');
