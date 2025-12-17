<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitController;
use App\Models\Visit;

Route::get('/', function () {
    return view('auth.login');
});

// Login laten zien en in en uitloggen.
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Opslaan van een nieuwe bezoek.
Route::post('/visits-store', [VisitController::class, 'store'])->name('visits.store');
Route::get('/plan-visit', function () {
    return view('plan-visit');
})->name('plan-visit');

Route::middleware('auth')->group(function () {
    // Dashboard index
    Route::get('/dashboard', function () {
        // Alle bezoeken ophalen
        $visits = Visit::orderBy('visit_date', 'asc')->get();

        return view('dashboard', compact('visits'));
    })->name('dashboard');

    Route::delete('/visits/{visit}', [VisitController::class, 'destroy'])->name('visits.destroy');
});
