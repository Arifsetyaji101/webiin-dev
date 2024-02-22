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
        <div class="col-md-12">
            <div class="page-title">
                <a href="{{route('category.create')}}" class="btn btn-primary btn-sm"  style="float: right;">buat sub kategori</a>
                {{-- <p class="page-desc">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, built upon the foundations of progressive enhancement, that adds many advanced features to any HTML table.</p> --}}
            </div>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Kategori</h5>
                    <br>
                    <div class="table-responsive">
                        <table id="zero-conf" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Tipe Kategori</th>
                                    <th>Gambar Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategory as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->type}}</td>
                                        <td><img src="{{$item->image}}" width="100" height="100" alt=""></td>
                                        <td>
                                            <a href="{{route('category.edit',$item->id)}}" class="btn btn-sm btn-secondary">Edit</a>
                                            <form action="{{ route('category.destroy',$item->id) }}" method="POST" style="display: inline-block;">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger" value="Delete"
                                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data {{ $item->name }} ?')">
                                                     Hapus
                                                </button>
                                            </form>
                                            <a href="#"
                                                class="btn btn-sm btn-primary"
                                                data-toggle="modal"
                                                id="btnModalSub"
                                                data-target="#exampleModal"
                                                data-title="Peringatan"
                                                {{-- data-id="{{$item->id}}" --}}
                                                data-remote="{{ route('subcategory.show', $item->id) }}">
                                                + Sub
                                            </a>
    
                                            {{-- <a data-href="" type="button" class="btn btn-primary" id="btnModalSub" data-toggle="modal" data-target="#exampleModal" data-id="{{$item->id}}"> --}}
                                            {{-- <button type="button" class="btn btn-primary btnModalSub" id="btnModalSub"> --}}
                                                {{-- + Sub
                                            </button> --}}
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
{{-- <div class="modal fade" id="modalSub" style="display: none"> --}}
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Sub Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div id="loader">
                <div class="text-center mt-2 mb-2" style="position: absolute; left: 0; right: 0;">
                    <img src="{{url('themes/assets/icons/loader.gif')}}">
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
        $(document).on('click', '#btnModalSub', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-remote');
            $.ajax({
                url: href
                , beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    console.log(href);
                    $('#exampleModal').modal("show");
                    $('#content_subcategory').html(result).show();
                }
                , complete: function() {
                    $('#loader').hide();
                }
                , error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                }
                , timeout: 8000
            })
        });
        // $(document).ready(function () {
        //     $("#btnModalSub").click(function (e) {
        //         e.preventDefault();
        //         var idcategories =$(this).attr("data-id");

        //         $.ajax({
        //             type: "GET",
        //             url: ('subcategory/'+idcategories),
        //             // data: "data",
        //             // dataType: "dataType",
        //             success: function (response) {
        //                 $("#parent_id").val(idcategories);
        //             }
        //         });


        //     });
        // });
    </script>
@endpush

