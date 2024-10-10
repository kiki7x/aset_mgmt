@extends('layouts.auth.app', ['title' => 'Login - Asset Management PPL'])

@section('content')
    <div class="col-md-6 text-center">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h4 class="font-weight-bold">FORM LOGIN</h4>
                <hr>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        {{-- <label class="font-weight-bold text-uppercase">Email address</label> --}}
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Alamat Email">
                        @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label class="font-weight-bold text-uppercase">Password</label> --}}
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password">
                        @error('password')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">LOGIN</button>
                    <hr>
                    <a href="/forgot-password">Lupa Password ?</a>
                    <div class="register mt-3 text-center">
                        <p>Belum punya akun ? Daftar <a href="/register">Disini</a></p>
                    </div>
                </form>
            </div>
            <div class="alert alert-primary mx-auto my-6 large">
                <strong><u>INFO PENTING <i class="fas fa-exclamation"></i></u></strong>
                <p class="text-center my-2 py-0"> Lindungi akun Anda dengan tidak memberikan ID pengguna dan kata sandi Anda pada siapapun. Segala risiko akibat penyalahgunaan ID pengguna menjadi tanggung jawab pengguna sepenuhnya. </p>
                <p class="text-center my-2 py-0"> Kami menjamin kerahasiaan data setiap pengguna sebagai bentuk penghargaan kami terhadap privasi pengguna. </p>
            </div>
        </div>
    </div>
@endsection
