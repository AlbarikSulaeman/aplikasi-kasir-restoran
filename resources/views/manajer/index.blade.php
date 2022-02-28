@extends('layouts.layout1')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Menu</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('menu.create') }}"> Tambah Menu Baru</a>
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
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Ketersediaan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($menu as $menus)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $menus->nama_menu }}</td>
            <td>RP.{{ $menus->harga }}</td>
            <td>{{ $menus->deskripsi }}</td>
            <td>{{ $menus->ketersediaan }}</td>
            <td>
                <form action="{{ route('menu.destroy',$menus->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('menu.edit',$menus->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $menu->links() !!}        
@endsection