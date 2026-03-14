<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DiseaseController;
use App\Http\Controllers\Api\SymptomController;
use App\Http\Controllers\Api\MedicineController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\DoctorScheduleController;
use App\Http\Controllers\Api\HospitalController;
use App\Http\Controllers\Api\PharmacyController;
use App\Http\Controllers\Api\OnlineConsultationController;
use App\Http\Controllers\Api\BookmarkController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\LocationController;

/*
|--------------------------------------------------------------------------
| Public Routes  (no auth required)
|--------------------------------------------------------------------------
*/

// Global Search
Route::get('/search', [SearchController::class, 'search']);

// Location Cascade
Route::prefix('locations')->group(function () {
    Route::get('/countries',             [LocationController::class, 'countries']);
    Route::get('/divisions/{countryId}', [LocationController::class, 'divisions']);
    Route::get('/districts/{divisionId}',[LocationController::class, 'districts']);
    Route::get('/thanas/{districtId}',   [LocationController::class, 'thanas']);
});

// Disease Discovery
Route::prefix('diseases')->group(function () {
    Route::get('/',          [DiseaseController::class, 'index']);
    Route::get('/by-symptoms', [DiseaseController::class, 'bySymptoms']);
    Route::get('/{slug}',    [DiseaseController::class, 'show']);
});

// Symptoms
Route::get('/symptoms', [SymptomController::class, 'index']);

// Medicines
Route::prefix('medicines')->group(function () {
    Route::get('/', [MedicineController::class, 'index']);
    Route::get('/{id}', [MedicineController::class, 'show']);
});

// Doctors (public browsing)
Route::prefix('doctors')->group(function () {
    Route::get('/',       [DoctorController::class, 'index']);
    Route::get('/{slug}', [DoctorController::class, 'show']);
    Route::get('/{id}/schedules', [DoctorScheduleController::class, 'index']);
});

// Hospitals (public browsing + geo search)
Route::prefix('hospitals')->group(function () {
    Route::get('/',        [HospitalController::class, 'index']);
    Route::get('/nearby',  [HospitalController::class, 'nearby']);
    Route::get('/{slug}',  [HospitalController::class, 'show']);
});

// Pharmacies (public browsing + geo search)
Route::prefix('pharmacies')->group(function () {
    Route::get('/',       [PharmacyController::class, 'index']);
    Route::get('/nearby', [PharmacyController::class, 'nearby']);
    Route::get('/{slug}', [PharmacyController::class, 'show']);
});

/*
|--------------------------------------------------------------------------
| Authenticated User Routes  (Sanctum token required)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    // Current user
    Route::get('/user', fn (\Illuminate\Http\Request $r) => $r->user());

    // Search History
    Route::get('/search/history', [SearchController::class, 'history']);

    // Bookmarks
    Route::prefix('bookmarks')->group(function () {
        Route::get('/',    [BookmarkController::class, 'index']);
        Route::post('/',   [BookmarkController::class, 'store']);
        Route::delete('/{id}', [BookmarkController::class, 'destroy']);
    });

    // Online Consultations (patients & doctors)
    Route::prefix('consultations')->group(function () {
        Route::get('/',          [OnlineConsultationController::class, 'index']);
        Route::get('/{id}',      [OnlineConsultationController::class, 'show']);
        Route::post('/',         [OnlineConsultationController::class, 'store']);
        Route::patch('/{id}/status', [OnlineConsultationController::class, 'updateStatus']);
        Route::delete('/{id}',   [OnlineConsultationController::class, 'destroy']);
    });

    // Doctor reviews (any authenticated user)
    Route::post('/doctors/{id}/reviews', [DoctorController::class, 'addReview']);
    Route::post('/hospitals/{id}/reviews', [HospitalController::class, 'addReview']);

    /*
    |----------------------------------------------------------------------
    | Doctor-owned Resources  (must be the owning doctor or admin)
    |----------------------------------------------------------------------
    */
    Route::prefix('doctors/{doctorId}')->middleware('role:admin,doctor')->group(function () {
        Route::post('/schedules',           [DoctorScheduleController::class, 'store']);
        Route::put('/schedules/{id}',       [DoctorScheduleController::class, 'update']);
        Route::delete('/schedules/{id}',    [DoctorScheduleController::class, 'destroy']);
    });

    /*
    |----------------------------------------------------------------------
    | Hospital-owner Routes  (role: hospital_owner or admin)
    |----------------------------------------------------------------------
    */
    Route::middleware('role:admin,hospital_owner')->group(function () {
        Route::post('/hospitals',       [HospitalController::class, 'store']);
        Route::put('/hospitals/{id}',   [HospitalController::class, 'update']);
        Route::delete('/hospitals/{id}',[HospitalController::class, 'destroy']);
    });

    /*
    |----------------------------------------------------------------------
    | Pharmacy-owner Routes  (role: pharmacy_owner or admin)
    |----------------------------------------------------------------------
    */
    Route::middleware('role:admin,pharmacy_owner')->group(function () {
        Route::post('/pharmacies',              [PharmacyController::class, 'store']);
        Route::put('/pharmacies/{id}',          [PharmacyController::class, 'update']);
        Route::delete('/pharmacies/{id}',       [PharmacyController::class, 'destroy']);
        Route::put('/pharmacies/{id}/medicines',[PharmacyController::class, 'syncMedicines']);
    });

    /*
    |----------------------------------------------------------------------
    | Admin-only Routes
    |----------------------------------------------------------------------
    */
    Route::middleware('role:admin')->group(function () {

        // Disease management
        Route::post('/diseases',       [DiseaseController::class, 'store']);
        Route::put('/diseases/{id}',   [DiseaseController::class, 'update']);
        Route::delete('/diseases/{id}',[DiseaseController::class, 'destroy']);

        // Symptom management
        Route::post('/symptoms',       [SymptomController::class, 'store']);
        Route::put('/symptoms/{id}',   [SymptomController::class, 'update']);
        Route::delete('/symptoms/{id}',[SymptomController::class, 'destroy']);

        // Medicine management
        Route::post('/medicines',       [MedicineController::class, 'store']);
        Route::put('/medicines/{id}',   [MedicineController::class, 'update']);
        Route::delete('/medicines/{id}',[MedicineController::class, 'destroy']);

        // Doctor management
        Route::post('/doctors',       [DoctorController::class, 'store']);
        Route::put('/doctors/{id}',   [DoctorController::class, 'update']);
        Route::delete('/doctors/{id}',[DoctorController::class, 'destroy']);
    });
});
