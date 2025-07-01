<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
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

Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('/loginPost', [AuthController::class, 'loginPost'])->name('loginPost');


Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerPost', [AuthController::class, 'registerPost'])->name('registerPost');

// logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth.check', 'role:students'])->group(function () {
    Route::get('/students/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/students/pendaftaran', [StudentController::class, 'pendaftaran'])->name('student.pendaftaran');
    Route::post('/students/pendaftaran-store', [StudentController::class, 'pendaftaranstore'])->name('student.pendaftaranstore');
    Route::post('/students/pendaftaran-update', [StudentController::class, 'pendaftaranupdate'])->name('student.pendaftaranupdate');
    Route::get('/students/pendaftaran-buktiPendaftaran', [StudentController::class, 'buktiPendaftaran'])->name('student.pendaftaran.buktiPendaftaran');
    

});


Route::middleware(['auth.check', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/dataPendaftar', [AdminController::class, 'dataPendaftar'])->name('admin.dataPendaftar');
    
    // Detai
    Route::get('/admin/dataPendaftar/detail/{id}', [AdminController::class, 'dataPendaftarShow'])->name('admin.pendaftar.show');
    Route::get('/admin/dataPendaftar/update/{id}', [AdminController::class, 'dataPendaftarUpdate'])->name('admin.pendaftar.edit');
    Route::post('/admin/dataPendaftar/update-post', [AdminController::class, 'pendaftarUpdatePost'])->name('admin.pendaftaranupdate');
    Route::get('/admin/dataPendaftar/delete/{id}', [AdminController::class, 'dataPendaftarDelete'])->name('admin.pendaftar.delete');
    Route::get('/admin/dataPendaftar/lulus/{id}', [AdminController::class, 'dataPendaftarLulus'])->name('admin.pendaftar.lulus');
    Route::get('/admin/dataPendaftar/gagal/{id}', [AdminController::class, 'dataPendaftarGagal'])->name('admin.pendaftar.gagal');
    
    
    // Data Account
    Route::get('/admin/dataAccount', [AdminController::class, 'dataAccount'])->name('admin.dataAccount');
    Route::post('/admin/changePassword', [AdminController::class, 'changePassword'])->name('admin.changePassword');

});