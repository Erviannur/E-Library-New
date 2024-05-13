@extends('administrator.layouts.main')

@section('content-wrapper')
<div class="card shadow-lg">
    <div class="card-body">
        <form method="POST" action="{{ route('guest.profile.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-lg-4">
                    <div class="flex-shrink-0">
                        <div class="d-flex justify-content-center">
                            <input type="file" name="image" id="fileInput" accept="image/*" style="display: none;">
                            <label for="fileInput" class="container-profilepic card rounded-circle overflow-hidden d-flex justify-content-center align-items-center">
                                <div class="photo-preview card-img w-100 h-100">
                                    <!-- Gambar pratinjau foto profil -->
                                    @if ($user && $user->image)
                                        <img id="profileImage" src="{{ asset('storage/images/users/' . $user->image) }}" class="w-100 h-100" style="object-fit: cover;" alt="">
                                    @endif
                                </div>
                                <!-- Tampilan overlay untuk mengganti foto -->
                                <div class="middle-profilepic text-center card-img-overlay d-none flex-column justify-content-center">
                                    <div class="text-profilepic text-primary">
                                        <i class="fas fa-camera"></i>
                                        <div class="text-profilepic">Ubah Foto</div>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <p class="text-center">Unggah foto profil dalam format <br>
                    JPG/JPEG/PNG dengan ukuran 1x1</p>
                </div>

                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="choices-single-no-search" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" name="gender" id="choices-single-no-search">
                                    <option value="" selected disabled hidden>Pilih jenis kelamin</option>
                                    <option value="Male" {{ isset($user) && $user->gender ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Female" {{ isset($user) && $user->gender ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea name="address" id="address" class="form-control">{{ $user->address }}</textarea>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-warning text-white">Simpan</button>
            </div>
        </form>
    </div>
</div>
<div class="card shadow-lg">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 d-none d-md-block">
                <h4>Ganti Password Anda</h4>
                <p style="text-align: justify">
                    <span>Diperlukan kata sandi yang kuat, masukkan <i>minimal 5 karakter</i>, gabungkan <i>huruf besar, huruf kecil, angka, dan simbol</i> untuk mencegah orang lain mengakses akun Anda.</span>
                </p>
            </div>
            <div class="col-lg-8">
                <form method="POST" action="{{ route('guest.profile.change-password') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="oldPassword" class="form-label">Password Lama <span class="text-danger">*</span></label>
                        <input type="password" name="oldPassword" class="form-control @error('oldPassword') is-invalid @enderror">
                        @error('oldPassword')
                            <div class="invalid-feedback">
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Password Baru <span class="text-danger">*</span></label>
                        <input type="password" name="newPassword" class="form-control @error('newPassword') is-invalid @enderror">
                        @error('newPassword')
                            <div class="invalid-feedback">
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                        <input type="password" name="confirmPassword" class="form-control @error('confirmPassword') is-invalid @enderror">
                        @error('confirmPassword')
                            <div class="invalid-feedback">
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-warning text-white">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .container-profilepic {
        width: 250px;
        height: 250px;
    }
    .photo-preview{
        background-size: cover;
        background-position: center;
    }
    .middle-profilepic {
        background-color: rgba( 255,255,255, 0.69 );
    }
    .container-profilepic:hover .middle-profilepic {
        display: flex!important;
        cursor: pointer;
    }
</style>
@endpush

@push('scripts')
<script>
    const fileInput = document.getElementById('fileInput');
    const profileImage = document.getElementById('profileImage');

    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profileImage.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush

@endsection