<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteSettings;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


// Display the email verification notice
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Handle email verification link
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Mark the user's email as verified
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend email verification link
Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



Route::get('/admin', function () {
    return redirect(Auth::check() ? route('dashboard') : route('login'));
});


Route::get('/', [SiteSettings::class, 'display'])->name('home.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('siteSettings', SiteSettings::class);
    
});

require __DIR__.'/auth.php';
