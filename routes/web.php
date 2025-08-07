<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectController::class, 'showProjects'])->name('projects.show');

//Dodavanje projekta
Route::view('/add-project', 'addProject')->name('project.page.add');
Route::post('/insert-project', [ProjectController::class, 'add'])->name('project.add');

//Single project view
//Route::get('project/{project}', [ProjectController::class, 'show'])->name('project.show');

//Project delete
Route::get('project/{project}/delete', [ProjectController::class, 'destroy'])->name('project.delete');

//Project edit
Route::get('/project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::post('/project/{project}/update', [ProjectController::class, 'update'])->name('project.update');



//show project with slug
Route::get('/{project:slug}', [ProjectController::class, 'showProjectWithSlug'])->name('project.show');

//Svaku nepoznatu rutu vracamo na pocetak
Route::fallback(function () {
    return redirect('/');
});
