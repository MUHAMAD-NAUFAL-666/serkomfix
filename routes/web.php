<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManajemenBarangController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// Rute Otentikasi untuk Tamu
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('admin.auth.sign-in');
    })->name('sign-in');

    Route::get('/sign-up', function () {
        return view('admin.auth.sign-up');
    })->name('sign-up');
    
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/verifikasi-otp', function () {
        return view('admin.auth.verifikasi-otp');
    })->name('admin.auth.verifikasi-otp');
});

Route::get('/welcome', function () {
    return view('customer.welcome');
})->name('customer.welcome');

// Rute Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Rute Verifikasi Email
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('admin.dashboard');
    })->middleware(['signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:6,1')->name('verification.send');
});

// Rute Lupa Password
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');
Route::post('/verify-code', [ForgotPasswordController::class, 'verifyCode'])->name('verify.code');



// Rute Admin
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    // menghitung jumlah data
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/laporan', function () {
        return view('admin.laporan');
    })->name('admin.laporan');

    Route::get('/pengaturan', function () {
        return view('admin.pengaturan');
    })->name('admin.pengaturan');

    Route::get('/pembayaran', function () {
        return view('admin.pembayaran');
    })->name('admin.pembayaran');


    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('profile');

    Route::get('/manajemen-penyewaan', function () {
        return view('admin.manajemen-penyewaan');
    })->name('manajemen-penyewaan');

    Route::get('/manajemen-barang', function () {
        return view('admin.manajemen-barang');
    })->name('manajemen-barang');

    Route::get('/manajemen-pengguna', function () {
        return view('admin.manajemen-pengguna');
    })->name('manajemen-pengguna');
});

// Socialite untuk Google Login
Route::get('/auth/redirect', [SocialiteController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [SocialiteController::class, 'callback'])->name('auth.google.callback');
Route::get('/auth/google/verify', [SocialiteController::class, 'verify'])->name('auth.google.verify');

//tambah produk
Route::get('/manajemen-barang', [ManajemenBarangController::class, 'index'])->name('manajemen-barang');
Route::post('/tambah-laptop', [ManajemenBarangController::class, 'tambahLaptop'])->name('tambah-laptop');
Route::post('/tambah-handphone', [ManajemenBarangController::class, 'tambahHandphone'])->name('tambah-handphone');

//edit produk
Route::post('/update-handphone/{id}', [ManajemenBarangController::class, 'updateHandphone'])->name('update.handphone');
Route::post('/update-laptop/{id}', [ManajemenBarangController::class, 'updateLaptopData'])->name('update.laptop');
//delete produk
Route::get('/delete-laptop/{id}', [ManajemenBarangController::class, 'deleteLaptop'])->name('delete-laptop');
Route::get('/delete-handphone/{id}', [ManajemenBarangController::class, 'deleteHandphone'])->name('delete-handphone');
