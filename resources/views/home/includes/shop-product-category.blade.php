<div class="col-lg-4  mb-100">
    <aside class="sidebar ltn__shop-sidebar">
        <!-- Category Widget -->
        <div class="widget ltn__menu-widget" style="border-radius: 15px">
            <h4 class="ltn__widget-title ltn__widget-title-border">Kategori Template</h4>
            <ul>
                @foreach ($category as $item)
                <li><a href="{{route('shop.category',$item->slug ?? '')}}">{{$item->name}} <span><i class="fas fa-long-arrow-alt-right"></i></span></a>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- Search Widget -->
        <div class="widget ltn__search-widget"  style="border-radius: 15px">
            <h4 class="ltn__widget-title ltn__widget-title-border">Pencarian</h4>
            <form action="#">
                <input type="text" name="search" placeholder="Cari Template"  style="border-radius: 15px">
                <button type="submit"><i class="fas fa-search" ></i></button>
            </form>
        </div>

    </aside>
</div>