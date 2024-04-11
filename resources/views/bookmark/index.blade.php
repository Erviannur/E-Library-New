@extends('administrator.layouts.main')

@section('content-wrapper')

<div class="card">
    <div class="card-body">
        <div id="customAlert" class="alert alert-dismissible mb-3" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span class="alert-message"></span>
        </div>
        <div class="row">
            <div class="col-xl-12 d-flex">
                <div class="card flex-fill comman-shadow">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title ">Penanda</h5>
                    </div>
                    <div class="card-body">
                        <div class="activity-groups">
                            @forelse ($bookmark as $item)
                            <div class="activity-awards mb-3">
                                <button class="btn btn-sm delete-bookmark" data-bookmark-id="{{ $item->id }}"><i class="fas fa-trash-alt fa-sm text-danger"></i></button>
                                <div class="award-boxs">
                                    <img src="{{ asset('storage/images/books/' . $item->book->image )}}" width="60%" alt="Award">
                                </div>
                                <div class="award-list-outs">
                                    <a href="{{ route('guest.books.details', $item->book->slug)}}">
                                        <h4>{{ $item->book->title }}</h4>
                                    </a>
                                    <h5>{{ Str::limit($item->book->synopsis,50)}}</h5>
                                </div>
                                <div class="award-time-list">
                                    <span>{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->diffForHumans() }}</span>
                                </div>
                            </div>
                            @empty
                            <p class="text-center">Tidak ada buku yang dimasukan</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="pagination-tab  d-flex justify-content-center">
            {{ $bookmark->links() }}
        </div>
    </div>
</div>


@push('scripts')
<script>
$(document).ready(function() {
    $('.delete-bookmark').click(function(e) {
        var bookmarkId = $(this).data('bookmark-id');
        var button = $(this);
        e.preventDefault();
        showLoadingOverlay();

        $.ajax({
            url: '/apps/bookmarks/' + bookmarkId + '/delete',
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(xhr, status, error, response) {
                hideLoadingOverlay();
                showSuccessAlert('Buku dihapus dari penanda.');
                button.closest('.activity-awards').remove();
            },
            error: function(xhr, status, error) {
                hideLoadingOverlay();
                var errorMessage = xhr.responseJSON.message;
                showErrorAlert(errorMessage);
            }
        });
    });
});

</script>
@endpush
@endsection
