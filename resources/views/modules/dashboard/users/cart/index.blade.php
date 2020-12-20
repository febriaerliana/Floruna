@extends('layouts.app')
@section('title','Cart')
@section('parent','Cart')
@section('content')
    @if(Session::has('failed'))
        <div class="alert alert-danger">
            {{ Session::get('failed') }}
        </div>
    @endif
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Cart</h4>
                <div class="card-header-action">
                    @if(!is_null($cart) && $cart->details->count() > 0)
                        <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-checkout">Checkout</a>
                    @endif
                </div>
            </div>
            <div class="card-body p-0" id="div-table">
                <div class="table-responsive">
                    @csrf
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!is_null($cart))
                            @foreach($cart->details as $product)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="checkbox[]" value="{{ $product->id }}"/>
                                    </td>
                                    <td>{{ $product->item->name }}
                                        <input type="hidden" value="{{ $product->id }}" name="item[]"/>
                                    </td>
                                    <td id="price-{{ $product->id }}">
                                        Rp. {{ number_format($product->item->price * $product->total) }}</td>
                                    <td><input type="number" style="border: none" placeholder="0"
                                               id="input-stock-{{ $product->id }}"
                                               class="input-stock"
                                               name="stock[]"
                                               min="1"
                                               max="{{ $product->item->stock }}"
                                               onkeydown="return false"
                                               value="{{ $product->total }}"
                                               data-max="{{ $product->item->stock }}"
                                               data-price="{{ $product->item->price }}"
                                               data-id="{{ $product->id }}"/>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-action mr-1"
                                           onclick="deleteItem({{ $product->id }})"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('dashboard.user.cart.delete-item') }}" id="form-delete-item" method="POST">
        @csrf
        <input type="hidden" id="input-delete-id" name="id"/>
    </form>
@endsection
@section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('dashboard.user.cart.checkout') }}" id="form-checkout">
                        @csrf
                        <div class="form-group">
                            <label>Total Harga</label>
                            <input name="total" class="form-control" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Kota</label>
                            <div class="checkbox">
                                <label><input type="checkbox" name="city" checked> Jember</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input name="address" class="form-control" value="{{ Auth::user()->address }}"/>
                        </div>
                        <input name="item_cart" type="hidden"/>
                        <input name="item_stock" type="hidden"/>
                    </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-primary" id="btn-checkout-modal"
                            onclick="event.preventDefault(); document.getElementById('form-checkout').submit();">
                        Checkout
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
    <style>
        input[type=number]::-webkit-inner-spin-button {
            opacity: 1
        }
    </style>
@endsection
@section('script')
    <script>
        var delayTimer;
        $('.input-stock').on('input', function () {
            var id = $(this).data('id');
            var value = $(this).val();
            var price = $(this).data('price');
            var total = value * price;
            var max = $(this).data('max')
            if (value > 0 && value <= max) {
                clearTimeout(delayTimer);
                delayTimer = setTimeout(function () {
                    $('#price-' + id).text('Rp. ' + numberWithCommas(total))
                }, 500);
            }
        })

        function deleteItem(id) {
            $('#input-delete-id').val(id)
            $('#form-delete-item').submit()
        }

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        $('.btn-checkout').click(function () {
            var total = 0
            var checked = []
            var stock = []
            $('input[name^="checkbox"]:checked').each(function () {
                checked.push(parseInt($(this).val()));
            });
            if (checked.length === 0) {
                $('#btn-checkout-modal').addClass('d-none')
                $('input[name="total"]').val(0)
            } else {
                $('#btn-checkout-modal').removeClass('d-none')
                for (i = 0; i < checked.length; i++) {
                    var input = $('#input-stock-' + checked[i]);
                    stock.push(parseInt(input.val()))
                    total += input.val() * input.data('price')
                }
                $('input[name="total"]').val(total)
                $('input[name="item_cart"]').val(checked)
                $('input[name="item_stock"]').val(stock)
            }
        })

        $('input[name="city"]').change(function () {
            var checked = []
            $('input[name^="checkbox"]:checked').each(function () {
                checked.push(parseInt($(this).val()));
            });
            if (this.checked) {
                if (checked.length === 0) {
                    $('#btn-checkout-modal').addClass('d-none')
                } else {
                    $('#btn-checkout-modal').removeClass('d-none')
                }
                $('input[name="address"]').prop('disabled',false)
            } else {
                $('input[name="address"]').prop('disabled',true)
                $('#btn-checkout-modal').addClass('d-none')
            }
        });
    </script>
@endsection
