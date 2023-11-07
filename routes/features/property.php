<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PropertyController;

    Route::controller(PropertyController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('dashboard', 'show')->name('dashboard');
        Route::get('edit', 'edit');
        Route::get('edit-documents', 'edit_documents');
        Route::patch('update','update');
        Route::get('delete', 'destroy');
    });


