<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('login'));

Route::middleware(['auth', 'active'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('teacher')->name('teacher.')->middleware(['role:teacher', 'permission:create_dll,manage_performance,report_incident,view_inventory'])->group(function () {
        Route::post('dll/precheck', [\App\Http\Controllers\Teacher\DailyLessonLogController::class, 'precheck'])->name('dll.precheck');
        Route::resource('dll', \App\Http\Controllers\Teacher\DailyLessonLogController::class);
        Route::get('performance', [\App\Http\Controllers\Teacher\PerformanceController::class, 'index'])->name('performance.index');
        Route::get('performance/seminar/create', [\App\Http\Controllers\Teacher\PerformanceController::class, 'createSeminar'])->name('performance.create_seminar');
        Route::post('performance/seminar', [\App\Http\Controllers\Teacher\PerformanceController::class, 'storeSeminar'])->name('performance.store_seminar');
        Route::resource('incidents', \App\Http\Controllers\Teacher\IncidentController::class)->only(['index', 'create', 'store']);
        Route::get('inventory', [\App\Http\Controllers\Teacher\InventoryController::class, 'index'])->name('inventory.index');
        Route::get('clearance', [\App\Http\Controllers\Teacher\ClearanceController::class, 'status'])->name('clearance.status');
    });

    Route::prefix('admin')->name('admin.')->middleware(['role:admin'])->group(function () {
        Route::resource('personnel', \App\Http\Controllers\Admin\PersonnelController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::get('lis-sync', [\App\Http\Controllers\Admin\LisSyncController::class, 'index'])->name('lis_sync.index');
        Route::post('lis-sync', [\App\Http\Controllers\Admin\LisSyncController::class, 'sync'])->name('lis_sync.process');
        Route::resource('inventory', \App\Http\Controllers\Admin\MasterInventoryController::class)->only(['index', 'store', 'update']);
        Route::get('clearances', [\App\Http\Controllers\Admin\ClearanceController::class, 'index'])->name('clearances.index');
    });

    Route::prefix('counselor')->name('counselor.')->middleware(['role:counselor', 'permission:review_incidents,manage_good_moral,view_violators'])->group(function () {
        Route::get('incidents', [\App\Http\Controllers\Counselor\IncidentReviewController::class, 'index'])->name('incidents.index');
        Route::put('incidents/{incident}/resolve', [\App\Http\Controllers\Counselor\IncidentReviewController::class, 'resolve'])->name('incidents.resolve');
        Route::get('violators', [\App\Http\Controllers\Counselor\ViolatorController::class, 'index'])->name('violators.index');
        Route::get('good-moral', [\App\Http\Controllers\Counselor\GoodMoralController::class, 'index'])->name('good_moral.index');
        Route::post('good-moral/generate', [\App\Http\Controllers\Counselor\GoodMoralController::class, 'generate'])->name('good_moral.generate');
    });

    Route::prefix('school-head')->name('school_head.')->middleware(['role:school_head', 'permission:review_dll,manage_dss,review_behavioral_oversight,review_inventory_oversight,generate_reports'])->group(function () {
        Route::get('dll-approvals', [\App\Http\Controllers\SchoolHead\DllApprovalController::class, 'index'])->name('dll.index');
        Route::put('dll-approvals/{dll}/approve', [\App\Http\Controllers\SchoolHead\DllApprovalController::class, 'approve'])->name('dll.approve');
        Route::put('dll-approvals/{dll}/return', [\App\Http\Controllers\SchoolHead\DllApprovalController::class, 'returnForRevision'])->name('dll.return');
        Route::get('dss-analytics', [\App\Http\Controllers\SchoolHead\DssAnalyticsController::class, 'index'])->name('dss.index');
        Route::get('behavioral-oversight', [\App\Http\Controllers\SchoolHead\BehavioralOversightController::class, 'index'])->name('behavior.index');
        Route::get('inventory-oversight', [\App\Http\Controllers\SchoolHead\InventoryOversightController::class, 'index'])->name('inventory.index');
        Route::get('reports', [\App\Http\Controllers\SchoolHead\ReportController::class, 'index'])->name('reports.index');
        Route::post('reports/generate', [\App\Http\Controllers\SchoolHead\ReportController::class, 'generate'])->name('reports.generate');
    });
});

Route::middleware(['auth', 'active'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
