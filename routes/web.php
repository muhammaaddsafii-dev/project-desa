<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PetaKependudukanController;
use App\Http\Controllers\PetaKondisiJalanController;
use App\Http\Controllers\PetaSaranaPrasaranaController;

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


Route::get('/progres', [LandingPageController::class, 'progres']);
Route::get('/', [LandingPageController::class, 'index']);
Route::get('/berita', [LandingPageController::class, 'news']);
Route::get('/detail-berita/{slug}', [LandingPageController::class, 'news_details'])->name('news.details');
Route::get('/kegiatan', [LandingPageController::class, 'activity']);
Route::get('/kegiatan/{id}', [LandingPageController::class, 'activity_details'])->name('activity_details');
Route::get('/pengumuman', [LandingPageController::class, 'announcement']);
Route::get('/map', [LandingPageController::class, 'map']);
Route::get('/peta-kependudukan', [PetaKependudukanController::class, 'index']);
Route::get('/peta-sarana-prasarana', [PetaSaranaPrasaranaController::class, 'index']);
Route::get('/peta-kondisi-jalan', [PetaKondisiJalanController::class, 'index']);
Route::get('/data-kependudukan', [LandingPageController::class, 'datakependudukan']);


Route::get('/peta-kependudukan-admin', [PetaKependudukanController::class, 'index_admin'])->name('peta-penduduk-admin');
Route::put('/peta-penduduk-admin/{id}', [PetaKependudukanController::class, 'update'])->name('update.peta-penduduk-admin');

// Route::get('/peta-kependudukan-admin/{id?}', [PetaKependudukanController::class, 'index_admin'])->name('peta-penduduk-admin');
Route::get('/peta-sarana-prasarana-admin', [PetaSaranaPrasaranaController::class, 'index_admin'])->name('peta-fasum-admin');
Route::put('/peta-sarana-prasarana-admin/{id}', [PetaSaranaPrasaranaController::class, 'update'])->name('update.peta-fasum-admin');


Route::get('/peta-kondisi-jalan-admin', [PetaKondisiJalanController::class, 'index_admin'])->name('peta-jalan-admin');
Route::put('/peta-kondisi-jalan-admin/{id}', [PetaKondisiJalanController::class, 'update'])->name('update.peta-jalan-admin');