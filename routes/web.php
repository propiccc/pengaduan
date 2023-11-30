<?php

use App\Models\User;
use App\Models\Pengaduan;
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
        Route::prefix('pengaduan')->group(function(){
            Route::get('/', [PengaduanSiswaController::class, 'pengaduanSiswa'])->name('pengaduan.siswa');
            Route::get('{uuid}/detail', [PengaduanSiswaController::class, 'detailPengaduanSiswa'])->name('pengaduan.siswa.detail');
            Route::get('{uuid}/delete', [PengaduanSiswaController::class, 'deletePengaduanSiswa'])->name('pengaduan.siswa.delete');
        });
        Route::prefix('solusi')->group(function(){
            Route::get('/', [PengaduanSiswaController::class, 'solusiSiswa'])->name('solusi.siswa');
        });

        
    });

    Route::prefix('guru')->group(function(){
        Route::prefix('pengaduan')->group(function(){
            Route::get('/', [PengaduanGuruController::class, 'pengaduan'])->name('pengaduan.guru');
            Route::get('{uuid}/detail', [PengaduanGuruController::class, 'pengaduanDetail'])->name('pengaduan.guru.detail');
            Route::get('{uuid}/tolak', [PengaduanGuruController::class, 'pengaduanTolak'])->name('pengaduan.guru.tolak');
            Route::get('{uuid}/terima', [PengaduanGuruController::class, 'pengaduanTerima'])->name('pengaduan.guru.terima');
        });
        Route::prefix('solusi')->group(function(){
            Route::get('/', [PengaduanGuruController::class, 'solusiIndex'])->name('solusi.guru');
            Route::get('{uuid}/create', [PengaduanGuruController::class, 'solusiCreate'])->name('solusi.guru.create');
            Route::post('{uuid}/store', [PengaduanGuruController::class, 'solusiStore'])->name('solusi.guru.store');
        });
    });
    Route::prefix('admin')->middleware('role:admin')->group(function(){
        Route::get('/dashboard', function(){
            $pengaduan = Pengaduan::count();
            $user = User::count();
            return view('Page.System.Admin.Dashboard.Index', ['pengaduan' => $pengaduan, 'user' => $user]);
        })->name('admin.dashboard');

        Route::prefix('user')->group(function(){
            Route::get('/',[UserController::class, 'index'])->name('user.index');
            Route::get('/create',[UserController::class, 'create'])->name('user.create');
            Route::get('{uuid}/edit',[UserController::class, 'edit'])->name('user.edit');
            Route::post('{uuid}/update',[UserController::class, 'update'])->name('user.update');
            // Route::get('/',[UserController::class, 'index'])->name('user.delete');
            Route::post('/store',[UserController::class, 'store'])->name('user.store');
            Route::get('{uuid}/delete',[UserController::class, 'delete'])->name('user.delete');
        });
        Route::prefix('pengaduan')->group(function(){
            Route::get('/',[PengaduanController::class, 'index'])->name('pengaduan.index');
            Route::get('{uuid}/delete',[PengaduanController::class, 'delete'])->name('pengaduan.delete');
            Route::get('{uuid}/detail',[PengaduanController::class, 'detail'])->name('pengaduan.detail');
        });
    });
    

    


