@extends('layouts.app')
@section('title','Fauna Tambah')
@section('parent','Fauna')
@section('child','Tambah')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Tambah Fauna</h4>
                </div>
                <form method="POST" action="{{ route('dashboard.admin.fauna.store') }}"
                      enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Spesies</label>
                            <input type="text" class="form-control" name="species" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Latin</label>
                            <input type="text" class="form-control" name="latin_name" required>
                        </div>
                        <div class="form-group">
                            <label>Warna</label>
                            <input type="text" class="form-control" name="color" required>
                        </div>
                        <div class="form-group">
                            <label>Ciri Khas</label>
                            <input type="text" class="form-control" name="characteristic" required>
                        </div>
                        <div class="form-group">
                            <label>Habitat</label>
                            <input type="text" class="form-control" name="habitat" required>
                        </div>
                        <div class="form-group">
                            <label>Bentuk</label>
                            <input type="text" class="form-control" name="shape" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" class="form-control" name="total" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option>Dilindungi</option>
                                <option>Dikembangbiakkan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" class="form-control" name="image" required>
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
