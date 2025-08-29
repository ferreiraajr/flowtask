<?php

use App\Http\Controllers\Workspace\WorkspaceController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas para Workspaces
Route::resource('workspaces', WorkspaceController::class);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
