<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Stok;

class DashboardController extends Controller
{
    // Fungsi untuk menampilkan form login
    public function showLoginForm()
    {
        return view('welcome');
    }

    // Fungsi untuk menangani login
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if ($email == 'admin@pempek.com' && $password == '123456') {
            session(['logged_in' => true]);

            // Ambil data stok dan transaksi
            $stok = DB::table('stok')->get();
            $pelanggan =DB::table('pelanggan')->get();
            $orders = Order::with('pelanggan')->get();
            $orders = Order::with('stok')->get();
    
            return view('admin', compact('stok', 'pelanggan', 'orders')); // <-- tambahkan 'pelanggan'
        }

        return back()->with('error', 'Email atau password salah.');
    }

    // Fungsi untuk logout
    public function logout()
    {
        session()->forget('logged_in');
        return redirect('/login');
    }

public function adminDashboard()
{
    if (!session()->has('logged_in')) {
        return redirect('/login');
    }

    // Ambil data stok, transaksi, dan pelanggan
    $stok = DB::table('stok')->get();
    $pelanggan = DB::table('pelanggan')->get();
    $orders = Order::with('pelanggan')->get();
    $orders = Order::with('stok')->get();

    return view('admin', compact('stok', 'pelanggan', 'orders')); // <-- tambahkan 'pelanggan'
}



public function createOrder(Request $request)
{
    $stok = Stok::find($request->stok_id);

    Order::create([
        'stok_id'     => $stok->id,
        'nama_produk' => $stok->nama_produk,
        'harga'       => $stok->harga,
        'jumlah'      => $request->jumlah,
    ]);

    return redirect('/admin')->with('success', 'Pesanan berhasil ditambahkan!');
}


    // Fungsi untuk menampilkan form tambah stok
    public function createStokForm()
    {
        return view('createStok');
    }

    // Fungsi untuk menyimpan stok baru
    public function storeStok(Request $request)
    {
        DB::table('stok')->insert([
            'nama_produk' => $request->input('nama_produk'),
            'harga' => $request->input('harga'),
        ]);

        return redirect('/admin')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Fungsi untuk menampilkan form edit stok
    public function editStokForm($id)
    {
        $stok = DB::table('stok')->where('id', $id)->first();
        return view('editStok', compact('stok'));
    }

    // Fungsi untuk mengupdate stok
    public function updateStok(Request $request, $id)
    {
        DB::table('stok')->where('id', $id)->update([
            'nama_produk' => $request->input('nama_produk'),
            'harga' => $request->input('harga'),
        ]);

        return redirect('/admin')->with('success', 'Produk berhasil diperbarui!');
    }

    // Fungsi untuk menghapus stok
    public function deleteStok($id)
    {
        DB::table('stok')->where('id', $id)->delete();
        return redirect('/admin')->with('success', 'Produk berhasil dihapus!');
    }

      public function index()
    {
        $stok = Stok::all();
    
        $pelanggan = Pelanggan::all();

        return view('admin.dashboard', compact('stok','pelanggan'));
    }


}

