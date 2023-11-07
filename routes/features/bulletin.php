<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\BulletinController;

    Route::get('/bulletin', [BulletinController::class, 'index'])->name('bulletin');
    
