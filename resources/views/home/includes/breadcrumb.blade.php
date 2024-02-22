<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bg="img/bg/14.jpg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">{{$breadcrumb ?? 'Shop'}}</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{route('home')}}" class="text-webiin"><span class="text-webiin"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>{{$breadcrumb ?? 'Shop'}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
