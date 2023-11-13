<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Features\DashboardController;

    Route::get('dashboard', DashboardController::class)->name('dashboard');

