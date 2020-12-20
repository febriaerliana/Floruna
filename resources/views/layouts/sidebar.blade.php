<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">
                <img src="{{ asset('assets/img/floruna.png') }}" width="50%"/>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">FF</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header"></li>
            <li class="{{{ Request::is('dashboard/admin/flora*')  ? 'active' : '' }}}">
                <a class="nav-link" href="{{ route('dashboard.admin.flora.index') }}"><i class="fas fa-th-large"></i>
                    <span>Flora</span></a>
            </li>
            <li class="{{{ Request::is('dashboard/admin/fauna*')  ? 'active' : '' }}}">
                <a class="nav-link" href="{{ route('dashboard.admin.fauna.index') }}"><i class="fas fa-th-large"></i>
                    <span>Fauna</span></a>
            </li>
{{--            <li class="{{{ Request::is('dashboard/kasir/pembelian*')  ? 'active' : '' }}}">--}}
{{--                <a class="nav-link" href="{{ route('dashboard.kasir.pembelian.index') }}"><i--}}
{{--                        class="far fa-file-alt"></i></i> <span>Pembelian</span></a>--}}
{{--            </li>--}}
{{--            <li class="{{{ Request::is('dashboard/kasir/penjualan*')  ? 'active' : '' }}}">--}}
{{--                <a class="nav-link" href="{{ route('dashboard.kasir.penjualan.index') }}"><i--}}
{{--                        class="far fa-file-alt"></i></i> <span>Penjualan</span></a>--}}
{{--            </li>--}}
        </ul>
    </aside>
</div>
