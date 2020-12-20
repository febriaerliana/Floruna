@extends('layouts.app')
@section('title','Detail Transaksi')
@section('parent','Transaksi')
@section('child','Detail Transaksi')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Tabel Detail Transaksi</h4>
                <div class="card-header-action">
                </div>
            </div>
            <div class="card-body p-0" id="div-table">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->details as $product)
                            <tr>
                                <td>{{ $product->item->name }}</td>
                                <td>Rp. {{ number_format($product->item->price) }}</td>
                                <td>{{ $product->total }} kg</td>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Upload Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form-delete-flora" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="file" class="form-control" name="img" required/>
                    </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-primary"
                            onclick="event.preventDefault(); document.getElementById('form-delete-flora').submit();">
                        Upload
                    </button>
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
            $('#form-delete-flora').attr('action', '{{ route('dashboard.user.order.upload') }}/' + id)
        })
    </script>
@endsection
