@extends('home.layouts.layout-pages')
@section('content')
<!-- ABOUT US AREA START -->
<div class="ltn__about-us-area pt-120--- pb-120">
    <div class="container">
        <div class="text-center">
            <div class="">
                <div class="about-us-info-wrap">
                    <div class="section-title-area ltn__section-title-2">
                        {{-- <h6 class="section-subtitle ltn__secondary-color"><span><i
                                    class="fas fa-square-full"></i></span> {{$company->tagline}}</h6> --}}
                        <h1 class="section-title fs-1">Cara Order Website di Webiin</h1>
                        <p></p>
                    </div>

                </div>
            </div>
            <div class="">
                <div class="ltn__team-item ltn__team-item-3-2" style="border-radius: 10px">
                    <div class="team-img">
                        <img src="{{ url('/themes-frontend/img/order.png') }}" alt="#"
                             >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT US AREA END -->
<!-- FEATURE START -->
{{-- <div class="ltn__feature-area section-bg-1--- pt-120 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h6 class="section-subtitle ltn__secondary-color"><span><i class="fas fa-square-full"></i></span>
                        Our Services</h6>
                    <h1 class="section-title">Layanan Kami</h1>
                </div>
            </div>
        </div>
        <div class="row align-self-center">
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                    <div class="ltn__feature-icon">
                        <span><i class="flaticon-apartment"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3><a href="service-details.html">Seles Motor/Mobil</a></h3>
                        <p>over 1 million+ homes for sale available
                            on the website, we can match you with a
                            house you will want to call home.</p>
                        <a class="ltn__service-btn ltn__service-btn-2" href="service-details.html">Service Details <i
                                class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                    <div class="ltn__feature-icon">
                        <span><i class="flaticon-excavator"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3><a href="service-details.html">Company Profile</a></h3>
                        <p>over 1 million+ homes for sale available
                            on the website, we can match you with a
                            house you will want to call home.</p>
                        <a class="ltn__service-btn ltn__service-btn-2" href="service-details.html">Service Details <i
                                class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                    <div class="ltn__feature-icon">
                        <span><i class="icon-repair"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3><a href="service-details.html">Sekolah / Universitas</a></h3>
                        <p>over 1 million+ homes for sale available
                            on the website, we can match you with a
                            house you will want to call home.</p>
                        <a class="ltn__service-btn ltn__service-btn-2" href="service-details.html">Service Details <i
                                class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                    <div class="ltn__feature-icon">
                        <span><i class="flaticon-slider"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3><a href="service-details.html">Rental Mobil</a></h3>
                        <p>over 1 million+ homes for sale available
                            on the website, we can match you with a
                            house you will want to call home.</p>
                        <a class="ltn__service-btn ltn__service-btn-2" href="service-details.html">Service Details <i
                                class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                    <div class="ltn__feature-icon">
                        <span><i class="flaticon-building"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3><a href="service-details.html">Toko Online</a></h3>
                        <p>over 1 million+ homes for sale available
                            on the website, we can match you with a
                            house you will want to call home.</p>
                        <a class="ltn__service-btn ltn__service-btn-2" href="service-details.html">Service Details <i
                                class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                    <div class="ltn__feature-icon">
                        <span><i class="flaticon-house"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3><a href="service-details.html">Agen Properti</a></h3>
                        <p>over 1 million+ homes for sale available
                            on the website, we can match you with a
                            house you will want to call home.</p>
                        <a class="ltn__service-btn ltn__service-btn-2" href="service-details.html">Service Details <i
                                class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                    <div class="ltn__feature-icon">
                        <span><i class="flaticon-house"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3><a href="service-details.html">Donasi</a></h3>
                        <p>over 1 million+ homes for sale available
                            on the website, we can match you with a
                            house you will want to call home.</p>
                        <a class="ltn__service-btn ltn__service-btn-2" href="service-details.html">Service Details <i
                                class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                    <div class="ltn__feature-icon">
                        <span><i class="flaticon-house"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3><a href="service-details.html">Landing Page</a></h3>
                        <p>over 1 million+ homes for sale available
                            on the website, we can match you with a
                            house you will want to call home.</p>
                        <a class="ltn__service-btn ltn__service-btn-2" href="service-details.html">Service Details <i
                                class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                    <div class="ltn__feature-icon">
                        <span><i class="flaticon-house"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3><a href="service-details.html">Logistik</a></h3>
                        <p>over 1 million+ homes for sale available
                            on the website, we can match you with a
                            house you will want to call home.</p>
                        <a class="ltn__service-btn ltn__service-btn-2" href="service-details.html">Service Details <i
                                class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1">
                    <div class="ltn__feature-icon">
                        <span><i class="flaticon-house"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3><a href="service-details.html">Portal Berita</a></h3>
                        <p>over 1 million+ homes for sale available
                            on the website, we can match you with a
                            house you will want to call home.</p>
                        <a class="ltn__service-btn ltn__service-btn-2" href="service-details.html">Service Details <i
                                class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> --}}
<!-- FEATURE END -->
@endsection