<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Settings\SocialLinkController;

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

# profile
Route::middleware('auth')
    ->prefix('admin')
    ->as('admin.')->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });

# admin routes
Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        # dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        # social link
        Route::resource('social-links', SocialLinkController::class)->except(['create', 'show']);
        Route::patch('/social-links/update-status/{id}', [SocialLinkController::class, 'updateStatus'])->name('social-links.update.status');
    });

require __DIR__ . '/auth.php';
