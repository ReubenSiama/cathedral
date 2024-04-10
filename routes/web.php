<?php

use App\Http\Controllers\CertificateController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return redirect()->route('filament.admin.auth.login');
})->name('login');

Route::controller(CertificateController::class)
    ->group(function () {
        Route::get('baptism/{baptism}/download', 'baptism')->name('baptism.download');
    });
