<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdvantageController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SendContactController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TicketTypeController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::prefix('editadminpanel')->middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/updateImage', [ProfileController::class, 'updateImage'])->name('updateImage');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('settings', SettingController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('videos', VideoController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('send_contact', SendContactController::class);
    Route::resource('advantages', AdvantageController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('ticket_types', TicketTypeController::class);
    Route::resource('abouts', AboutController::class);
    Route::resource('orders', OrderController::class);
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
});

Route::fallback(function () {
    return redirect()->route('dashboard');
});

require __DIR__ . '/auth.php';
