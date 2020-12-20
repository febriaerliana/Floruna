@extends('layouts.app')
@section('title','Produk')
@section('parent','Produk')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Tabel Produk</h4>
                <div class="card-header-action">
                    <a href="{{ route('dashboard.admin.product.create') }}" class="btn btn-primary">Tambah
                        Produk</a>
                </div>
            </div>
            <div class="card-body p-0" id="div-table">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>Rp. {{ number_format($product->price) }}</td>
                                <td>{{ $product->stock }} kg</td>
                                <td>
                                    <a data-toggle="modal" data-target="#exampleModal"
                                       class="btn btn-primary btn-action mr-1 btn-detail-img"
                                       data-image="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($product->img) }}"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="{{ route('dashboard.admin.product.edit',$product->id) }}"
                                       class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a class="btn btn-primary btn-action mr-1 btn-delete-flora" data-toggle="modal"
                                       data-id="{{ $product->id }}"
                                       data-name="{{ $product->name }}"
                                       data-target="#deleteModal"><i
                                            class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img class="img-thumbnail" id="img-lihat-foto" width="100%">
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form method="POST" id="form-delete-flora">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.btn-detail-img').click(function (e) {
            var img = $(this).data('image');
            $('#img-lihat-foto').prop('src', img)
        })

        $('.btn-delete-flora').click(function () {
            var id = $(this).data('id');
            var name = $(this).data('name');
            $('#title').text("Apakah anda yakin akan menghapus data " + name + " ?")
            $('#form-delete-flora').attr('action', '{{ route('dashboard.admin.product.destroy') }}/' + id)
        })
    </script>
@endsection
