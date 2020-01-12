@extends('layouts.app')

@section('content')
<div style="margin-top:60px;"></div>
    @if(Auth::user()->status == 'admin')
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Halaman Data Statistik Nilai Tugas</b>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="panel-body">
                                    <div id="container"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->status == 'moderator')

    @elseif(Auth::user()->status == 'pengajar')

    @else

    @endif

<div class="col-sm-12 text-center">
  <p>&copy; 2019 | Riowaldy Indrawan</p>
</div>
@endsection

@section('footer')
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var myChart = Highcharts.chart('container', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Data Statistik Nilai Tugas Murid'
            },
            xAxis: {
                categories: {!!json_encode($categories)!!}
            },
            yAxis: {
                title: {
                    text: 'Nilai Tugas'
                }
            },
            series: [{
                name: {!!json_encode($judul)!!},
                data: {!!json_encode($nilai)!!}
            }]
        });
    });
</script>
@endsection
