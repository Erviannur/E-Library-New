@extends('administrator.layouts.base')

@section('app')

<div class="main-wrapper">

    @include('administrator.layouts.partials.header')

    @include('administrator.layouts.partials.sidebar')

    @yield('main')

</div>

@endsection
