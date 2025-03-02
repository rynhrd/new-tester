<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\DashboardAdmin;
use App\Http\Controllers\admin\AddReceipt;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;

// ====================================================================
// Public Routes (Hanya Halaman Login & Register Bisa Diakses Tanpa Login)
// ====================================================================

Route::middleware(['guest'])->group(function () {
  Route::get('/auth/login', [LoginBasic::class, 'index'])->name('auth-login-basic');
  Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
  Route::post('/login', [LoginBasic::class, 'login'])->name('login.post');
});


// ====================================================================
// Protected Routes (Hanya Bisa Diakses Jika Sudah Login)
// ====================================================================

Route::middleware(['auth'])->group(function () {
  // Halaman utama dan halaman lainnya

  Route::get('/superadmin', [DashboardAdmin::class, 'SuperAdminPage'])->name('superadmin.dashboard')->middleware('userakases:superadmin');


  Route::get('/admin', [DashboardAdmin::class, 'AdminPage'])->name('admin.dashboard')->middleware('userakases:admin');
  Route::get('/add-receipt', [AddReceipt::class, 'index'])->name('admin-add-receipt')->middleware('userakases:admin');

  Route::post('/logout', [LoginBasic::class, 'logout'])->middleware('auth')->name('logout');



  Route::get('/', [HomePage::class, 'index'])->name('pages-home');
  // Route::get('/', [DashboardAdmin::class, 'index'])->name('pages-superadmin');

  //   Route::get('/page-2', [Page2::class, 'index'])->name('pages-page-2');
  //   Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
});
