<?php

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\CursosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Alunos
Route::get('/Alunos', [AlunosController::class, 'index'])->name('aluno.index');
Route::post('/Alunos', [AlunosController::class, 'store'])->name('aluno.store');
Route::put('/Alunos/{id}', [AlunosController::class, 'update'])->name('aluno.update');
Route::delete('/Alunos/{id}', [AlunosController::class, 'destroy'])->name('aluno.destroy');

//Cursos
Route::get('/Cursos', [CursosController::class, 'index'])->name('curso.index');
Route::post('/Cursos', [CursosController::class, 'store'])->name('curso.store');
Route::put('/Cursos/{id}', [CursosController::class, 'update'])->name('curso.update');
Route::delete('/Cursos/{id}', [CursosController::class, 'destroy'])->name('curso.destroy');