<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Features\BulletinController;

    Route::get('/bulletin', [BulletinController::class, 'index'])->name('bulletin');
    
