
<?php $__env->startSection('title','Fauna'); ?>
<?php $__env->startSection('parent','Fauna'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Tabel Fauna</h4>
                <div class="card-header-action">
                    <a href="<?php echo e(route('dashboard.admin.fauna.create')); ?>" class="btn btn-primary">Tambah
                        Fauna</a>
                </div>
            </div>
            <div class="card-body p-0" id="div-table">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Spesies</th>
                            <th>Nama Latin</th>
                            <th>Ciri Khas</th>
                            <th>Habitat</th>
                            <th>Bentuk</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($product->name); ?></td>
                                <td><?php echo e($product->species); ?></td>
                                <td><?php echo e($product->latin_name); ?></td>
                                <td><?php echo e($product->characteristic); ?></td>
                                <td><?php echo e($product->habitat); ?></td>
                                <td><?php echo e($product->shape); ?></td>
                                <td><?php echo e($product->total); ?></td>
                                <td><?php echo e($product->status); ?></td>
                                <td>
                                    <a data-toggle="modal" data-target="#exampleModal"
                                       class="btn btn-primary btn-action mr-1 btn-detail-img"
                                       data-image="<?php echo e(\Illuminate\Support\Facades\Storage::disk('public')->url($product->img)); ?>"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="<?php echo e(route('dashboard.admin.fauna.edit',$product->id)); ?>"
                                       class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a href="<?php echo e(route('dashboard.admin.fauna.download',$product->id)); ?>" target="_blank"
                                       class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Print"><i
                                            class="fas fa-print"></i></a>
                                    <a class="btn btn-primary btn-action mr-1 btn-delete-fauna" data-toggle="modal"
                                       data-id="<?php echo e($product->id); ?>"
                                       data-target="#deleteModal"><i
                                            class="fas fa-trash"></i></a>
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
                    <h5 class="modal-title">Delete Fauna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form method="POST" id="form-delete-fauna">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
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

        $('.btn-delete-fauna').click(function () {
            var id = $(this).data('id');
            $('#form-delete-fauna').attr('action', '<?php echo e(route('dashboard.admin.fauna.destroy')); ?>/' + id)
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER 7\PPL\florafauna\resources\views/modules/dashboard/fauna/index.blade.php ENDPATH**/ ?>