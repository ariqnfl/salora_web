@extends('welcome')
@section('title')Salora | Home @endsection
@section('content')
    <!--container-->
    <div class="spacefromhead"></div>
    <div class="container mt-5">
        <!--Shop By Categories-->
        <div class="shopby">
            <div class="row">
                <a class="shopbyitem col-sm-6" href="/kategori?category=2">
                    <img class="padding-top-sm" style="width:100%;padding-left: 0px; padding-right: 0px;" alt="DSLR"
                         src="{{asset('image/lap/lap1.jpg')}}">
                    <div class="tagshopby">
                        <h5>Lapangan 1</h5>
                    </div>
                </a>
                <a class="shopbyitem col-sm-6" href="kategori?category=3">
                    <img class="padding-top-sm" style="width:100%;padding-left: 0px; padding-right: 0px;" alt="DSLR"
                         src="{{asset('image/lap/lap1.jpg')}}">
                    <div class="tagshopby">
                        <h5>Lapangan 2</h5>
                    </div>
                </a>
            </div>
            <div class="row">
                <a class="shopbyitem col-sm-6" href="kategori?category=5">
                    <img class="padding-top-sm" style="width:100%;padding-left: 0px; padding-right: 0px;" alt="DSLR"
                         src="{{asset('image/lap/lap1.jpg')}}">
                    <div class="tagshopby">
                        <h5>Lapangan 3</h5>
                    </div>
                </a>
                <a class="shopbyitem col-sm-6" href="kategori?category=4">
                    <img class="padding-top-sm" style="width:100%;padding-left: 0px; padding-right: 0px;" alt="DSLR"
                         src="{{asset('image/lap/lap1.jpg')}}">
                    <div class="tagshopby">
                        <h5>Lapangan 4</h5>
                    </div>
                </a>
            </div>
        </div>
{{--        <!--Lihat kategori lapangan-->--}}
        <div class="feat-product-text">
            <h4>Featured Lapangan</h4>
        </div>
        <div id="item" class="row">
            @foreach($lapangan as $item)
                <div class="card m-1" style="width: 23%" >
                    <a class="item-link">
                        <div class="product-card-body card-body">
                            <h5 class="card-title truncate">{{$item->nama_lapangan}}</h5>
                            <a href="{{route('gambar',['id'=> $item->id])}}">
                                <img class="card-img" src="{{asset('storage/'.$item->gambar)}}" alt="">
                            </a>
                            <h5 class="card-title">Rp. {{number_format($item->harga)}}</h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
