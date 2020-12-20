
<?php $__env->startSection('title','Detail Transaksi'); ?>
<?php $__env->startSection('parent','Transaksi'); ?>
<?php $__env->startSection('child','Detail Transaksi'); ?>
<?php $__env->startSection('content'); ?>
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
                        <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($product->item->name); ?></td>
                                <td>Rp. <?php echo e(number_format($product->item->price)); ?></td>
                                <td><?php echo e($product->total); ?> kg</td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
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
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('.btn-detail-img').click(function (e) {
            var img = $(this).data('image');
            $('#img-lihat-foto').prop('src', img)
        })

        $('.btn-delete-flora').click(function () {
            var id = $(this).data('id');
            $('#form-delete-flora').attr('action', '<?php echo e(route('dashboard.user.order.upload')); ?>/' + id)
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER 7\PPL\florafauna\resources\views/modules/dashboard/users/order/show.blade.php ENDPATH**/ ?>