<div class="page-sidebar">
    <div class="logo-box">
        <a href="#" class="logo-text">Konveksi Lancar</a><a href="#" id="sidebar-close">

            <i class="material-icons">close</i></a> <a href="#" id="sidebar-state">
            <i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i>
        </a>
    </div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Apps
            </li>
            <li class="{{set_active('home')}}">
                <a href="#"><i class="material-icons-outlined">dashboard</i>Dashboard</a>
            </li>
            <li class="sidebar-title">
                Master Data
            </li>
            <li class="{{set_active('category.index')}}">
                <a href="{{route('category.index')}}"><i class="material-icons">category</i>Kategori</a>
            </li>
            <li class="{{ set_active(['product.index','product.create','product.edit']) }}">
                <a href="{{route('product.index')}}" ><i class="material-icons">inventory</i>Produk</a>
            </li>
            <li class="{{set_active(['banner.index','banner.create','banner.edit'])}}">
                <a href="{{route('banner.index')}}"><i class="material-icons">collections</i>Banner</a>
            </li>
            <li class="{{set_active(['user.index','user.create','user.edit'])}}">
                <a href="{{route('user.index')}}"><i class="material-icons">group</i>User</a>
            </li>

            <li class="sidebar-title">
                Transaksi
            </li>
            {{-- <li>
                <a href="#"><i class="material-icons">receipt_long</i>Purchase</a>
            </li> --}}
            <li class="{{set_active(['purchase.create','purchase.index','purchase.edit','purchase.show','retur.index','retur.create'])}}">
                <a href=""><i class="material-icons">receipt_long</i>Purchase<i class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="#" class="{{set_active_sub('purchase.create')}}">List Transaksi</a>
                    </li>
                </ul>
            </li>
            <li class="{{set_active(['sale-store.index','sale-store.create'])}}">
                <a href="#" ><i class="material-icons">paid</i>Penjualan</a>
            </li>
            <li>
                <a href=""><i class="material-icons">summarize</i>Laporan<i class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="#">Hutang</a>
                    </li>
                    <li>
                        <a href="#">Piutang</a>
                    </li>
                    <li>
                        <a href="#">Stok</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-title">
                Settings
            </li>

            <li>
                <a href="{{route('setting-company')}}"><i class="material-icons">account_circle</i>Website</a>
            </li>
            <li>
                <a href="#"><i class="material-icons">account_circle</i>Profile</a>
            </li>
            <li>
                <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="material-icons">logout</i>Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li>
            {{-- <li>
                <a href="#"><i class="material-icons">access_time</i>Change Log</a>
            </li> --}}
        </ul>
    </div>
</div>
