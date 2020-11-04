<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\TitulacaoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resources([
	"professor" => ProfessorController::class,
	"titulacao" => TitulacaoController::class,
	"disciplina" => DisciplinaController::class
]);

Route::get('/', function () {
    return view('welcome');
});
