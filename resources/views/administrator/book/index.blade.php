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
                        <h5 class="card-title mb-2">Tabel Buku</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ route('apps.books.create')}}" class="btn btn-warning btn-sm">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatables table table-stripped table-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Genre</th>
                                <th>Tanggal Publikasi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $item)
                            <tr class="odd" role="row">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a class="avatar avatar-sm me-2">
                                            <img src="{{ asset('storage/images/books/' . $item->image )}}" alt="{{ $item->image }}" class="" style="max-width: 50px">
                                        </a>
                                        <a>{{ Str::limit($item->title,15)}}</a>
                                    </h2>
                                </td>
                                <td>{{ Str::limit($item->author->name,15) }}</td>
                                <td>{{ Str::limit($item->publisher->name,15) }}</td>
                                <td>{{ Str::limit($item->genre->name,15) }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->date_publication)->locale('id_ID')->translatedFormat('d F Y') }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('apps.books.edit', $item )}}" class="btn btn-sm bg-success-light me-2 " data-bs-toggle="tooltip" data-bs-placement="left" title="Edit">
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

@push('scripts')
<script>
    $(document).ready(function() {
        $('.delete-book').click(function(e) {
            e.preventDefault();
            var authorId = $(this).data('id');
            showLoadingOverlay();
            var authorRow = $(this).closest('tr');
            deleteAuthor(authorId, authorRow);
        });
    });

    function deleteAuthor(authorId, authorRow) {
        $.ajax({
            url: '{{ route("apps.authors.delete", ":authorId") }}'.replace(':authorId', authorId),
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('Data berhasil dihapus.');
                hideLoadingOverlay();
                showSuccessAlert('Data berhasil dihapus.');

                authorRow.fadeOut('slow', function() {
                    authorRow.remove();
                });
            },
            error: function(error) {
                console.error('Gagal menghapus data:', error);
                hideLoadingOverlay();
                showErrorAlert('Gagal menghapus data. Silakan coba lagi.');
            }
        });
    }
</script>

@endpush

@endsection
