@extends('layouts.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Akun Pegawai</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="/register/create"> Tambah Akun</a>
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
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($user as $users)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $users->name }}</td>
            <td>{{ $users->username }}</td>
            <td>{{ $users->role }}</td>
            <td>
                <form action="/register/delete/{{$users->id}}" method="POST">
           
                    <a class="btn btn-primary" href="/register/edit/{{$users->id}}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $user->links() !!}        
@endsection