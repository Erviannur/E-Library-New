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
                        <h5 class="card-title mb-2">Tabel Aktivitas</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatables table table-stripped table-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Aktor</th>
                                <th>Aktivitas</th>
                                <th>Tangal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activity as $item)
                            <tr class="odd" role="row">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucwords($item->user->name) }}</td>
                                <td>{{ $item->type_activity }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->date)->locale('id_ID')->translatedFormat('d F Y') }}</td>
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
