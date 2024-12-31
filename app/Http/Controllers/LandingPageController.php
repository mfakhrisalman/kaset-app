<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Game;
use App\Models\Contact;
use App\Models\Accessory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landingpage.index');
    }    

    public function product(Request $request)
    {
        $gamesQuery = Game::query();

        $games = $gamesQuery->paginate(6); 
        
        return view('landingpage.product', [
            'games' => $games,
        ]);
    }

    public function productDetail($id)
    {
        $game = Game::findOrFail($id);

        return view('landingpage.product-detail', [
            'game' => $game,
        ]);
    }  

    public function tambahKeranjang(Request $request)
    {
        $cartItem = Cart::where('user_id', $request->user_id)
        ->where('product_id', $request->product_id)
        ->where('status', $request->status)
        ->first();

        if ($cartItem) {    
            // Jika produk sudah ada di keranjang, tambahkan kuantitasnya
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Jika produk belum ada, tambahkan ke keranjang
            Cart::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'quantity' => 1,
                'status' => $request->status,
            ]);
        }
        return redirect('/product/cart');
    }  

    public function tambahKeranjangGD(Request $request)
    {
        $cartItem = Cart::where('user_id', $request->user_id)
        ->where('product_id', $request->product_id)
        ->where('status', $request->status)
        ->first();

        if ($cartItem) {    
            // Jika produk sudah ada di keranjang, tambahkan kuantitasnya
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Jika produk belum ada, tambahkan ke keranjang
            Cart::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'status' => $request->status,
            ]);
        }
        return redirect('/product/cart');

    }   

    public function tambahKeranjangA(Request $request)
    {
        $cartItem = Cart::where('user_id', $request->user_id)
        ->where('accessory_id', $request->accessory_id)
        ->where('status', $request->status)
        ->first();

        if ($cartItem) {    
            // Jika produk sudah ada di keranjang, tambahkan kuantitasnya
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Jika produk belum ada, tambahkan ke keranjang
            Cart::create([
                'user_id' => $request->user_id,
                'accessory_id' => $request->accessory_id,
                'quantity' => 1,
                'status' => $request->status,
            ]);
        }
        return redirect('/product/cart');
    }

    public function tambahKeranjangGA(Request $request)
    {
        $cartItem = Cart::where('user_id', $request->user_id)
        ->where('accessory_id', $request->accessory_id)
        ->where('status', $request->status)
        ->first();

        if ($cartItem) {    
            // Jika produk sudah ada di keranjang, tambahkan kuantitasnya
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Jika produk belum ada, tambahkan ke keranjang
            Cart::create([
                'user_id' => $request->user_id,
                'accessory_id' => $request->accessory_id,
                'quantity' => $request->quantity,
                'status' => $request->status,
            ]);
        }
        return redirect('/product/cart');
    }

    public function keranjang()
    {
        $response = Http::withHeaders([
            'key'=>'ba74c76facb6cb7a081b8eee1efb30af'
            ])->get('https://api.rajaongkir.com/starter/city');

            $cities= $response['rajaongkir']['results'];
        // Ambil semua item keranjang berdasarkan user_id dan status 'cart'
        $cartItems = Cart::where('user_id', auth()->id())->where('status', 'cart')->get();
        
        // Ambil semua id produk dan aksesori dari keranjang
        $productIds = $cartItems->whereNotNull('product_id')->pluck('product_id');
        $accessoryIds = $cartItems->whereNotNull('accessory_id')->pluck('accessory_id');
        
        // Ambil produk dan aksesori terkait
        $products = Game::whereIn('id', $productIds)->get();
        $accessories = Accessory::whereIn('id', $accessoryIds)->get();
        
        // Hitung total harga
        $total = 0;
        $ongkir = 0;

        foreach ($cartItems as $item) {
            // Cek apakah item adalah produk atau aksesori
            if ($item->product_id) {
                $product = $products->where('id', $item->product_id)->first();
                if ($product) {
                    $total += $product->price * $item->quantity;
                }
            } elseif ($item->accessory_id) {
                $accessory = $accessories->where('id', $item->accessory_id)->first();
                if ($accessory) {
                    $total += $accessory->price * $item->quantity;
                }
            }
        }
        
        // Kirim data keranjang, produk, aksesori, dan total ke view
        return view('landingpage.keranjang', [
            'cartItems' => $cartItems,
            'products' => $products,
            'accessories' => $accessories,
            'total' => $total,
        'ongkir' => $ongkir,

            'cities' => $cities,
        ]);
    }
    public function calculateShipping(Request $request)
{
    // Validasi data yang dikirim melalui AJAX
    $request->validate([
        'origin' => 'required',
        'destination' => 'required',
        'weight' => 'required',
        'courier' => 'required',
    ]);

    // Panggil API RajaOngkir untuk menghitung ongkos kirim
    try {
        $response = Http::withHeaders([
            'key' => 'ba74c76facb6cb7a081b8eee1efb30af'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $request->origin,
            'destination' => $request->destination,
            'weight' => $request->weight,
            'courier' => $request->courier,
        ]);

        // Periksa apakah API mengembalikan data ongkir yang valid
        if ($response->successful()) {
            $ongkir = $response['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value']; // Ambil ongkir dari response
            return response()->json(['ongkir' => number_format($ongkir, 0, ',', '.')]);
        } else {
            return response()->json(['ongkir' => 0]);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Gagal menghitung ongkir: ' . $e->getMessage()]);
    }
}

    public function riwayat(){
          // Ambil ID terkecil sebagai perwakilan untuk setiap kelompok berdasarkan 'address'
          $pesananIds = Cart::select(DB::raw('MIN(id) as id'))
          ->where('user_id', auth()->id())
          ->groupBy('no_transaksi') // Kelompokkan berdasarkan 'address'
          ->pluck('id'); // Ambil ID perwakilan
  
      // Ambil data lengkap berdasarkan ID perwakilan
      $pesanan = Cart::whereIn('id', $pesananIds)->with('user')->get();
  
      return view('landingpage.riwayat', ['pesanan' => $pesanan]);
    }
    public function riwayatDetail($no_transaksi)
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
        return view('landingpage.riwayat-detail', [
            'pesanan' => $pesanan,
            'products' => $products,
            'accessories' => $accessories,
        ]);
    }
    public function updateBayar(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'receipt' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048', // Validasi file gambar jika ada
            'deliver' => 'required|string',
            'address' => 'required|string',
            'status' => 'required|string',
            'no_transaksi' => 'required|string',
            'total' => 'required|string',
        ]);
        
        // Ambil semua item cart untuk user yang sedang login
        $items = Cart::where('user_id', auth()->id())->where('status', 'cart')->get();
    
        // Update setiap item cart
        foreach ($items as $item) {
            // Jika ada file gambar baru, simpan dan ambil path-nya
            if ($request->hasFile('receipt')) {
                $imagePath = $request->file('receipt')->store('history_images', 'public');
                $item->receipt = $imagePath; // Simpan path gambar baru ke database
            }
            
            // Update data item cart dengan informasi yang validasi
            $item->deliver = $validated['deliver'];
            $item->address = $validated['address'];
            $item->status = $validated['status'];
            $item->total = $validated['total'];
            $item->no_transaksi = $validated['no_transaksi'];
    
            // Simpan perubahan
            $item->save();
        }
    
        // Redirect atau respon sesuai kebutuhan
        return redirect('/riwayat');
        
    }
    
    public function update(Request $request, $id)
    {
    $item = Cart::find($id);

    if ($request->operation == 'increase') {
        $item->quantity += 1; // Tambah jumlah
    } elseif ($request->operation == 'decrease' && $item->quantity > 1) {
        $item->quantity -= 1; // Kurangi jumlah jika lebih dari 1
    }

    $item->save();

    return redirect()->back();

}

