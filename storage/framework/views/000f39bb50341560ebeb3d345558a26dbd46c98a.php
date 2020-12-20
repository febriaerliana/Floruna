
<?php $__env->startSection('title','Cart'); ?>
<?php $__env->startSection('parent','Cart'); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Session::has('failed')): ?>
        <div class="alert alert-danger">
            <?php echo e(Session::get('failed')); ?>

        </div>
    <?php endif; ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Cart</h4>
                <div class="card-header-action">
                    <?php if(!is_null($cart) && $cart->details->count() > 0): ?>
                        <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-checkout">Checkout</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body p-0" id="div-table">
                <div class="table-responsive">
                    <?php echo csrf_field(); ?>
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
                        <?php if(!is_null($cart)): ?>
                            <?php $__currentLoopData = $cart->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="checkbox[]" value="<?php echo e($product->id); ?>"/>
                                    </td>
                                    <td><?php echo e($product->item->name); ?>

                                        <input type="hidden" value="<?php echo e($product->id); ?>" name="item[]"/>
                                    </td>
                                    <td id="price-<?php echo e($product->id); ?>">
                                        Rp. <?php echo e(number_format($product->item->price * $product->total)); ?></td>
                                    <td><input type="number" style="border: none" placeholder="0"
                                               id="input-stock-<?php echo e($product->id); ?>"
                                               class="input-stock"
                                               name="stock[]"
                                               min="1"
                                               max="<?php echo e($product->item->stock); ?>"
                                               onkeydown="return false"
                                               value="<?php echo e($product->total); ?>"
                                               data-max="<?php echo e($product->item->stock); ?>"
                                               data-price="<?php echo e($product->item->price); ?>"
                                               data-id="<?php echo e($product->id); ?>"/>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-action mr-1"
                                           onclick="deleteItem(<?php echo e($product->id); ?>)"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form action="<?php echo e(route('dashboard.user.cart.delete-item')); ?>" id="form-delete-item" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" id="input-delete-id" name="id"/>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
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
                    <form method="POST" action="<?php echo e(route('dashboard.user.cart.checkout')); ?>" id="form-checkout">
                        <?php echo csrf_field(); ?>
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
                            <input name="address" class="form-control" value="<?php echo e(Auth::user()->address); ?>"/>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <style>
        input[type=number]::-webkit-inner-spin-button {
            opacity: 1
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER 7\PPL\florafauna\resources\views/modules/dashboard/users/cart/index.blade.php ENDPATH**/ ?>