@extends('layouts.app')
@section('title','Transaksi')
@section('parent','Transaksi')
@section('content')
    @if(Session::has('failed'))
        <div class="alert alert-danger">
            {{ Session::get('failed') }}
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Tabel Transaksi</h4>
                <div class="card-header-action">
                </div>
            </div>
            <div class="card-body p-0" id="div-table">
                <!-- <div class="row"> -->
                <p style="padding: 10px; text-align: center; font-weight: 700">lakukan pembayaran melalui :
                    034-101-000-743-303 a/n PERUM PERHUTANI setelah melakukan pembayaran, foto bukti transfer dan upload
                    disini. tunggu status menjadi sukses dan produk akan diantar sampai alamat terkait</p>
                <!-- </div> -->
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
{{--                            <th>ID</th>--}}
                            <th>Tanggal Pemesanan</th>
                            <th>Alamat</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
{{--                                <td>#INV{{ $order->id }}</td>--}}
                                <td>{{ $order->created_at->format('d M Y') }}</td>
                                <td>{{ $order->address ?? $order->user->address }}</td>
                                <td>Rp. {{ number_format($order->total_price) }}</td>
                                <td>
                                    @if(is_null($order->paid_at))
                                        Belum Bayar
                                    @elseif(!is_null($order->confirmed_at))
                                        Sukses
                                    @elseif(!is_null($order->paid_at))
                                        Menunggu Konfirmasi
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.user.order.show',$order->id) }}"
                                       class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Detail"><i
                                            class="fas fa-eye"></i></a>
                                    @if(is_null($order->paid_at))
                                        <a class="btn btn-primary btn-action mr-1 btn-delete-flora"
                                           title="Upload Bukti Pembayaran"
                                           data-toggle="modal"
                                           data-id="{{ $order->id }}"
                                           data-target="#deleteModal"><i
                                                class="fas fa-upload"></i></a>
                                    @endif
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
