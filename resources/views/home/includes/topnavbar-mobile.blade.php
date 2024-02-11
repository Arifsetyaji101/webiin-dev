<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <div class="site-logo">
                <a href="{{route('home')}}"> <img src="{{ $company->logo ?? '' }}" alt="Logo"></a>
          
            </div>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="ltn__utilize-menu-search-form">
            <form method="get" action="{{ url('/shop') }}">
                <input type="text" name="search" placeholder="Cari Template" style="border-radius:15px" value="{{ $search ?? '' }}">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="ltn__utilize-menu">
            <ul>
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('shop.index')}}">Template</a></li>
                <li><a href="{{route('home.about')}}">Cara Order</a></li>
                {{-- <li><a href="{{route('home')}}">News</a></li>
                <li><a href="{{route('home')}}">Contact</a></li> --}}
            </ul>
        </div>
        <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
            <ul>
                @guest
                    <li><a href="{{route('login')}}">Sign in</a></li>
                    <li><a href="{{route('register')}}">Register</a></li>
                @endguest
                @auth
                    <li>
                        <a href="{{route('member.dashboard')}}" title="My Account">
                            {{-- <span class="utilize-btn-icon">
                                <i class="far fa-user"></i>
                            </span> --}}
                            My Account
                        </a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                @endauth
                {{-- <li>
                    <a href="wishlist.html" title="Wishlist">
                        <span class="utilize-btn-icon">
                            <i class="far fa-heart"></i>
                            <sup>3</sup>
                        </span>
                        Wishlist
                    </a>
                </li>
                <li>
                    <a href="{{route('cart.index')}}" title="Shoping Cart">
                        <span class="utilize-btn-icon">
                            <i class="fas fa-shopping-cart"></i>
                            <sup>5</sup>
                        </span>
                        Shoping Cart
                    </a>
                </li> --}}
            </ul>
        </div>
        {{-- <div class="ltn__social-media-2">
            <ul>
                <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div> --}}
    </div>
</div>
