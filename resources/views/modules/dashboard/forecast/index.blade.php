@extends('layouts.app')
@section('title','Peramalan')
@section('parent','Peramalan')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Tabel Pendapatan</h4>
                @if($forecast > 0)
                @php
                    $month = $orders->first()->month + 1;
                    $year = $orders->first()->year;
                    if($month == 13){
                        $month = 1;
                        $year = $orders->first()->year + 1;
                    }
                @endphp
                <div class="card-header-action">
                    <button class="btn btn-primary">
                        {{ 'Peramalan pendapatan pada '.date('F', strtotime("$year-".$month."-01"))." ($year) : Rp.".number_format($forecast) }}
                    </button>
                </div>
                @endif
            </div>
            <div class="card-body p-0" id="div-table">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>Bulan (Tahun)</th>
                            <th>Total Penjualan</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ date('F', strtotime("$order->year-".$order->month."-01"))." ($order->year)" }}</td>
                                <td>{{ number_format($order->total) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
