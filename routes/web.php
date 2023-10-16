<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminJNTKeluhanController;
use App\Http\Controllers\AdminJNTPengirimanController;
use App\Http\Controllers\AdminKeluhanController;
use App\Http\Controllers\AdminPengajuanSuratController;
use App\Http\Controllers\CustomerKeluhanController;
use App\Http\Controllers\CustomerPengirimanController;
use App\Http\Controllers\ProfileController;
use App\Models\Keluhan;
use App\Models\Pengiriman;
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
    return view('auth.login');
});

Route::get('/admin/dashboard', function () {
    $countKeluhan = Keluhan::count();
    $countKeluhanBelumSelesai = Keluhan::where('status_masalah', 'belum selesai')->count();
    $countPengiriman = Pengiriman::count();
    return view('admin.dashboard', compact('countKeluhan', 'countKeluhanBelumSelesai', 'countPengiriman'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/customer/dashboard', function () {
    return view('customer.dashboard');
})->middleware(['auth', 'verified'])->name('customer.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin-jnt/pengiriman', [AdminJNTPengirimanController::class, 'index'])->name('admin-jnt.pengiriman.index');
    Route::get('/admin-jnt/pengiriman/create', [AdminJNTPengirimanController::class, 'create'])->name('admin-jnt.pengiriman.create');
    Route::get('/admin-jnt/pengiriman/{pengiriman}', [AdminJNTPengirimanController::class, 'show'])->name('admin-jnt.pengiriman.show');
    Route::get('/admin-jnt/pengiriman/{pengiriman}/delete', [AdminJNTPengirimanController::class, 'destroy'])->name('admin-jnt.pengiriman.destroy');
    Route::post('/admin-jnt/pengiriman/{pengiriman}/keterangan', [AdminJNTPengirimanController::class, 'addKeterangan'])->name('admin-jnt.pengiriman.addKeterangan');
    Route::post('/admin-jnt/pengiriman', [AdminJNTPengirimanController::class, 'store'])->name('admin-jnt.pengiriman.store');

    Route::get('/admin-jnt/keluhan', [AdminJNTKeluhanController::class, 'index'])->name('admin-jnt.keluhan.index');
    Route::get('/admin-jnt/keluhan/{keluhan}/terima', [AdminJNTKeluhanController::class, 'terima'])->name('admin-jnt.keluhan.terima');
    Route::get('/admin-jnt/keluhan/{keluhan}/tolak', [AdminJNTKeluhanController::class, 'tolak'])->name('admin-jnt.keluhan.tolak');


    Route::get('/customer/pengiriman', [CustomerPengirimanController::class, 'index'])->name('customer.pengiriman.index');
    Route::post('/customer/pengiriman', [CustomerPengirimanController::class, 'search'])->name('customer.pengiriman.search');
    Route::post('/customer/pengiriman/{pengiriman}/keluhan', [CustomerPengirimanController::class, 'keluhan'])->name('customer.pengiriman.keluhan');


    Route::get('/customer/keluhan', [CustomerKeluhanController::class, 'index'])->name('customer.keluhan.index');

    Route::get('/admin/master-data/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/master-data/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::get('/admin/master-data/users/{user}', [UserController::class, 'show'])->name('admin.users.show');

    Route::get('/admin/keluhan', [AdminKeluhanController::class, 'index'])->name('admin.keluhan.index');
    Route::patch('/admin/keluhan/{keluhan}', [AdminKeluhanController::class, 'update'])->name('admin.keluhan.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
