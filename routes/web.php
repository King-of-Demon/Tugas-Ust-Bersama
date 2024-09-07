<?php

use App\Http\Controllers\TugasController;
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
// View ke menu utama
Route::get('/table', [TugasController::class, 'table'])->name('table');
// Tamabahkan data
Route::get('/tambah', [TugasController::class, 'tambah'])->name('tambah');
Route::post('/insert', [TugasController::class, 'insert'])->name('insert');
// Edit
Route::get('/tampil/{id}', [TugasController::class, 'tampil'])->name('tampil');
Route::post('/edit/{id}', [TugasController::class, 'edit'])->name('edit');
// Delete
Route::get('/hapus/{id}', [TugasController::class, 'hapus'])->name('hapus');
// Export apa aja
Route::get('/pdf', [TugasController::class, 'pdf'])->name('pdf');
Route::get('/excel', [TugasController::class, 'excel'])->name('excel');
// Import
Route::post('/import', [TugasController::class, 'import'])->name('import');

