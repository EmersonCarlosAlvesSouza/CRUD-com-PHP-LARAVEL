<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController; // ← Adiciona essa linha
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Rotas de Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas de Tarefas
    Route::resource('tasks', TaskController::class); // ← Adiciona isso dentro do grupo auth
});

require __DIR__.'/auth.php';
