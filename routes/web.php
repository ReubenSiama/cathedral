<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\StationsController;
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

Route::middleware(['language', 'visitor'])->group(function () {
    Route::controller(HomePageController::class)
        ->group(function () {
            Route::get('/', 'index')->name('home');
            Route::get('/about-us', 'aboutUs')->name('about.us');
            Route::get('/parish-pastoral-council', 'parishPastoralCouncil')->name('parish.pastoral.council');
            Route::get('/bishops-and-priests', 'bishopsAndPriests')->name('bishops.and.priests');
            Route::get('/religious-and-catechists', 'religiousAndCatechists')->name('religious.and.catechists');
            Route::get('/institutions', 'institutions')->name('institutions');
            Route::get('/others', 'others')->name('others');
            Route::get('/associations', 'associations')->name('associations');
        });

    Route::get('stations', [StationsController::class, 'index'])->name('stations.index');
    Route::get('stations/{parish}', [StationsController::class, 'show'])->name('stations.show');

    Route::get('login', function () {
        return redirect()->route('filament.admin.auth.login');
    })->name('login');

    Route::controller(CertificateController::class)
        ->group(function () {
            Route::get('baptism/{baptism}/download', 'baptism')->name('baptism.download');
            Route::get('first-communion/{firstCommunion}/download', 'firstCommunion')->name('first.communion.download');
            Route::get('confirmation/{confirmation}/download', 'confirmation')->name('confirmation.download');
            Route::get('funeral/{funeral}/download', 'funeral')->name('funeral.download');
            Route::get('marriage/{marriage}/download', 'marriage')->name('marriage.download');
            Route::get('template', 'certificateTemplate')->name('certificate.template');
        });

    Route::controller(GalleryController::class)
        ->group(function () {
            Route::get('gallery', 'index')->name('gallery');
        });
});
