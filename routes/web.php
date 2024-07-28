<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DocumentController;

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

Route::get('documents/{document}/download', [DocumentController::class, 'generateDocument'])->name('documents.download');
Route::post('/upload-and-process-document', [DocumentController::class, 'uploadAndProcessDocument'])->name('upload-and-process-document');


Route::get('/', [LandingPageController::class, 'index']);
Route::get('/berita', [LandingPageController::class, 'news']);
Route::get('/detail-berita/{slug}', [LandingPageController::class, 'news_details'])->name('news.details');
Route::get('/kegiatan', [LandingPageController::class, 'activity']);
Route::get('/kegiatan/{id}', [LandingPageController::class, 'activity_details'])->name('activity_details');
Route::get('/map', [LandingPageController::class, 'map']);
Route::get('/peta-kependudukan', [LandingPageController::class, 'petakependudukan']);
Route::get('/peta-kondisi-jalan', [LandingPageController::class, 'petakondisijalan']);
Route::get('/peta-sarana-prasarana', [LandingPageController::class, 'petasaranaprasarana']);