<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Lessor\HouseController;
use App\Http\Controllers\Lessor\CategoryController;

use Inertia\Inertia;

Route::get('lang/{lang}', [SessionController::class, 'changeLanguage'])->name('change.language');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard/Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//DASHBOARD
Route::name('dashboard.')->middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('house')->group(function () {
        Route::get('/', [HouseController::class, 'index'])->name('house.index');
        Route::get('/view', [HouseController::class, 'view'])->name('house.view');
        Route::get('/create', [HouseController::class, 'create'])->name('house.create');
        Route::post('/store', [HouseController::class, 'store'])->name('house.store');
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    });
});

require __DIR__.'/auth.php';
