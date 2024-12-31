@extends('layouts_lp.main')

@section('container')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    /* Pengaturan opsi pengiriman */
.shipping-options {
    display: flex;
    flex-direction: column;
    gap: 10px; /* Jarak antar radio button */
}

.shipping-options label {
    display: flex;
    align-items: center;
    gap: 5px;
}

.shipping-options input[type="radio"] {
    accent-color: #007bff; /* Warna khusus untuk radio button */
}

/* Button styling */
.mt-10 {
    margin-top: 10px;
}

    .btn-sm {
    padding: 5px 10px;
    font-size: 14px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
}

.btn-sm.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-sm.btn-primary:hover {
    background-color: #0056b3;
}

.btn-sm.btn-danger {
    background-color: #dc3545;
    color: white;
}

.btn-sm.btn-danger:hover {
    background-color: #c82333;
}

/* Mengatur ukuran tombol - dan + agar sama besar */
.flex.items-center.gap10 form {
    display: inline-block; /* Agar form tidak mempengaruhi tata letak flex */
}

.flex.items-center.gap10 button {
    width: 30px; /* Atur ukuran lebar tombol */
    height: 30px; /* Atur ukuran tinggi tombol */
    padding: 0; /* Hilangkan padding tambahan */
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 18px; /* Sesuaikan ukuran font tombol */
    font-weight: bold;
}

