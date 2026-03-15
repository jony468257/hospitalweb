<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Alias to catch the Tyro-Login forced redirect and send it to standard login
Route::get('/tyro-login', fn () => redirect()->route('login'))->name('tyro-login.login');

use App\Http\Controllers\DashboardController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('tyro-dashboard.index');
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard'); // General alias

    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->only(['index', 'edit', 'update']);
        Route::resource('hospitals', \App\Http\Controllers\Admin\HospitalController::class)->only(['index']);
        Route::patch('hospitals/{hospital}/status', [\App\Http\Controllers\Admin\HospitalController::class, 'toggleStatus'])->name('hospitals.toggle-status');
        Route::resource('doctors', \App\Http\Controllers\Admin\DoctorController::class)->only(['index', 'destroy']);
        Route::resource('pharmacies', \App\Http\Controllers\Admin\PharmacyController::class)->only(['index', 'destroy']);
    });

    // Hospital Owner Routes
    Route::middleware('role:hospital_owner')->prefix('hospital-owner')->name('hospital-owner.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('hospitals', \App\Http\Controllers\HospitalOwner\HospitalController::class);
        Route::resource('doctors', \App\Http\Controllers\HospitalOwner\DoctorController::class);
    });

    // Doctor Routes
    Route::middleware('role:doctor')->prefix('doctor')->name('doctor.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('schedules', \App\Http\Controllers\Doctor\ScheduleController::class);
        Route::get('consultations', [\App\Http\Controllers\Doctor\ConsultationController::class, 'index'])->name('consultations.index');
        Route::get('consultations/{consultation}', [\App\Http\Controllers\Doctor\ConsultationController::class, 'show'])->name('consultations.show');
        Route::patch('consultations/{consultation}/status', [\App\Http\Controllers\Doctor\ConsultationController::class, 'updateStatus'])->name('consultations.update-status');
    });

    // Pharmacy Owner Routes
    Route::middleware('role:pharmacy_owner')->prefix('pharmacy-owner')->name('pharmacy-owner.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('pharmacies', \App\Http\Controllers\PharmacyOwner\PharmacyController::class);
        Route::resource('medicines', \App\Http\Controllers\PharmacyOwner\MedicineController::class);
    });

    // Patient Routes
    Route::middleware('role:patient')->prefix('patient')->name('patient.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('consultations', \App\Http\Controllers\Patient\ConsultationController::class);
        Route::resource('bookmarks', \App\Http\Controllers\Patient\BookmarkController::class)->only(['index', 'store', 'destroy']);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
