<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\events;
use App\Models\needs;
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

Route::middleware(config('filament.middleware.auth'))->get('/dashboard', [DashboardController::class , 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/events', App\Http\Controllers\EventsController::class);
    Route::resource('/donations', App\Http\Controllers\DonationsController::class);
    Route::resource('/needs', App\Http\Controllers\needsController::class);
    Route::resource('/categories', App\Http\Controllers\categoriesController::class);
    Route::post('/donationGeting', [App\Http\Controllers\DonationsController::class, 'geting'])->name('donationGeting');
    Route::post('/donation', [App\Http\Controllers\DonationsController::class, 'add'])->name('donation.add');
    Route::post('/event', [App\Http\Controllers\EventsController::class, 'add'])->name('event.add');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/about', function () {
        return view('about');
    })->name('about');
    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
});


require __DIR__.'/auth.php';
