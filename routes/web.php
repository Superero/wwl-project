<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultationRequestController;
use App\Http\Controllers\Admin\ConsultationController;

Route::get('/', function () { return view('index');})->name('home');

Route::get('/expertises',function(){ return view('expertises'); })->name('expertises');
Route::get('/solutions',function(){ return view('solutions'); })->name('solutions');
Route::get('/insights',function(){ return view('insights'); })->name('insights');


Route::get('/test',function(){ return view('test-v4'); });
Route::get('/testt',function(){ return view('test'); });
Route::get('/testtt',function(){ return view('test-v3'); });
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [ConsultationController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/consultation', [ConsultationRequestController::class, 'store'])->name('consultation.store');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/consultations', [ConsultationController::class, 'index'])->name('consultations.index');
    Route::delete('/consultations/{consultationRequest}', [ConsultationController::class, 'destroy'])->name('consultations.destroy');
    Route::get('/consultations/export', [ConsultationController::class, 'export'])->name('consultations.export');
    Route::patch('/consultations/{consultationRequest}/status', [ConsultationController::class, 'updateStatus'])
    ->name('consultations.updateStatus');
    Route::get('/consultations/export-xlsx', [ConsultationController::class, 'exportXlsx'])->name('consultations.exportXlsx');
});

require __DIR__.'/auth.php';
