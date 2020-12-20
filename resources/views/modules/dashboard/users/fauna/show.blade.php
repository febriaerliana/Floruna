@extends('layouts.app')
@section('title','Fauna')
@section('parent','Fauna')
@section('child','Detail')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <img style="width: 100%"
                         class="mb-2"
                         src="{{ \Illuminate\Support\Facades\Storage::url($product->img) }}">
                    <h6>Nama : {{ $product->name }}</h6>
                    <p class="m-0">Spesies : {{ $product->species }}</p>
                    <p class="m-0">Nama Latin : {{ $product->latin_name }}</p>
                    <p class="m-0">Warna : {{ $product->name }}</p>
                    <p class="m-0">Karateristik : {{ $product->characteristic }}</p>
                    <p class="m-0">Habitat : {{ $product->species }}</p>
                    <p class="m-0">Bentuk : {{ $product->shape }}</p>
                    <p class="m-0">Status : {{ $product->status }}</p>
                    <p class="m-0">Jumlah : {{ $product->total }}</p>
                    <a href="{{ route('dashboard.user.fauna.download',$product->id) }}"
                       target="_blank"
                       class="btn btn-primary btn-action mt-1" data-toggle="tooltip"
                       title="Print"><i
                            class="fas fa-print"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
