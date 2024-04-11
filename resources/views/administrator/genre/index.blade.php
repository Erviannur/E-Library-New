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
                        <h5 class="card-title mb-2">Tabel Genre</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <a href="{{ route('apps.genre.create')}}" class="btn btn-warning btn-sm">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatables table table-stripped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Genre</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($genres as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('apps.genre.edit', $item )}}" class="btn btn-sm bg-success-light me-2 ">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <button class="btn btn-sm bg-danger-light delete-genre"
                                            data-id="{{ $item->hashid }}">
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
        $('.delete-genre').click(function(e) {
            e.preventDefault();
            var genreId = $(this).data('id');
            showLoadingOverlay();
            var genreRow = $(this).closest('tr');
            deleteGenre(genreId, genreRow);
        });
    });

    function deleteGenre(genreId, genreRow) {
        $.ajax({
            url: '{{ route("apps.genre.delete", ":genreId") }}'.replace(':genreId', genreId),
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('Data berhasil dihapus.');
                hideLoadingOverlay();
                showSuccessAlert('Data berhasil dihapus.');

                genreRow.fadeOut('slow', function() {
                    genreRow.remove();
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
