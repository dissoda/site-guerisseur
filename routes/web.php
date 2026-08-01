<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SuiviController;
use App\Http\Controllers\TemoignageController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

Route::get('/', [AccueilController::class, 'index'])->name('accueil');

Route::get('/langue/{locale}', function (string $locale) {
    if (in_array($locale, SetLocale::LANGUES_DISPONIBLES)) {
        session(['locale' => $locale]);
    }

    return back();
})->name('langue.changer');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/demande', [DemandeController::class, 'create'])->name('demande.create');
Route::post('/demande', [DemandeController::class, 'store'])->name('demande.store');

Route::get('/suivi/{token}', [SuiviController::class, 'show'])->name('suivi.show');

Route::get('/blog', [PublicationController::class, 'index'])->name('publications.index');
Route::get('/blog/{publication}', [PublicationController::class, 'show'])->name('publications.show');

Route::get('/temoignages', [TemoignageController::class, 'index'])->name('temoignages.index');
Route::post('/temoignages', [TemoignageController::class, 'store'])->name('temoignages.store');