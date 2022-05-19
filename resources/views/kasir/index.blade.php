@extends('layouts.layout')
     
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
                <a class="btn btn-success" href="{{ route('transaksi.create') }}"> Buat Pesanan</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Nama Pegawai</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($transaksi as $transaksis)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $transaksis->nama_pelanggan }}</td>
            <td>{{ $transaksis->nama_menu }}</td>
            <td>{{ $transaksis->jumlah }}</td>
            <td>RP.{{ $transaksis->total_harga }}</td>
            <td>{{ $transaksis->nama_pegawai }}</td>
            <td>
                <form action="{{ route('transaksi.destroy',$transaksis->id) }}" method="POST">
                
                    <a class="btn btn-primary" href="{{ route('transaksi.edit',$transaksis->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $transaksi->links() !!}        
@endsection