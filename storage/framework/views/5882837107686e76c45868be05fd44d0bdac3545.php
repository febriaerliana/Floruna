
<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-4">

                </div>
                <div class="col-4">
                    <div class="login-brand">
                        <img src="../assets/img/floruna.png" alt="logo" width="100" height="100"
                             class="shadow-light rounded-circle">
                    </div>
                </div>
                <div class="col-4">

                </div>
                <div class="col-8">
                    <div class="card card-primary">
                        <div class="card-header"><h4>Floruna</h4></div>
                        <div class="card-body">
                            <p>
                                Floruna adalah sistem pencatatan jenis flora dan fauna (FLORUNA) yang dapat mempermudah
                                petugas petani serta memberikan informasi flora dan fauna di daerah jember kepada
                                masyrakat serta terdapat fitur pemetaan flora dan fauna
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-primary">
                        <div class="card-header"><h4>Login</h4></div>
                        <div class="card-body">
                            <?php if(Session::has('failed')): ?>
                                <div class="alert alert-danger">
                                    <?php echo e(Session::get('failed')); ?>

                                </div>
                            <?php endif; ?>
                            <form method="POST" action="<?php echo e(route('login')); ?>" class="needs-validation" novalidate="">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" class="form-control" name="username" tabindex="1"
                                           required autofocus placeholder="Email">
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
                                    <button type="submit"
                                            class="btn btn-primary btn-lg btn-block"
                                            tabindex="4">
                                        Login
                                    </button>
                                    <a href="/register" class="btn btn-outline-primary btn-lg btn-block"
                                       tabindex="4">
                                        Register
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER 7\PPL\florafauna\resources\views/modules/login.blade.php ENDPATH**/ ?>