@extends('layouts.main')

@section('container')
<div class="flex items-center flex-wrap justify-between gap20 mb-27">
    <h3>Data Game</h3>
    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
        <li>
            <a href="index.html"><div class="text-tiny">Dashboard</div></a>
        </li>
        <li>
            <i class="icon-chevron-right"></i>
        </li>
        <li>
            <a href="#"><div class="text-tiny">Game</div></a>
        </li>
        <li>
            <i class="icon-chevron-right"></i>
        </li>
        <li>
            <div class="text-tiny">Data Daftar Game</div>
        </li>
    </ul>
</div>
<!-- order-list -->
<div class="wg-box">
    <div class="flex items-center justify-between gap10 flex-wrap">
        <a class="tf-button style-1 " href="/games/create"><i class="icon-plus"></i>Tambah game baru</a>
    </div>
    <table id="myTable" class="table table-striped table-hover" style="width:100%">
        <thead class="">
            <tr class="table-title">
                <th class="body-title" style="text-align: left;">Game</th> <!-- Ganti header kolom -->
                <th class="body-title">Harga</th>
                <th class="body-title">Stok</th>
                <th class="body-title" style="text-align: right;">Kategori</th>
                <th class="body-title" style="text-align: right;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($games as $produk)
            <tr>
                <td class="body-text">
                    <div class="flex items-center gap10">
                        <img src="{{ asset('storage/' . $produk->images) }}" alt="{{ $produk->name }}" width="50" height="50">
                        <span>{{ $produk->name }}</span>
                    </div>
                </td>
                <td class="body-text">Rp {{ number_format($produk->price, 0, ',', '.') }}</td>
                <td class="body-text">{{ $produk->stock }}</td>
                <td class="body-text" style="text-align: right;">{{ $produk->category }}</td>
                <td style="text-align: right">
                    <div class="list-icon-function">
                        <a href="/games/{{ $produk->id }}/edit"><div class="item edit"><i class="icon-edit-3"></i></div></a>
                        <form action="/games/{{ $produk->id }}" method="post" style="display: inline;">
                            @method('delete')
                            @csrf
                            <button type="submit" class="waves-block btn-flat">
                                <div class="item trash"><i class="icon-trash-2"></i></div>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /order-list -->
@endsection
