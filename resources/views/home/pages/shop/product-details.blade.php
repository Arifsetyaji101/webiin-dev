@extends('home.layouts.layout-pages')
@section('content')
<!-- SHOP DETAILS AREA START -->
<div class="ltn__shop-details-area pb-85">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="ltn__shop-details-inner mb-60">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="ltn__shop-details-img-gallery">
                                <div class="ltn__shop-details-large-img">
                                    @foreach ($detail->productImages as $item)
                                    <div class="single-large-img">
                                        <a href="{{$item->image}}" data-rel="lightcase:myCollection">
                                            <img src="{{$item->image}}" alt="Image"
                                                style="height: 400px; object-fit:cover; width:470px;">
                                        </a>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="ltn__shop-details-small-img slick-arrow-2">
                                    @foreach ($detail->productImages as $item)
                                    <div class="single-small-img">
                                        <img src="{{$item->image}}" alt="Image"
                                            style="height: 100px; object-fit:cover; width:100px; border-radius:10px;  ">
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="modal-product-info shop-details-info pl-0">
                                <h3 style="white-space: normal; word-break: break-all;">{{$detail->title}}</h3>
                                <div class="product-price">
                                    <span>@currency($detail->price)</span>
                                    <br>
                                    @if ($detail->price_coret)
                                    <del
                                        style="color:rgb(62, 61, 61); font-size:14px">@currency($detail->price_coret)</del>
                                    @endif
                                </div>
                                <div class="modal-product-meta ltn__product-details-menu-1">
                                    <strong class="p-0 m-0">Rating</strong>
                                    <ul>
                                        <li>
                                            <div class="product-ratting">
                                                <ul style="
                                                    margin: 0 !important;
                                                    padding:0 !important;
                                                    
                                                    ">
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <strong class="p-0 ">Deskripsi</strong>
                                    <div>
                                        <p>{!!$detail->short_description!!}</p>
                                        {{-- <ul>
                                            <i class="fas fa-check-circle"> </i>
                                            <span> Kualitas checked by webiin</span>
                                            <br>
                                            <i class="fas fa-check-circle"> </i>
                                            <span> Future Update</span>
                                            <br>
                                            <i class="fas fa-check-circle"> </i>
                                            <span> 6 bulan Suport</span>
                                            <br>
                                            <i class="fas fa-check-circle"> </i>
                                            <span> Akses Dashboard</span>
                                            <br>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="modal-product-info shop-details-info pl-0"
                                style="border: 2px solid; border-radius:10px;border-color:rgb(209, 209, 209)">
                                <div class="modal-product-meta ltn__product-details-menu-1 pt-4">
                                    <ul>
                                        <li>
                                            <strong>Kategori :</strong>
                                            <span>
                                                {{$detail->category->name}}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ltn__product-details-menu-2">
                                    <form action="{{route('add.to.cart')}}" id="form-add-cart" method="POST">
                                        <ul>
                                            <li>
                                                <div class="cart-plus-minus">
                                                    <input type="text" id="qty" value="1" name="qty"
                                                        class="cart-plus-minus-box">
                                                </div>
                                            </li>
                                            <li>
                                                @csrf
                                                <input type="hidden" id="idproduct" name="id" value="{{ $detail->id }}"
                                                    class="form-control">
                                                <input type="hidden" id="weight" name="weight"
                                                    value="{{ $detail->weight }}" class="form-control">
                                                {{-- <button class="theme-btn-1 btn-preview btn-effect-1 "
                                                    type="submit">

                                                    <span> + Keranjang</span>
                                                </button> --}}
                                                <button type="submit" class="btn theme-btn-7 btn-effect-2"
                                                    id="update_cart">Masukkan Keranjang</button>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                                <div class="pb-4">
                                    @if ($detail->link)
                                    <a href="{{$item->link}}" target="_blank" class="theme-btn-2 btn btn-effect-2 mt-3">
                                        Demo
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Shop Tab Start -->
                <div class="ltn__shop-details-tab-inner ltn__shop-details-tab-inner-2">
                    <div class="ltn__shop-details-tab-menu">
                        <div class="nav">
                            <a class="active show text-webiin" data-bs-toggle="tab" href="#liton_tab_details_1_1">Description</a>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                            <div class="ltn__shop-details-tab-content-inner">
                                <h4 class="title-2" style="white-space: normal; word-break: break-all;">{{$detail->title}}</h4>
                                {{-- <p>{{$detail->description}}</p> --}}
                                <p>{!!$detail->description!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Shop Tab End -->
            </div>
        </div>
    </div>
</div>
<!-- SHOP DETAILS AREA END -->

<!-- PRODUCT SLIDER AREA START -->
<div class="ltn__product-slider-area ltn__product-gutter pb-70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2">
                    <h6 class="section-subtitle ltn__secondary-color text-webiin">Kategori : {{$detail->category->name}} </h6>
                    <h1 class="section-title fs-1">Template Terkait</h1>
                </div>
            </div>
        </div>
        <div class="row ltn__related-product-slider-one-active slick-arrow-1">
            <!-- ltn__product-item -->
            @foreach ($relateProduct as $item)
            <div class="col-lg-12">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="{{route('product.detail',$item->slug)}}"><img
                                src="{{$item->productImages->first()->image ?? ''}}" alt="#"
                                style="height: 200px; width:100%;  object-fit:cover; "></a>
                        {{-- <div class="product-badge">
                            <ul>
                                <li class="sale-badge">New</li>
                            </ul>
                        </div> --}}
                        <div class="product-hover-action">
                            <ul>
                                <li >
                                    <a href="#" title="Quick View" id="btn_quick_view" data-slug="{{$item->slug}}"
                                        data-bs-toggle="modal" data-bs-target="#quick_view_modal_1">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-info">
                        <h2 class="product-title" style="display: block;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;"
                        ><a href="{{route('product.detail',$item->slug)}}">{{$item->title}}</a>
                        </h2>
                        <div class="product-price ">
                            <p class="text-webiin" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                                @currency($item->price)</p>
                            @if ($item->price_coret)
                            <del style="color:rgb(62, 61, 61); font-size:14px">@currency($item->price_coret)</del>
                            @endif
                            {{-- <del>@currency($item->price)</del> --}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- PRODUCT SLIDER AREA END -->

<div class="ltn__modal-area ltn__add-to-cart-modal-area">
    <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="content-add-cart"></div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL AREA START (Quick View Modal) -->
<div class="ltn__modal-area ltn__quick-view-modal-area" id="modalQuickView">
    <div class="modal fade" id="quick_view_modal_1" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close bg-transparent" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <!-- <i class="fas fa-times"></i> -->
                    </button>
                </div>
                <div class="content_modal_view">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL AREA END -->

<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@push('after-scripts')
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function () {
            var id = $("#idproduct").val();
            var weight = $("#weight").val();
            var qty = $("#qty").val();
            $("#add-to-cart").click(function (e) {
                e.preventDefault();
                $.ajax({
                    method : "POST",
                    url: "{{route('add.to.cart')}}",
                    data: {
                        _token: CSRF_TOKEN,
                        qty : qty,
                        id : id,
                        weight : weight,
                    },
                    success: function (response) {
                        // console.log(response);
                        $("#content-add-cart").html(response);
                    }
                });
            });
        });

        $(document).on('click', '#btn_quick_view', function() {
            var slug = $(this).data('slug');
            $.ajax({
                type: "GET",
                url:('/product/modal-detail/'+slug),

                success: function (response) {
                    $('.content_modal_view').html(response);
                    $('#modalQuickView').show();
                }
            });
            // $.get('/quick-view/' + id, function(data) {
            //     $('.modal').html(data);
            //     $('.modal').show();
            // });
        });
</script>
@endpush