@extends('layouts.app')
@section('title','Flora')
@section('parent','Flora')
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
                                <p class="mb-0">Jumlah : {{ $product->total }}</p>
                                <p class="mb-0">Status : {{ $product->status }}</p>
                                <a href="{{ route('dashboard.user.flora.show',$product->id) }}">Detail</a>
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
@endsection
@section('script')
    <script>
        $('.btn-detail-img').click(function (e) {
            var img = $(this).data('image');
            $('#img-lihat-foto').prop('src', img)
        })
    </script>
@endsection
