
<?php $__env->startSection('title','Peramalan'); ?>
<?php $__env->startSection('parent','Peramalan'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Tabel Pendapatan</h4>
                <?php if($forecast > 0): ?>
                <?php
                    $month = $orders->first()->month + 1;
                    $year = $orders->first()->year;
                    if($month == 13){
                        $month = 1;
                        $year = $orders->first()->year + 1;
                    }
                ?>
                <div class="card-header-action">
                    <button class="btn btn-primary">
                        <?php echo e('Peramalan pendapatan pada '.date('F', strtotime("$year-".$month."-01"))." ($year) : Rp.".number_format($forecast)); ?>

                    </button>
                </div>
                <?php endif; ?>
            </div>
            <div class="card-body p-0" id="div-table">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>Bulan (Tahun)</th>
                            <th>Total Penjualan</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(date('F', strtotime("$order->year-".$order->month."-01"))." ($order->year)"); ?></td>
                                <td><?php echo e(number_format($order->total)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER 7\PPL\florafauna\resources\views/modules/dashboard/forecast/index.blade.php ENDPATH**/ ?>