
<?php $__env->startSection('title','Transaksi'); ?>
<?php $__env->startSection('parent','Transaksi'); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Session::has('failed')): ?>
        <div class="alert alert-danger">
            <?php echo e(Session::get('failed')); ?>

        </div>
    <?php endif; ?>
    <?php if(Session::has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(Session::get('success')); ?>

        </div>
    <?php endif; ?>
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

                            <th>Tanggal Pemesanan</th>
                            <th>Alamat</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td><?php echo e($order->created_at->format('d M Y')); ?></td>
                                <td><?php echo e($order->address ?? $order->user->address); ?></td>
                                <td>Rp. <?php echo e(number_format($order->total_price)); ?></td>
                                <td>
                                    <?php if(is_null($order->paid_at)): ?>
                                        Belum Bayar
                                    <?php elseif(!is_null($order->confirmed_at)): ?>
                                        Sukses
                                    <?php elseif(!is_null($order->paid_at)): ?>
                                        Menunggu Konfirmasi
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('dashboard.user.order.show',$order->id)); ?>"
                                       class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Detail"><i
                                            class="fas fa-eye"></i></a>
                                    <?php if(is_null($order->paid_at)): ?>
                                        <a class="btn btn-primary btn-action mr-1 btn-delete-flora"
                                           title="Upload Bukti Pembayaran"
                                           data-toggle="modal"
                                           data-id="<?php echo e($order->id); ?>"
                                           data-target="#deleteModal"><i
                                                class="fas fa-upload"></i></a>
                                    <?php endif; ?>
                                </td>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER 7\PPL\florafauna\resources\views/modules/dashboard/users/order/index.blade.php ENDPATH**/ ?>