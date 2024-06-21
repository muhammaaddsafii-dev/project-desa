<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;

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


Route::get('/', [LandingPageController::class, 'index']);
Route::get('/berita', [LandingPageController::class, 'news']);
Route::get('/detail-berita', [LandingPageController::class, 'news_details']);
Route::get('/kegiatan', [LandingPageController::class, 'activity']);