/* Flexbox Utility Classes */
.custom-img {
    max-width: 60px; /* Atur lebar maksimal */
    height: 60px; /* Menjaga rasio aspek gambar */
    border-radius: 8px; /* Opsional, untuk memberi sudut yang melengkung */
}6
.payment-options {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.payment-options label {
    display: flex;
    align-items: center;
    gap: 5px;
}

.payment-options input[type="radio"] {
    accent-color: #007bff; /* Warna khusus untuk radio button */
}

/* Button Styling */
.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.btn-primary:hover {
    background-color: #0056b3;
}
.btn-danger {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}

.btn-danger:hover {
    background-color: #c82333;
}

.flex {
    display: flex;
}

.items-center {
    align-items: center;
}

.flex-wrap {
    flex-wrap: wrap;
}

.justify-between {
    justify-content: space-between;
}

.justify-start {
    justify-content: flex-start;
}

.flex-grow {
    flex-grow: 1;
}

/* Spacing Utilities */
.gap10 {
    gap: 10px;
}

.mb-1 {
    margin-bottom: 1rem;
}

.mb-20 {
    margin-bottom: 20px;
}

/* Box and Containers */
.wg-box {
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Grid Table Styling */
.table-order-detail {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr 1fr; /* Set 5 kolom */
    gap: 10px;
    text-align: center;
}

.table-order-detail-header {
    font-weight: bold;
    background-color: #f5f5f5;
    padding: 10px;
    border-bottom: 2px solid #ddd;
}

.product-item {
    display: contents; /* Menampilkan item grid sebagai bagian dari grid utama */
}

.product-item div {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

/* Order Detail Layout */
.wg-order-detail {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    margin: 20px;
}

.left {
    flex: 2;
}

.right {
    flex: 1;
    max-width: 350px; /* Batasi lebar kolom sebelah kanan */
}

/* Right Column */
.wg-box {
    display: flex;
    flex-direction: column; /* Menyusun elemen secara vertikal */
}

.summary-item {
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
}

.body-title-2 {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

.body-text {
    font-size: 14px;
    color: #666;
}

/* Responsive Design */
@media (max-width: 768px) {
    .wg-order-detail {
        flex-direction: column;
        gap: 20px;
    }

    .right {
        width: 100%; /* Right akan mengambil lebar penuh pada layar kecil */
    }

    .left {
        width: 100%;
    }

    .table-order-detail {
        grid-template-columns: 1fr 1fr; /* Ubah kolom tabel untuk layar kecil */
    }

    .table-order-detail-header {
        display: none; /* Sembunyikan header tabel di layar kecil */
    }

    .product-item {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .product-item div {
        border-bottom: none;
    }
}

</style>

<div class="wg-order-detail">
    <div class="left flex-grow">
        <div class="wg-box">
            <div class="wg-table table-order-detail">
                <!-- Table Headers -->
                <div class="table-order-detail-header">Nama Produk/Aksesori</div>
                <div class="table-order-detail-header">Jumlah</div>
                <div class="table-order-detail-header">Harga</div>
                <div class="table-order-detail-header">Sub Total</div>
                <div class="table-order-detail-header">Action</div> <!-- Header untuk aksi -->
    
                <!-- Data Produk dan Aksesori -->
                @foreach($cartItems as $item)
                @if($item->product_id)
                    @php
                        $product = $products->where('id', $item->product_id)->first();
                    @endphp
                    <div class="product-item">
                        <div class="flex items-center gap10">
                            <img class="img-responsive custom-img" src="{{ asset('storage/' . $product->images) }}">
                            {{ $product->name }}
                        </div>
                        <div class="flex items-center gap10">
                            <!-- Form untuk mengurangi jumlah -->
                            <form action="{{ route('cart.update', ['id' => $item->id, 'operation' => 'decrease']) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger btn-sm">-</button>
                            </form>

                            <div>{{ $item->quantity }}</div>

                            <!-- Form untuk menambah jumlah -->
                            <form action="{{ route('cart.update', ['id' => $item->id, 'operation' => 'increase']) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary btn-sm">+</button>
                            </form>
                        </div>
                        <div>Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        <div>Rp {{ number_format($product->price * $item->quantity, 0, ',', '.') }}</div>
                        <div>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                @elseif($item->accessory_id)
                    @php
                        $accessory = $accessories->where('id', $item->accessory_id)->first();
                    @endphp
                    <div class="product-item">
                        <div class="flex items-center gap10">
                            <img class="img-responsive custom-img" src="{{ asset('storage/' . $accessory->images) }}">
                            {{ $accessory->name }}
                        </div>
                        <div class="flex items-center gap10">
                            <!-- Form untuk mengurangi jumlah -->
                            <form action="{{ route('cart.update', ['id' => $item->id, 'operation' => 'decrease']) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger btn-sm">-</button>
                            </form>

                            <div>{{ $item->quantity }}</div>

                            <!-- Form untuk menambah jumlah -->
                            <form action="{{ route('cart.update', ['id' => $item->id, 'operation' => 'increase']) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary btn-sm">+</button>
                            </form>
                        </div>
                        <div>Rp {{ number_format($accessory->price, 0, ',', '.') }}</div>
                        <div>Rp {{ number_format($accessory->price * $item->quantity, 0, ',', '.') }}</div>
                        <div>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>

                @endif
                @endforeach
            </div>
        </div>
    </div>
    

    <!-- Bagian Right Tetap di Sebelah Kanan -->
    <div class="right">
        <div class="wg-box mb-20">
            <div class="summary-item">
                <div class="body-text">Nama</div>
                <div class="body-title-2">{{ auth()->user()->name }}</div>
            </div>
            <div class="summary-item">
                <div class="body-text">Nomor Telepon</div>
                <div class="body-title-2">{{ auth()->user()->nohp }}</div>
            </div>
            <div class="summary-item">
                <div class="body-text">Total Belanja</div>
                <div class="body-title-2 tf-color-1">Rp {{ number_format($total, 0, ',', '.') }}</div>
            </div>
            <div class="summary-item">
                <div class="body-text">Ongkir</div>
                <div class="body-title-2 tf-color-1" id="ongkir-display">Rp {{ number_format($ongkir, 0, ',', '.') }}</div>
            </div>

    
            <div class="">
                <div class="body-text">Metode Pengiriman</div>
                <div class="body-text-2">
                    <form action="/pembayaran" method="POST">
                        @csrf
                        <div class="shipping-options">
                            <label>
                                <input type="radio" name="shipping_method" value="pickup" checked onclick="toggleAddressInput()">
                                Ambil di Tempat
                            </label>
                            <label>
                                <input type="radio" name="shipping_method" value="delivery" onclick="toggleAddressInput()">
                                Antar ke Alamat
                            </label>
                        </div>
                    
                        <div id="address-input" style="display: none; margin-top: 10px;">
                            <label for="address">Masukkan Alamat:</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Alamat lengkap pengiriman">
                            <input type="hidden" name="weight" id="weight" class="form-control" value="1">

                            <select name="origin" id="origin" class="form-control" style="display: none;">
                                <option value=""></option>
                                @foreach($cities as $city)
                                    <option value="{{ $city['city_id'] }}" 
                                    @if($city['city_name'] == 'Pekanbaru') selected @endif>
                                    {{ $city['city_name'] }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="destination">Kota Tujuan</label>
                            <select name="destination" id="destination" class="form-control">
                                <option value="">Pilih Kota</option>
                                @foreach($cities as $city)
                                <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                                @endforeach
                            </select>
                            <label for="courier">Kurir</label>
                            <select name="courier" id="courier" class="form-control">
                                <option value="">Pilih</option>
                                <option value="jne">JNE</option>
                                <option value="pos">POS</option>
                                <option value="tiki">TIKI</option>
                            </select>
                        </div>
                    
                        <!-- Total Harga -->
                        <input type="hidden" name="total" value="{{ $total }}">
                    
                        <button type="submit" class="btn btn-primary mt-10">Buat Pesanan</button>
                    </form>
                    
                </div>
            </div>            
            
        </div>
    </div>
    
</div>
<script>
window.onload = function() {
    // Set default value and run initial ongkir calculation
    setDefaultCityForPickup(); // Set otomatis kota tujuan untuk 'pickup'
    calculateShippingCost(); // Hitung ongkir awal (jika perlu)
};

function toggleAddressInput() {
    const deliveryOption = document.querySelector('input[name="shipping_method"][value="delivery"]');
    const addressInput = document.getElementById('address-input');
    const codInfo = document.getElementById('cod-info');

    if (deliveryOption.checked) {
        addressInput.style.display = 'block'; // Tampilkan input alamat
        codInfo.style.display = 'block'; // Tampilkan keterangan biaya pengiriman
    } else {
        addressInput.style.display = 'none'; // Sembunyikan input alamat
        codInfo.style.display = 'none'; // Sembunyikan keterangan biaya pengiriman
    }
}

function calculateShippingCost() {
    const shippingMethod = document.querySelector('input[name="shipping_method"]:checked').value;
    const origin = document.getElementById('origin').value;
    const destination = document.getElementById('destination').value;
    const courier = document.getElementById('courier').value;
    const weight = document.getElementById('weight').value;
    const ongkirDiv = document.querySelector('#ongkir-display'); // Ongkir display location

    // Pastikan semua data yang diperlukan sudah dipilih
    if (shippingMethod === 'delivery' && origin && destination && courier) {
        // Panggil API RajaOngkir untuk menghitung ongkir
        fetch('/calculate-shipping', { // Endpoint API yang akan memproses ongkir
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                origin: origin,
                destination: destination,
                weight: weight,
                courier: courier
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.ongkir) {
                ongkirDiv.textContent = "Rp " + data.ongkir;
            } else {
                ongkirDiv.textContent = "Rp 0";
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    } else {
        ongkirDiv.textContent = "Rp 0"; // Jika data tidak valid, tampilkan 0
    }
}

function setDefaultCityForPickup() {
    const shippingMethod = document.querySelector('input[name="shipping_method"]:checked').value;
    if (shippingMethod === 'pickup') {
        document.getElementById('destination').value = 'Pekanbaru'; // Set destination automatically to Pekanbaru
        calculateShippingCost(); // Recalculate the shipping cost after changing the destination
    }
}

// Tambahkan event listener untuk perubahan pada pilihan pengiriman
document.querySelectorAll('input[name="shipping_method"], #destination, #courier').forEach(item => {
    item.addEventListener('change', () => {
        calculateShippingCost();
        setDefaultCityForPickup(); // Set kota tujuan otomatis untuk Ambil di Tempat
    });
});

</script>

@endsection
