@extends('administrator.layouts.main')

@section('content-wrapper')


<div class="card">
    <div class="card-header">
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-lg-8">
                <form action="{{ route('guest.books.search')}}" method="GET">
                    <div class="input-group mb-3">
                        <select class="form-select custom-select menu-search" name="category">
                            <option value="book">Buku</option>
                            <option value="author">Penulis</option>
                            <option value="genre">Genre</option>
                        </select>
                        <input type="text" class="form-control input-search" name="query"
                            placeholder="Masukan kata kunci...">
                        <button class="btn btn-warning" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div id="customAlert" class="alert alert-dismissible mb-3" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span class="alert-message"></span>
        </div>
        <div class="row">
            @foreach ($books as $item)
            <div class="col-md-4 col-xl-3 col-sm-6 mb-3">
                <div class="card p-0 shadow-sm" style="height: 100%;">
                    <div class="blog grid-blog flex-fill">
                        <div class="blog-image">
                            <img class="img-fluid" src="{{ asset('storage/images/books/' . $item->image)}}" alt="Post Image">
                            @if ($item->daysDifference < 7)
                            <div class="blog-views">Baru</div>
                            @endif
                        </div>
                        <div class="blog-content" style="margin-bottom: 30px !important">
                            <h3 class="blog-title">
                                <a href="{{ route('guest.books.details', $item->slug) }}">{{ Str::limit($item->title, 30)
                                    }}</a>
                            </h3>
                            <p>{{ Str::limit($item->synopsis, 100) }}</p>
                        </div>
                        <div class="row mt-2">
                            <div class="edit-options">
                                <div class="edit-delete-btn">
                                    <button type="button" class="btn btn-sm" >
                                        <i class="fas fa-bookmark bookmark-icon" style="color: #F7941D"  data-book-id="{{ $item->id }}"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="row ">
    <div class="col-md-12">
        <div class="pagination-tab  d-flex justify-content-center">
            {{ $books->links() }}
        </div>
    </div>
</div>


@push('scripts')
<script>
$(document).ready(function() {
    $('.bookmark-icon').click(function() {
        event.preventDefault();
        var bookId = $(this).data('book-id');
        showLoadingOverlay();
        addToBookmark(bookId);
    });

    function addToBookmark(bookId) {
        $.ajax({
            url: '/apps/collections/add-to-bookmark/' + bookId,
            type: 'GET',
            success: function(response) {
                hideLoadingOverlay();
                showSuccessAlert('Buku ditambahkan ke penanda.');
            },
            error: function(xhr, status, error) {
                hideLoadingOverlay();
                var errorMessage = xhr.responseJSON.message;
                showErrorAlert(errorMessage);
            }
        });
    }
});

</script>
@endpush

@endsection
