@extends('layouts.main')

@section('container')
<div class="flex items-center flex-wrap justify-between gap20 mb-27">
    <h3>Data Kritik Saran</h3>
    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
        <li>
            <a href="index.html"><div class="text-tiny">Dashboard</div></a>
        </li>
        <li>
            <i class="icon-chevron-right"></i>
        </li>
        <li>
            <a href="#"><div class="text-tiny">Kritik Saran</div></a>
        </li>
        <li>
            <i class="icon-chevron-right"></i>
        </li>
        <li>
            <div class="text-tiny">Daftar Kritik Saran </div>
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
                <th class="body-title">No HP</th>
                <th class="body-title">Pesan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contact as $kritiksaran)
            <tr>
                <td class="body-text"  style="text-align: left;">{{ $kritiksaran->name }}</td>
                <td class="body-text">{{ $kritiksaran->email }}</td>
                <td class="body-text">{{ $kritiksaran->nohp }}</td>
                <td class="body-text">{{ $kritiksaran->message }}</td>
            </tr>
             @endforeach
        </tbody>
    </table>
</div>
<!-- /order-list -->
@endsection