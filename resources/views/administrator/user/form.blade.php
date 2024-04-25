@extends('administrator.layouts.main')

@section('content-wrapper')

<div class="card comman-shadow">
    <div class="card-body">
        <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="">Nama <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required placeholder="Masukan nama ..."
                        value="{{ isset($user) ? $user->name : '' }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control " required placeholder="Masukan email..." value="{{ isset($user) ? $user->email : '' }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3 position-relative">
                        <label>Password @if(!isset($user)) <span class="login-danger">*</span> @endif</label>
                        <input class="form-control pass-input" type="password" name="password" @if(!isset($user)) required @endif placeholder="Masukkan password...">
                        <span class="profile-views feather-eye-off toggle-password mt-3"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="choices-single-default" class="form-label font-size-13">Role <span class="text-danger">*</span></label>
                        <select class="form-select" name="role_id" id="choices-single-default">
                            <option value="" selected disabled hidden>Pilih Role</option>
                            @foreach ($roles as $item)
                            <option value="{{ $item->id }}" {{ isset($user) && $user->role_id == $item->id ?'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="choices-single-no-search" class="form-label font-size-13">Jenis Kelamin</label>
                        <select class="form-select" name="gender" id="choices-single-no-search">
                            <option value="" selected disabled hidden>Pilih jenis kelamin</option>
                            <option value="Male" {{ isset($user) && $user->gender ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Female" {{ isset($user) && $user->gender ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="">Alamat</label>
                <textarea name="address" class="form-control" placeholder="Masukan alamat..." id="">{{ isset($user) ? $user->address : ''}}</textarea>
            </div>

            <div class="mb-3">
                <label for="genre_id" style="font-weight: bold;">Foto </label>
                <input type="file" class="dropify" name="image" accept="image/*" value="{{ isset($user) ? $user->image : '' }}"/>
                @if(isset($user) && $user->image)
                <span> <i>*Kosongkan form jika tidak ingin mengganti foto</i> </span> <br>
                <img src="{{ asset('storage/images/users/' . $user->image) }}" alt="{{ $user->image }}" class="img-fluid mb-2" style="max-width: 200px;">
                @endif
            </div>

            <div class="text-end">
                <a href="{{ route('apps.users')}}" class="btn btn-dark">Cancel</a>
                <button type="submit" class="btn btn-warning">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection