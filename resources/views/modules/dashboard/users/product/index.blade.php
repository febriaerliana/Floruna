@extends('layouts.app')
@section('title','Produk')
@section('parent','Produk')
@section('content')
    <div class="row">
        @foreach($products as $product)
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <img class="mr-3"
                                 src="{{ \Illuminate\Support\Facades\Storage::url($product->img) }}"
                                 alt="Generic placeholder image" width="150" height="150">
                            <div class="media-body">
                                <h5 class="mt-0">{{ $product->name }}</h5>
                                <p class="mb-0">Harga : Rp. {{ number_format($product->price) }}</p>
                                <p class="mb-0">Stock : {{ $product->stock }} kg</p>
                                @if($product->stock > 0)
                                    <a href="{{ route('dashboard.user.product.add',['id'=> $product->id]) }}">Beli</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
