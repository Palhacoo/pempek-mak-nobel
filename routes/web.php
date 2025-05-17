<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', function (Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');

    if ($email !== 'admin@pempek.com') {
        return back()->with('error', 'Email tidak terdaftar.');
    }

    if ($password !== '123456') {
        return back()->with('error', 'Password salah.');
    }

    // Jika login berhasil, arahkan ke interface admin
    return redirect('/admin')->with('success', 'Login berhasil!');
});

Route::get('/admin', function () {
    // Ambil data stok dari database
    $stok = DB::table('stok')->get();

    return view('admin', compact('stok', 'jumlahTransaksi'));
});

Route::get('/insert-dummy', [DashboardController::class, 'insertDummyData']);



// Route untuk tampilkan form login
Route::get('/login', [DashboardController::class, 'showLoginForm']);

// Route untuk menangani login (POST)
Route::post('/login', [DashboardController::class, 'login']);

// Route untuk logout
Route::get('/logout', [DashboardController::class, 'logout']);

// Route untuk dashboard admin (tampilkan data setelah login)
Route::get('/admin', [DashboardController::class, 'adminDashboard'])->name('admin');


// Tampilin Orders
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');


// Route untuk CRUD Stok Produk
Route::get('/admin/stok/create', [DashboardController::class, 'createStokForm'])->name('stok.create');
Route::post('/admin/stok/store', [DashboardController::class, 'storeStok'])->name('stok.store');
Route::get('/admin/stok/edit/{id}', [DashboardController::class, 'editStokForm'])->name('stok.edit');
Route::post('/admin/stok/update/{id}', [DashboardController::class, 'updateStok'])->name('stok.update');
Route::get('/admin/stok/delete/{id}', [DashboardController::class, 'deleteStok'])->name('stok.delete');

use App\Http\Controllers\UserController;

// Route untuk halaman produk (tanpa perlu login)
Route::get('/user', [UserController::class, 'user'])->name('user');


