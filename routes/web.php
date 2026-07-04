<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/notes');

Route::get('/notes/{note?}', [NoteController::class, 'show'])->name('notes.show');

Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');

Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');

Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');