<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
