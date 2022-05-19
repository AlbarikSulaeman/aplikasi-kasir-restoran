@extends('layouts.main')
@section('container')
        <div class="row justify-content-center">
            <div class="col-lg-5">
                
                {{-- Jika kita berhasil melakukan registrasi alert ini akan muncul , alert ini diatur didalam RegisterController --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session ('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

@if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
@endif
                <div class="container">
                    <main class="form-register">
                        <form action="/register/create" method="POST">
                           @csrf
                            <h1 class="h3 mb-3 fw-normal">Tambahkan User</h1>

                            <div class="form-floating">
                                <input type="text" name="name" class="form-control mt-2" id="name" placeholder="Name">
                                <label for="name">Name</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="username" class="form-control mt-2" id="username" placeholder="Username">
                                <label for="username">Usename</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control mt-2" id="password" placeholder="Password">
                                <label for="password">Password</label>
                            </div>
                            <div class="form-floating">
                                <input type="radio" name="role" id="admin" value="admin">
                                <span><label for="admin">Admin</label></span>
                                <input type="radio" name="role" id="kasir" value="kasir">
                                <span><label for="kasir">Kasir</label></span>
                                <input type="radio" name="role" id="manajer" value="manajer">
                                <span><label for="manajer">Manajer</label></span>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Tambah</button>
                            
                        </form>
                    </main>
                </div>
            </div>
        </div>
@endsection