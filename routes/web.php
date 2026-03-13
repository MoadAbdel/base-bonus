<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\IndexController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload/avatar', [UploadController::class, 'uploadPublic'])->name('upload.avatar');
Route::post('/upload/pdf',    [UploadController::class, 'uploadPrivate'])->name('upload.pdf');

Route::get('/documents/{filename}', [IndexController::class, 'getPrivateDocument'])->name('documents.get');
