<footer class="ltn__footer-area  ">
    <div class="footer-top-area  section-bg-2 plr--5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-about-widget">
                        <div class="footer-logo">
                            <div class="site-logo">
                                <img src="{{ $company->logo ?? '' }}" alt="Logo">
                            </div>
                        </div>
                        <p>{{ $company->tagline ?? '' }}</p>
                        <div class="footer-address">
                            <ul>
                                <li class="text-hover-webiin">
                                    <div class="footer-address-icon">
                                        <i class="icon-placeholder"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p>{{ $company->address ?? '' }}</p>
                                    </div>
                                </li>
                                <li class="text-hover-webiin">
                                    <div class="footer-address-icon">
                                        <i class="icon-call"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p><a href="tel:{{ $company->phone ?? '' }}">{{ $company->phone ?? '' }}</a></p>
                                    </div>
                                </li>
                                <li class="text-hover-webiin">
                                    <div class="footer-address-icon">
                                        <i class="icon-mail"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p><a href="mailto:{{ $company->email ?? '' }}">{{ $company->email ?? '' }}</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="ltn__social-media mt-20">
                            <ul>
                                {{-- <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">Webiin</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a class="text-hover-webiin" href="{{ route('home') }}">Home</a></li>
                                <li><a class="text-hover-webiin" href="{{ route('shop.index') }}">Template</a></li>
                                <li><a class="text-hover-webiin" href="{{ route('home.about') }}">Pertanyaan</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">Layanan</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a class="text-hover-webiin" href="{{route('shop.index')}}" disable>Pembuatan Website</a></li>
                                <li><a class="text-hover-webiin" href="" style="pointer-events: none"> Pembuatan Web Apps</a></li>
                                <li><a class="text-hover-webiin" href="" style="pointer-events: none">Aplikasi Mobile</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">Customer Care</h4>
                        <div class="footer-menu">
                            <ul>

                                <li><a href="{{ route('login') }}" class="text-hover-webiin">Sign in</a></li>
                                <li><a href="{{ route('register') }}" class="text-hover-webiin">Register</a></li>
                                {{-- <li><a href="#">Blog</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                    <div class="footer-widget footer-newsletter-widget">
                        <h4 class="footer-title">Pembayaran</h4>
                        <img src="{{ url('/themes-frontend/img/payment.png') }}" alt="Payment Image">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ltn__copyright-area ltn__copyright-2 section-bg-7  plr--5 text-center">
        <div class="container-fluid ltn__border-top-2">
            <div class="ltn__copyright-design clearfix">
                <p>All Rights Reserved by Webiin.com <span class="current-year"></span></p>
            </div>
            {{-- <div class="row">
                <div class="col-md-6 col-12 align-self-center">
                    <div class="ltn__copyright-menu text-right text-end">
                        <ul>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Claim</a></li>
                            <li><a href="#">Privacy & Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</footer>
