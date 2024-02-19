<?php
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\RegisterController;

Route::get('/',[\App\Http\Controllers\RegisterController::class,'create']);



Route::post('/store',[App\Http\Controllers\RegisterController::class,'store'])->name('store');
Route::get('/verification/{token}',[\App\Http\Controllers\VerificationController::class,'verifyToken'])->name('verify_token');
Route::post('/send_screenshot',[\App\Http\Controllers\ProcessingController::class,'taekScreenshotImage'])->name('send_screenshot');
Route::get('/processing/{token}',[\App\Http\Controllers\RegisterController::class,'processing'])->name('processing');

Route::get('/verification/{token}',[StepOneController::class,'goStepTwo'])->name('step_two');
Route::get('/faceDetection/{token}',[StepOneController::class,'goFaceDetection'])->name('faceDetection');
Route::post('/submit_screenshott',[StepOneController::class,'submit_screenshott'])->name('submit_screenshott');
Route::get('/test_email',[StepOneController::class,'mail'])->name('test_email');


Route::get('/zip_file',[\App\Http\Controllers\ZipFileController::class,'downloadZipFIles'])->name('zip_file');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/identifications/index',[\App\Http\Controllers\IdentificationController::class,'index'])
    ->middleware(['auth'])->name('identifications.index');
Route::get('/identifications/show/{id}',[\App\Http\Controllers\IdentificationController::class,'show'])
    ->middleware(['auth'])->name('identifications.show');
Route::get('/identifications/get_file/{file}',[\App\Http\Controllers\IdentificationController::class,'get_file'])
    ->middleware(['auth'])->name('identifications.get_file');
require __DIR__.'/auth.php'; 

Route::post('/identifications/store/{id}',[\App\Http\Controllers\IdentificationController::class,'store'])->name('identifications.store');
Route::get('/identifications/update/{id}',[\App\Http\Controllers\IdentificationController::class,'update'])->name('identifications.update');

