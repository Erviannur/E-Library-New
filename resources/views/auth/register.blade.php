@extends('administrator.layouts.base')

@section('app')
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="{{ asset('assets/images/pets.png')}}" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Paw-paw Petshop.</h1>
                        <p class="account-subtitle">Sudah punya akun? <a href="{{ route('auth')}}">Masuk</a></p>
                        <h2>Daftar</h2>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label>Username <span class="login-danger">*</span></label>
                                <input class="form-control" type="text" name="username">
                                <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                            </div>
                            <div class="form-group">
                                <label>Email <span class="login-danger">*</span></label>
                                <input class="form-control" type="email" name="email">
                                <span class="profile-views"><i class="fas fa-envelope"></i></span>
                            </div>
                            <div class="form-group">
                                <label>Password <span class="login-danger">*</span></label>
                                <input class="form-control pass-input" type="text" name="password">
                                <span class="profile-views feather-eye toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password <span class="login-danger">*</span></label>
                                <input class="form-control pass-confirm" type="text" name="password_confirmation">
                                <span class="profile-views feather-eye reg-toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block border-0" style="background-color: #F7941D;" type="submit">Daftar</button>
                            </div>
                        </form>
                        <p class="account-subtitle text-center">
                            <a href="{{ route('home') }}">Kembali ke Beranda</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
