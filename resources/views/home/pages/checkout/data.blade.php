@extends('home.layouts.layout-pages')
@section('content')
<!-- WISHLIST AREA START -->
<div class="ltn__checkout-area mb-105">
    <div class="container">
        @guest
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__checkout-inner">
                    <div class="ltn__checkout-single-content ltn__returning-customer-wrap">
                        <h5>Returning customer? <a class="ltn__secondary-color" href="#ltn__returning-customer-login"
                                data-bs-toggle="collapse">Click here to login</a></h5>
                        <div id="ltn__returning-customer-login" class="collapse ltn__checkout-single-content-info">
                            <div class="ltn_coupon-code-form ltn__form-box">
                                <p>Please login your accont.</p>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="ltn__name" placeholder="Enter your name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input type="email" name="ltn__email" placeholder="Enter email address">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn theme-btn-1 btn-effect-1 text-uppercase">Login</button>
                                    <label class="input-info-save mb-0"><input type="checkbox" name="agree"> Remember
                                        me</label>
                                    <p class="mt-30"><a href="register.html">Lost your password?</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endguest
        @auth
        <form action="{{route('checkout.process')}}" method="POST">
            @csrf
            <div class="row mb-130">
                <div class="col-lg-12 col-md-6">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            {{-- Informasi Anda --}}

                            <div class="ltn__checkout-inner">
                                @if (session('error'))
                                    <!-- Modal -->
                                    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
                                        <div class="modal fade" id="profileModal" tabindex="-1">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                                                                            <p class="added-cart"><i class="fa fa-times-circle"></i> {{ session('error') }}</p>
                                                                            <div class="btn-wrapper">
                                                                                <a href="{{route('profile.edit')}}" class="theme-btn-1 btn btn-effect-1">Profile</a>
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
                                    </div>
                                @endif
                                <div class="ltn__checkout-single-content">
                                    <div class="ltn__checkout-single-content-info">
                                        <form action="#">
                                            <h6>Kode Kupon</h6>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-item input-item-name">
                                                        <div class="row">
                                                            <div class="col-md-8 col-12">
                                                                <input type="text" name="code" id="code_coupon"
                                                                    placeholder="Masukkan Kupon"
                                                                    style="border-radius: 15px">
                                                            </div>
                                                            <div class="col-md-4 col-12">
                                                                <button type="button" id="btn_coupon"
                                                                    class="btn btn-white btn-effect-2 text-uppercase">
                                                                    Kupon</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <br>
                                    <div class="ltn__checkout-single-content-info">
                                        <form action="#">
                                            <h6>Informasi Pribadi</h6>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-item input-item-name ltn__custom-icon">
                                                        <input type="text" name="name" value="{{Auth::user()->name}}"
                                                            placeholder="First name" style="border-radius: 15px">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="input-item input-item-email ltn__custom-icon">
                                                        <input type="email" name="ltn__email"
                                                            value="{{Auth::user()->email}}" placeholder="email address "
                                                            style="border-radius: 15px">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="input-item input-item-phone ltn__custom-icon">
                                                        <input type="text" name="ltn__phone"
                                                            value="{{Auth::user()->phone}}" placeholder="phone number"
                                                            style="border-radius: 15px">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <h6>Alamat Lengkap</h6>
                                                    <div class="input-item input-item-subject ltn__custom-icon">
                                                        <input type="text" placeholder="House number and street name"
                                                            value="{{Auth::user()->address}}"
                                                            style="border-radius: 15px">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            {{-- Ringkasan Pemesanan --}}

                            <div class="ltn__checkout-single-content-info">

                                <div>
                                    <h4 class="title-2">Ringkasan Pemesanan</h4>

                                    <table class="table">
                                        <tbody>
                                            @forelse ($cart as $item)
                                            <tr>
                                                <td>{{$item['title']}} <strong>× {{$item['qty']}}</strong></td>
                                                <td>@currency($item['qty'] * $item['price'])</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="2">Tidak ada keranjang</td>
                                            </tr>
                                            @endforelse
                                            <tr>
                                                <td><strong>Kupon</strong> <br>
                                                    <div id="description_coupon">kupon</div>
                                                </td>
                                                <td id="rate_coupon">Rp 0</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Sub Total</strong></td>
                                                <td id="order_total">@currency($subtotal)</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Pajak 11%</strong>
                                                </td>
                                                <td><div id="pajak">Rp 0</div></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Grand Total</strong>
                                                </td>
                                                <td><strong><div id="grand_total">0</div></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div>
                                <p class="text-center">Saya menyatakan telah menyetujui SLA, AUP, Perjanjian Layanan Web Hosting, dan
                                    Kebijakan
                                    Privasi.</p>
                            </div>
                            <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                            <input type="hidden" id="trx_total" value="{{$subtotal}}">
                            <input type="hidden" id="grand_total_send" value="{{$subtotal}}" name="transaction_total">
                            <input type="hidden" id="idcoupon" name="idcoupon">
                            <button class="btn theme-btn-7 btn-effect-7 text-uppercase" id="pay-button" type="submit">Lanjutkan</button>


                        </div>
                    </div>
                </div>

        </form>
        @endauth
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- WISHLIST AREA START -->
@endsection
@push('after-scripts')
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function () {
            @if(session('error'))
                $('#profileModal').modal('show');
            @endif
            pajak();
            $("#btn_coupon").click(function (e) {
                let code_coupon = $("#code_coupon").val();
                e.preventDefault();
                alert('sukses input: ' + code_coupon);
                $.ajax({
                    method: 'POST',
                    url: "{{route('apply.coupon')}}",
                    data: {
                        _token: CSRF_TOKEN,
                        'code' : code_coupon
                    },
                    // dataType: "dataType",
                    success: function (response) {
                        // console.log(response);

                        $.each(response, function (key, value) {
                            const element       = $("#order_total");
                            const element_total = $("#trx_total");
                            const grand_total   = $("#trx_total");
                            const idcoupon      = $("#idcoupon");
                            const description   = $("#description_coupon");
                            if (value.type == 'numeric') {
                                $("#rate_coupon").text(value.rate);
                                element.text(value.result_total);
                                description.text(value.description);
                                element_total.val(value.result_total);
                                idcoupon.val(value.idcoupon);
                                pajak();
                            }
                            if (value.type == 'percentage') {
                                $("#rate_coupon").text(value.rate);
                                element.text(value.result_total);
                                description.text(value.description);
                                element_total.val(value.result_total);
                                idcoupon.val(value.idcoupon);
                                pajak();
                            }
                            if (value.type == 'expired') {
                                $("#rate_coupon").text(value.rate);
                                idcoupon.val(value.idcoupon);
                                alert( code_coupon + ': Sudah tidak berlaku');
                                pajak();
                            }

                        });
                    }
                });
            });

            function pajak(){
                let subtotal = $("#trx_total").val();
                let pajaktotal = parseInt(subtotal)* 0.11;
                let pajakresult = formatCurrency(pajaktotal);
                let grand_total_pajak = parseInt(subtotal) + parseInt(pajaktotal);
                $("#grand_total_send").val(grand_total_pajak);
                $("#pajak").text(pajakresult);
                $("#grand_total").text(formatCurrency(grand_total_pajak));
            }

            function formatCurrency ($params){
                let formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
                })
                return formatter.format($params)
            }
        });
</script>
{{-- midtrans --}}
{{-- <script type="text/javascript" src="https://app.stg.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
      // Also, use the embedId that you defined in the div above, here.
      window.snap.embed('{{$snap}}', {
        embedId: 'snap-container',
        onSuccess: function (result) {
          /* You may add your own implementation here */
          alert("payment success!"); console.log(result);
        },
        onPending: function (result) {
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function (result) {
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function () {
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      });
    });
  </script> --}}
@endpush
