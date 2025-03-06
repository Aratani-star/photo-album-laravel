<?php

use App\Http\Controllers\Gallery\GalleryController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('auth')->group(function () {
    Route::redirect('gallery', 'gallery/get');

    Route::get('gallery/get', [GalleryController::class, 'get'])->name('Gallery.get');
    Route::post('gallery/create', [GalleryController::class, 'create'])->name('Gallery.update');
    Route::post('gallery/update', [GalleryController::class, 'update'])->name('Gallery.destroy');
});
