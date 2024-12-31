@extends('layouts.main')

@section('container')
<div class="flex items-center flex-wrap justify-between gap20 mb-27">
    <h3>Data Pelanggan</h3>
    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
        <li>
            <a href="index.html"><div class="text-tiny">Dashboard</div></a>
        </li>
        <li>
            <i class="icon-chevron-right"></i>
        </li>
        <li>
            <a href="#"><div class="text-tiny">Pelanggan</div></a>
        </li>
        <li>
            <i class="icon-chevron-right"></i>
        </li>
        <li>
            <div class="text-tiny">Data Daftar Pelanggan </div>
        </li>
    </ul>
</div>
<!-- order-list -->
<div class="wg-box">
    <table id="myTable" class="table table-striped table-hover " style="width:100%" >
        <thead class="">
            <tr class="table-title">
                <th class="body-title"  style="text-align: left;">Nama</th>
                <th class="body-title">Email</th>
                <th class="body-title">Nohp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $pelanggan)
            <tr>
                <td class="body-text"  style="text-align: left;">{{ $pelanggan->name }}</td>
                <td class="body-text">{{ $pelanggan->email }}</td>
                <td class="body-text">{{ $pelanggan->nohp }}</td>
            </tr>
             @endforeach
        </tbody>
    </table>
</div>
<!-- /order-list -->
@endsection