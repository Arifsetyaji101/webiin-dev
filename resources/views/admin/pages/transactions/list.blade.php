@extends('admin.layouts.layout-dashboard')
@section('content')


<!-- Page-header end -->

<div class="page-info">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Extended</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
        </ol>
    </nav>
</div>
@if (session('success'))
<div class="alert alert-primary outline-alert" role="alert">
    {{ session('success') }}
    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> --}}
</div>
@endif
<div class="main-wrapper">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Transaksi</h5>
                    <br>
                    <div class="table-responsive">
                        <table id="zero-conf" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Total</th>
                                    <th>Kupon</th>
                                    <th>Bank</th>
                                    <th>VA Number</th>
                                    <th>Status</th>
                                    <th>Progress</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->code}}</td>
                                        <td>@currency($item->transaction_total)</td>
                                        <td>{{$item->coupon->code ?? ''}}</td>
                                        <td>{{$item->bank_name}}</td>
                                        <td>{{$item->va_number ?? ''}}</td>
                                        <td>{{$item->transaction_status}}</td>
                                        <td>{{$item->progress_status}}</td>
                                        <td>
                                            <a href="{{route('transaction.detail',$item->code)}}" class="btn btn-sm btn-secondary">Detail</a>
    
                                                <button class="btn btn-sm btn-outline-info dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Progress</button>
                                                <div class="dropdown-menu">
                                                  <a class="dropdown-item" href="{{route('transaction.update-progress',$item->code)}}" onclick="event.preventDefault();document.getElementById('progress-form').submit();">Pending</a>
                                                  <a class="dropdown-item" href="{{route('transaction.update-progress',$item->code)}}" onclick="event.preventDefault();document.getElementById('progress-form-terima').submit();">Diterima</a>
                                                  <a class="dropdown-item" href="{{route('transaction.update-progress',$item->code)}}" onclick="event.preventDefault();document.getElementById('progress-form-proses').submit();">Proses</a>
                                                  <a class="dropdown-item" href="#" data-toggle="modal"
                                                    id="btnModalProgress" data-target="#exampleModal" data-title="Peringatan"
                                                    data-key="progress_done"
                                                    data-remote="{{ route('transaction.detail', $item->code) }}">
                                                    Selesai
                                                </a>
                                                  {{-- <a class="dropdown-item" href="{{route('transaction.update-progress',$item->code)}}" onclick="event.preventDefault();document.getElementById('progress-form-selesai').submit();">Selesai</a> --}}
                                                </div>
                                                <form id="progress-form" action="{{route('transaction.update-progress',$item->code)}}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="progress_status" value="Pending">
                                                </form>
                                                <form id="progress-form-terima" action="{{route('transaction.update-progress',$item->code)}}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="progress_status" value="Diterima">
                                                </form>
                                                <form id="progress-form-proses" action="{{route('transaction.update-progress',$item->code)}}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="progress_status" value="Proses">
                                                </form>
                                                {{-- <form id="progress-form-selesai" action="{{route('transaction.update-progress',$item->code)}}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="progress_status" value="Selesai">
                                                </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
{{-- <div class="modal fade" id="modalSub" style="display: none"> --}}
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Progress Selesai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="material-icons">close</i>
            </button>
        </div>
        <div id="loader">
            <div class="text-center mt-2 mb-2" style="position: absolute; left: 0; right: 0;">
                <img src="{{ url('themes/assets/icons/loader.gif') }}">
            </div>
        </div>
        <div id="content_subcategory">

        </div>
    </div>
</div>
</div>



@endsection
@push('after-scripts')
<script>
    $(document).on('click', '#btnModalProgress', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-remote');
            let key  = $(this).attr('data-key');
            $.ajax({
                url: href,
                data:{
                    key :key,
                },
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    console.log(href);
                    $('#exampleModal').modal("show");
                    $('#content_subcategory').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
</script>
@endpush

