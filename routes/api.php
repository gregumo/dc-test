<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ComposterController;

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

Route::get('/composters', [ComposterController::class, 'index'])->name('composters.index');
Route::get('/composters/{slug}', [ComposterController::class, 'show'])->name('composters.index');
