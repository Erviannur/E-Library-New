@extends('administrator.layouts.main')

@section('content-wrapper')


<div class="card">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="blog-view">
                    <div class="blog-single-post">
                        <div class="blog-image">
                            <img alt="" src="{{ asset('storage/images/books/'. $book->image )}}" class="img-fluid">
                        </div>
                        <h3 class="blog-title">{{ $book->title }}</h3>
                        <div class="blog-info">
                            <div class="post-list">
                                <ul>
                                    <li><div class="post-author"><span>{{ $book->author->name}} </span></div></li>
                                    <li><i class="feather-clock"></i> {{ \Carbon\Carbon::parse($book->created_at)->locale('id')->translatedFormat('d F Y') }}</li>
                                    <li><i class="feather-message-square"></i> {{ $comments->count() }}</li>
                                    <li><i class="feather-grid"></i> {{ $book->genre->name }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-content">
                            <p>{{ $book->synopsis }}</p>
                        </div>
                        <a href="{{ asset('storage/file/books/' . $book->file) }}" target="_blank" class="border-0 show-pdf">Baca Selengkapnya</a>
                    </div>


                    <div class="card blog-comments">
                        <div class="card-header">
                            <h4 class="card-title">Komentar ({{ $comments->count() }})</h4>
                        </div>
                        <div class="card-body pb-0">
                            <ul class="comments-list" id="commentsList">
                                @forelse($comments as $comment)
                                    @if($comment->user_id === auth()->id())
                                    <li id="comment-{{ $comment->id }}">
                                        <div class="comment">
                                            <div class="comment-author">
                                                <!-- Gambar profil pengguna -->
                                                <img class="avatar" alt="" src="{{ asset('storage/images/users/' . $comment->user->image) }}">
                                            </div>
                                            <div class="comment-block">
                                                <div class="comment-by d-flex align-items-center">
                                                    <!-- Nama pengguna yang membuat komentar -->
                                                    <h5 class="blog-author-name">{{ $comment->user->name }} <span class="blog-date"> <i class="feather-clock me-1"></i> {{ $comment->created_at->format('d M Y') }}</span></h5>
                                                    @if(auth()->user()->id === $comment->user_id)
                                                    <div class="delete-comment ms-auto">
                                                        <a href="{{ route('guest.books.delete-comment', ['comment' => $comment->hashid])}}">
                                                            <i class="fas fa-trash-alt fa-sm text-danger" title="Hapus komentar"></i>
                                                        </a>
                                                    </div>
                                                    @endif
                                                </div>
                                                <!-- Isi komentar -->
                                                <p>{{ $comment->comment }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                @empty
                                <p class="text-center">Belum ada komentar. Jadilah orang pertama yang memberikan komentar.</p>
                                @endforelse

                                @forelse($comments as $comment)
                                @if($comment->user_id !== auth()->id())
                                <li id="comment-{{ $comment->id }}">
                                    <div class="comment">
                                        <div class="comment-author">
                                            <!-- Gambar profil pengguna -->
                                            <img class="avatar" alt="" src="{{ asset('storage/images/users/' . $comment->user->image) }}">
                                        </div>
                                        <div class="comment-block">
                                            <div class="comment-by d-flex align-items-center">
                                                <!-- Nama pengguna yang membuat komentar -->
                                                <h5 class="blog-author-name">{{ $comment->user->name }} <span class="blog-date"> <i class="feather-clock me-1"></i> {{ $comment->created_at->format('d M Y') }}</span></h5>
                                                @if(auth()->user()->id === $comment->user_id)
                                                <div class="delete-comment ms-auto">
                                                    <a href="{{ route('guest.books.delete-comment', ['comment' => $comment->hashid])}}">
                                                        <i class="fas fa-trash-alt fa-sm text-danger" title="Hapus komentar"></i>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                            <!-- Isi komentar -->
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            @empty
                            <p class="text-center">Belum ada komentar. Jadilah orang pertama yang memberikan komentar.</p>
                            @endforelse
                            </ul>
                        </div>
                    </div>

                    <div class="card new-comment clearfix">
                        <div class="card-header">
                            <h4 class="card-title">Tinggalkan Komentar</h4>
                        </div>
                        <div class="card-body">
                            <form id="commentForm" action="{{ route('guest.books.store', $book) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <textarea rows="4" class="form-control bg-grey" name="comment" placeholder="Masukan komentar disini"></textarea>
                                </div>
                                <div class="submit-section">
                                    <button class="submit-btn btn-blog btn-primary border-0" style="background-color: #F7941D;" type="submit">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">

            </div>
        </div>
    </div>
</div>

@endsection
