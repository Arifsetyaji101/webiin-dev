<div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <span class="ltn__utilize-menu-title">Keranjang</span>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="mini-cart-product-area ltn__scrollbar">
            @if ($cart)
                @forelse ($cart as $item)
                    <div class="mini-cart-item clearfix">
                        <div class="mini-cart-img">
                            <a href="#"><img src="{{$item['image']}}" alt="Image"></a>
                            <div class="">
                                <a class="mini-cart-item-delete"
                                href="{{ route('delete-cart',$item['product_id'])}}">
                                <i class="icon-cancel"></i>
                            </a></div>
                        </div>
                        <div class="mini-cart-info">
                            <h6><a href="#">{{$item['title']}}</a></h6>
                            <span class="mini-cart-quantity">{{$item['qty']}} x {{$item['price']}} </span>
                        </div>
                    </div>
                @empty
                    <div class="mini-cart-item clearfix">
                        {{-- <div class="mini-cart-img">
                            <a href="#"><img src="{{url('themes-frontend/img/product/2.png')}}" alt="Image"></a>
                            <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                        </div> --}}
                        <div class="mini-cart-info">
                            <h6><a href="#">Tidak ada keranjang</a></h6>
                        </div>
                    </div>
                @endforelse
                @else
                    <div class="mini-cart-item clearfix">
                        {{-- <div class="mini-cart-img">
                            <a href="#"><img src="{{url('themes-frontend/img/product/2.png')}}" alt="Image"></a>
                            <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                        </div> --}}
                        <div class="mini-cart-info">
                            <h6><a href="#">Tidak ada keranjang</a></h6>
                        </div>
                    </div>
                @endif

        </div>
        <div class="mini-cart-footer">
            <div class="mini-cart-sub-total">
                <h5>Subtotal: <span>{{$subtotal}}</span></h5>
            </div>
            <div class="btn-wrapper">
                <a href="{{route('cart.index')}}" class="theme-btn-2 btn btn-effect-2">Keranjang</a>
                <a href="{{route('checkout.index')}}" class="theme-btn-2 btn btn-effect-2">Checkout</a>
            </div>
            {{-- <p>Free Shipping on All Orders Over $100!</p> --}}
        </div>

    </div>
</div>
@push('after-scripts')
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function () {
        $("#delete_cart_side").click(function (e) { 
            var itemId = $(this).data('id');
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "/delete-cart/"+itemId,
                ssuccess: function (response) {
                    console.log('sukses deleted');
                    location.reload();
                    // Tambahkan logika atau perubahan tampilan sesuai kebutuhan Anda
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endpush
