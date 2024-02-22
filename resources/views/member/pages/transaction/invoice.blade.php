@extends('admin.layouts.layout-dashboard')
@section('content')
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Apps</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
        {{-- <div class="page-options">
        <a href="#" class="btn btn-secondary">Settings</a>
        <a href="#" class="btn btn-primary">Upgrade</a>
    </div> --}}
    </div>
    @php
        $sumtotal = 0;
        $sumcoupon = 0;
        $pajak = 0;
    @endphp
    <div class="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-3 ps-0">
                                <a href="#" class="noble-ui-logo d-block mt-3">Toko<span>Webiin</span></a>
                                <p class="mt-1 mb-1"><b>Webiin</b></p>
                                <p>Karang Wuni<br> Caturtunggal<br>Depok, Sleman</p>
                                <h5 class="mt-5 mb-2 text-muted">Invoice to :</h5>
                                <p>{{$detail->user->name}}<br> {{$detail->user->address}}<br> {{$detail->user->phone}}</p>
                            </div>
                            <div class="col-lg-3 pe-0">
                                <h4 class="text-uppercase text-end mt-4 mb-2">invoice</h4>
                                <h6 class="text-end mb-3 pb-4"># {{$detail->code}}</h6>
                                @if ($detail->transaction_status !== "SUCCESS")
                                    <h3 class="text-end pb-4 mt-3">
                                        <div class="badge badge-warning">{{$detail->transaction_status}}</div>
                                    </h3>
                                    <button type="button" id="pay-button" class="btn btn-success">Bayar</button>
                                @else
                                    <h3 class="text-end pb-4 mt-3">
                                        <div class="badge badge-success">SUDAH DIBAYAR</div></h3>
                                @endif
                                {{-- <p class="text-end mb-1 mt-2">Balance Due</p>
                                <h4 class="text-end fw-normal">@currency($sumtotal)</h4>
                                <h6 class="mb-0 mt-3 text-end fw-normal mb-2"><span class="text-muted">Invoice Date :</span>{{$detail->created_at}}</h6> --}}
                                {{-- <h6 class="text-end fw-normal"><span class="text-muted">Due Date :</span> 12th Jul 2023</h6> --}}
                            </div>
                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            {{-- <div class="table-responsive"> --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Description</th>
                                            <th class="text-end">Quantity</th>
                                            <th class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detail->details as $item)
                                            <tr class="text-end">
                                                <td class="text-start">1</td>
                                                <td class="text-start">{{$item->product->title}}</td>
                                                <td>{{$item->qty}}</td>
                                                <td>@currency($item->transaction_subtotal)</td>
                                            </tr>
                                        @php
                                            $sumtotal += $item->transaction_subtotal;
                                        @endphp
                                        @endforeach

                                    </tbody>
                                </table>
                            {{-- </div> --}}
                        </div>
                        <div class="container-fluid mt-5">
                            <div class="row">
                                <div class="col-md-6 ms-auto">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td class="text-end">@currency($sumtotal)</td>
                                            </tr>
                                            @if ($detail->coupon_id != null)
                                                @php
                                                    if ($detail->coupon->type == 'numeric') {
                                                        $sumcoupon = $sumtotal - $detail->coupon->discount_rate;
                                                    }
                                                    if ($detail->coupon->type == 'percentage') {
                                                        $percent = $detail->$coupon->discount_rate / 100 * $sumtotal;
                                                        $sumcoupon = $sumtotal - $percent;
                                                    }
                                                @endphp
                                                <tr>
                                                    <td>Kupon <br>
                                                        {{$detail->coupon->code}}
                                                    </td>
                                                    <td>
                                                        @if ($detail->coupon->type == 'numeric')
                                                            @currency($detail->coupon->discount_rate)
                                                        @endif
                                                        @if ($detail->coupon->type == 'percentage')
                                                            ($detail->coupon->discount_rate) %
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Total </td>
                                                    <td class="text-end">@currency($sumcoupon)</td>
                                                </tr>
                                            @endif
                                            @php
                                                if($sumcoupon){$pajak = $sumcoupon * 0.11;}
                                                else {
                                                    $pajak = $sumtotal * 0.11;
                                                }
                                            @endphp
                                            <tr>
                                                <td>Tax (11%)</td>
                                                <td class="text-end">@currency($pajak)</td>
                                            </tr>
                                            <tr>
                                                <td>Biaya Payment</td>
                                                <td class="text-danger text-end">-</td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold-800">Grand Total</td>
                                                <td class="text-bold-800 text-end"> @currency($detail->transaction_total)</td>
                                            </tr>
                                            {{-- <tr class="bg-light">
                                                <td class="text-bold-800">Balance Due</td>
                                                <td class="text-bold-800 text-end">$ 12,000.00</td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid w-100">
                            {{-- <a href="javascript:;" class="btn btn-primary float-end mt-4 ms-2"><i data-feather="send"
                                    class="me-3 icon-md"></i>Send Invoice</a> --}}
                            <a href="javascript:;" class="btn btn-outline-primary float-end mt-4"><i data-feather="printer" class="me-2 icon-md"></i>Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h5>INVOICE</h5>
                    <h5><strong>{{$detail->code}}</strong></h5>
                </div>
                <div class="col-sm-6">
                    <h4 class="float-right"><strong>{{$detail->transaction_status}}</strong></h4>
                </div>
            </div>
            <hr>
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="mb-3">From:</h6>
                    <div>
                        <strong>{{$detail->user->name}}</strong>
                    </div>
                    <div>{{$detail->user->address}}</div>
                    <div>Email: {{$detail->user->email}}</div>
                    <div>Phone: {{$detail->user->phone}}</div>
                </div>

                <div class="col-sm-6">
                    <h6 class="mb-3">To:</h6>
                    <div>
                        <strong>Webiin</strong>
                    </div>
                    <div>Attn: Daniel Marek</div>
                    <div>43-190 Mikolow, Poland</div>
                    <div>Email: marek@daniel.com</div>
                    <div>Phone: +48 123 456 789</div>
                </div>



            </div>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>Item</th>
                            <th class="center">Qty</th>
                            <th class="right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail->details as $item)
                            <tr>
                                <td class="center">{{$loop->iteration}}</td>
                                <td class="left strong">{{$item->product->title}}</td>
                                <td class="center">{{$item->qty}}</td>
                                <td class="right">{{$item->transaction_subtotal}}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">

                </div>

                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                            <tr>
                                <td class="left">
                                    <strong>Subtotal</strong>
                                </td>
                                <td class="right">$8.497,00</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong>Discount (20%)</strong>
                                </td>
                                <td class="right">$1,699,40</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong>VAT (10%)</strong>
                                </td>
                                <td class="right">$679,76</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong>Total</strong>
                                </td>
                                <td class="right">
                                    <strong>$7.477,36</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div> --}}
    </div>
@endsection
@push('after-scripts')
{{-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script> --}}
<script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    const payButton = document.querySelector('#pay-button');
    payButton.addEventListener('click', function(e) {
        e.preventDefault();
        snap.pay('{{ $detail->payment_token }}', {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
                send_response_to_form(result);
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
                send_response_to_form(result);
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
                send_response_to_form(result);
            }
        });
    });
    function send_response_to_form (result) {
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit_form').submit();
     }
</script>
@endpush
