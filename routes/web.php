<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BungaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PengaduanGuruController;
use App\Http\Controllers\PengaduanSiswaController;

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
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

    Route::prefix('public')->group(function(){
        Route::post('/pengaduan', [PengaduanController::class, 'publicPengaduan'])->middleware('auth')->name('public.pengaduan');
    });

    Route::middleware('guest')->group(function(){
        Route::get('/login', [AuthController::class, 'viewLogin'])->name('login.view')->middleware('guest');
        Route::get('/register', [AuthController::class, 'viewRegister'])->name('register.view')->middleware('guest');
    });
    
    Route::prefix('auth')->middleware('guest:web')->group(function(){
        Route::post('/login', [AuthController::class, 'login'])->name('login.store');
        Route::post('/register', [AuthController::class, 'register'])->name('register.store');
    });

    Route::prefix('siswa')->middleware('role:siswa')->group(function(){
        Route::get('/pengaduan', [PengaduanSiswaController::class, 'pengaduanSiswa'])->name('pengaduan.siswa');
        Route::get('/pengaduan/{uuid}/detail', [PengaduanSiswaController::class, 'detailPengaduanSiswa'])->name('pengaduan.siswa.detail');
        Route::get('/pengaduan/{uuid}/delete', [PengaduanSiswaController::class, 'deletePengaduanSiswa'])->name('pengaduan.siswa.delete');
    });

    Route::prefix('guru')->group(function(){
        Route::get('/pengaduan', [PengaduanGuruController::class, 'Pen'])->name('pengaduan.guru');
    });
    Route::prefix('admin')->middleware('role:admin')->group(function(){
        Route::get('/dashboard', function(){
            return view('Page.System.Admin.Dashboard.Index');
        })->name('admin.dashboard');

        Route::prefix('user')->group(function(){
            Route::get('/',[UserController::class, 'index'])->name('user.index');
            Route::get('/create',[UserController::class, 'create'])->name('user.create');
            // Route::get('/',[UserController::class, 'index'])->name('user.edit');
            // Route::get('/',[UserController::class, 'index'])->name('user.update');
            // Route::get('/',[UserController::class, 'index'])->name('user.delete');
            Route::post('/store',[UserController::class, 'index'])->name('user.store');
        });
    });
    

    


