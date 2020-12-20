<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">
                <img src="<?php echo e(asset('assets/img/floruna.png')); ?>" width="50%"/>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">FF</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header"></li>
            <li class="<?php echo e(Request::is('dashboard/admin/flora*','dashboard/user/flora*')  ? 'active' : ''); ?>">
                <?php if(Auth::user()->isA('admin')): ?>
                    <a class="nav-link" href="<?php echo e(route('dashboard.admin.flora.index')); ?>"><i
                            class="fas fa-th-large"></i>
                        <span>Flora</span></a>
                <?php else: ?>
                    <a class="nav-link" href="<?php echo e(route('dashboard.user.flora.index')); ?>"><i class="fas fa-th-large"></i>
                        <span>Flora</span></a>
                <?php endif; ?>
            </li>
            <li class="<?php echo e(Request::is('dashboard/admin/fauna*','dashboard/user/fauna*')  ? 'active' : ''); ?>">
                <?php if(Auth::user()->isA('admin')): ?>
                    <a class="nav-link" href="<?php echo e(route('dashboard.admin.fauna.index')); ?>"><i
                            class="fas fa-th-large"></i>
                        <span>Fauna</span></a>
                <?php else: ?>
                    <a class="nav-link" href="<?php echo e(route('dashboard.user.fauna.index')); ?>"><i class="fas fa-th-large"></i>
                        <span>Fauna</span></a>
                <?php endif; ?>
            </li>
            <?php if(Auth::user()->isA('admin')): ?>
                <li class="<?php echo e(Request::is('dashboard/admin/product*')  ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('dashboard.admin.product.index')); ?>"><i
                            class="fas fa-th-large"></i>
                        <span>Produk</span></a>
                </li>
                <li class="<?php echo e(Request::is('dashboard/admin/transaksi*')  ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('dashboard.admin.order.index')); ?>"><i
                            class="fas fa-th-large"></i>
                        <span>Transaksi</span></a>
                </li>
                <li class="<?php echo e(Request::is('dashboard/admin/peramalan*')  ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('dashboard.admin.forecast.index')); ?>"><i
                            class="fas fa-th-large"></i>
                        <span>Peramalan</span></a>
                </li>
            <?php else: ?>
                <li class="<?php echo e(Request::is('dashboard/user/product*')  ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('dashboard.user.product.index')); ?>"><i
                            class="fas fa-th-large"></i>
                        <span>Produk</span></a>
                </li>
                <li class="<?php echo e(Request::is('dashboard/user/cart*')  ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('dashboard.user.cart.index')); ?>"><i
                            class="fas fa-th-large"></i>
                        <span>Cart</span></a>
                </li>
                <li class="<?php echo e(Request::is('dashboard/user/transaksi*')  ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('dashboard.user.order.index')); ?>"><i
                            class="fas fa-th-large"></i>
                        <span>Transaksi</span></a>
                </li>
            <?php endif; ?>
            
            
            
            
            
            
            
            
        </ul>
    </aside>
</div>
<?php /**PATH D:\KULIAH\SEMESTER 7\PPL\florafauna\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>