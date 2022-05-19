@extends('layouts.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('transaksi.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        
    <form action="{{ route('transaksi.update',$transaksi->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf

        @method('PUT')
        
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Pelanggan:</strong>
                <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" value="{{$transaksi->nama_pelanggan}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>menu:</strong>
                    <select class="form-control" name="nama_menu">
                        @foreach($menu as $menus)
                        <option value="{{$menus->nama_menu}}">{{$menus->nama_menu}} (RP.{{$menus->harga}})</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga :</strong>
                    <select class="form-control" name="total_harga">
                        @foreach($menu as $menus)
                        <option value="{{$menus->harga}}">RP.{{$menus->harga}} ({{$menus->nama_menu}})</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah:</strong>
                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" value="{{$transaksi->jumlah}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="hidden" name="nama_pegawai" class="form-control" value="{{$transaksi->nama_pegawai}}">
            </div>
        </div>
            <span></span>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
    </form>
@endsection