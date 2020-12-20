@extends('layouts.app')
@section('title','Fauna Edit')
@section('parent','Fauna')
@section('child','Edit')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit Fauna</h4>
                </div>
                <form method="POST" action="{{ route('dashboard.admin.fauna.update',$product->id) }}"
                      enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Spesies</label>
                            <input type="text" class="form-control" name="species" value="{{ $product->species }}"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Nama Latin</label>
                            <input type="text" class="form-control" name="latin_name" value="{{ $product->latin_name }}"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Warna</label>
                            <input type="text" class="form-control" name="color" value="{{ $product->color }}" required>
                        </div>
                        <div class="form-group">
                            <label>Ciri Khas</label>
                            <input type="text" class="form-control" name="characteristic"
                                   value="{{ $product->characteristic }}" required>
                        </div>
                        <div class="form-group">
                            <label>Habitat</label>
                            <input type="text" class="form-control" name="habitat" value="{{ $product->habitat }}"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Bentuk</label>
                            <input type="text" class="form-control" name="shape" value="{{ $product->shape }}"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" class="form-control" name="total" value="{{ $product->total }}"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option {{ $product->status == 'Dilindungi' ? 'selected' : '' }}>Dilindungi</option>
                                <option {{ $product->status == 'Dikembangbiakkan' ? 'selected' : '' }}>Dikembangbiakkan
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
