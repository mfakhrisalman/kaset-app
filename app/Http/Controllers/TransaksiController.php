<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\DetailTransaksi;
use App\Models\Game;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nextSaleId = Transaksi::max('id') + 1;
        $game3 = Game::where('category','PS 3')->get();
        $game4 = Game::where('category','PS 4')->get();
        $detail_transaksi = DetailTransaksi::where('no_transaksi',$nextSaleId)->get();
        $totalPrice = DetailTransaksi::where('no_transaksi', $nextSaleId)
        ->get()
        ->sum(function($detail) {
            return $detail->price * $detail->qty;
        });
        $aksesoris = Accessory::all();

        return view('transaksi.index', [
            'nextSaleId' => $nextSaleId,
            'game3' => $game3,
            'game4' => $game4,
            'aksesoris' => $aksesoris,
            'detail_transaksi' => $detail_transaksi,
            'totalPrice' => $totalPrice,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function laporan()
    {
        $transaksi = Transaksi::all(); 
        return view('transaksi.laporan', ['transaksi' => $transaksi]);
    }

    public function view($id)
    {
        // Mencari data transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);
    
        // Mencari data detail transaksi berdasarkan no_transaksi
        $detail_transaksi = DetailTransaksi::where('no_transaksi', $transaksi->id)->get();
    
        // Melempar data transaksi dan detail transaksi ke view 'transaksi.detail'
        return view('transaksi.detail', compact('transaksi', 'detail_transaksi'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Validasi data
    $validatedData = $request->validate([
        'name' => 'required',
        'price' => 'required',
        'qty' => 'required',
        'category' => 'required',
        'no_transaksi' => 'required',
    ]);

    // Cari data barang di tabel 'game' berdasarkan nama barang
    $game = Game::where('name', $validatedData['name'])->first();

    // Jika tidak ditemukan di tabel 'game', cari di tabel 'aksesoris'
    if (!$game) {
        $aksesoris = Accessory::where('name', $validatedData['name'])->first();
    }

    if ($game) {
        // Kurangi stok barang di tabel 'game'
        $newQty = $game->stock - $validatedData['qty'];

        // Pastikan stok tidak negatif
        if ($newQty < 0) {
            return redirect()->back()->withErrors(['qty' => 'Stok tidak mencukupi di tabel Game']);
        }

        // Update stok di tabel 'game'
        $game->update(['stock' => $newQty]);

    } elseif (isset($aksesoris)) {
        // Kurangi stok barang di tabel 'aksesoris'
        $newQty = $aksesoris->stock - $validatedData['qty'];

        // Pastikan stok tidak negatif
        if ($newQty < 0) {
            return redirect()->back()->withErrors(['qty' => 'Stok tidak mencukupi di tabel Aksesoris']);
        }

        // Update stok di tabel 'aksesoris'
        $aksesoris->update(['stock' => $newQty]);

    } else {
        // Jika barang tidak ditemukan di kedua tabel
        return redirect()->back()->withErrors(['name' => 'Barang tidak ditemukan di Game maupun Aksesoris']);
    }

    // Buat detail transaksi baru
    DetailTransaksi::create($validatedData);

    // Redirect ke halaman transaksi
    return redirect('/transaksi')->with('success', 'Transaksi berhasil disimpan dan stok diperbarui.');
}

    
    public function simpan(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'total_amount' => 'required',
        ]);
        Transaksi::create($validatedData);
        return redirect('/transaksi');
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
    public function edit(string $id)
    {
        //
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
    public function destroy($id)
    {
        // Cari data detail transaksi berdasarkan ID
        $produk = DetailTransaksi::find($id);
    
        // Jika detail transaksi tidak ditemukan, redirect ke halaman transaksi
        if (!$produk) {
            return redirect('/transaksi')->withErrors(['error' => 'Detail transaksi tidak ditemukan.']);
        }
    
        // Cari produk di tabel 'game' berdasarkan nama produk
        $game = Game::where('name', $produk->name)->first();
    
        if ($game) {
            // Kembalikan stok produk di tabel 'game'
            $game->stock += $produk->qty;
            $game->save();
        } else {
            // Jika tidak ditemukan di tabel 'game', cari di tabel 'aksesoris'
            $aksesoris = Accessory::where('name', $produk->name)->first();
    
            if ($aksesoris) {
                // Kembalikan stok produk di tabel 'aksesoris'
                $aksesoris->stock += $produk->qty;
                $aksesoris->save();
            }
        }
    
        // Hapus detail transaksi setelah stok diperbarui
        DetailTransaksi::destroy($id);
    
        // Redirect ke halaman transaksi dengan pesan sukses
        return redirect('/transaksi')->with('success', 'Transaksi berhasil dihapus dan stok diperbarui.');
    }
    
}
