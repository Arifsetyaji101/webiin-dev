<div class="modal-body">
    <div class="ltn__quick-view-modal-inner">
        <div class="modal-product-item">
           <div class="row">
               <div class="col-lg-6 col-12">
                   <div class="modal-product-img">
                       <img src="{{$detail->productImages->first()->image}}" alt="#">
                   </div>
               </div>
               <div class="col-lg-6 col-12">
                   <div class="modal-product-info">
                       <h3><a href="{{route('product.detail',$detail->slug)}}">{{$detail->title}}</a></h3>
                       <div class="product-price">
                           <span>@currency($detail->price)</span>
                           @if($detail->price_coret)
                            <del>@currency($detail->price_coret)</del>
                           @endif
                       </div>

                       <div class="modal-product-brief">
                           <p>{!!$detail->description!!}</p>
                       </div>
                       <div class="modal-product-meta ltn__product-details-menu-1 d-none">
                           <ul>
                               <li>
                                   <strong>Categories:</strong>
                                   <span>
                                       <a href="#">Parts</a>
                                       <a href="#">Car</a>
                                       <a href="#">Seat</a>
                                       <a href="#">Cover</a>
                                   </span>
                               </li>
                           </ul>
                       </div>
                       <div class="ltn__product-details-menu-2 d-none">
                           <ul>
                               <li>
                                   <div class="cart-plus-minus">
                                       <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                   </div>
                               </li>
                               <li>
                                   <a href="#" class="theme-btn-1 btn btn-effect-1" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                       <i class="fas fa-shopping-cart"></i>
                                       <span>ADD TO CART</span>
                                   </a>
                               </li>
                           </ul>
                       </div>
                       {{-- <div class="ltn__social-media">
                           <ul>
                               <li>Share:</li>
                               <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                               <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                               <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                               <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>

                           </ul>
                       </div> --}}
                       <label class="float-right mb-0"><a class="text-decoration" href="{{route('product.detail',$detail->slug)}}"><small>Lihat Detail</small></a></label>
                   </div>
               </div>
           </div>
        </div>
    </div>
</div>
