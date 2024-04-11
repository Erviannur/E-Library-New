@extends('administrator.layouts.app')

@section('main')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header mb-3">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">{{ $title ?? ''}}</h3>
                        @if (isset($breadcrumbs))
                        <ul class="breadcrumb">
                            @foreach ($breadcrumbs as $item)
                                 @if (isset($item['is_active']) && $item['is_active'])
                                    <li class="breadcrumb-item active">{{ $item['title'] }}</li>
                                 @else
                                    <li class="breadcrumb-item">
                                        <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show alert-hidden" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show alert-hidden" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('warning'))
                    <div class="alert alert-danger alert-dismissible fade show alert-hidden" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

            </div>
        </div>

        @yield('content-wrapper')

    </div>
</div>
@endsection
