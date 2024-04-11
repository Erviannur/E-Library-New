@extends('administrator.layouts.base')

@section('app')
{{-- <div class="main-wrapper login-body"
    style="background-image: url('{{ asset('assets/images/background.jpg') }}'); background-size: cover;"> --}}
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login E-Library.</h1>
                            <p class="account-subtitle">Belum Punya Akun? <a href="{{ route('register')}}">Daftar</a>
                            </p>
                            <div class="mt-4">
                                <form action="{{ route('login')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email <span class="login-danger">*</span></label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="text"
                                            name="email" autocomplete="off">
                                        <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                        @error('email')
                                        <div class="invalid-feedback">
                                            <p class="text-danger">Masukan email anda</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span class="login-danger">*</span></label>
                                        <input class="form-control pass-input @error('password') is-invalid @enderror"
                                            type="password" name="password">
                                        <span class="profile-views feather-eye-off toggle-password"></span>
                                        @error('password')
                                        <div class="invalid-feedback">
                                            <p class="text-danger">Masukan username</p>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block border-0"
                                            style="background-color: #F7941D;" type="submit">Masuk</button>
                                    </div>

                                </form>
                                {{-- <div class="login-or">
                                    <span class="or-line"></span>
                                    <span class="span-or">atau</span>
                                </div>
                                <div class="google-socialite">
                                    <a href="#" class="btn btn-block border-0">
                                        Login dengan Google
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
