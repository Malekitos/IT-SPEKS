<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\VakanceController;
Route::apiResource('vakances', VakanceController::class);
Route::post('vakances/add', [VakanceController::class, 'store']);
Route::get('vakances', [VakanceController::class, 'show']);
Route::post('vakances/update/{id}', [VakanceController::class, 'update']);
Route::delete('vakances/remove/{vakance}', [VakanceController::class, 'remove']);

use App\Http\Controllers\JaunumiController;
Route::apiResource('Jaunumi', JaunumiController::class);
Route::post('Jaunumi/add', [JaunumiController::class, 'store']);
Route::post('Jaunumi/update/{id}', [JaunumiController::class, 'update']);
Route::delete('Jaunumi/remove/{Jaunumi}', [JaunumiController::class, 'remove']);

use App\Http\Controllers\PieteikumiController;
Route::apiResource('pieteikumi', PieteikumiController::class);
Route::post('pieteikumi/add', [PieteikumiController::class, 'store']);
Route::post('pieteikumi/update/{id}', [PieteikumiController::class, 'update']);
Route::delete('pieteikumi/remove/{pieteikumi}', [PieteikumiController::class, 'remove']);





Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/vakances', function () {
//     return Inertia::render('Vakances');
// })->middleware(['auth', 'verified'])->name('vakances');

// Route::get('/jaunumi', function () {
//     return Inertia::render('Jaunumi');
// })->middleware(['auth', 'verifed'])->name('jaunumi');

// Route::get('/parmums', function () {
//     return Inertia::render('Parmums');
// })->middleware(['auth', 'verified'])->name('parmums');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard')->middleware('web');

Route::get('/vakances', function () {
    return Inertia::render('Vakances');
})->name('vakances')->middleware('web');

Route::get('/jaunumi', function () {
    return Inertia::render('Jaunumi');
})->name('jaunumi')->middleware('web');

Route::get('/parmums', function () {
    return Inertia::render('Parmums');
})->name('parmums')->middleware('web');



Route::get('/admindashboard', function () {
    return Inertia::render('Admindashboard');
})->middleware(['auth', 'verified'])->name('admindashboard');

Route::get('/kontakontrole', function () {
    return Inertia::render('Kontakontrole');
})->middleware(['auth', 'verified'])->name('kontakontrole');

Route::get('/vakanceskontrole', function () {
    return Inertia::render('Vakanceskontrole');
})->middleware(['auth', 'verified'])->name('vakanceskontrole');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
