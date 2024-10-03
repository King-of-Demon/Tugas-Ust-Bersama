<?php

use App\Models\Tugas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TugasController;

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
    $jumlah = Tugas::count();
    $jumlahpria = Tugas::where('jeniskelamin','Pria')->count();
    $jumlahWanita = Tugas::where('jeniskelamin','Wanita')->count();
    $new = Tugas::where('created_at', '=', now()->subMonth())->count();
    return view('welcome',compact('jumlah', 'jumlahpria', 'jumlahWanita', 'new'));
})->middleware('auth');
// View ke menu utama
Route::get('/table', [TugasController::class, 'table'])->name('table')->middleware('auth');
// Tamabahkan data
Route::get('/tambah', [TugasController::class, 'tambah'])->name('tambah')->middleware('auth');
Route::post('/insert', [TugasController::class, 'insert'])->name('insert')->middleware('auth');
// Edit
Route::get('/tampil/{id}', [TugasController::class, 'tampil'])->name('tampil')->middleware('auth');
Route::post('/edit/{id}', [TugasController::class, 'edit'])->name('edit')->middleware('auth');
// Delete
Route::get('/hapus/{id}', [TugasController::class, 'hapus'])->name('hapus')->middleware('auth');
// Export apa aja
Route::get('/pdf', [TugasController::class, 'pdf'])->name('pdf')->middleware('auth');
Route::get('/excel', [TugasController::class, 'excel'])->name('excel')->middleware('auth');
// Import
Route::post('/import', [TugasController::class, 'import'])->name('import')->middleware('auth');


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginuser', [LoginController::class, 'loginuser'])->name('loginuser');


Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Part city
Route::get('/city', [CityController::class, 'index'])->name('city')->middleware('auth');

Route::get('/tambahkota', [CityController::class, 'create'])->name('tambahkota')->middleware('auth');
Route::post('/insertkota', [CityController::class, 'store'])->name('insertkota')->middleware('auth');
