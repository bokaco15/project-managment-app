<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectController::class, 'showProjects'])->name('projects.show');

//Dodavanje projekta
Route::view('/add-project', 'addProject')->name('project.page.add');
Route::post('/insert-project', [ProjectController::class, 'add'])->name('project.add');

Route::get('project/{project}', [ProjectController::class, 'show'])->name('project.show');
