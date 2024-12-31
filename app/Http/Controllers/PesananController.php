<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Cart;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil ID terkecil sebagai perwakilan untuk setiap kelompok berdasarkan 'address'
        $pesananIds = Cart::select(DB::raw('MIN(id) as id'))
            ->where('status', '!=', 'selesai')
            ->where('status', '!=', 'cart')
            ->groupBy('no_transaksi') // Kelompokkan berdasarkan 'address'
            ->pluck('id'); // Ambil ID perwakilan
    
        // Ambil data lengkap berdasarkan ID perwakilan
        $pesanan = Cart::whereIn('id', $pesananIds)->with('user')->get();
    
        return view('pesanan.index', ['pesanan' => $pesanan]);
    }
    public function laporan()
    {
        // Ambil ID terkecil sebagai perwakilan untuk setiap kelompok berdasarkan 'address'
        $pesananIds = Cart::select(DB::raw('MIN(id) as id'))
            ->where('status', 'selesai')
            ->groupBy('no_transaksi') // Kelompokkan berdasarkan 'address'
            ->pluck('id'); // Ambil ID perwakilan
    
        // Ambil data lengkap berdasarkan ID perwakilan
        $pesanan = Cart::whereIn('id', $pesananIds)->with('user')->get();
    
        return view('pesanan.laporan', ['pesanan' => $pesanan]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function updateStatus(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'status' => 'required|string',
        ]);
    
        // Ambil semua item cart dengan no_transaksi yang sesuai
        $items = Cart::where('no_transaksi', $request->no_transaksi);
    
        // Update status pada semua item cart dengan no_transaksi yang sesuai
        $items->update([
            'status' => $validated['status'],
        ]);
    
        // Redirect atau respon sesuai kebutuhan
        return redirect('/daftar-pesanan')->with('status', 'Status pesanan berhasil diubah.');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($no_transaksi)
    {
        // Ambil semua item berdasarkan no_transaksi
        $pesanan = Cart::where('no_transaksi', $no_transaksi)->get();
        
        // Jika tidak ada pesanan ditemukan, beri respons error
        if ($pesanan->isEmpty()) {
            abort(404, 'Pesanan tidak ditemukan');
        }
    
        // Ambil semua id produk dan aksesori dari keranjang
        $productIds = $pesanan->whereNotNull('product_id')->pluck('product_id');
        $accessoryIds = $pesanan->whereNotNull('accessory_id')->pluck('accessory_id');
        
        // Ambil produk dan aksesori terkait
        $products = Game::whereIn('id', $productIds)->get();
        $accessories = Accessory::whereIn('id', $accessoryIds)->get();
    
        // Kirim data ke view
        return view('pesanan.detail', [
            'pesanan' => $pesanan,
            'products' => $products,
            'accessories' => $accessories,
        ]);
    }
    public function view($no_transaksi)
    {
        // Ambil semua item berdasarkan no_transaksi
        $pesanan = Cart::where('no_transaksi', $no_transaksi)->get();
        
        // Jika tidak ada pesanan ditemukan, beri respons error
        if ($pesanan->isEmpty()) {
            abort(404, 'Pesanan tidak ditemukan');
        }
    
        // Ambil semua id produk dan aksesori dari keranjang
        $productIds = $pesanan->whereNotNull('product_id')->pluck('product_id');
        $accessoryIds = $pesanan->whereNotNull('accessory_id')->pluck('accessory_id');
        
        // Ambil produk dan aksesori terkait
        $products = Game::whereIn('id', $productIds)->get();
        $accessories = Accessory::whereIn('id', $accessoryIds)->get();
    
        // Kirim data ke view
        return view('pesanan.view', [
            'pesanan' => $pesanan,
            'products' => $products,
            'accessories' => $accessories,
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
