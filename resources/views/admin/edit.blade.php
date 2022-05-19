@extends('layouts.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/register"> Back</a>
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
        
    <form method="POST" enctype="multipart/form-data"> 
        @csrf

        @method('POST')
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-floating">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control mt-2" id="name" placeholder="Name" >
                </div>
                <div class="form-floating">
                    <label for="username">Usename</label>
                    <input type="text" name="username" class="form-control mt-2" id="username" placeholder="Username" >   
                </div>
                <div class="form-floating">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control mt-2" id="password" placeholder="Password" >
                </div>
                <div class="form-floating">
                    <input type="radio" name="role" id="admin" value="admin">
                    <span><label for="admin">Admin</label></span>
                    <input type="radio" name="role" id="kasir" value="kasir">
                    <span><label for="kasir">Kasir</label></span>
                    <input type="radio" name="role" id="manajer" value="manajer">
                    <span><label for="manajer">Manajer</label></span>
                </div>
                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
    </form>
@endsection