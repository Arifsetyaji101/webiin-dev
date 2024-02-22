<div class="page-sidebar">
    <div class="logo-box">
        <a href="{{route('home')}}" class="logo-text">webiin</a><a href="#" id="sidebar-close">
            <p>{{ $company->address ?? '' }}</p>

            <i class="material-icons">close</i></a> <a href="#" id="sidebar-state">
            <i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i>
        </a>
    </div>
    @if (Auth::user()->role == 'admin')
        <div class="page-sidebar-inner slimscroll">
            <ul class="accordion-menu">
                <li class="sidebar-title">
                    Apps
                </li>
                <li class="{{set_active('home')}}">
                    <a href="{{route('admin.dashboard')}}"><i class="material-icons-outlined">dashboard</i>Dashboard</a>
                </li>
                <li class="sidebar-title">
                    Master Data
                </li>
                <li class="{{set_active('category.index')}}">
                    <a href="{{route('category.index')}}"><i class="material-icons">category</i><i class="material-icons has-sub-menu">add</i>Kategori</a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{route('category.index')}}" class="{{set_active_sub('purchase.create')}}">List Kategori</a>
                        </li>
                        <li>
                            <a href="{{route('subcategory.index')}}" class="{{set_active_sub('purchase.create')}}">Sub Kategori</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ set_active(['product.index','product.create','product.edit']) }}">
                    <a href="{{route('product.index')}}" ><i class="material-icons">inventory</i>Produk</a>
                </li>
                <li class="{{set_active(['banner.index','banner.create','banner.edit'])}}">
                    <a href="{{route('banner.index')}}"><i class="material-icons">collections</i>Banner</a>
                </li>
                <li class="{{set_active(['article.index','article.create','article.edit'])}}">
                    <a href="{{route('article.index')}}"><i class="material-icons">newspaper</i>Artikel</a>
                </li>
                <li class="{{set_active(['user.index','user.create','user.edit'])}}">
                    <a href=""><i class="material-icons">group</i>User<i class="material-icons has-sub-menu">add</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{route('user.index')}}" class="{{set_active_sub('purchase.create')}}">List</a>
                        </li>
                        <li>
                            <a href="{{route('role.index')}}" class="{{set_active_sub('purchase.create')}}">Role</a>
                        </li>
                        <li>
                            <a href="{{route('permission.index')}}" class="{{set_active_sub('purchase.create')}}">Permission</a>
                        </li>
                    </ul>
                    {{-- <a href="{{route('user.index')}}"><i class="material-icons">group</i>User</a> --}}
                </li>
                <li class="{{set_active(['coupon.index','coupon.create','coupon.edit'])}}">
                    <a href="{{route('coupon.index')}}"><i class="material-icons">local_offer</i>Kupon</a>
                </li>

                <li class="sidebar-title">
                    Transaksi
                </li>
                <li class="{{set_active(['purchase.create','purchase.index','purchase.edit','purchase.show','retur.index','retur.create'])}}">
                    <a href=""><i class="material-icons">receipt_long</i>Purchase<i class="material-icons has-sub-menu">add</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{route('transaction.list')}}" class="{{set_active_sub('purchase.create')}}">List Transaksi</a>
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
                    Shop
                </li>
                <li class="{{ set_active(['product.index','product.create','product.edit']) }}">
                    <a href="{{route('stockis.shop')}}" ><i class="material-icons">inventory</i>Produk</a>
                </li>
                <li class="sidebar-title">
                    Settings
                </li>
                <li class="{{set_active(['setting-company'])}}">
                    <a href=""><i class="material-icons">web</i>Website<i class="material-icons has-sub-menu">add</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{route('setting-company')}}" class="{{set_active_sub('setting-company')}}">Profile</a>
                        </li>
                        <li>
                            <a href="{{route('client-company.index')}}" class="{{set_active_sub('setting-company')}}">Client</a>
                        </li>
                        <li>
                            <a href="{{route('setting-company')}}" class="{{set_active_sub('setting-company')}}">Portofolio</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="material-icons">logout</i>Log Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    @elseif(Auth::user()->role =='user')
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Apps
            </li>
            <li class="{{set_active('member.dashboard')}}">
                <a href="{{route('member.dashboard')}}"><i class="material-icons-outlined">dashboard</i>Dashboard</a>
            </li>
            <li class="sidebar-title">
                Produk & Service
            </li>
            @forelse ($productUser as $item)
                <li class="{{set_active('product.mytransaction')}} {{set_active('product.mytransaction.detail')}}">
                    <a href="{{route('product.mytransaction', $item->name)}}" ><i class="material-icons">web_asset</i>{{$item->name}}</a>
                    {{-- <a href="{{route('product.mytransaction', ['user' => Auth::user()->id, 'category' => $item->name])}}" ><i class="material-icons">web_asset</i>{{$item->name}}</a> --}}
                </li>
            @empty
                <li class="#">
                    <a href="javascript:void(0);" ><i class="material-icons">web_asset</i>Anda belum membeli produk</a>
                </li>
            @endforelse

            <li class="sidebar-title">
                Transaksi
            </li>
            <li class="{{set_active(['member.detail.transaction','member.mytransaction'])}}">
                <a href="{{route('member.mytransaction')}}" ><i class="material-icons">paid</i>Invoice</a>
            </li>
            <li class="sidebar-title">
                Shop
            </li>
            <li class="{{ set_active(['product.index','product.create','product.edit']) }}">
                <a href="{{route('shop.index')}}" ><i class="material-icons">inventory</i>Shop</a>
            </li>

            <li class="sidebar-title">
                Settings
            </li>
            <li class="{{set_active(['profile.edit'])}}">
                <a href="{{route('profile.edit')}}"><i class="material-icons">group</i>User</a>
                {{-- <a href="{{route('profile.edit')}}" >group<i class="material-icons">User</i>Profile</a> --}}
            </li>
            <li>
                <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="material-icons">logout</i>Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    @endif

</div>
