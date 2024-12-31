<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessories = Accessory::all(); 
        return view('accessories.index', ['accessories' => $accessories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accessories.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|string',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|integer',
        ]);
    
        // Handle image upload
        if ($request->hasFile('images')) {
            // Simpan file ke dalam storage di folder public/history_images
            $imagePath = $request->file('images')->store('history_images', 'public');
            // Simpan path gambar ke dalam field 'images' pada database
            $validatedData['images'] = $imagePath;
        }
    
        Accessory::create($validatedData);
    
        return redirect('/accessories')->with('success', 'Accessory successfully added.');
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
    public function edit(Accessory $Accessory)
    {
        return view('accessories.edit', ['produk' => $Accessory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    // Mengambil data dari database berdasarkan ID
        $produk = Accessory::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|integer',
        ]);
            // Cek data yang di-submit dan data sebelum di-update
        // Proses upload gambar jika ada gambar baru
        if ($request->hasFile('images')) {
            // Simpan file ke dalam storage di folder public/history_images
            $imagePath = $request->file('images')->store('history_images', 'public');
            // Simpan path gambar ke dalam field 'images' pada database
            $validatedData['images'] = $imagePath;
        } else {
            // Tetap gunakan gambar lama jika tidak ada gambar baru
            $validatedData['images'] = $produk->images;
        }
        // Update data produk
        $produk->update($validatedData);
        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect('/accessories')->with('success', 'Accessory updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Accessory::find($id);
    
        if (!$produk) {
            return redirect('/accessories')->with('error', 'Data Accessory Tidak Ditemukan');
        }
    
        Accessory::destroy($id);
        return redirect('/accessories')->with('success', 'Data Accessory Berhasil Dihapus');
    }
}