public function pembayaran(Request $request)
{
    // Validasi data yang dikirim dari form
    $request->validate([
        'shipping_method' => 'required',

    ]);

    // Ambil data dari form
    $shippingMethod = $request->input('shipping_method');
    $address = $request->input('address');
    $total = $request->input('total');
    $destinationDetails = null; // Inisialisasi default sebagai null

    // Panggil API RajaOngkir untuk menghitung ongkos kirim
    try {
        $response = Http::withHeaders([
            'key' => 'ba74c76facb6cb7a081b8eee1efb30af'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $request->origin,
            'destination' => $request->destination,
            'weight' => $request->weight,
            'courier' => $request->courier,
        ]);

        // Cek apakah respons dari API berhasil
        if ($response->successful()) {
            $ongkir = $response['rajaongkir']['results'];
            $destinationDetails = $response['rajaongkir']['destination_details']; // Pastikan ini ada dalam respons API
        } else {
            // Jika API tidak merespons dengan benar, set ongkir ke null
            $ongkir = null;
        }

    } catch (\Exception $e) {
        // Jika terjadi error saat memanggil API
        return back()->withErrors('Gagal menghitung ongkos kirim: ' . $e->getMessage());
    }

    // Lanjutkan ke halaman pembayaran dengan data yang telah dihitung
    return view('landingpage.pembayaran', [
        'total' => $total,
        'shippingMethod' => $shippingMethod,
        'address' => $address,
        'ongkir' => $ongkir,
        'destinationDetails' => $destinationDetails,
    ]);
}

    public function remove($id)
    {
    // Temukan item di keranjang dan hapus
    $cartItem = Cart::findOrFail($id);
    $cartItem->delete();

    return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang');
    }

    

    public function aksesoris()
    {
        $aksesorisQuery = Accessory::query();
        
        $aksesoris = $aksesorisQuery->paginate(6); 
        
        return view('landingpage.aksesoris', ['aksesoris' => $aksesoris]);
    }
    public function aksesorisDetail($id)
    {
        $aksesoris = Accessory::findOrFail($id);

        return view('landingpage.aksesoris-detail', [
            'aksesoris' => $aksesoris,
        ]);
    } 
    public function contact()
    {
        return view('landingpage.kontak');
    }  
    public function tambahKritikSaran(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'nohp' => 'required',
            'message' => 'required',
        ]);
    
        Contact::create($validatedData);
    
        return redirect('/contact')->with('success', 'contact successfully added.');
    }
         
    public function profile()
    {
        return view('landingpage.profile');
    }     
    public function faq()
    {
        return view('landingpage.faq');
    }   
}
