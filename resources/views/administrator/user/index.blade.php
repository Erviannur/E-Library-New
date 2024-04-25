@extends('administrator.layouts.main')

@section('content-wrapper')


<div class="row">
    <div class="col-sm-12">

        <div id="customAlert" class="alert alert-dismissible" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span class="alert-message"></span>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title mb-2">Tabel Pengguna</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ route('apps.users.create')}}" class="btn btn-warning btn-sm">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatables table table-stripped table-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr class="odd" role="row">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-3 d-none d-sm-block" style="width: 40px; height: 40px; border-radius: 50%;">
                                            <img src="{{ asset('storage/images/users/' . $item->image )}}" width="100%" alt="Profil">
                                        </div>
                                        <div>
                                            <strong>{{ $item->name }}</strong>
                                            <p class="m-0 p-0 text-muted small">{{ $item->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $item->role->name }}</td>
                                <td>{{ $item->gender === 'Male' ? 'Laki-laki' : ($item->gender === 'Female' ? 'Perempuan' : '-') }}</td>
                                <td>{{ Str::limit($item->address ?? '-', 20) }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('apps.users.edit', $item )}}" class="btn btn-sm bg-success-light me-2 " data-bs-toggle="tooltip" data-bs-placement="left" title="Edit">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <button class="btn btn-sm bg-danger-light delete-book"
                                            data-id="{{ $item->hashid }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Hapus">
                                            <i class="feather-delete"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection