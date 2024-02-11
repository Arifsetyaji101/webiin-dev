@extends('home.layouts.layout-pages')
@section('content')
<!-- SHOPING CART AREA START -->

<div class="liton__shoping-cart-area mb-120">
    <div class="container">
        <div class="row">
            <div class="ltn__modal-area ltn__add-to-cart-modal-area">
                <div class="modal fade modalDomainError" id="modalDomainError" tabindex="-1">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close bg-transparent" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 <div class="ltn__quick-view-modal-inner">
                                     <div class="modal-product-item">
                                        <div class="row">
                                            <div class="col-12">
                                                 <div class="modal-product-info">
                                                    <h5>Peringatan</h5>
                                                    <p class="added-cart"><i class="fa fa-times-circle text-danger"></i> Anda belum menambahkan domain</p>
                                                    
                                                 </div>
                                            </div>
                                        </div>
                                     </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ltn__coupon-code-form mb-50">
                <p>Cek Domain</p>
                {{-- <form action="{{route('cek.domain')}}" method="POST">
                    @csrf --}}
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="text" name="domain" id="domain" placeholder="Cek Domain">
                        </div>
                        <div class="col-lg-2">
                            <div class="input-item">
                                <select name="ekstensi" id="ekstensi" class="nice-select">
                                    <option value=".com">.com</option>
                                    <option value=".id">.id</option>
                                    {{-- <option value=".co.id">.co.id</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn theme-btn-1 btn-effect-2" id="btn_cek_domain">Cek</button>
                        </div>
                    </div>
                    <div id="result_domain_cek">
                        <div class="row">
                            <div class="col">
                                <form action="{{route('add.domain')}}" method="POST">
                                    @csrf
                                    <h4 id="text_warning_domain"></h4>
                                    <input type="hidden" id="result_domain" name="title_domain">
                                    <input type="hidden" id="iddomain" name="id" value="007" class="form-control">
                                    <input type="hidden" id="qty" value="1" name="qty" class="cart-plus-minus-box">
                                    <button type="submit" class="btn theme-btn-1 btn-effect-2" id="btn_add_domain"
                                        style="display: none;">Tambahkan</button>
                                </form>
                                {{-- <button type="button" class="btn theme-btn-1 btn-effect-2" id="btn_cek_cookie"
                                    style="display: none;">Cek</button> --}}
                            </div>
                        </div>
                    </div>
                    {{--
                </form> --}}
            </div>
            <div class="col-lg-12">
                <div class="shoping-cart-inner">
                    <form action="{{route('update.cart')}}" method="POST">
                        @csrf
                        <div class="shoping-cart-table table-responsive">
                            <table class="table">
                                {{-- <thead>
                                    <th class="cart-product-remove">Remove</th>
                                    <th class="cart-product-image">Image</th>
                                    <th class="cart-product-info">Product</th>
                                    <th class="cart-product-price">Price</th>
                                    <th class="cart-product-quantity">Quantity</th>
                                    <th class="cart-product-subtotal">Subtotal</th>
                                </thead> --}}
                                <tbody>
                                    @forelse ($cart as $item)
                                    <tr>
                                        <td class="cart-product-remove"><a
                                                href="{{ route('delete-cart',$item['product_id'])}}">X</a></td>
                                        <td class="cart-product-image">
                                            <a href="#"><img src="{{$item['image']}}" alt="#"
                                                    style="height: 100px; width:100px;  object-fit:cover; border-radius:15px; border-radius:15px; border-color:rgb(58, 58, 58); border:1px solid;"></a>
                                        </td>
                                        <td class="cart-product-info">
                                            <h4><a href="#">{{$item['title']}}</a></h4>
                                        </td>
                                        <td class="cart-product-price">@currency($item['price'])</td>
                                        <td class="cart-product-quantity">
                                            @if ($item['category_id'] !== 1000)
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="{{ $item['qty'] }}" id="qty" name="qty[]"
                                                        class="cart-plus-minus-box">
                                                    {{-- <input type="hidden" name="product_id[]" value="{{ $item['id'] }}"
                                                        class="form-control"> --}}
                                                </div>
                                            @else
                                                <div class="cart-plus-minus">
                                                </div>
                                            @endif
                                        </td>
                                        <td class="cart-product-subtotal">@currency($item['price'] * $item['qty'])</td>
                                    </tr>
                                    <input type="hidden" name="product_id[]" value="{{ $item['product_id'] }}"
                                        class="form-control">
                                    @empty
                                    <tr>
                                        <td colspan="6"> Tidak ada keranjang belanja</td>
                                    </tr>
                                    @endforelse

                                    <tr class="cart-coupon-row">
                                        <td>
                                            <button type="submit" class="btn theme-btn-2 btn-effect-2"
                                                id="update_cart">Update Keranjang</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <div class="shoping-cart-total mt-50">
                        <h4>Cart Totals</h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Cart Subtotal</td>
                                    <td>@currency($subtotal)</td>
                                </tr>
                                <tr>
                                    <td>Kupon</td>
                                    <td id="rate_coupon">0</td>
                                </tr>
                                <tr>
                                    <td><strong>Order Total</strong></td>
                                    <td><strong>@currency($subtotal)</strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="btn-wrapper text-right text-end">
                            {{-- <a href="{{ route('checkout.index') }}" id="btn_next_cart" class="theme-btn-6 btn btn-effect-6">Lanjutkan</a> --}}
                            <a href="#" id="btn_next_cart" class="theme-btn-6 btn btn-effect-6">Lanjutkan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- SHOPING CART AREA END -->
@endsection
@push('after-scripts')
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function () {
            $("#btn_coupon").click(function (e) {
                let code_coupon = $("#code_coupon").val();
                e.preventDefault();
                alert('ok');
                $.ajax({
                    method: 'POST',
                    url: "{{route('apply.coupon')}}",
                    data: {
                        _token: CSRF_TOKEN,
                        'code' : code_coupon
                    },
                    // dataType: "dataType",
                    success: function (response) {
                        console.log(response);

                        $.each(response, function (key, value) {
                            if (value.type == 'numeric') {
                                $("#rate_coupon").text(value.rate);
                            }
                            if (value.type == 'percentage') {
                                $("#rate_coupon").text(value.rate);
                            }

                        });
                    }
                });
            });


            $("#btn_cek_domain").click(function (e) {
                e.preventDefault();
                let domain   = $("#domain").val();
                let ekstensi = $("#ekstensi").val();
                $.ajax({
                    type: "POST",
                    url: "{{route('cek.domain')}}",
                    data: {
                        _token: CSRF_TOKEN,
                        domain,
                        ekstensi
                    },
                    success: function (response) {
                        console.log(response);
                        var data = JSON.parse(response);
                        if(data.tersedia == 'ya')
                        {
                            $("#btn_add_domain").css('display', 'block');
                            $("#btn_cek_cookie").css('display', 'block');
                            $("#result_domain").val(data.domain);
                            $("#text_warning_domain").text(data.result);
                        }
                        if(data.tersedia == 'tidak')
                        {
                            $("#text_warning_domain").text(data.result);
                        }

                    }
                });
            });
            // $("#btn_add_domain").click(function (e) {
            //     e.preventDefault();
            //     let domain = $("#result_domain").val();
            //     $.ajax({
            //         type: "POST",
            //         url: "{{route('add.domain')}}",
            //         data : {
            //             _token: CSRF_TOKEN,
            //             domain,
            //         },
            //         success: function (response) {

            //             // window.location.reload();
            //             $("#domain-cart").val(domain);
            //             $("#add_domain_cart").css('display', 'block');
            //             console.log(response);
            //         }
            //     });
            // });

            $("#btn_cek_cookie").click(function (e) {
                e.preventDefault();
                let domain = $("#result_domain").val();
                $.ajax({
                    type: "GET",
                    url: "{{route('cart.session')}}",
                    success: function (response) {
                        console.log(response);
                    }
                });
            });

            $("#btn_next_cart").click(function (e) {
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: "{{route('cart.session')}}",
                    success: function (response) {
                        var countDomain = 0;
                        $.each(response, function(key, value) {
                            // console.log("Domain: " + value.domain);
                            if (value.hasOwnProperty('domain') && value.domain === 1) {
                                countDomain++;
                            }
                        });
                        if (countDomain > 0) {
                            window.location.href = "{{ route('checkout.index') }}";
                        }else{
                            $('.modalDomainError').modal('show');
                        }
                    }
                });


            });

            // $("#update_cart").click(function (e) {
            //     e.preventDefault();
            //     // alert('ok');
            //     $.ajax({
            //         type: "get",
            //         url: "{{route('cart.session')}}",
            //         success: function (response) {
            //             console.log(response);
            //         }
            //     });

            // });

            
        });
</script>
@endpush
