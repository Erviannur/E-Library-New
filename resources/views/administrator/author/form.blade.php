@extends('administrator.layouts.main')

@section('content-wrapper')


<div class="row">
    <div class="col-sm-6">
        <div class="card comman-shadow">
            <div class="card-body">
                <form action="{{ $action }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" style="font-weight: bold;">Nama Penulis</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Masukan nama penulis..." autocomplete="off" value="{{ isset($data) ? $data->name : '' }}">
                    @error('name')
                    <div class="invalid-feedback">
                        <span class="text-danger"> {{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="text-end">
                    <a href="{{ route('apps.authors')}}"class="btn btn-dark">Cancel</a>
                    <button type="submit" class="btn btn-warning">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
