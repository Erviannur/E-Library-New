@extends('layouts.main')

@section('content-wrapper')


<div class="card comman-shadow">
    <div class="card-body">
        <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="title" style="font-weight: bold;">Judul Buku <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Masukan judul buku..." autocomplete="off"
                            value="{{ isset($data) ? $data->title : '' }}">
                        @error('title')
                        <div class="invalid-feedback">
                            <span class="text-danger"> {{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="title" style="font-weight: bold;">ISBN </label>
                        <input type="number" class="form-control @error('isbn') is-invalid @enderror" name="isbn"
                            id="isbn" placeholder="Masukan nomor buku..." autocomplete="off"
                            value="{{ isset($data) ? $data->isbn : '' }}">
                        @error('isbn')
                        <div class="invalid-feedback">
                            <span class="text-danger"> {{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="title" style="font-weight: bold;">Halaman </label>
                        <input type="number" class="form-control @error('page') is-invalid @enderror" name="page"
                            id="page" placeholder="Masukan jumlah halaman..." autocomplete="off"
                            value="{{ isset($data) ? $data->page : '' }}">
                        @error('page')
                        <div class="invalid-feedback">
                            <span class="text-danger"> {{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="title" style="font-weight: bold;">Tahun Terbit</label>
                        <input type="number" class="form-control @error('publication_year') is-invalid @enderror year" name="publication_year"
                            id="publication_year" placeholder="Masukan jumlah halaman..." autocomplete="off"
                            value="{{ isset($data) ? $data->publication_year : '' }}">
                        @error('publication_year')
                        <div class="invalid-feedback">
                            <span class="text-danger"> {{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="author_id" style="font-weight: bold;">Penulis <span
                                class="text-danger">*</span></label>
                        <select class="form-control @error('author_id') is-invalid @enderror" name="author_id"
                            id="author_id">
                            <option value="" selected disabled hidden>Pilih Nama Penulis...</option>
                            @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ isset($data) && $data->author_id == $author->id ?
                                'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('author_id')
                        <div class="invalid-feedback">
                            <span class="text-danger"> {{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="publisher_id" style="font-weight: bold;">Penerbit <span
                                class="text-danger">*</span></label>
                        <select class="form-control @error('publisher_id') is-invalid @enderror" name="publisher_id"
                            id="publisher_id">
                            <option value="" selected disabled hidden>Pilih nama penerbit...</option>
                            @foreach($publishers as $publisher)
                            <option value="{{ $publisher->id }}" {{ isset($data) && $data->publisher_id ==
                                $publisher->id ? 'selected' : '' }}>
                                {{ $publisher->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('publisher_id')
                        <div class="invalid-feedback">
                            <span class="text-danger"> {{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="genre_id" style="font-weight: bold;">Genre <span
                                class="text-danger">*</span></label>
                        <select class="form-control @error('genre_id') is-invalid @enderror" name="genre_id"
                            id="genre_id">
                            <option value="" selected disabled hidden>Pilih nama genre...</option>
                            @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" {{ isset($data) && $data->genre_id == $genre->id ?
                                'selected' : '' }}>
                                {{ $genre->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('genre_id')
                        <div class="invalid-feedback">
                            <span class="text-danger"> {{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="country_id" style="font-weight: bold;">Negara <span
                                class="text-danger">*</span></label>
                        <select class="form-control @error('country_id') is-invalid @enderror" name="country_id"
                            id="country_id">
                            <option value="" selected disabled hidden>Pilih nama negara...</option>
                            @foreach($countries as $country)
                            <option value="{{ $country->id }}" {{ isset($data) && $data->country_id == $country->id ?
                                'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('country_id')
                        <div class="invalid-feedback">
                            <span class="text-danger"> {{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="genre_id" style="font-weight: bold;">Foto Buku <span class="text-danger">*</span></label>
                <input type="file" class="dropify" name="image" accept="image/*" value="{{ isset($data) ? $data->image : '' }}"/>
            </div>

            <div class="mb-3">
                <label for="genre_id" style="font-weight: bold;">Sinpopsis Buku <span
                        class="text-danger">*</span></label>
                <textarea class="form-control" name="synopsis">{{ isset($data) ? $data->synopsis : '' }}</textarea>
            </div>
            <div class="mb-3">
                <label class="">File Buku <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="file" accept=".pdf" value="{{ isset($data) ? $data->file : '' }}">
            </div>

            <div class="text-end">
                <a href="{{ route('apps.books')}}" class="btn btn-dark">Cancel</a>
                <button type="submit" class="btn btn-warning">Simpan</button>
            </div>
        </form>
    </div>
</div>



@endsection
