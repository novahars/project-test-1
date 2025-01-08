<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');

Route::get('/agent/dashboard', [AgentController::class, 'index'])
    ->middleware(['auth', 'agent'])
    ->name('agent.dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('tickets', TicketController::class);
});

Route::get('/tickets/create', [Ticketcontroller::class, 'create'])->name('tickets.create');
Route::post('/tickets', [Ticketcontroller::class, 'store'])->name('tickets.store');

Route::get('/tickets/{id}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
Route::put('/tickets/{id}', [TicketController::class, 'update'])->name('tickets.update');

Route::get('/tickets/{id}', [TicketController::class, 'show'])->middleware(['auth', 'admin'])->name('tickets.show');

Route::get('/tickets/{id}/comments', [TicketController::class, 'comments'])->name('tickets.comments');

Route::middleware(['auth', 'agent'])->group(function () {
    Route::get('/agent/dashboard', [TicketController::class, 'agentDashboard'])->name('agent.dashboard');
});



require __DIR__ . '/auth.php';
