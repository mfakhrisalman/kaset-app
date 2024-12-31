@extends('layouts_lp.main')

@section('container')
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
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
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
    grid-template-columns: 2fr 1fr 1fr 1fr; /* Set 4 kolom (Hapus Status) */
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
    margin: 70px 70px 70px 70px;
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
        grid-template-columns: 1fr 1fr 1fr 1fr; /* Ubah kolom tabel untuk layar kecil */
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
            <h2>Riwayat Pembelian</h2>
            <div class="wg-table table-order-detail">
                <!-- Table Headers -->
                <div class="table-order-detail-header">Nama Produk/Aksesori</div>
                <div class="table-order-detail-header">Jumlah</div>
                <div class="table-order-detail-header">Harga</div>
                <div class="table-order-detail-header">Sub Total</div> <!-- Hapus Status -->
                @foreach ($pesanan as $item)
                    @if ($item->product_id)
                        @php
                            $product = $products->where('id', $item->product_id)->first();
                        @endphp
                        <div class="product-item">
                            <div class="flex items-center gap10">
                                <img class="img-responsive custom-img" src="{{ asset('storage/' . $product->images) }}">
                                {{ $product->name }}
                            </div>
                            <div>{{ $item->quantity }}</div>
                            <div>Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                            <div>Rp {{ number_format($product->price * $item->quantity, 0, ',', '.') }}</div>
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
                            <div>{{ $item->quantity }}</div>
                            <div>Rp {{ number_format($accessory->price, 0, ',', '.') }}</div>
                            <div>Rp {{ number_format($accessory->price * $item->quantity, 0, ',', '.') }}</div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
