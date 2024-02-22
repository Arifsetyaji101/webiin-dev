@extends('home.layouts.layout-pages')
@section('content')
 <!-- PAGE DETAILS AREA START (blog-details) -->
 <div class="ltn__page-details-area ltn__blog-details-area mb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="ltn__blog-details-wrap">
                    <div class="ltn__page-details-inner ltn__blog-details-inner">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-category">
                                    <a class="bg-webiin hover-webiin" href="javascript:void(0);" >{{$detailBlog->category->name}}</a>
                                </li>
                            </ul>
                        </div>
                        <h2 class="ltn__blog-title">{{$detailBlog->titles}}</h2>
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#">Penulis : {{$detailBlog->author->name}}</a>
                                </li>
                                <li class="ltn__blog-date">
                                    <i class="far fa-calendar-alt text-webiin"></i>{{$detailBlog->created_at}}
                                </li>
                                {{-- <li>
                                    <a href="#"><i class="far fa-comments"></i>0 Comments</a>
                                </li> --}}
                            </ul>
                        </div>
                        <p>{!!$detailBlog->body!!}</p>

                    </div>
                    <!-- blog-tags-social-media -->
                    <div class="ltn__blog-tags-social-media mt-80 row">
                        <div class="ltn__tagcloud-widget col-lg-8">
                            <h4>Tags</h4>
                            <ul>
                                @foreach ($tags as $item)
                                    <li>
                                        <a href="javascript:void(0);" style="border-radius:10px" class="hover-webiin">{{$item}}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        {{-- <div class="ltn__social-media text-right text-end col-lg-4">
                            <h4>Social Share</h4>
                            <ul>
                                <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>

                                <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div> --}}
                    </div>
                    <hr>
                    <!-- prev-next-btn -->
                    {{-- <div class="ltn__prev-next-btn row mb-50">
                        <div class="blog-prev col-lg-6">
                            <h6>Prev Post</h6>
                            <h3 class="ltn__blog-title"><a href="#">Tips On Minimalist</a></h3>
                        </div>
                        <div class="blog-prev blog-next text-right text-end col-lg-6">
                            <h6>Next Post</h6>
                            <h3 class="ltn__blog-title"><a href="#">Less Is More</a></h3>
                        </div>
                    </div> --}}
                    <hr>
                    <!-- related-post -->
                    <div class="related-post-area mb-50">
                        <h4 class="title-2">Rekomendasi Blog</h4>
                        <div class="row">
                            @foreach ($related as $item)
                                <div class="col-md-6">
                                    <!-- Blog Item -->
                                    <div class="ltn__blog-item ltn__blog-item-6">
                                        <div class="ltn__blog-img">
                                            {{-- <a href="{{route('blog.detail',$item->slug)}}"><img src="{{url('themes-frontend/img/blog/blog-details/11.jpg')}}" alt="Image"></a> --}}
                                            <a href="{{ route('blog.detail', $item->slug) }}"><img src="{{ $item->thumbnail }}" alt="#"></a>
                                        </div>
                                        <div class="ltn__blog-brief">
                                            <div class="ltn__blog-meta">
                                                {{-- <ul>
                                                    <li class="ltn__blog-date ltn__secondary-color">
                                                        <i class="far fa-calendar-alt"></i>June 22, 2020
                                                    </li>
                                                </ul> --}}
                                                <ul>
                                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt text-webiin"></i>{{ $item->created_at
                                                        }}</li>
                                                </ul>
                                            </div>
                                            <h3 class="ltn__blog-title text-hover-webiin"><a href="{{route('blog.detail',$item->slug)}}" style="display: block;
                                                white-space: nowrap;
                                                overflow: hidden;
                                                text-overflow: ellipsis;">{{$item->titles}}</a></h3>
                                            <p>{{ Str::limit($item->description, 20) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="sidebar-area blog-sidebar ltn__right-sidebar">
                    
                    <!-- Popular Post Widget -->
                    <div class="widget ltn__popular-post-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Blog Populer</h4>
                        <ul>
                            @foreach ($popularView as $item)
                                <li>
                                    <div class="popular-post-widget-item clearfix">
                                        <div class="popular-post-widget-img">
                                            <a href="{{ route('blog.detail', $item->slug) }}"><img src="{{$item->thumbnail}}" alt="#" style="border-radius: 10px;"></a>
                                        </div>
                                        <div class="popular-post-widget-brief">
                                            <h6><a class="text-hover-webiin" href="{{ route('blog.detail', $item->slug) }}" style="
                                                display: block;
                                                white-space: nowrap;
                                                overflow: hidden;
                                                text-overflow: ellipsis;
                                                ">{{$item->titles}}</a></h6>
                                            <div class="ltn__blog-meta">
                                                <ul>
                                                    <li class="ltn__blog-date text-webiin">
                                                        <a href="#"><i class="far fa-calendar-alt "></i>{{$item->created_at}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Menu Widget (Category) -->
                    <div class="widget ltn__menu-widget ltn__menu-widget-2 ltn__menu-widget-2-color-2">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Kategori</h4>
                        <ul>
                            @foreach ($category as $item)
                                <li>
                                    <a class="bg-webiin hover-webiin" href="javascript:void(0);" style="border-radius: 10px">{{$item->name}}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <!-- Social Media Widget -->
                    {{-- <div class="widget ltn__social-media-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Never Miss News</h4>
                        <div class="ltn__social-media-2">
                            <ul>
                                <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>

                            </ul>
                        </div>
                    </div> --}}
                    <!-- Tagcloud Widget -->
                    <div class="widget ltn__tagcloud-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Tags Populer</h4>
                        <ul>
                            @foreach ($tags as $item)
                                <li>
                                    <a href="javascript:void(0);" style="border-radius: 10px" class="hover-webiin">{{$item}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </aside>
            </div>
        </div>
    </div>
</div>
<!-- PAGE DETAILS AREA END -->
@endsection
