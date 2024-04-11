@extends('administrator.layouts.main')

@section('content-wrapper')

<div class="row">
    <div class="col-xl-6 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Jumlah Koleksi Buku</h6>
                        <h3>{{ $book->count() }}</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{ asset('assets/img/dash-book.png')}}" width="80%" alt="Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Jumlah Pengguna</h6>
                        <h3>{{ $user->count() }}</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{ asset('assets/img/dash-user.png')}}" width="80%" alt="Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-7">

        <div class="card card-chart">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title">Jumlah Pengunjung</h5>
                    </div>
                    <div class="col-6">
                        <ul class="chart-list-out">
                            <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="apexcharts-area"></div>
            </div>
        </div>

    </div>
    <div class="col-md-5 d-flex">
        <div class="card flex-fill comman-shadow">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title ">Aktivitas </h5>
                <ul class="chart-list-out student-ellips">
                    <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="activity-groups">
                    @foreach ($activity as $item)
                    <div class="activity-awards">
                        <div class="award-list-outs">
                            <h4>{{ $item->type_activity }}</h4>
                            <h5>{{ ucwords($item->user->name) }} {{ $item->type_activity }}</h5>
                        </div>
                        <div class="award-time-list">
                            <span>{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->diffForHumans() }}</span>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function () {
    if ($('#apexcharts-area').length > 0) {
        var options = {
            chart: {
                height: 350,
                type: "line",
                toolbar: {
                    show: false
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: "smooth"
            },
            series: [{
                name: "Pengunjung",
                color: '#3D5EE1',
                data: {!! json_encode($visitorCounts) !!}
            }],
            xaxis: {
                categories: {!! json_encode($months) !!}
            }
        }
        var chart = new ApexCharts(document.querySelector("#apexcharts-area"), options);
        chart.render();
    }
});

</script>
@endpush

@endsection
