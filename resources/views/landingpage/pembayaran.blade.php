@extends('layouts_lp.main')

@section('container')
<style>
        /* Styling untuk elemen bank detail */
        .bank-details {
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: left;
        margin-bottom: 20px;
    }

    .bank-details h2 {
        font-size: 24px;
        font-weight: bold;
        color: #007bff;
        margin-bottom: 10px;
    }

    .bank-details h3 {
        font-size: 18px;
        color: #333;
        margin-bottom: 5px;
    }

    .bank-details .total-tagihan {
        font-size: 20px;
        font-weight: bold;
        color: #dc3545;
        margin-top: 15px;
    }

    /* Custom styling for separator */
    .bank-details hr {
        border: none;
        height: 1px;
        background-color: #ddd;
        margin: 10px 0;
    }
    /* Pengaturan opsi pengiriman */
    .shipping-options {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .shipping-options label {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .shipping-options input[type="radio"] {
        accent-color: #007bff;
    }

    /* Button styling */
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

    /* Flexbox Utility Classes */
    .custom-img {
        max-width: 60px;
        height: 60px;
        border-radius: 8px;
    }

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
        accent-color: #007bff;
    }

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

    .justify-between {
        justify-content: space-between;
    }

    .flex-grow {
        flex-grow: 1;
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

    /* Logo styling */
    .logo-mandiri {
        position: absolute;
        display: flex-end;
        top: 100px;
        right: 700px;
        max-width: 200px;
    }

    /* Order Detail Layout */
    .wg-order-detail {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin: 20px;
    }

    .left, .right {
        flex-basis: 50%;
    }

    /* Summary */
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

    /* Responsive Design */
    @media (max-width: 768px) {
        .wg-order-detail {
            flex-direction: column;
            gap: 20px;
        }

        .right {
            width: 100%;
        }

        .left {
            width: 100%;
        }
    }
</style>

<!-- Logo Mandiri di pojok kanan atas -->

<div class="wg-order-detail">
    <!-- Bagian Kiri -->
    <div class="left flex-grow">
        <div class="wg-box bank-details">
            <img class="logo-mandiri" src="{{ asset('mandiri.png') }}" alt="Logo Mandiri">
            
            <h2>Mandiri</h2>
            <h3>0011223344</h3>
            <h3>Budi Elektronik</h3>

            <hr>

            @php
            // Menghitung total dengan ongkir jika metode pengiriman adalah 'delivery'
            $totalWithOngkir = $total;
        @endphp
        
        @if($shippingMethod == 'delivery')
            @foreach($ongkir as $item)
                @foreach($item['costs'] as $cost)
                    @foreach($cost['cost'] as $detail)
                        @php
                            $totalWithOngkir += $detail['value']; // Tambah ongkir ke total tagihan
                        @endphp
                        @break
                    @endforeach
                    @break
                @endforeach
                @break
            @endforeach
        @endif
        
        <!-- Menampilkan total tagihan -->
        <h3 class="total-tagihan">Total Pembayaran: Rp {{ number_format($totalWithOngkir, 0, ',', '.') }}</h3>
        
        <!-- Menampilkan metode pengiriman -->
        <p>Metode Pengiriman: {{ $shippingMethod == 'delivery' ? 'Antar ke Alamat' : 'Ambil di Tempat' }}</p>
        <hr>

            @if($shippingMethod == 'delivery')
                <div style="font-weight: bold; margin-bottom: 10px;">
                    Alamat Pengiriman: {{ $address }}
                </div>
                <div style="font-weight: bold; margin-bottom: 10px;">
                    Kota Tujuan: {{ $destinationDetails['city_name'] }}
                </div>
                @foreach($ongkir as $item)
                    <div style="font-weight: bold; margin-bottom: 5px;">
                        Ekspedisi: {{ $item['name'] }}
                    </div>
                    
                    @foreach($item['costs'] as $cost)
                        <div style="font-style: italic; margin-bottom: 5px;">
                            Layanan: {{ $cost['service'] }} ({{ $cost['description'] }})
                        </div>
                        
                        @foreach($cost['cost'] as $detail)
                            <div style="color: green; margin-bottom: 5px;">
                                Ongkir: Rp{{ number_format($detail['value'], 0, ',', '.') }}
                            </div>
                            <div style="color: blue; margin-bottom: 10px;">
                                Estimasi: {{ $detail['etd'] }} hari
                            </div>
                            @break
                        @endforeach
                        
                        @break
                    @endforeach
                    
                    @break
                @endforeach
            @endif

        </div>
    </div>

    <!-- Bagian Kanan -->
    <div class="right">
        <div class="wg-box mb-20">
            <h3>Upload Bukti Pembayaran</h3>
            <form action="/pembayaran/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="file" name="receipt" class="mb-20" accept="image/*" required>
            
                <!-- Menyimpan informasi metode pengiriman -->
                <input type="hidden" name="deliver" value="{{ $shippingMethod == 'delivery' ? 'Antar ke Alamat (COD)' : 'Ambil di Tempat' }}"> 
            
                <!-- Menyimpan alamat jika metode pengiriman adalah delivery -->
                <input type="hidden" name="address" value="{{ $shippingMethod == 'delivery' ? $address : '-' }}">
            
                <!-- Status pembayaran -->
                <input type="hidden" name="status" value="Diproses">
                <input type="hidden" name="total" value="{{ $totalWithOngkir }}">
                <input type="hidden" name="no_transaksi" id="no_transaksi">
            
                <button type="submit" class="btn-primary mt-10">Kirim</button>
            </form>
            
        </div>
    </div>
</div>
<script>
    // Fungsi untuk menghasilkan angka acak
    function generateRandomNumber() {
        return Math.floor(Math.random() * 1000000); // Angka acak hingga 1 juta
    }

    // Isi input tersembunyi dengan angka acak saat halaman dimuat
    document.getElementById('no_transaksi').value = generateRandomNumber();
</script>
@endsection
