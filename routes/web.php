<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\SocialAuthGoogleController;
use App\Http\Controllers\Conversion;

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

Route::get('/', function () {
    return view('home');
})->name('/');
Route::get('/google_redirect', [SocialAuthGoogleController::class, 'google_redirect']);
Route::get('/google_callback', [SocialAuthGoogleController::class, 'google_callback']);
Route::get('/facebook_redirect', [SocialAuthGoogleController::class, 'facebook_redirect']);
Route::get('/facebook_callback', [SocialAuthGoogleController::class, 'facebook_callback']);
Route::get('/signup', function () {
    return view('signup');
})->name('signup');
// Route::get('/dashboard', function () {
//     return view('home');
// });
// Route::get('file-upload', [FileUploadController::class, 'fileUpload'])->name('file.upload');
Route::post('file-upload', [FileUploadController::class, 'fileAnalysis']);
Route::post('file-conversion', [Conversion::class, 'indeed_conversion']);
Route::get('download/{filename}', [FileUploadController::class, 'getDownload']);
Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('home');
})->name('home');
