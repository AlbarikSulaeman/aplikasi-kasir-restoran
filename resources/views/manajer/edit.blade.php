@extends('layouts.layout1')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('menu.index') }}"> Back</a>
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
        
    <form action="{{ route('menu.update',$menu->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf

        @method('PUT')
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-floating">
                    <label for="name">Menu</label>
                    <input type="text" name="nama_menu" class="form-control mt-2" id="nama_menu" placeholder="nama_menu" value="{{$menu->nama_menu}}">
                </div>
                <div class="form-floating">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control mt-2" id="harga" placeholder="Harga" value="{{$menu->harga}}">
                </div>
                <div class="form-floating">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control mt-2" id="deskripsi" placeholder="Deskripsi"  value="{{$menu->deskripsi}}">
                </div>
                <div class="form-floating">
                    <label for="ketersediaan">Ketersediaan</label>
                    <input type="ketersediaan" name="ketersediaan" class="form-control mt-2" id="ketersediaan" placeholder="Ketersediaan"  value="{{$menu->ketersediaan}}">
                </div>
            </div>
            <span></span>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
    </form>
@endsection