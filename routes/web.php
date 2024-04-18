<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

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

Route::controller(HomePageController::class)
    ->group(function () {
        Route::get('/', 'index')->name('home');
    });

Route::get('login', function () {
    return redirect()->route('filament.admin.auth.login');
})->name('login');

Route::controller(CertificateController::class)
    ->group(function () {
        Route::get('baptism/{baptism}/download', 'baptism')->name('baptism.download');
        Route::get('first-communion/{firstCommunion}/download', 'firstCommunion')->name('first.communion.download');
        Route::get('confirmation/{confirmation}/download', 'confirmation')->name('confirmation.download');
    });
