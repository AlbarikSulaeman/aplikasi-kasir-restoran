@extends('layouts.layout1')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Menu</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/menu"> Back</a>
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
        
    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-floating">
                    <label for="name">Menu</label>
                    <input type="text" name="nama_menu" class="form-control mt-2" id="nama_menu" placeholder="Nama Menu">
                </div>
                <div class="form-floating">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control mt-2" id="harga" placeholder="Harga">
                </div>
                <div class="form-floating">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control mt-2" id="deskripsi" placeholder="Deskripsi">
                </div>
                <div class="form-floating">
                    <label for="ketersediaan">Ketersediaan</label>
                    <input type="number" name="ketersediaan" class="form-control mt-2" id="ketersediaan" placeholder="Ketersediaan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
        
    </form>
@endsection