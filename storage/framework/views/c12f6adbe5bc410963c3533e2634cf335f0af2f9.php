
<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="../assets/img/floruna.png" alt="logo" width="100" height="100"
                             class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>Register</h4></div>
                        <div class="card-body">
                            <?php if(Session::has('failed')): ?>
                            <div class="alert alert-danger"><?php echo e(Session::get('failed')); ?></div>
                            <?php endif; ?>
                            <form method="POST" action="<?php echo e(route('register')); ?>" class="needs-validation" novalidate="">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="email">Nama</label>
                                    <input id="email" type="text" class="form-control" name="name" tabindex="1"
                                           required autofocus placeholder="Nama" value="<?php echo e(old('name')); ?>">
                                    <div class="invalid-feedback">
                                        Please fill in your name
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" class="form-control" name="email" tabindex="1"
                                           required autofocus placeholder="Email" value="<?php echo e(old('email')); ?>">
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password"
                                           tabindex="2" required placeholder="Password">
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Jenis Kelamin</label>
                                    </div>
                                    <select class="form-control" name="gender">
                                        <option <?php echo e(old('gender') == 'Laki-laki' ? 'selected' : ''); ?>>Laki-laki</option>
                                        <option <?php echo e(old('gender') == 'Perempuan' ? 'selected' : ''); ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Alamat</label>
                                    </div>
                                    <input id="password" type="text" class="form-control" name="address"
                                           tabindex="2" required placeholder="Alamat" value="<?php echo e(old('address')); ?>">
                                    <div class="invalid-feedback">
                                        please fill in your address
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">No HP</label>
                                    </div>
                                    <input id="password" type="number" class="form-control" name="phone" min="0"
                                           oninput="validity.valid||(value='');"
                                           value="<?php echo e(old('phone')); ?>"
                                           tabindex="2" required placeholder="No HP">
                                    <div class="invalid-feedback">
                                        please fill in your phone
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit"
                                            class="btn btn-primary btn-lg btn-block"
                                            tabindex="4">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER 7\PPL\florafauna\resources\views/modules/register.blade.php ENDPATH**/ ?>