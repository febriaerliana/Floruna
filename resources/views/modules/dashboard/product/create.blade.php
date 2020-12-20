@extends('layouts.app')
@section('title','Produk Tambah')
@section('parent','Produk')
@section('child','Tambah')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Tambah Produk</h4>
                </div>
                <form method="POST" action="{{ route('dashboard.admin.product.store') }}"
                      enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" required placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" name="price" required placeholder="Harga" min="1" oninput="validity.valid||(value='');">
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" class="form-control" name="stock" required placeholder="Jumlah" min="1" oninput="validity.valid||(value='');">
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" class="form-control" name="img" required>
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
