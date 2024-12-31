<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all(); 
        return view('games.index', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
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
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'stock' => 'required|integer',
        ]);
    
        // Handle image upload
        
        if ($request->hasFile('images')) {
            // Simpan file ke dalam storage di folder public/history_images
            $imagePath = $request->file('images')->store('history_images', 'public');
            // Simpan path gambar ke dalam field 'images' pada database
            $validatedData['images'] = $imagePath;
        }
    
        Game::create($validatedData);
    
        return redirect('/games')->with('success', 'Game successfully added.');
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
    public function edit(Game $game)
    {
        return view('games.edit', ['produk' => $game]);
    }

    /**
     * Update the specified resource in storage.
     */
 
    public function update(Request $request, $id)
    {
    // Mengambil data dari database berdasarkan ID
        $produk = Game::findOrFail($id);
        

        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
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
        return redirect('/games')->with('success', 'Game updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Game::find($id);
    
        if (!$produk) {
            return redirect('/games')->with('error', 'Data Game Tidak Ditemukan');
        }
    
        Game::destroy($id);
        return redirect('/games')->with('success', 'Data Game Berhasil Dihapus');
    }
}
