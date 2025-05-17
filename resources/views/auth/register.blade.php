@extends('layouts.auth', ['title' => 'Register - SAPA PPL'])

@section('content')
    <div class="col-md-6 text-center">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <a href="{{ url('/') }}">
                    <img class="rounded img-fluid" loading="lazy" src="{{ asset('ppl-icon.png') }}" alt="logo ppl">
                </a>
                <h4 class="font-weight-bold text-center">REGISTER</h4>
                <hr>
                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold text-uppercase">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Lengkap">
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold text-uppercase">Username</label>
                        <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan Username anda">
                        @error('username')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold text-uppercase">Email address</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Alamat Email">
                        @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold text-uppercase">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password">
                        @error('password')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold text-uppercase">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Masukkan Konfirmasi Password">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </div>
                    <hr>
                    <div class="login mt-3 text-center">
                        <p>Sudah punya akun ? Login <a href="/login">Disini</a></p>
                        <p><a href="{{ route('/') }}">← Kembali ke Home </a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
