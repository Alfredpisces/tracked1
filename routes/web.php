<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    // Force users straight to the Breeze login page
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Authenticated System Routes (Requires Login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // 1. The Central Traffic Cop (Redirects to role-specific dashboards)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
    |----------------------------------------------------------------------
    | TEACHER ECOSYSTEM
    |----------------------------------------------------------------------
    */
    Route::prefix('teacher')->name('teacher.')->group(function () {

        // Academic Submissions (We use a resource route here to handle CRUD automatically)
        Route::resource('dll', \App\Http\Controllers\Teacher\DailyLessonLogController::class);

        // Performance & Growth
        Route::get('/performance', [\App\Http\Controllers\Teacher\PerformanceController::class, 'index'])->name('performance.index');
        Route::post('/performance/seminar', [\App\Http\Controllers\Teacher\PerformanceController::class, 'storeSeminar'])->name('performance.store_seminar');

        // Behavioral Tracking (Strictly for logging violator incidents, not attendance)
        Route::resource('incidents', \App\Http\Controllers\Teacher\IncidentController::class)->only(['index', 'create', 'store']);

        // Property & Clearance
        Route::get('/inventory', [\App\Http\Controllers\Teacher\InventoryController::class, 'index'])->name('inventory.index');
        Route::get('/clearance', [\App\Http\Controllers\Teacher\ClearanceController::class, 'status'])->name('clearance.status');
    });

    /*
    |----------------------------------------------------------------------
    | ADMINISTRATOR ECOSYSTEM
    |----------------------------------------------------------------------
    */
    Route::prefix('admin')->name('admin.')->group(function () {

        // Personnel Provisioning & PBAC Management
        Route::resource('personnel', \App\Http\Controllers\Admin\PersonnelController::class);

        // LIS Data Synchronization
        Route::get('/lis-sync', [\App\Http\Controllers\Admin\LisSyncController::class, 'index'])->name('lis_sync.index');
        Route::post('/lis-sync', [\App\Http\Controllers\Admin\LisSyncController::class, 'sync'])->name('lis_sync.process');

        // Master Property Ledger
        Route::resource('inventory', \App\Http\Controllers\Admin\MasterInventoryController::class);
        Route::get('/clearances', [\App\Http\Controllers\Admin\ClearanceController::class, 'index'])->name('clearances.index');
    });

    /*
    |----------------------------------------------------------------------
    | GUIDANCE COUNSELOR ECOSYSTEM
    |----------------------------------------------------------------------
    */
    Route::prefix('counselor')->name('counselor.')->group(function () {

        // Incident Intervention
        Route::get('/incidents', [\App\Http\Controllers\Counselor\IncidentReviewController::class, 'index'])->name('incidents.index');
        Route::put('/incidents/{id}/resolve', [\App\Http\Controllers\Counselor\IncidentReviewController::class, 'resolve'])->name('incidents.resolve');

        // Violator Database (Strict scope: committed offenses only)
        Route::get('/violators', [\App\Http\Controllers\Counselor\ViolatorController::class, 'index'])->name('violators.index');

        // Good Moral Generation
        Route::get('/good-moral', [\App\Http\Controllers\Counselor\GoodMoralController::class, 'index'])->name('good_moral.index');
        Route::post('/good-moral/generate', [\App\Http\Controllers\Counselor\GoodMoralController::class, 'generate'])->name('good_moral.generate');
    });

    /*
    |----------------------------------------------------------------------
    | SCHOOL HEAD / PRINCIPAL ECOSYSTEM
    |----------------------------------------------------------------------
    */
    Route::prefix('school-head')->name('school_head.')->group(function () {

        // Academic Pillar
        Route::get('/dll-approvals', [\App\Http\Controllers\SchoolHead\DllApprovalController::class, 'index'])->name('dll.index');
        Route::get('/dss-analytics', [\App\Http\Controllers\SchoolHead\DssAnalyticsController::class, 'index'])->name('dss.index');

        // Behavioral & Inventory Oversight Pillar
        Route::get('/behavioral-oversight', [\App\Http\Controllers\SchoolHead\BehavioralOversightController::class, 'index'])->name('behavior.index');
        Route::get('/inventory-oversight', [\App\Http\Controllers\SchoolHead\InventoryOversightController::class, 'index'])->name('inventory.index');

        // Executive Institutional Reports
        Route::get('/reports', [\App\Http\Controllers\SchoolHead\ReportController::class, 'index'])->name('reports.index');
        Route::post('/reports/generate', [\App\Http\Controllers\SchoolHead\ReportController::class, 'generate'])->name('reports.generate');
    });

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
/*
|--------------------------------------------------------------------------
| Laravel Breeze Default Authentication Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
