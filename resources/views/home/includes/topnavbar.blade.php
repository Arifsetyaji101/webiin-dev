{{-- <header class="ltn__header-area ltn__header-5 ltn__header-transparent--- gradient-color-4---">
    --}}
<header>
    <!-- ltn__header-top-area start --> 
    {{-- <div class="ltn__header-top-area section-bg-6 top-area-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="ltn__top-bar-menu">
                        <ul>
                            <li><a href="mailto:{{ $company->email ?? '' }}?Subject=Flower%20greetings%20to%20you"><i
                                        class="icon-mail"></i>{{ $company->email ?? '' }}</a></li>
                            <li><a href="#"><i class="icon-placeholder"></i>
                                    {{ $company->address ?? 'belum ada' }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ltn__header-top-area end -->

    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white ltn__logo-right-menu-option pt-md-3 pt-3">
        <div class="container-fluid">
            <div class="d-flex align-items-md-center justify-content-between align-items-sm-start">
                <div class="">
                    <div class="">
                        <a href="{{route('home')}}"> 
                            <img src="{{ $company->logo ?? '' }}" alt="Logo">
                        </a>

                    </div>
                </div>


                {{-- navlink --}}
                {{-- <div class="col header-menu-column">
                    <div class="header-menu d-none d-xl-block">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li><a href="{{ route('home') }}" class="text-[#324234]">Home</a></li>
                                    <li><a href="{{ route('shop.index') }}">Template</a></li>
                                    <li><a href="{{ route('home.about') }}">Cara Order</a></li>
                                    <li class="menu-icon"><a href="{{ route('home') }}">Service</a></li>
                                    <li><a href="{{ route('home') }}">Portofolio</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div> --}}


                {{-- search --}}
                <form class="d-flex btn-search justify-content-center d-none d-md-flex" id="#" method="get" action="{{ url('/shop') }}">
                    <input class="form-control my-auto " type="text" name="search" placeholder="Cari Template" aria-label="Search"
                        value="{{ $search ?? '' }}">
                    <button class="btn" type="submit">
                        <span><i class="icon-search"></i></span>
                    </button>
                </form>

                <div class="ltn__header-options ltn__header-options-2 mb-sm-20">
                    <!-- header-search-1 -->
                    {{-- <div class="header-search-wrap">
                        <div class="header-search-1">
                            <div class="search-icon">
                                <i class="icon-search for-search-show"></i>
                                <i class="icon-cancel  for-search-close"></i>
                            </div>
                        </div>
                        <div class="header-search-1-form">
                            <form id="#" method="get" action="{{ url('/shop') }}">
                                <input type="text" name="search" value="{{ $search ?? '' }}"
                                    placeholder="Search here..." />
                                <button type="submit">
                                    <span><i class="icon-search"></i></span>
                                </button>
                            </form>
                        </div>
                    </div> --}}


                    <!-- mini-cart -->
                    <div class="d-none d-md-block">
                        <div class="mini-cart-icon">
                            <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle no-style">
                                <i class="icon-shopping-cart"></i>
                                {{-- <sup>0</sup> --}}
                                <sup>{{ $count_cart ?? '0' }}</sup>
                            </a>
                        </div>
                    </div>
                    <!-- mini-cart -->

                    <!-- user-menu -->
                    <div class="ltn__drop-menu user-menu d-none d-md-block">
                        <ul>
                            <li>
                                <a href="#" class="no-style"><i class="icon-user"></i></a>
                                <ul style="border-radius: 15px">
                                    @guest
                                    <li><a href="{{ route('login') }}" class="text-hover-webiin">Masuk</a></li>
                                    <li><a href="{{ route('register') }}" class="text-hover-webiin">Daftar</a></li>
                                    @endguest
                                    @auth
                                    <li><a href="{{ route('member.dashboard') }}" class="text-hover-webiin">{{ Auth::user()->name }}</a></li>
                                    @if (auth::user()->role == 'admin')
                                    <li><a href="{{ route('admin.dashboard') }}" class="text-hover-webiin">Akun Saya</a></li>
                                    @else
                                    <li><a href="{{ route('member.dashboard') }}" class="text-hover-webiin">Akun Saya</a></li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="text-hover-webiin">Keluar</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                        </form>
                                    </li>
                                    {{-- <li><a href="{{route('logout')}}">Logout</a>
                                    </li> --}}
                                    @endauth
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="mobile-menu-toggle d-md-none">
                        
                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle shadow-none">
                            <svg viewBox="0 0 800 600">
                                <path
                                    d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                    id="top">
                                </path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path
                                    d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                    id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                </path>
                            </svg>
                            

                        </a>
                    </div>
                </div>
            </div>
            



            {{-- navlink --}}
                <div class="header-menu-column justify-content-center d-flex">
                    <div class="header-menu d-none d-md-block">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li><a href="{{ route('home') }}" class="text-hover-webiin">Home</a></li>
                                    <li><a href="{{ route('shop.index') }}" class="text-hover-webiin">Template</a></li>
                                    <li><a href="{{ route('home.about') }}" class="text-hover-webiin">Cara Order</a></li>
                                    {{-- <li class="menu-icon"><a href="{{ route('home') }}">Service</a></li>
                                    <li><a href="{{ route('home') }}">Portofolio</a></li>
                                    <li><a href="contact.html">Contact</a></li> --}}
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
</header>
