<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PackageManagerController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Models\PackageManager;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Redirect root to dashboard
Route::redirect('/', 'dashboard')->name('home');

// Dashboard route
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Settings routes
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('admin', function () {
    //     return view('admin.index');
    // })->name('admin');

    // Route::get('admin/admin', function () {
    //     return view('admin.admin');
    // })->name('admin.admin');

    // Route::get('users', function () {
    //     return view('users.index');
    // })->name('users');

    // Route::get('admin/urls', function () {
    //     return view('admin.urls');
    // })->name('admin.urls');

    // Route::get('pricing', function () {
    //     return view('pricing.index'); // This will load the pricing view
    // })->name('pricing');

    // Route::get('pricing/add', function () {
    //     return view('pricing.add'); // This will load the pricing view
    // })->name('pricing.add');

    // Route::get('subscriptions', function () {
    //     return view('subscriptions.index');
    // })->name('subscriptions');

    // Route::get('newsletters', function () {
    //     return view('payments.index');
    // })->name('newsletters');

    // Route::get('contacts', function () {
    //     return view('contact.index');
    // })->name('contacts');

    
    Route::get('/newsletters', action: [NewsletterController::class, 'index'])->name('newsletters');
    Route::get('/newsletters/{id}/edit', [NewsletterController::class, 'edit'])->name('newsletters.edit');
    Route::put('/newsletters/{id}', [NewsletterController::class, 'update'])->name('newsletters.update');
    Route::delete('/newsletters/{id}', [NewsletterController::class, 'destroy'])->name('newsletters.destroy');

    
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');


    Route::get('/admin', action: [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');


    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


    Route::get('/packages', [PackageManagerController::class, 'index'])->name('packages.index');
    Route::get('/packages/{id}/edit', [PackageManagerController::class, 'edit'])->name('packages.edit');
    Route::put('/packages/{id}', [PackageManagerController::class, 'update'])->name('packages.update');
    Route::delete('/packages/{id}', [PackageManagerController::class, 'destroy'])->name('packages.destroy');


    Route::get('/subscriptions', action: [SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('/subscriptions/{id}/edit', [SubscriptionController::class, 'edit'])->name('subscriptions.edit');
    Route::put('/subscriptions/{id}', [SubscriptionController::class, 'update'])->name('subscriptions.update');
    Route::delete('/subscriptions/{id}', [SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');


    Route::get('/pricings', action: [PricingController::class, 'index'])->name('pricing');
    Route::get('/pricings/create', [PricingController::class, 'create'])->name('pricing.add');
    Route::post('/pricings', [PricingController::class, 'store'])->name('pricings.store');
    Route::get('/pricings/{id}/edit', [PricingController::class, 'edit'])->name('pricings.edit');
    Route::put('/pricings/{id}', [PricingController::class, 'update'])->name('pricings.update');
    Route::delete('/pricings/{id}', [PricingController::class, 'destroy'])->name('pricings.destroy');
});




require __DIR__.'/auth.php';