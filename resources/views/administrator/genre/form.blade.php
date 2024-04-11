@extends('administrator.layouts.main')

@section('content-wrapper')


<div class="row">
    <div class="col-sm-6">
        <div class="card comman-shadow">
            <div class="card-body">
                <form action="{{ $action }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" style="font-weight: bold;">Nama Genre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Masukan nama genre..." autocomplete="off" value="{{ isset($data) ? $data->name : '' }}">
                    @error('name')
                    <div class="invalid-feedback">
                        <span class="text-danger"> {{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="text-end">
                    <a href="{{ route('apps.genre')}}"class="btn btn-dark">Cancel</a>
                    <button type="submit" class="btn btn-warning">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
