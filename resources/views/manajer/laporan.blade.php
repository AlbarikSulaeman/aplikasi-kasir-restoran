@extends('layouts.layout2')
     
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Pesanan</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" target="_blank" href="/pdf"> Cetak PDF</a>
            </div>
        </div>
        <div class="col-lg-12 margin-tb">
           <form action="/laporan" method="get">
            <div class="input-group mb-3">
                <input type="date" class="form-control" name="start_date">
                <input type="date" class="form-control" name="end_date">
                <button class="btn btn-success" type="submit">Cari</button>
            </div>
        </div>
    </div>
    <br>
<table class="table">
        <thead class="thead-dark">
          <tr>
          <th>Nama Pelanggan</th>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Nama Pegawai</th>
            <th>Tanggal Pembelian</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($transaksi as $transaksis)
        <tr>
            <td>{{ $transaksis->nama_pelanggan }}</td>
            <td>{{ $transaksis->nama_menu }}</td>
            <td>{{ $transaksis->jumlah }}</td>
            <td>{{ $transaksis->total_harga }}</td>
            <td>{{ $transaksis->nama_pegawai }}</td>
            <td>{{ $transaksis->created_at }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {!! $transaksi->links() !!}
@endsection